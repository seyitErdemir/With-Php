<?php

use App\Http\Controllers\HomeController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Models\Lesson;
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
        'lesson_name' => $request->ders
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

Route::get('/ders-birak/{id}', function ($id) {
    $lessons = Lesson::where('id', $id)->first();
    $taking_student  =  explode(",", $lessons->taking_student);
    $kayıtVerisi = "";
    foreach ($taking_student as $tak) {
        if ($tak == Illuminate\Support\Facades\Auth::user()->id) {
        } else {
            $kayıtVerisi = $kayıtVerisi . $tak . ",";
        }
    }

    $lessons->taking_student =  $kayıtVerisi;
    $lessons->save();
    return redirect('/')->with('danger', 'Ders Bırakıldı');
});



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
