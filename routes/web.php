<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authconrtoller;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\adminmiddleware;
use App\Http\Middleware\usermiddleware;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FormBuilderController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return redirect('/');
}); 

Route::get('/register',[Authconrtoller::class,'register']);
Route::post('/register',[Authconrtoller::class,'userregister'])->name('user_register');

Route::get('/',[Authconrtoller::class,'login']);
Route::post('/login',[Authconrtoller::class,'userlogin'])->name('userlogin');

Route::get('/dashboard',[Authconrtoller::class,'dashboard']);
Route::get('/admin/dashboard',[Authconrtoller::class,'admindashboard']);

Route::post('/addSubject',[Admincontroller::class,'addSubject'])->name('addSubject');


Route::get('/admin/exam',[Admincontroller::class,'examdashboard']);
Route::post('/addExam',[Admincontroller::class,'addexam'])->name('addexam');

Route::get('/getquestion',[Admincontroller::class,'getQuestion'])->name('getQuestion');
Route::post('/addqna',[Admincontroller::class,'added'])->name('added');

Route::get('/see-exam-questions',[Admincontroller::class,'getExamsQuestions'])->name('getExamsQuestions');
Route::get('/delete-exam-questions',[Admincontroller::class,'deleteExamQuestions'])->name('deleteExamQuestions');



Route::get('/admin/Students',[Admincontroller::class,'studentdashboard']);
Route::post('/addStudents',[Admincontroller::class,'addStudent'])->name('addStudent');


Route::get('/admin/quiz',[Admincontroller::class,'quizdashboard']);
Route::post('/addquiz',[Admincontroller::class,'addquiz'])->name('addquiz');




Route::post('/addevent',[Admincontroller::class,'addevent'])->name('addevent');







Route::get('/admin/calender',[Admincontroller::class,'calenderdashboard']);




//student exam page 


Route::get('/exam/{id}',[ExamController::class,'loadExamDashboard']);
Route::post('/examsubmit',[ExamController::class,'examSubmit'])->name('examSubmit');


Route::get('/thankyou',[ExamController::class,'thankyou'])->name('thankyou');




Route::get('/survey', [FormBuilderController::class, 'index'])->name('form-builder.index');
Route::post('/survey', [FormBuilderController::class, 'store'])->name('form-builder.store');
Route::get('/survey/{form}', [FormBuilderController::class, 'show'])->name('form-builder.show');

Route::post('/survey/submit/{id}', [FormBuilderController::class, 'submitForm'])->name('form-builder.submit');
Route::get('/survey/{id}/submissions', [FormBuilderController::class, 'showSubmissions'])->name('form-builder.submissions');

Route::get('/logout',[Authconrtoller::class,'logout']);