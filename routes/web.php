<?php

use App\Http\Livewire\Admin\Admins\AddAdmin;
use App\Http\Livewire\Admin\Admins\ManageAdmin;
use App\Http\Livewire\Admin\Admins\UpdateAdmin;
use App\Http\Livewire\Admin\Auth\Login;
use App\Http\Livewire\Admin\Dashboard\Dashboard;
use App\Http\Livewire\Admin\Departments\AddDepartment;
use App\Http\Livewire\Admin\Departments\ManageDepartments;
use App\Http\Livewire\Admin\Departments\UpdateDepartment;
use App\Http\Livewire\Admin\Staff\AddStaff;
use App\Http\Livewire\Admin\Staff\ManageStaff;
use App\Http\Livewire\Admin\Staff\UpdateStaff;
//use App\Http\Livewire\Department\Staff\AddStaff as DepartmentAddStaff;
//use App\Http\Livewire\Department\Staff\ManageStaff as DepartmentManageStaff;
//use App\Http\Livewire\Department\Staff\UpdateStaff as DepartmentUpdateStaff;
use App\Http\Livewire\Department\Auth\Login as AuthLogin;
use App\Http\Livewire\Department\Chat\CreateChat as ChatCreateChat;
use App\Http\Livewire\Department\Chat\Main as ChatMain;
use App\Http\Livewire\Department\Dashboard\Dashboard as DepartmentDashboard;
use App\Http\Livewire\Department\Mails\AllMail;
use App\Http\Livewire\Department\Mails\ComposeMail;
use App\Http\Livewire\Department\Mails\DeclinedMail;
use App\Http\Livewire\Department\Mails\EditMail;
use App\Http\Livewire\Department\Mails\InboxMail;
use App\Http\Livewire\Department\Mails\ReadMail;
use App\Http\Livewire\Department\Mails\RejectMail;
use App\Http\Livewire\Department\Mails\SentMail;
use App\Http\Livewire\Frontend\Auth\Login as FrontendAuthLogin;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Staff\Auth\Login as StaffAuthLogin;
use App\Http\Livewire\Staff\Chat\CreateChat;
use App\Http\Livewire\Staff\Chat\Main;
use App\Http\Livewire\Staff\Dashboard\Dashboard as StaffDashboard;
use App\Http\Livewire\Staff\Mails\AllMail as MailsAllMail;
use App\Http\Livewire\Staff\Mails\ComposeMail as MailsComposeMail;
use App\Http\Livewire\Staff\Mails\DeclinedMail as MailsDeclinedMail;
use App\Http\Livewire\Staff\Mails\EditMail as MailsEditMail;
use App\Http\Livewire\Staff\Mails\InboxMail as MailsInboxMail;
use App\Http\Livewire\Staff\Mails\ReadMail as MailsReadMail;
use App\Http\Livewire\Staff\Mails\RejectMail as MailsRejectMail;
use App\Http\Livewire\Staff\Mails\SentMail as MailsSentMail;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Login::class)->name('home');

//Admin
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['auth:web', 'isAdmin'])->group(function () {


        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        Route::get('/admins/add-admin', AddAdmin::class)->name('add-admin');

        Route::get('/admins', ManageAdmin::class)->name('admins');

        Route::get('/admins/{admin}/edit', UpdateAdmin::class)->name('admin.edit');

        Route::get('/staff/add-staff', AddStaff::class)->name('add-staff');

        Route::get('/staff', ManageStaff::class)->name('staff');

        Route::get('/staff/{user}/edit', UpdateStaff::class)->name('staff.edit');

        Route::get('/department/add-department', AddDepartment::class)->name('add-department');

        Route::get('/departments', ManageDepartments::class)->name('departments');

        Route::get('/departments/{department}/edit', UpdateDepartment::class)->name('department.edit');
    });
});

//Departments
Route::prefix('department')->name('department.')->group(function () {

    Route::middleware(['auth:web', 'isDep'])->group(function () {

        Route::get('/dashboard', DepartmentDashboard::class)->name('dashboard');

        Route::get('/mail/inbox', InboxMail::class)->name('mail-inbox');

        Route::get('/mail/all', AllMail::class)->name('mail-all');

        Route::get('/mail/sent', SentMail::class)->name('mail-sent');

        Route::get('/mail/compose-mail', ComposeMail::class)->name('compose-mail');

        Route::get('/mail/{mail}/reject-mail', RejectMail::class)->name('reject-mail');

        Route::get('/mail/declined-mail', DeclinedMail::class)->name('declined-mail');

        Route::get('/mail/{mail}/read', ReadMail::class)->name('mail-read');

        Route::get('/mail/{mail}/edit', EditMail::class)->name('mail-edit');

        Route::get('/chat/messages', ChatMain::class)->name('chat');

        Route::get('/chat/add-chat', ChatCreateChat::class)->name('add-conversation');

        Route::get('/staff/add-staff', AddStaff::class)->name('add-staff');

        Route::get('/staff', ManageStaff::class)->name('staff');

        Route::get('/staff/{user}/edit', UpdateStaff::class)->name('staff.edit');
    });
});

//Staff
Route::prefix('staff')->name('staff.')->group(function () {


    Route::middleware(['auth:web', 'isStaff'])->group(function () {

        Route::get('/dashboard', StaffDashboard::class)->name('dashboard');

        Route::get('/chat', Main::class)->name('chat');

        Route::get('/add-conversation', CreateChat::class)->name('add-conversation');

        Route::get('/mail/inbox', MailsInboxMail::class)->name('mail-inbox');

        Route::get('/mail/all', MailsAllMail::class)->name('mail-all');

        Route::get('/mail/sent', MailsSentMail::class)->name('mail-sent');

        Route::get('/mail/compose-mail', MailsComposeMail::class)->name('compose-mail');

        Route::get('/mail/{mail}/reject-mail', MailsRejectMail::class)->name('reject-mail');

        Route::get('/mail/declined-mail', MailsDeclinedMail::class)->name('declined-mail');

        Route::get('/mail/{mail}/read', MailsReadMail::class)->name('mail-read');

        Route::get('/mail/{mail}/edit', MailsEditMail::class)->name('mail-edit');
    });
});
