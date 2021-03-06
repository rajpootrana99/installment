<?php

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


Route::get('/admin', function () {
    return view('index');
})->middleware(['auth'])->name('admin');

// Account Routes
Route::resource('head', 'HeadController')->middleware(['auth']);
Route::get('fetchHeads', 'HeadController@fetchHeads')->middleware(['auth']);
Route::resource('subHead', 'SubHeadController')->middleware(['auth']);
Route::get('fetchSubHeads', 'SubHeadController@fetchSubHeads')->middleware(['auth']);
Route::resource('accountDetail', 'AccountDetailController')->middleware(['auth']);
Route::get('fetchAccountDetails', 'AccountDetailController@fetchAccountDetails')->middleware(['auth']);
Route::get('accountDetail/fetchSubHeads/{id}', 'AccountDetailController@fetchSubHeads')->middleware(['auth']);
Route::get('accountDetail/fetchBoth/{id}', 'AccountDetailController@fetchBoth')->middleware(['auth']);
Route::resource('contact', 'ContactController')->middleware(['auth']);

// Inventory Routes
Route::resource('category', 'CategoryController')->middleware(['auth']);
Route::get('fetchCategories', 'CategoryController@fetchCategories')->middleware(['auth']);
Route::resource('subCategory', 'SubCategoryController')->middleware(['auth']);
Route::get('fetchSubCategories', 'SubCategoryController@fetchSubCategories')->middleware(['auth']);
Route::resource('manufacturer', 'ManufacturerController')->middleware(['auth']);
Route::get('fetchManufacturers', 'ManufacturerController@fetchManufacturers')->middleware(['auth']);
Route::resource('warehouse', 'WarehouseController')->middleware(['auth']);
Route::get('fetchWarehouses', 'WarehouseController@fetchWarehouses')->middleware(['auth']);
Route::resource('item', 'ItemController')->middleware(['auth']);
Route::get('fetchItems', 'ItemController@fetchItems')->middleware(['auth']);
Route::resource('barcode', 'BarcodeController')->middleware(['auth']);

// Application Setting
Route::resource('financialYear', 'FinancialYearController')->middleware(['auth']);
Route::get('fetchFinancialYears', 'FinancialYearController@fetchFinancialYears')->middleware(['auth']);
Route::resource('company', 'CompanyController')->middleware(['auth']);
Route::get('fetchCompanies', 'CompanyController@fetchCompanies')->middleware(['auth']);
Route::resource('site', 'SiteController')->middleware(['auth']);
Route::get('fetchSites', 'SiteController@fetchSites')->middleware(['auth']);

// General Setting
Route::resource('city', 'CityController')->middleware(['auth']);
Route::get('fetchCities', 'CityController@fetchCities')->middleware(['auth']);
Route::resource('area', 'AreaController')->middleware(['auth']);
Route::get('fetchAreas', 'AreaController@fetchAreas')->middleware(['auth']);
Route::resource('route', 'RouteController')->middleware(['auth']);
Route::get('fetchRoutes', 'RouteController@fetchRoutes')->middleware(['auth']);
Route::resource('employee', 'EmployeeController')->middleware(['auth']);
Route::get('fetchEmployees', 'EmployeeController@fetchEmployees')->middleware(['auth']);
Route::resource('vendor', 'VendorController')->middleware(['auth']);
Route::get('fetchVendors', 'VendorController@fetchVendors')->middleware(['auth']);
Route::resource('customer', 'CustomerController')->middleware(['auth']);
Route::get('fetchCustomers', 'CustomerController@fetchCustomers')->middleware(['auth']);
Route::resource('guaranter', 'GuaranterController')->middleware(['auth']);
Route::get('fetchGuaranters', 'GuaranterController@fetchGuaranters')->middleware(['auth']);
Route::resource('tax', 'TaxController')->middleware(['auth']);
Route::get('fetchTax', 'TaxController@fetchTax')->middleware(['auth']);

// multi currency module
//sales
Route::resource('sale', 'SaleController')->middleware(['auth']);
//purchase
Route::resource('purchase', 'PurchaseController')->middleware(['auth']);
Route::get('fetchTaxPercentage/{id}', 'PurchaseController@fetchTaxPercentage')->middleware(['auth']);
Route::resource('goods', 'GoodsController')->middleware(['auth']);
Route::get('fetchGoods', 'GoodsController@fetchGoods')->middleware(['auth']);
Route::resource('broker', 'BrokerController')->middleware(['auth']);
Route::get('fetchBrokers', 'BrokerController@fetchBrokers')->middleware(['auth']);

// Installment
Route::resource('installmentPlan', 'InstallmentPlanController')->middleware(['auth']);
Route::get('fetchInstallmentPlans', 'InstallmentPlanController@fetchInstallmentPlans')->middleware(['auth']);
Route::resource('installment', 'InstallmentController')->middleware(['auth']);
Route::get('fetchSaleOfficers', 'InstallmentController@fetchSaleOfficers')->middleware(['auth']);
Route::get('fetchInquiryOfficers', 'InstallmentController@fetchInquiryOfficers')->middleware(['auth']);
Route::get('fetchMarketingOfficers', 'InstallmentController@fetchMarketingOfficers')->middleware(['auth']);
Route::get('fetchRecoveryOfficers', 'InstallmentController@fetchRecoveryOfficers')->middleware(['auth']);
Route::resource('installmentSchedule', 'InstallmentScheduleController')->middleware(['auth']);

require __DIR__.'/auth.php';
