<?php

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

    Route::prefix('main')->group(function(){
        Route::resource('','mainController');
    });

    Route::get('/contact', function () {
        return view('contact');
    });

    Route::get('/managedessert', function () {
        return view('managedessert');
    });
    Route::get('/register', function () {
        return view('register');
    });

    Route::prefix('manageUserOrder')->group(function () {
    Route::resource('','ManageUserOrderController');
    Route::post('index','ManageUserOrderController@index');
    Route::post('savepic','ManageUserOrderController@savepic');
    Route::get('image-upload', 'ManageUserOrderController@imageUpload')->name('image.upload');
    Route::post('image-upload', 'ManageUserOrderController@imageUploadPost')->name('image.upload.post2');
    });

    Route::prefix('payment')->group(function () {
    Route::resource('','PaymantUploadController');
    Route::post('index','PaymantUploadController@index');
    Route::post('savepic','PaymantUploadController@savepic');
    });
    
    Route::prefix('CreateAccEmp')->group(function () {
        Route::resource('','CreateAccEmpController');
        Route::post('saveEmploy','CreateAccEmpController@saveEmploy');
        });

   

    Route::prefix('order')->group(function () {
    Route::resource('','OrderController');
    });

    Route::get('/cal_ing2', function () {
        return view('cal_ing2');
    });

    Route::prefix('showstock')->group(function () {
    Route::resource('','ShowStockController');
    Route::post('index','ShowStockController@index');
    Route::post('ResetCal','ShowStockController@ResetCal');

    });

    
     Route::prefix('manageProductivity')->group(function () {
    Route::resource('','manageProductivityController');
    Route::post('index','manageProductivityController@index');
    Route::post('EditProductivity','manageProductivityController@EditProductivity');
    Route::post('UpdateCapacity','manageProductivityController@UpdateCapacity');
    });   

    Route::prefix('CalIngredient')->group(function () {
        Route::resource('','CalIngredientController');
        Route::post('index','CalIngredientController@index');
        Route::post('UpdateUsed','CalIngredientController@UpdateUsed');
        Route::post('cutstock','CalIngredientController@cutstock');
        Route::post('checkstock','CalIngredientController@checkstock');
        });

    Route::prefix('manageprivilege')->group(function(){
    Route::resource('','ManPrivilegeController');
    Route::post('saveMP','ManPrivilegeController@saveMP');
        
    
    }); 


    Route::prefix('followStatusOrder')->group(function(){
    Route::resource('','followStatusOrderController');
    Route::post('index','followStatusOrderController@index');
    Route::post('orderdetailuser','followStatusOrderController@orderdetailuser');
    }); 

    Route::prefix('Delivery')->group(function () {
    Route::resource('','DeliveryController');
    Route::post('index','DeliveryController@index');
    Route::post('UpdateUsed','DeliveryController@UpdateUsed');
    });
      
    Route::prefix('cal_ing')->group(function () {
    Route::resource('','calstockController');
    Route::post('index','calstockController@index');
    Route::post('UpdateUsed','calstockController@UpdateUsed');
    });

    Route::get('/testcart', function () {
        return view('testcart');
    });

    Route::prefix('manage_dessert')->group(function () {
    Route::resource('','manageProductController');
    Route::post('saveMangeProduct','manageProductController@saveMangeProduct');
    Route::post('finddataProduct','manageProductController@finddataProduct');
    Route::post('EditProduct','manageProductController@EditProduct');
    Route::post('deleteProduct','manageProductController@deleteProduct');
    Route::post('savepic','manageProductController@savepic');
    
    });
    Route::get('image-upload', 'manageProductController@imageUpload')->name('image.upload');
    Route::post('image-upload', 'manageProductController@imageUpload')->name('image.upload.post');

    Route::prefix('checkamountperday')->group(function () {
    Route::resource('','checkAmountperdayController');
    Route::post('index','checkAmountperdayController@index');
    Route::post('uptotal','checkAmountperdayController@uptotal');
    });
        
    Route::get('/test_cal', function () {
        return view('test_cal');
    });
    Route::get('/home', function () {
        return view('home');
    });
    
    Route::prefix('ordertest')->group(function () {
        Route::resource('','OrderController');
        Route::post('index','OrderController@index');
        Route::post('createOrder','OrderController@createOrder');
        Route::post('findpic','OrderController@findpic');
            
        });


    Route::prefix('managestock')->group(function () {
    Route::resource('','ManageStockController');
    Route::post('index','ManageStockController@index');
    Route::post('saveMangeStock','ManageStockController@saveMangeStock');
    Route::post('deleteStock','ManageStockController@deleteStock');
    Route::post('Editstock','ManageStockController@Editstock');
    Route::post('finddataStock','ManageStockController@finddataStock');
    });

   

    Route::prefix('checkpayment')->group(function () {
    Route::resource('','UpdateStatusController');
    Route::post('index','UpdateStatusController@index');
    Route::post('acceptpayment','UpdateStatusController@acceptpayment');
    Route::post('findpic','UpdateStatusController@findpic');
    Route::post('rejectOrder','UpdateStatusController@rejectOrder');
    });

    Route::prefix('closeorder')->group(function () {
    Route::resource('','CloseOrderController');
    Route::post('index','CloseOrderController@index');
    Route::post('updateStatusSuccessOrder','CloseOrderController@updateStatusSuccessOrder');
    });

    Route::prefix('wrongslip')->group(function () {
    Route::resource('','editSilpController');
    Route::post('index','editSilpController@index');
    Route::post('savepic','editSilpController@savepic');
    Route::get('image-upload', 'editSilpController@imageUpload')->name('image.upload');
    Route::post('image-upload', 'editSilpController@imageUploadPost')->name('image.upload.post2');
        });
    
    Route::get('/updatestatusorder', function () {
        return view('updatestatusorder');
    });


    Route::prefix('register')->group(function () {
    Route::resource('','RegisController');
    Route::post('createUser','RegisController@createUser');
    });

    Route::prefix('login')->group(function () {
    Route::resource('','LoginController');
    Route::post('checkusernamepassword','LoginController@checkusernamepassword');
    });

    Route::prefix('order')->group(function () {
    Route::resource('','OrderController');
    Route::post('index','OrderController@index');
    Route::post('createOrder','OrderController@createOrder');
    Route::post('findpic','OrderController@findpic');
        
    });

    Route::prefix('CreateFormula')->group(function () {
    Route::resource('','CreateFormulaController');
    Route::post('index','CreateFormulaController@index');
    Route::post('saveFormula','CreateFormulaController@saveFormula');
    });

    Route::prefix('ManageFormula')->group(function () {
        Route::resource('','ManageFormulaController');
        Route::post('index','ManageFormulaController@index');
        Route::post('saveFormula','ManageFormulaController@saveFormula');
        Route::post('finddataFormula','ManageFormulaController@finddataFormula');
        Route::post('EditFormula','ManageFormulaController@EditFormula');
        Route::post('deleteFormula','ManageFormulaController@deleteFormula');
        });

    Route::prefix('report')->group(function () {
        Route::resource('','ReportController');
        Route::post('index','ReportController@index');
        Route::post('getDetailReport','ReportController@getDetailReport');
        Route::post('getDetailModal','ReportController@getDetailModal');
        });

    Route::prefix('Checkstock')->group(function () {
    Route::resource('','CheckstockController');
    Route::post('index','CheckstockController@index');
    });
    

    Route::prefix('OrderAddress')->group(function () {
    Route::resource('','OrderAddressController');
    Route::post('index','OrderAddressController@index');
    Route::post('getDetailModal','OrderAddressController@getDetailModal');
    Route::post('updateStatusSuccessDelivery','OrderAddressController@updateStatusSuccessDelivery');
   
    });

    Route::prefix('DeliverInshop')->group(function () {
        Route::resource('','DeliverInshopController');
        Route::post('index','DeliverInshopController@index');
        Route::post('getDetailModal','DeliverInshopController@getDetailModal');
        Route::post('updateStatusSuccessDelivery','DeliverInshopController@updateStatusSuccessDelivery');
        });

    Route::prefix('editOrderUser')->group(function () {
    Route::resource('','editOrderUserController');
    });