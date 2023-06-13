<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes
Route::group(['as' => 'admin.','name'=>'admin' ,'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'verified'], 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
    // Dashboard

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, "index"])->name('dashboard');

    // Check QR Code
    if (env('APP_TYPE') == 'QRCODE' || env('APP_TYPE') == 'BOTH') {
        // Create QR Code
        Route::get('qrcodes/all', [App\Http\Controllers\Admin\QRCodeController::class, "index"])->name('all.qr');
        Route::get('qrcode/create', [App\Http\Controllers\Admin\QRCodeController::class, "CreateQr"])->name('create.qr');
        Route::post('qrcode/save', [App\Http\Controllers\Admin\QRCodeController::class, "saveQr"])->name('save.qr');
        Route::get('qrcode/edit/{id}', [App\Http\Controllers\Admin\QRCodeController::class, "editQr"])->name('edit.qr');
        Route::post('qrcode/update', [App\Http\Controllers\Admin\QRCodeController::class, "updateQr"])->name('update.qr');
        Route::post('qrcode/regenerate-qr', [App\Http\Controllers\Admin\QRCodeController::class, "regenerateQr"])->name('regenerate.qr');
        Route::get('qrcode/statistics/{id}', [App\Http\Controllers\Admin\StatisticsController::class, "qrStatistics"])->name('qr.statistics');

        // Get Type Wise QR Codes
        Route::get('/qrcode/qrcodes/{type}', [App\Http\Controllers\Admin\QRCodeController::class, "getTypeQRCode"])->name("type.qrcodes");
        // Update QR Code Status
        Route::get('qrcode/update-qr-status', [App\Http\Controllers\Admin\QRCodeController::class, "updateQrCodeStatus"])->name('update.qr.status');
        // Delete QR Code
        Route::get('qrcode/delete-qr', [App\Http\Controllers\Admin\QRCodeController::class, "deleteQrCode"])->name('delete.qr');
        // Download QR Code
        Route::get('qrcode/{id}', [App\Http\Controllers\Admin\QRCodeController::class, "downloadQrCode"])->name("download.qrcode");
    }

    // Check Barcode
    if (env('APP_TYPE') == 'BARCODE' || env('APP_TYPE') == 'BOTH') {
        // Create Barcode
        Route::get('barcodes/all', [App\Http\Controllers\Admin\BarCodeController::class, "index"])->name('all.barcode');
        Route::get('barcode/create', [App\Http\Controllers\Admin\BarCodeController::class, "CreateBarCode"])->name('create.barcode');
        Route::post('barcode/save', [App\Http\Controllers\Admin\BarCodeController::class, "saveBarCode"])->name('save.barcode');
        Route::get('barcode/edit/{id}', [App\Http\Controllers\Admin\BarCodeController::class, "editBarCode"])->name('edit.barcode');
        Route::post('barcode/update', [App\Http\Controllers\Admin\BarCodeController::class, "updateBarCode"])->name('update.barcode');
        Route::post('barcode/regenerate-barcode', [App\Http\Controllers\Admin\BarCodeController::class, "regenerateBarCode"])->name('regenerate.barcode');
        // Update Barcode Status
        Route::get('barcode/update-barcode-status', [App\Http\Controllers\Admin\BarCodeController::class, "updateBarCodeStatus"])->name('update.barcode.status');
        // Delete Barcode
        Route::get('barcode/delete-barcode', [App\Http\Controllers\Admin\BarCodeController::class, "deleteBarCode"])->name('delete.barcode');
        // Download Barcode
        Route::get('barcode/barcode/{id}', [App\Http\Controllers\Admin\BarCodeController::class, "downloadBarCode"])->name("download.barcode");
    }

    // Users
    Route::get('users', [App\Http\Controllers\Admin\UserController::class, "index"])->name('users');
    Route::get('edit-user/{id}', [App\Http\Controllers\Admin\UserController::class, "editUser"])->name('edit.user');
    Route::post('update-user', [App\Http\Controllers\Admin\UserController::class, "updateUser"])->name('update.user');
    Route::get('view-user/{id}', [App\Http\Controllers\Admin\UserController::class, "viewUser"])->name('view.user');
    Route::get('change-user-plan/{id}', [App\Http\Controllers\Admin\UserController::class, "ChangeUserPlan"])->name('change.user.plan');
    Route::post('update-user-plan', [App\Http\Controllers\Admin\UserController::class, "UpdateUserPlan"])->name('update.user.plan');
    Route::get('update-status', [App\Http\Controllers\Admin\UserController::class, "updateStatus"])->name('update.status');
    Route::get('delete-user', [App\Http\Controllers\Admin\UserController::class, "deleteUser"])->name('delete.user');
    Route::get('login-as/{id}', [App\Http\Controllers\Admin\UserController::class, "authAs"])->name('login-as.user');

    // Plans
    Route::get('plans', [App\Http\Controllers\Admin\PlanController::class, "index"])->name('index.plans');
    Route::get('add-plan', [App\Http\Controllers\Admin\PlanController::class, "addPlan"])->name('add.plan');
    Route::post('save-plan', [App\Http\Controllers\Admin\PlanController::class, "savePlan"])->name('save.plan');
    Route::get('edit-plan/{id}', [App\Http\Controllers\Admin\PlanController::class, "editPlan"])->name('edit.plan');
    Route::post('update-plan', [App\Http\Controllers\Admin\PlanController::class, "updatePlan"])->name('update.plan');
    Route::get('delete-plan', [App\Http\Controllers\Admin\PlanController::class, "deletePlan"])->name('delete.plan');

    // Payment Gateways
    Route::get('payment-methods', [App\Http\Controllers\Admin\PaymentMethodController::class, "index"])->name('payment.methods');
    Route::get('add-payment-method', [App\Http\Controllers\Admin\PaymentMethodController::class, "addPaymentMethod"])->name('add.payment.method');
    Route::post('save-payment-method', [App\Http\Controllers\Admin\PaymentMethodController::class, "savePaymentMethod"])->name('save.payment.method');
    Route::get('edit-payment-method/{id}', [App\Http\Controllers\Admin\PaymentMethodController::class, "editPaymentMethod"])->name('edit.payment.method');
    Route::post('update-payment-method', [App\Http\Controllers\Admin\PaymentMethodController::class, "updatePaymentMethod"])->name('update.payment.method');
    Route::get('delete-payment-method', [App\Http\Controllers\Admin\PaymentMethodController::class, "deletePaymentMethod"])->name('delete.payment.method');

    // Transactions
    Route::get('transactions', [App\Http\Controllers\Admin\TransactionController::class, "index"])->name('transactions');
    Route::get('transaction-status/{id}/{status}', [App\Http\Controllers\Admin\TransactionController::class, "transactionStatus"])->name('trans.status');
    Route::get('offline-transactions', [App\Http\Controllers\Admin\TransactionController::class, "offlineTransactions"])->name('offline.transactions');
    Route::get('offline-transaction-status/{id}/{status}', [App\Http\Controllers\Admin\TransactionController::class, "offlineTransactionStatus"])->name('offline.trans.status');
    Route::get('view-invoice/{id}', [App\Http\Controllers\Admin\TransactionController::class, "viewInvoice"])->name('view.invoice');

    // Account Setting
    Route::get('account', [App\Http\Controllers\Admin\AccountController::class, "index"])->name('index.account');
    Route::get('edit-account', [App\Http\Controllers\Admin\AccountController::class, "editAccount"])->name('edit.account');
    Route::post('update-account', [App\Http\Controllers\Admin\AccountController::class, "updateAccount"])->name('update.account');
    Route::get('change-password', [App\Http\Controllers\Admin\AccountController::class, "changePassword"])->name('change.password');
    Route::post('update-password', [App\Http\Controllers\Admin\AccountController::class, "UpdatePassword"])->name('update.password');

    // Change theme
    Route::get('theme/{id}', [App\Http\Controllers\Admin\AccountController::class, "changeTheme"])->name('change.theme');

    // Pages
    Route::get('pages', [App\Http\Controllers\Admin\PageController::class, "index"])->name('pages');
    Route::get('add-page', [App\Http\Controllers\Admin\PageController::class, "addPage"])->name('add.page');
    Route::post('save-page', [App\Http\Controllers\Admin\PageController::class, "savePage"])->name('save.page');
    Route::get('custom-page/{id}', [App\Http\Controllers\Admin\PageController::class, "editCustomPage"])->name('edit.custom.page');
    Route::post('custom-update-page', [App\Http\Controllers\Admin\PageController::class, "updateCustomPage"])->name('update.custom.page');
    Route::get('status-page', [App\Http\Controllers\Admin\PageController::class, "statusPage"])->name('status.page');
    Route::get('page/{id}', [App\Http\Controllers\Admin\PageController::class, "editPage"])->name('edit.page');
    Route::post('update-page/{id}', [App\Http\Controllers\Admin\PageController::class, "updatePage"])->name('update.page');
    Route::get('delete-page', [App\Http\Controllers\Admin\PageController::class, "deletePage"])->name('delete.page');

    // Setting
    Route::get('settings/general-settings', [App\Http\Controllers\Admin\SettingController::class, "index"])->name('settings.general_settings');
    Route::get('settings/website-configuration-settings', [App\Http\Controllers\Admin\SettingController::class, "websiteConfigurationForm"])->name('settings.website_config_settings');
    Route::get('settings/website-qr-generator-configuration-settings', [App\Http\Controllers\Admin\SettingController::class, "websiteQrGeneratorConfigSetting"])->name('settings.website_qr_config_settings');
    
    Route::post('change-general-settings', [App\Http\Controllers\Admin\SettingController::class, "changeGeneralSettings"])->name('change.general.settings');
    Route::post('change-website-settings', [App\Http\Controllers\Admin\SettingController::class, "changeWebsiteSettings"])->name('change.website.settings');
    Route::post('change-website-qr-generator-settings', [App\Http\Controllers\Admin\SettingController::class, "changeWebsiteQrGeneratorSettings"])->name('change.website.qr.generator.settings');
    Route::post('change-payments-settings', [App\Http\Controllers\Admin\SettingController::class, "changePaymentsSettings"])->name('change.payments.settings');
    Route::post('change-google-settings', [App\Http\Controllers\Admin\SettingController::class, "changeGoogleSettings"])->name('change.google.settings');
    Route::post('change-email-settings', [App\Http\Controllers\Admin\SettingController::class, "changeEmailSettings"])->name('change.email.settings');

    Route::get('tax-setting', [App\Http\Controllers\Admin\SettingController::class, "taxSetting"])->name('tax.setting');
    Route::post('update-tex-setting', [App\Http\Controllers\Admin\SettingController::class, "updateTaxSetting"])->name('update.tax.setting');
    Route::post('update-email-setting', [App\Http\Controllers\Admin\SettingController::class, "updateEmailSetting"])->name('update.email.setting');
    Route::get('test-email', [App\Http\Controllers\Admin\SettingController::class, "testEmail"])->name('test.email');

    // License
    Route::get('license', [App\Http\Controllers\Admin\LicenseController::class, "license"])->name('license');
    Route::post('verify-license', [App\Http\Controllers\Admin\LicenseController::class, "verifyLicense"])->name('verify.license');

    // Log Authentication
    Route::get('logs', [App\Http\Controllers\Admin\AuthenticationLogController::class, "index"])->name('logs');

    // Clear cache
    Route::get('clear', [App\Http\Controllers\Admin\SettingController::class, "clear"])->name('clear');
    // Check update
    Route::get('check', [App\Http\Controllers\Admin\UpdateController::class, 'check'])->name('check');
    Route::post('check-update', [App\Http\Controllers\Admin\UpdateController::class, 'checkUpdate'])->name('check.update');
    Route::post('update-code', [App\Http\Controllers\Admin\UpdateController::class, 'updateCode'])->name('update.code');
});

require __DIR__ . '/auth.php';
