<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('recap/ig', function() {
    $students = Student::where('filiere', 'IG')->get();
    return view('pages.etu', ['students'=>$students]);
})->name('ig');


Route::get('recap/gba', function() {
    $students = Student::where('filiere', 'GBA')->get();
    return view('pages.etu', ['students'=>$students]);
})->name('gba');


Route::get('recap/gtl', function() {
    $students = Student::where('filiere', 'GTL')->get();
    return view('pages.etu', ['students'=>$students]);
})->name('gtl');


Route::get('recap/descogef', function() {
    $students = Student::where('filiere', 'DESCOGEF')->get();
    return view('pages.etu', ['students'=>$students]);
})->name('descogef');


Route::get('recap/gfc', function() {
    $students = Student::where('filiere', 'GFC')->get();
    return view('pages.etu', ['students'=>$students]);
})->name('gfc');


Route::get('recap/stat', function() {
    $students = Student::where('filiere', 'STAT')->get();
    return view('pages.etu', ['students'=>$students]);
})->name('stat');







Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::controller(StudentController::class)->group(function(){
    Route::get('/formulaire', 'create')->name('formulaire');
    //Route::get('/formulaireMailValidation', 'validationMail')->name('validationMail');
    Route::post('/formulairevalidation', 'store')->name('store_etudiant');
    Route::post('/formulairemodification/{id}', 'update')->name('edit_etudiant');
    Route::get('/recap', 'index')->name('recap');

    Route::get('/edit/{id}', 'edit')->name('editstudent');
    Route::get('/show/{id}', 'show')->name('showstudent');
    Route::get('/delete/{id}', 'destroy')->name('delstudent');

});

// Route::post('/formulaireAjout', function () {
//     return view('pages.one');
// })->name('formvalidation');
