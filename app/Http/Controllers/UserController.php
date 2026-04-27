<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;


use App\Models\Category;
use App\Models\Quiz;
use App\Models\MCQ;
use App\Models\User;
use App\Models\Record;
use App\Models\MCQ_Record;
use App\Mail\VerifyUser;
use App\Mail\UserForgetPassword;

class UserController extends Controller
{
    function welcome()
    {
        $categories = Category::withCount('quizzes')->get();
        // return $categories;
        return view('welcome', ["categories" => $categories]);
    }

    function userQuizList($id, $category)
    {

        $quizData = Quiz::withCount('mcq')->where('category_id', $id)->get();
        //return $quizData;

        return view('user-quiz-list', ["quizData" => $quizData, "category" => $category]);

    }

    function userSignup(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required | min:3',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:4 | confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $link = Crypt::encryptString($user->email);
        $link = url('/verify-user/'.$link);
        Mail::to($user->email)->send(new VerifyUser($link));

        if ($user) {
            Session::put('user', $user);
            if (Session::has('quiz-url')) {
                $url = Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url);

            }
            return redirect('/');
        }
        //return $user; 


    }

    function verifyUser($eamil){
        $orgEmail = Crypt::decryptString($eamil);
        $user = User::where('email', $orgEmail)->first();
        if($user){
            $user->active = 2; 
            if($user->save()){
                return redirect('/');
            }
        }
    }

    function startQuiz($id, $name)
    {


        $quizCount = MCQ::where('quiz_id', $id)->count();
        $mcqs = MCQ::where('quiz_id', $id)->get();


        $firstMCQ = MCQ::where('quiz_id', $id)->first();
        Session::put('firstMCQ', $firstMCQ);
        //return Session::get('firstMCQ', $mcqs[0]);

        if (!$firstMCQ) {
            return redirect()->back()->with('error', 'No questions found for this quiz!');
        }

        $quizName = $name;

        return view('start-quiz', ['quizName' => $quizName, 'quizCount' => $quizCount]);

    }

    function userLogout()
    {
        Session::forget('user');
        return redirect('/');
    }

    function userSignupQuiz()
    {

        Session::put('quiz-url', url()->previous());

        return view('userSignup');
    }

    function userLogin(Request $request)
    {

        $validate = $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        //return $user;

        if (!$user || !Hash::check($request->password, $user->password)) {
            return "User not valid, Please check your Email and Password";
        }

        if ($user) {
            Session::put('user', $user);
            if (Session::has('quiz-url')) {
                $url = Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url)->with('message', "User Login Successfully!");

            }
            return redirect('/')->with('message', "User Not Found");
        }
        //return $user; 


    }

    function userLoginQuiz()
    {
        Session::put('quiz-url', url()->previous());

        return view('user-login');
    }

    function mcq($id, $name)
    {

        $record = new Record();
        $record->user_id = Session::get('user')['id'];
        $record->quiz_id = Session::get('firstMCQ')['quiz_id'];
        $record->status = 1;
        if ($record->save()) {
            $currentQuiz = [];
            $currentQuiz['totalMcq'] = MCQ::where('quiz_id', Session::get('firstMCQ')['quiz_id'])->count();
            $currentQuiz['currentMcq'] = 1;
            $currentQuiz['quizName'] = $name;
            $currentQuiz['quizId'] = Session::get('firstMCQ')['quiz_id'];
            $currentQuiz['recordId'] = $record['id'];
            Session::put('currentQuiz', $currentQuiz);

            $mcqData = MCQ::find($id);

            return view('mcq-page', [
                'quizName' => $name,
                "mcqData" => $mcqData
            ]);
        } else {
            return "something went wrong";
        }

    }

    function submitAndNext(Request $request, $id)
    {
        $currentQuiz = Session::get('currentQuiz');


        $mcqData = MCQ::where([
            ['id', '>', $id],
            ['quiz_id', '=', $currentQuiz['quizId']]
        ])->first();

        $isExist = MCQ_Record::where([
            ['record_id', '=', $currentQuiz['recordId']],
            ['mcq_id', '=', $request->id],
        ])->count();
        if ($isExist < 1) {
            $currentQuiz['currentMcq'] += 1;
            $mcq_record = new MCQ_Record();
            $mcq_record->record_id = $currentQuiz['recordId'];
            $mcq_record->user_id = Session::get('user')['id'];
            $mcq_record->mcq_id = $request->id;
            $mcq_record->select_answer = $request->option;
            if ($request->option == MCQ::find($request->id)['correct_ans']) {
                $mcq_record->is_correct = 1;
            } else {
                $mcq_record->is_correct = 0;
            }
            $mcq_record->save();
            if (!$mcq_record->save()) {
                return "something went wrong";
            }
        }



        Session::put('currentQuiz', $currentQuiz);

        if ($mcqData) {
            return view('mcq-page', [
                'quizName' => $currentQuiz['quizName'],
                "mcqData" => $mcqData
            ]);
        } else {
            $resultData = MCQ_Record::WithMCQ()->where('record_id', $currentQuiz['recordId'])->get();
             $correctAnswer = MCQ_Record::where([
                ['record_id', '=', $currentQuiz['recordId']],
                ['is_correct', '=', 1],
            ])->count();
            
            $record = Record::find($currentQuiz['recordId']);
            if($record){
                $record->status = 2; 
                $record->update();
            }
            return view('quiz-result', ['resultData' => $resultData, 'correctAnswer' => $correctAnswer]);
        }

    }

    function userDetails(){
        $quizRecord = Record::WithQuiz()->where('user_id', Session::get('user')['id'])->get();

        return view('user-details',['quizRecord' => $quizRecord]);
    }

    function searchQuiz(Request $request){
        $quizData = Quiz::withCount('mcq')->where('name', 'Like', '%'.$request->search .'%')->get();
        return view('quiz-search',['quizData' => $quizData, 'quiz' => $request->search]);
    }

    function userForgotPassword(Request $request){
        $link = Crypt::encryptString($request->email);
        $link = url('/verify-forgot-password/'.$link);
        Mail::to($request->email)->send(new UserForgetPassword($link));
        return redirect('/');
        
    }

    function userResetForgotPassword($eamil){
        $orgEmail = Crypt::decryptString($eamil);
        return view('user-set-forgot-password', ['email' => $orgEmail]);
    }

    function userSetForgotPassword(Request $request){
        
        $validate = $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:4 | confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user){
            $user->password = Hash::make($request->password);
            if($user->save()){
                return redirect('user-login');
            }
            
        }
        


    }


}
