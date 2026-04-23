<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\MCQ;
use App\Models\User;
use App\Models\Record;
use App\Models\MCQ_Record;

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
        $currentQuiz['currentMcq'] += 1;

        $mcqData = MCQ::where([
            ['id', '>', $id],
            ['quiz_id', '=', $currentQuiz['quizId']]
        ])->first();

        $mcq_record = new MCQ_Record();
        $mcq_record->record_id = $currentQuiz['recordId'];
        $mcq_record->user_id = Session::get('user')['id'];
        $mcq_record->mcq_id = $request->id;
        $mcq_record->select_answer = $request->option; 
        if($request->option == MCQ::find($request->id)['correct_ans']){
            $mcq_record->is_correct = 1; 
        }else{
            $mcq_record->is_correct = 0; 
        }
        $mcq_record->save();
        if(!$mcq_record->save()){
            return "something went wrong";
        }


        Session::put('currentQuiz', $currentQuiz);

        if ($mcqData) {
            return view('mcq-page', [
                'quizName' => $currentQuiz['quizName'],
                "mcqData" => $mcqData
            ]);
        } else {
            return "result Page";
        }

    }
}
