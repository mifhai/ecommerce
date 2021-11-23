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

//page user (frontend)
Route::get('/', 'Frontend\PageController@index')->name('home');
Route::get('/product', 'Frontend\PageController@product');

//page product
Route::get('/product/{id}', 'Frontend\ProductsController@productDetail');
//page product by brand
Route::get('/brands/{id}', 'Frontend\ProductsController@brand');
//page product by category
Route::get('/category/{id}', 'Frontend\ProductsController@category');
//page product by processor
Route::get('/processor/{id}', 'Frontend\ProductsController@processor');
//page product by layar
Route::get('/layar/{id}', 'Frontend\ProductsController@layar');
//page product by storage
Route::get('/storage/{id}', 'Frontend\ProductsController@storage');
//search product
Route::get('/cari', 'Frontend\ProductsController@search')->name('search');




//getProductPrice
Route::get('/get-product-price', 'Frontend\ProductsController@getProductPrice');

//coupon
Route::match(['get', 'post'],'/cart_apply_coupon', 'Frontend\ProductsController@applyCoupon');

//page promo
Route::get('/promotion', 'Frontend\PromotionController@index')->name('promotion-frontend');
Route::get('/promotions/{id}', 'Frontend\PromotionController@detail');


//auth user
Route::match(['get', 'post'],'/register_user', 'UserController@register');
Route::match(['get', 'post'],'/userLogin', 'UserController@userGetLogin');
Route::post('/user_register', 'UserController@register');

//userlogout
Route::get('/user_logout', 'UserController@logout');

//userLogin
Route::post('/user_login', 'UserController@login');

//check email
Route::match(['get', 'post'],'/check-email', 'UserController@checkEmail');

// //add cart
Route::match(['get', 'post'], '/add_cart', 'Frontend\ProductsController@addCart');
Route::match(['get', 'post'], '/cart-order', 'Frontend\ProductsController@cartOrder');

// //delete Cart Order
Route::get('/cart/delete_product/{id}', 'Frontend\ProductsController@deleteCartOrder');
// //update qty
Route::get('/cart/update_product/{id}/{qty}', 'Frontend\ProductsController@qtyCartOrder');

//All route After Login
Route::group(['middleware'=>['frontlogin']], function(){
    //user Account
    Route::match(['get', 'post'],'/account', 'UserController@account');

    Route::get('/province/{id}/cities', 'UserController@getCities');
    Route::get('/cities/{id}/district', 'UserController@getDistrict');

    //user Update
    Route::post('/account/{id}', 'UserController@update');

    //update password
    Route::get('/account/update-password', 'UserController@updatePassword')->name('update.password');

    //check password
    Route::get('/update-password', 'UserController@updatePass');
    // Route::get('user_login/check-pwd', 'UserController@checkPassword');

    //update Password
    Route::post('/update-password-user', 'UserController@updatePassUser');
    //checkout
    Route::match(['get', 'post'],'/checkout', 'Frontend\ProductsController@checkout');
    //delivery address
    Route::match(['get', 'post'],'/delivery_address', 'Frontend\ProductsController@delivery');

    //midtrans
    Route::post('/midtrans/store', 'Frontend\MidtransController@submitProduct')->name('midtrans.store');
    Route::post('/notification/handler', 'Frontend\MidtransController@notificationHandler')->name('notification.handler');
    Route::post('/finish', function(){
        return redirect('/history-order-midtrans');
    })->name('donation.finish');

    //order review
    Route::match(['get', 'post'],'/order-review', 'Frontend\ProductsController@orderReview');
    //payment-method
    Route::match(['get', 'post'],'/payment-method', 'Frontend\ProductsController@paymentMethod');
    //thanks Page
    Route::get('/thanks-page', 'Frontend\ProductsController@thanksPage');
    //history order user
    Route::get('/history-order', 'Frontend\ProductsController@history');
    Route::match(['get', 'post'],'/upload-pembayaran', 'Frontend\ProductsController@upload');

    //history order midtrans
    Route::get('/history-order-midtrans', 'Frontend\ProductsController@historyMidtrans');
    Route::get('/post-midtrans/{id}', 'Frontend\ProductsController@postMidtrans');
    //history Order Detail
    Route::get('/history-order-details/{id}', 'Frontend\ProductsController@historyDetails');
});


//Activation Email
Route::get('activation', 'Frontend\ActivationController@activation');
Route::match(['get', 'post'],'activation-otp', 'Frontend\ActivationController@activationOtp');
Route::get('resend-activation', 'ResendActivationController@formResend');
Route::post('resend-activation', 'ResendActivationController@resend');


Auth::routes(['verify' => true]);
Route::get('/verifyOTP', 'verifyOTPController@showVerifyForm');
Route::post('/verifyOTP', 'verifyOTPController@verify');
Route::post('/resent_otp', 'ResendOTPController@resend');

// Route::group(['middleware' => 'TwoFA'], function() {
//     Route::get('/home', 'HomeController@index')->name('home');
// });


//invoice
Route::get('/invoice/{id}', 'Admin\DashboardController@invoice');
//Login admin
Route::match(['get', 'post'],'/admin/login', 'Admin\AdminController@getLogin');
Route::get('/admin/logout', 'Admin\AdminController@logout');

