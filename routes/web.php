<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\MasterData\BusinessTypeController;
use App\Http\Controllers\MasterData\ParametersController;
use App\Http\Controllers\MasterData\ProductsController;
use App\Http\Controllers\Sales\CustomerOrderDetailsController;
use App\Http\Controllers\Sales\CustomerOrdersController;
use App\Http\Controllers\Sales\CustomersController;
use App\Http\Controllers\Sales\QuotationController;
use App\Http\Controllers\UserCompanyController;
use App\Http\Controllers\UserManagement\PermissionsController;
use App\Http\Controllers\UserManagement\RolesController;
use App\Http\Controllers\UserManagement\UsersController;
use App\Http\Livewire\CheckoutComponents;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Pages\MasterData\BusinessTypeComponents;
use App\Http\Livewire\Pages\MasterData\ParameterComponents;
use App\Http\Livewire\Pages\MasterData\ProductComponents;
use App\Http\Livewire\Pages\Sales\CustomerOrders\AddCustomerOrderComponents;
use App\Http\Livewire\Pages\Sales\CustomerOrders\CustomerOrderComponents;
use App\Http\Livewire\Pages\Sales\CustomerOrders\EditCustomerOrderComponents;
use App\Http\Livewire\Pages\Sales\Customers\AddCustomerComponents;
use App\Http\Livewire\Pages\Sales\Customers\CustomerComponents;
use App\Http\Livewire\Pages\Sales\Customers\DetailsCustomerComponents;
use App\Http\Livewire\Pages\Sales\Customers\EditCustomerComponents;
use App\Http\Livewire\Pages\Sales\Orders\AddQuotationComponents;
use App\Http\Livewire\Pages\Sales\Orders\DetailQuotationComponents;
use App\Http\Livewire\Pages\Sales\Orders\EditQuotationComponents;
use App\Http\Livewire\Pages\Sales\Orders\QuotationComponents;
use App\Http\Livewire\Pages\UserCompany\UserCompanyComponents;
use App\Http\Livewire\Pages\UserManagement\PermissionsComponents;
use App\Http\Livewire\Pages\UserManagement\RolesComponents;
use App\Http\Livewire\Pages\UserManagement\UsersComponents;
use App\Http\Livewire\Pages\Warehouse\FinishGoodsComponents;
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
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create']);
});

Route::prefix('quotations')->group(function () {
    Route::get('/{code}', [QuotationController::class, 'checkout'])->name('checkout');
    Route::get('/success/{code}', [QuotationController::class, 'successPayment'])->name('success');
    Route::get('/fail', [QuotationController::class, 'failPayment'])->name('fail');
});


Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    //! Customers
    Route::prefix('customers')->group(function () {
        //! Customers List
        Route::prefix('customer-list')->group(function () {
            Route::get('/', CustomerComponents::class)->name('customer.index');
            Route::get('/create', AddCustomerComponents::class)->name('customer.create');
            Route::get('/edit/{code}', EditCustomerComponents::class)->name('customer.edit');
            Route::resource('/customer-data', CustomersController::class);
            Route::post('/update/{code}', [CustomersController::class, 'update'])->name('customer.update');
            Route::get('/details/{code}', DetailsCustomerComponents::class)->name('customer.detail');
            Route::get('/details-table/{id}', [CustomersController::class, 'customerOrderData'])->name('customer.detail-table');
            Route::get('/details/statistic/{id}', [CustomersController::class, 'getStatisticCustomer'])->name('customer.get-statistic');
            Route::get('/details/statistic/product/{id}', [CustomersController::class, 'getStatisticCustomerProduct'])->name('customer.getStatisticCustomerProduct');
            Route::post('/import', [CustomersController::class, 'import'])->name('customer.import');
            Route::post('/import-address', [CustomersController::class, 'importAddress'])->name('customerAddress.import');
        
        });

        Route::prefix('quotation')->group(function () {
            Route::get('/', QuotationComponents::class)->name('quotation.index');
            Route::get('/create', AddQuotationComponents::class)->middleware(['can:Quotation.create'])->name('quotation.create');
            Route::get('/edit/{code}', EditQuotationComponents::class)->middleware(['can:Quotation.edit'])->name('quotation.edit');
            Route::get('/detail/{code}', DetailQuotationComponents::class)->name('quotation.detail');
            Route::resource('/quotation-data', QuotationController::class);
        });
    });
    // User Management
    Route::prefix('users-management')->middleware(['can:UserManagement.view'])->group(function () {
        //* Users
        Route::prefix('users')->group(function () {
            Route::get('/', UsersComponents::class)->name('users.index');
            Route::get('/user-data', [UsersController::class, 'index'])->name('user-data.index');
            Route::get('/user-data/show/{id}', [UsersController::class, 'show'])->name('user-data.show');
            Route::post('/user-data/store', [UsersController::class, 'store'])->name('user-data.store');
            Route::post('/user-data/update/{id}', [UsersController::class, 'update'])->name('user-data.update');
            Route::delete('/user-data/destroy/{id}', [UsersController::class, 'destroy'])->name('user-data.destroy');
        });
        
        //* Roles
        Route::prefix('roles')->group(function () {
            Route::get('/', RolesComponents::class)->name('roles.index');
            Route::resource('/role-data', RolesController::class);
        });

        //* Permissions
        Route::prefix('permissions')->group(function () {
            Route::get('/', PermissionsComponents::class)->name('permissions.index');
            Route::resource('/permission-data', PermissionsController::class);
        });
    });

    Route::prefix('users-company')->group(function () {
        Route::get('/', UserCompanyComponents::class)->name('users-company.index');
        Route::resource('/user-company-data', UserCompanyController::class);
    });
    

    // Master Data
    Route::prefix('master-data')->group(function () {
        //master-data/operational
        Route::prefix('products')->group(function () {
            Route::get('/', ProductComponents::class)->name('product.index');
            Route::resource('/product-data', ProductsController::class);
            Route::post('/product-data/update/{id}', [ProductsController::class, 'update'])->name('product.update');
        });
    
        
        //master-data/general
        Route::prefix('parameters')->group(function () {
            Route::get('/', ParameterComponents::class)->name('parameters.index');
            Route::resource('/parameter-data', ParametersController::class);
        });

        Route::prefix('business')->group(function () {
            Route::get('/', BusinessTypeComponents::class)->name('business.index');
            Route::resource('/business-data', BusinessTypeController::class);
        });
    });
});


require __DIR__.'/auth.php';
