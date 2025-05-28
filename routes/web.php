<?php

use App\Livewire\SphList;
use App\Livewire\SpkList;
use App\Livewire\BastList;
use App\Livewire\Sp2dList;
use App\Livewire\UserList;
use App\Livewire\Dashboard;
use App\Livewire\SphCreate;
use App\Livewire\SpkCreate;
use App\Livewire\BastCreate;
use App\Livewire\KakRabList;
use App\Livewire\Sp2dCreate;
use App\Livewire\UserCreate;
use Illuminate\Http\Request;
use App\Livewire\InvoiceList;
use App\Livewire\ProjectList;
use App\Livewire\KakRabCreate;
use App\Livewire\InvoiceCreate;
use App\Livewire\ProjectListEdit;
use App\Livewire\Settings\Profile;
use App\Livewire\ProjectListCreate;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use App\Livewire\UserEdit;
use App\Livewire\UserReset;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::get('project-list', ProjectList::class)->name('project-list');
    Route::get('project-list/create', ProjectListCreate::class)->name('project-list.create');
    Route::get('project-list/{project}/edit', ProjectListEdit::class)->name('project-list.update');
    Route::get('create-sph/{project}', SphCreate::class)->name('create-sph');
    Route::get('create-spk/{project}', SpkCreate::class)->name('create-spk');
    Route::get('create-kak-rab/{project}', KakRabCreate::class)->name('create-kak-rab');
    Route::get('create-invoice/{project}', InvoiceCreate::class)->name('create-invoice');
    Route::get('create-bast/{project}', BastCreate::class)->name('create-bast');
    Route::get('create-sp2d/{project}', Sp2dCreate::class)->name('create-sp2d');

    Route::get('sph-list', SphList::class)->name('sph-list');

    Route::get('spk-list', SpkList::class)->name('spk-list');

    Route::get('kak-rab-list', KakRabList::class)->name('kak-rab-list');

    Route::get('invoice-list', InvoiceList::class)->name('invoice-list');

    Route::get('bast-list', BastList::class)->name('bast-list');

    Route::get('sp2d-list', Sp2dList::class)->name('sp2d-list');

    Route::get('user-list', UserList::class)->name('user-list');
    Route::get('user-create', UserCreate::class)->name('user.create');
    Route::get('user-edit/{user}', UserEdit::class)->name('user.edit');
    Route::get('user-reset/{user}', UserReset::class)->name('user.reset');

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('/download', function (Request $request) {
        $path = $request->input('path');
        // CHECK FILE EXISTS
        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'File not found');
        }

        $fullPath = Storage::disk('public')->path($path);
        return response()->download($fullPath);
    })->name('download');
});

require __DIR__ . '/auth.php';