//Page Admin
//Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', 'Admin\DashboardController@dashboard')->name('dashboard');
    //transaction
    Route::get('/admin/transaction/{id}', 'Admin\DashboardController@transaction');
    Route::post('/admin/transaction/post/{id}', 'Admin\DashboardController@post');
    //daftar transaction
    Route::get('/admin/order/transaction', 'Admin\DashboardController@orderall')->name('transaction');

    Route::get('/admin_setting', 'Admin\AdminController@setting');
    Route::get('admin_login/check-pwd', 'Admin\AdminController@checkPassword');
    Route::match(['get', 'post'],'/admin_update_password', 'Admin\AdminController@updatePassword');

    //route category
    Route::match(['get', 'post'],'/admin_add_category', 'Admin\CategoryController@addCategory');
    Route::match(['get', 'post'],'/admin_edit_category/{id}', 'Admin\CategoryController@editCategory');
    Route::match(['get', 'post'],'/admin/delete_category/{id}', 'Admin\CategoryController@deleteCategory');
    Route::get('/daftar_category', 'Admin\CategoryController@daftarCategory')->name('category');

    //route product
    Route::get('/admin_add_product', 'Admin\ProductController@addProduct');
    Route::post('/admin_add_product', 'Admin\ProductController@store');
    Route::get('/admin_edit_product/{id}', 'Admin\ProductController@editProduct');
    Route::post('/admin_edit_product/{id}', 'Admin\ProductController@update');
    Route::match(['get', 'post'],'/admin_delete_product_images/{id}', 'Admin\ProductController@deleteProductImages');
    Route::get('/admin/delete_product/{id}', 'Admin\ProductController@deleteProduct');
    Route::get('/daftar_product', 'Admin\ProductController@daftarProduct')->name('product');

    //delete product selection
    Route::match(['get', 'post'],'/delete/product/selection', 'Admin\ProductController@deleteAll');
    //duplicate product
    Route::match(['get', 'post'],'/admin_duplicate_product/{id}', 'Admin\ProductController@duplicate');
    //Import Product
    Route::post('/admin_import_product', 'Admin\ProductController@import');
    //export product
    Route::get('/admin_export_product', 'Admin\ProductController@export')->name('export');
    //update post product
    Route::get('/admin/active/{id}', 'Admin\ProductController@active');

    //promotion
    Route::get('/admin/promotion', 'Admin\PromotionController@index')->name('promotion');

    //add promotion
    Route::get('/admin/add/promotion', 'Admin\PromotionController@addPromotion')->name('add.promotion');
    Route::post('/admin/add/promotion', 'Admin\PromotionController@postPromotion')->name('post.promotion');

    //add id product promotion
    Route::get('/admin/add/product/promotion/{id}', 'Admin\PromotionController@addProduct');
    Route::match(['get','post'],'/add/promotion', 'Admin\PromotionController@addProductPromotion');

    //delete product promotion
    Route::get('/admin/delete_product_promotion/{id}', 'Admin\PromotionController@deleteProductPromotion');

    //add product promotion
    Route::post('product/promotion', 'Admin\PromotionController@addProductFix')->name('product.promotion.fix');

    //delete product promotion selection
    Route::match(['get','post'], '/delete/promotion/selection', 'Admin\PromotionController@deleteAll');

    //productBrands
    Route::match(['get', 'post'],'/admin_add_brands', 'Admin\BrandController@addBrand');
    Route::match(['get', 'post'],'/admin_edit_brands/{id}', 'Admin\BrandController@editBrand');
    Route::get('/admin/delete_brands/{id}', 'Admin\BrandController@deleteBrand');
    Route::get('/daftar_brands', 'Admin\BrandController@daftarBrand')->name('brands');


    //coupon
    Route::match(['get', 'post'], '/admin_add_coupon', 'Admin\CouponController@addCoupon');
    Route::match(['get', 'post'], '/admin_edit_coupon/{id}', 'Admin\CouponController@editCoupon');
    Route::get('/admin/delete_coupon/{id}', 'Admin\CouponController@deleteCoupon');
    Route::get('/daftar_coupon', 'Admin\CouponController@daftarCoupon')->name('coupon');

    //Banner
    Route::match(['get', 'post'], '/admin_add_banner', 'Admin\BannerController@addBanner');
    Route::match(['get', 'post'], '/admin_edit_banner/{id}', 'Admin\BannerController@editBanner');
    Route::get('/admin/delete_banner/{id}', 'Admin\BannerController@deleteBanner');
    Route::get('/daftar_banner', 'Admin\BannerController@daftarBanner')->name('banner');

    //processor
    Route::get('/daftar/processor', 'Admin\ProcessorController@index')->name('processor');
    Route::match(['get', 'post'],'/add/processor', 'Admin\ProcessorController@add')->name('add.processor');
    Route::match(['get', 'post'], '/admin_edit_processor/{id}', 'Admin\ProcessorController@edit');
    Route::get('/admin/delete_processor/{id}', 'Admin\ProcessorController@delete');

    //disk (penyimpanan)
    Route::get('/daftar/penyimpanan', 'Admin\DiskController@index')->name('disk');
    Route::match(['get', 'post'],'/add/penyimpanan', 'Admin\DiskController@add')->name('add.penyimpanan');
    Route::match(['get', 'post'], '/admin_edit_disk/{id}', 'Admin\DiskController@edit');
    Route::get('/admin/delete_disk/{id}', 'Admin\DiskController@delete');

    //layar
    Route::get('/daftar/layar', 'Admin\LayarController@index')->name('layar');
    Route::match(['get', 'post'],'/add/layar', 'Admin\LayarController@add')->name('add.layar');
    Route::match(['get', 'post'], '/admin_edit_layar/{id}', 'Admin\LayarController@edit');
    Route::get('/admin/delete_layar/{id}', 'Admin\LayarController@delete');
//});

