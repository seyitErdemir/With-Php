<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Guard $auth)
    {
        $lessons = Lesson::where('teacher_id' , Auth::user()->id)->get();
        if ($auth->user()->type == 0) {
            return view('student', compact('lessons'));
        } else {

            return view('teacher', compact('lessons'));
        }
    }
}
