<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\Admin\ExecutiveMemberController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificateVerificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\PageController;
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
// Guest login routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Executive/Admin dashboard
Route::middleware(['auth', 'role:executive'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'executiveDashboard'])->name('executive.dashboard');
});

// Intern dashboard
Route::middleware(['auth', 'role:intern'])->group(function () {
    Route::get('/intern/dashboard', [DashboardController::class, 'internDashboard'])->name('intern.dashboard');
});
Route::get('/', function () {
    return redirect('/home');
});
// Route::redirect('/', '/admin/dashboard');
Route::prefix('admin')->middleware(['auth', 'role:executive'])->group(function () {

    // Dashboard / Todo Routes
    Route::prefix('dashboard')->group(function () {

        Route::post('/', [TodoController::class, 'store'])->name('todo.store');
        Route::get('/{id}', [TodoController::class, 'edit'])->name('todo.edit');
        Route::put('/{id}', [TodoController::class, 'update'])->name('todo.update');
        Route::delete('/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
    });

    // Blog Routes
    Route::prefix('blog')->group(function () {
        Route::get('/list', [BlogController::class, 'index'])->name('blog.list');
        Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/show/{id}', [BlogController::class, 'show'])->name('blog.show');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::put('/update/{id}', [BlogController::class, 'update'])->name('blog.update');
        Route::delete('/delete/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    });

    // Settings Routes
    Route::prefix('settings')->group(function () {
        Route::get('/basic', [SettingsController::class, 'basic'])->name('settings.basic');
        Route::post('/basic', [SettingsController::class, 'store'])->name('settings.store');
        Route::get('/banner', [SettingsController::class, 'banner'])->name('settings.banner');
        Route::post('/banner', [SettingsController::class, 'heroImageStore'])->name('settings.imageStore');
        Route::delete('/banner/{id}', [SettingsController::class, 'heroImageDestroy'])->name('settings.destroy');
        Route::post('/contact/store', [SettingsController::class, 'contactStore'])->name('settings.contactStore');
        Route::get('/contact/show', [SettingsController::class, 'contactShow'])->name('settings.contactShow');
        Route::delete('/contacts/{id}', [SettingsController::class, 'contactDestroy'])->name('settings.contactDestroy');
    });
    Route::prefix('about')->group(function () {
        Route::get('/edit', [AboutPageController::class, 'edit'])->name('about.edit');
        Route::put('/update', [AboutPageController::class, 'update'])->name('about.update');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('departments', DepartmentController::class);
        Route::resource('interns', InternController::class);
        Route::get('interns/{intern}/certificate', [InternController::class, 'certificate'])
            ->name('interns.certificate');
        Route::get('interns/{intern}/certificate/download', [InternController::class, 'downloadCertificate'])
            ->name('interns.certificate.download');
        Route::get('interns/{intern}/cv/download', [InternController::class, 'downloadCV'])
            ->name('interns.cv.download');
        Route::resource('certificates', CertificateController::class);
        Route::resource('executive_members', ExecutiveMemberController::class);
    });

    Route::prefix('admin')->name('admin.')->group(function () {
       Route::resource('directors', DirectorController::class);
    });

});


Route::prefix('/')->group(function () {
    Route::post('certificate-verification', [CertificateVerificationController::class, 'verifyCertificate'])
    ->name('certificate.verification.verify');
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/services', [PageController::class, 'services'])->name('services');
    Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
    Route::get('/academy', [PageController::class, 'academy'])->name('academy');
    Route::get('/articles', [PageController::class, 'articles'])->name('articles');
    Route::get('/articles/view', [PageController::class, 'articles_view'])->name('articles.view');
    Route::get('/career', [PageController::class, 'career'])->name('career');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::get('/internship', [PageController::class, 'internshipForm'])->name('internship.form');
});
