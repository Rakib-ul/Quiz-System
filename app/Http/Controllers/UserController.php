<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Category;
use App\Models\Quiz;
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

        $quizData = Quiz::where('category_id', $id)->get();
        //return $quizData;

        return view('user-quiz-list', ["quizData" => $quizData, "category" => $category]);

    }

    function userSignup(Request $request){

        $validate = $request->validate([
            'name' => 'required | min:3',
            'email' => 'required | email',
            'password' => 'required | min:4 | confirmed',
        ]);
        return $request;

    }
}
