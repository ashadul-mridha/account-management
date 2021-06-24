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

Route::get('/', function () {
	return view('welcome');
});

Route::get('/clear-cache', function() {
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
	Artisan::call('view:clear');
	return "Cache is cleared";
});

Auth::routes();


Route::get('/', 'Login@index');
Route::get('/login', 'Login@index');
Route::post('/loginCheck', 'Login@loginCheck');

Route::group(['middleware' => 'admin'], function () {
	Route::get('/logout', 'Login@logout');
	Route::get('/noaccess', 'Login@noaccess');


	Route::get('/countrynames', 'CommonController@countrynames');
	
	Route::get('/dashboard', 'Dashboard@index');




	// User
	// Route::get('/users', 'User@index');
	 Route::get('/addnewuser', 'User@addUserView');
	 Route::post('/store/user', 'User@storeuser')->name('store.user');
	// Route::post('/adduser', 'User@adduser');
	// Route::get('/userlist', 'User@userlist');
	// Route::get('/myprofile', 'User@myprofile');
	// Route::post('/changepass', 'User@changepass');
	// Route::post('/deleteuser', 'User@deleteuser');
	// Route::post('/updatemyprofile', 'User@updatemyprofile');
	
	// Route::get('/editUser/{id}', 'User@editUser');
	// Route::post('/updateuser', 'User@updateuser');
	// Route::get('/useraccessview', 'User@useraccessview');
	// Route::get('/getModules', 'User@getModules');
	// Route::get('/getFeature/{idModule}', 'User@getFeature');
	// Route::post('/assignFeatureToRole', 'User@assignFeatureToRole');
	// Route::get('/roleWiseFeatures', 'User@roleWiseFeatures');

	// Cat-subcat
	// Route::get('/cat-subcat', 'CatSubcat@index');
	// Route::post('/addCat', 'CatSubcat@addCat');
	// Route::post('/addSubCat', 'CatSubcat@addSubCat');
	// Route::get('/catData', 'CatSubcat@catData');
	// Route::get('/subcatData', 'CatSubcat@subcatData');
	// Route::get('/catList', 'CatSubcat@catList');
	// Route::get('/subCatList/{id_cat?}', 'CatSubcat@subCatList');
	// Route::get('/usersByCatSubcat/{id_cat?}/{id_subcat?}', 'CatSubcat@usersByCatSubcat');


	// Role
	// Route::get('/role', 'User@role');
	// Route::post('/addrole', 'User@addrole');
	// Route::get('/rolelist', 'User@rolelist');
	// Route::post('/assignrole', 'User@assignrole');
	// Route::get('/userrolelist', 'User@userrolelist');
	// Route::get('/userlistdata', 'User@userlistdata');
	// Route::get('/rolelistdata', 'User@rolelistdata');
	// Route::post('/deleteuserrole', 'User@deleteuserrole');
	// Route::post('/changeRole', 'User@changeRole');
	// Route::get('/findMyRole', 'User@findMyRole');
	// Route::get('/getUsersByRoleId/{id}', 'User@getUsersByRoleId');
	// Route::post('/deleteRoleFEature', 'User@deleteRoleFEature');



// Complains
	
	// Route::get('/complain/', 'Complains@index');
	// Route::get('/complain-list/', 'Complains@complainlistView');
	// Route::get('/complain-details/{id}', 'Complains@complainDetails');
	// Route::get('/complain-inprogress/', 'Complains@complainsInprogress');
	// Route::get('/complain-solved/', 'Complains@complainsSolved');

	// Route::get('/complainlist/{status}', 'Complains@complainlist');
	// Route::post('/addComplain/', 'Complains@addComplain');
	// Route::get('/districts/', 'CommonController@districts');
	// Route::post('/addDistrictComment/', 'Complains@addDistrictComment');

//member route are here

	Route::get('/add/member','MemberController@create')->name('create.member');
	Route::post('/save/member','MemberController@store')->name('store.member');
	Route::get('/all/member','MemberController@index')->name('index.member');
	Route::get('/show-member/{id}','MemberController@show')->name('show.member');
	Route::get('/delete-member/{id}','MemberController@delete')->name('delete.member');
	Route::get('/edit-member/{id}','MemberController@edit')->name('edit.member');
	Route::post('/update/member/','MemberController@update')->name('update.member');

//Nomini route are here

	Route::get('/add/nomini','NominiController@create')->name('create.nomini');
	Route::post('/save/nomini','NominiController@store')->name('store.nomini');
	Route::get('/all/nomini','NominiController@index')->name('index.nomini');
	Route::get('/show-nomini/{id}','NominiController@show')->name('show.nomini');
	Route::get('/delete-nomini/{id}','NominiController@delete')->name('delete.nomini');
	Route::get('/edit-nomini/{id}','NominiController@edit')->name('edit.nomini');
	Route::post('/update/nomini/','NominiController@update')->name('update.nomini');

//Bank route are here

	Route::get('/add/bank_account','BankAccountController@create')->name('create.bank');
	Route::post('/save/bank_information','BankAccountController@store')->name('store.bank');
	Route::get('/all/bank_account','BankAccountController@index')->name('index.bank');
	Route::get('/show-bank_account/{id}','BankAccountController@show')->name('show.bank');
	Route::get('/delete/bank_account/{id}','BankAccountController@delete')->name('delete.bank');
	Route::get('/edit/bank_account/{id}','BankAccountController@edit')->name('edit.bank');
	Route::post('/update/bank_account/','BankAccountController@update')->name('update.bank');
	Route::get('/transaction/{id}','BankAccountController@transaction')->name('transaction.bank');
	Route::get('/add/balance/account','BankAccountController@addbalance')->name('add-balance.bank');
	Route::post('/saved/add-balance','BankAccountController@storebalance')->name('storebalance.bank');

	//pdf
	Route::get('/transaction/pdf/{id}','BankAccountController@pdf')->name('transaction.pdf');
	Route::get('/supplier/pdf/{id}','SupplierController@pdf')->name('supplier.pdf');
	Route::get('/month/tran/pdf','Dashboard@pdf')->name('dashboard.pdf');

//Supplier or customer route are here

	Route::get('/add/supplier','SupplierController@create')->name('create.supplier');
	Route::post('/save/supplier','SupplierController@store')->name('store.supplier');
	Route::get('/all/Supplier','SupplierController@index')->name('index.supplier');
	Route::get('/show/supplier/{id}','SupplierController@show')->name('show.supplier');
	Route::get('/delete/supplier/{id}','SupplierController@delete')->name('delete.supplier');
	Route::get('/edit/supplier/{id}','SupplierController@edit')->name('edit.supplier');
	Route::post('/update/supplier/','SupplierController@update')->name('update.supplier');
	Route::get('/get-sup-info','SupplierController@get_sup_info');
	Route::get('/supplier/transaction/{id}','SupplierController@transaction')->name('transaction.supplier');

	//Transaction route are here

	// Route::get('/add/transaction','TransactionController@create')->name('create.transaction');
	// Route::post('/save/transaction','TransactionController@store')->name('store.transaction');
	// Route::get('/all/loan','TransactionController@allloan')->name('allloan.transaction');
	// Route::get('/all/saving','TransactionController@allsaving')->name('allsaving.transaction');
	// Route::get('/all/fixed','TransactionController@fixed')->name('fixed.transaction');

	Route::get('/payment/transaction','TransactionController@payment')->name('payment.transaction');
	Route::get('/allpayment/transaction','TransactionController@allpayment')->name('allpayment.transaction');
	Route::post('/pay/transaction','TransactionController@paymentstore')->name('paymentstore.transaction');


	Route::get('/received/transaction','TransactionController@received')->name('received.transaction');
	Route::get('/allreceived/transaction','TransactionController@allreceived')->name('allreceived.transaction');
	Route::post('/recived/transaction','TransactionController@receivedstore')->name('receivedstore.transaction');

	//filter by date
	Route::post('/filter/payment/date','TransactionController@filterbydatepayment')->name('filterbydatepayment.transaction');
	Route::post('/filter/received/date','TransactionController@filterbydatereceived')->name('filterbydatereceived.transaction');
	

	//payment ajax
	// Route::get('/get-bank-info','TransactionController@get_bank_info');
	 Route::get('/get-bank-info','TransactionController@get_bank_info');
	 
	 //Route::post('/ajax-payment-filter','TransactionController@ajaxpayment');
	//recived ajax
	// Route::get('/get-bank-info-re','TransactionController@get_bank_info_re');
	// Route::get('/get-bank-info-re-t','TransactionController@get_bank_info_re_t');
	//pdf
	
	// Route::get('/transaction/pdf/view/{type}','PDFController@view')->name('view.pdf');
	// Route::get('/transaction/pdf/download','PDFController@download')->name('pdf.download');

	//PhoneBook Controller

	Route::get('/add/phonebook','PhoneBookController@create')->name('create.phonebook');
	Route::post('/save/phonebook','PhoneBookController@store')->name('store.phonebook');
	Route::get('/all/phonebook','PhoneBookController@index')->name('index.phonebook');
	Route::get('/show/phonebook/{id}','PhoneBookController@show')->name('show.phonebook');
	Route::get('/delete/phonebook/{id}','PhoneBookController@delete')->name('delete.phonebook');
	Route::get('/edit/phonebook/{id}','PhoneBookController@edit')->name('edit.phonebook');
	Route::post('/update/data/phonebook','PhoneBookController@update')->name('update.phonebook');


	//Send SMS Controller

	Route::get('/add/message','AllMassageController@create')->name('create.allmessage');
	Route::post('/save/message','AllMassageController@store')->name('store.allmessage');
	Route::get('/all/message','AllMassageController@index')->name('index.allmessage');
	// Route::get('/show/message/{id}','AllMassageController@show')->name('show.allmessage');
	// Route::get('/delete/message/{id}','AllMassageController@delete')->name('delete.allmessage');
	// Route::get('/edit/message/{id}','AllMassageController@edit')->name('edit.allmessage');
	// Route::post('/update/message/phonebook','AllMassageController@update')->name('update.allmessage');
	
	Route::get('/get-phonebook-info','AllMassageController@get_phonebook_info');


	//role controller here

	// Route::get('/roles-create','RolesController@create_role')->name('role');
	// Route::post('/save/role','RolesController@store_role')->name('store.role');
	// Route::post('/assign/role','RolesController@store_assign_role')->name('store.assign_role');
	// Route::get('/permission','RolesController@create_permission')->name('permission');
	// Route::post('/save/permission','RolesController@store_permission')->name('store.permission');
	// Route::post('/assign/permission','RolesController@store_assign_permission')->name('store.assign_permission');

	//Add Product route are here

	Route::get('/add/product','AddProductController@create')->name('create.product');
	Route::post('/save/product','AddProductController@store')->name('store.product');
	Route::get('/all/product','AddProductController@index')->name('index.product');
	Route::get('/show/product/{id}','AddProductController@show')->name('show.product');
	Route::get('/delete/product/{id}','AddProductController@delete')->name('delete.product');
	Route::get('/edit/product/{id}','AddProductController@edit')->name('edit.product');
	Route::post('/update/product/','AddProductController@update')->name('update.product');



});


