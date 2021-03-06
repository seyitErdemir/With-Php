<?php

use App\Http\Controllers\HomeController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Models\Lesson;
use App\Models\Point;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index']);

Route::get('/ders-ekle', function () {
    return view('ders-ekle');
});
Route::post('/ders-ekle', function (Request $request) {
    $lessons = Lesson::get()->where('lesson_name', $request->ders)->first();
    if ($lessons) {
        return  redirect('/ders-ekle')->with('danger', 'Bu isimde ders  var');
    }


    DB::table('lessons')->insert([
        'lesson_name' => $request->ders,
        'teacher_id' => Auth::user()->id
    ]);
    return  redirect('/')->with('success', 'Ders ekleme işlemi başarılı');
});

Route::get('/ders-sil/{id}', function ($id) {

    $lessons = Lesson::where('id', $id)->get()->first();
    $lessons->delete();
    return redirect('/')->with('danger', 'Ders silindi');;
});

Route::get('/ders-al/{id}', function ($id) {

    $lessons = Lesson::where('id', $id)->first();

    if (!(Point::where(['lesson_id' => $id,  'student_id' => Auth::user()->id])->first())) {
        Point::insert(['lesson_id' => $id,  'student_id' => Auth::user()->id]);
    }


    $taking_student  =  explode(",", $lessons->taking_student);
    foreach ($taking_student as $tak) {
        if ($tak == Illuminate\Support\Facades\Auth::user()->id) {

            return redirect('/')->with('secondary', 'Bu dersi zaten aldınız.');
        }
    }
    if (isset($lessons->taking_student)) {
        $lessons->taking_student = $lessons->taking_student . "," . Auth::user()->id;
    } else {
        $lessons->taking_student = Auth::user()->id;
    }
    $lessons->save();
    return redirect('/')->with('success', 'Ders Alındı');
});

Route::get('/dersi-birak/{id}', function ($id) {

    if (Point::where(['lesson_id' => $id,  'student_id' => Auth::user()->id])->first()) {
        $point = Point::where(['lesson_id' => $id,  'student_id' => Auth::user()->id])->first()->delete();
    }
    $lessons = Lesson::where('id', $id)->first();
    $taking_student  =  explode(",", $lessons->taking_student);
    $kayıtVerisi = "";
    foreach ($taking_student as $tak) {
        if ($tak != Illuminate\Support\Facades\Auth::user()->id) {
            $kayıtVerisi = $kayıtVerisi . $tak . ",";
        }
    }
    $lessons->taking_student =  $kayıtVerisi;
    $lessons->save();
    return redirect('/')->with('danger', 'Ders Bırakıldı');
});


Route::get('/ders-goruntule/{id}', function ($id) {
    $points = DB::table('points')
        ->join('lessons', 'points.lesson_id', '=', 'lessons.id')
        ->join('users', 'points.student_id', '=', 'users.id')
        ->where('lesson_id', $id)
        ->get();



    return view('points', compact('points'));
});

Route::get('/ders-birak/{id}', function ($id) {
    return redirect('/')->with('danger', 'Ders Bırakıldı');
});

Route::post('/not-guncelle/{student_id}/{lesson_id}', function ($student_id, $lesson_id, Request $request) {


    Point::where(['student_id' => $student_id, 'lesson_id' => $lesson_id])->update(['vize' => $request->vize, 'final' => $request->final]);

    return redirect()->back()->with('success', 'Güncelleme işlemi başarılı');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
