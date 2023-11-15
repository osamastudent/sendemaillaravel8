<?php
use App\Mail\OrderShipped;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\NotificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('verified');


Route::get('register',[UserController::class,'Register'])->name('Register');
Route::post('register',[UserController::class,'RegisterStore'])->name('RegisterStore');


Route::get('login',[UserController::class,'Login'])->name('Login');
Route::post('login',[UserController::class,'LoginStore'])->name('LoginStore');


Route::get('/email/verify', function () {
    return view('myusers.verify-email');
})->middleware('auth')->name('verification.notice');



Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
     return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');







// forgot password

Route::get('/forgot-password', function () {
    return view('myusers.forgot-password');
})->name('password.request');




 
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->name('password.email');






Route::get('/reset-password/{token}', function ($token) {
    return view('myusers.reset-password', ['token' => $token]);
})->name('password.reset');



Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('Login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');





Route::get('sendemail', [MailController::class,'sendEmail']);  

Route::post('sendemail', [MailController::class,'sendEmailToUser'])->name('sendEmailToUser');  


Route::get('/shipped', function () {
    return view('orders.shipped');
});


// send Notification

Route::get('sendnotification',[NotificationController::class,'Notification'])->name('Notification');
Route::post('sendnotification',[NotificationController::class,'SendNotification'])->name('SendNotification');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
