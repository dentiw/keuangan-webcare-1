<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');  
});

Route::get('/dashboard', function () {
    return view('dashboard');  
})->name('dashboard');

Route::get('/video-tutorial', function () {
    return view('video_tutorial');  
})->name('video_tutorial');

Route::get('/user', function () {
    return view('user');  
})->name('user');

Route::get('/financial-statements', function () {
    return view('financial_statements');  
})->name('financial_statements');

Route::get('/total-projects', function () {
    return view('total_projects');  
})->name('total-projects');

Route::get('/income', function () {
    return view('income');  
})->name('income');

Route::get('/expense', function () {
    return view('expense');  
})->name('expense');

Route::resource('total-project', ProjectsController::class);
Route::resource('income', IncomeController::class);
Route::resource('expenses', ExpenseController::class);

Route::get('/income', [IncomeController::class, 'index'])->name('income.index');
Route::get('/income/create', [IncomeController::class, 'create'])->name('income.create');
Route::post('/income', [IncomeController::class, 'store'])->name('income.store');
Route::get('/income/{id_income}/edit', [IncomeController::class, 'edit'])->name('income.edit');
Route::delete('/income/{id_income}', [IncomeController::class, 'destroy'])->name('income.destroy');

Route::get('/expense', [ExpenseController::class, 'index'])->name('expense.index');
Route::get('/expense/create', [ExpenseController::class, 'create'])->name('expense.create');
Route::post('/expense', [ExpenseController::class, 'store'])->name('expense.store');
Route::get('/expense/{id_expense}/edit', [ExpenseController::class, 'edit'])->name('expense.edit');
Route::delete('/expense/{id_expense}', [ExpenseController::class, 'destroy'])->name('expense.destroy');





