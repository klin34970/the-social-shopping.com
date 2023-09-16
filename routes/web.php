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

Route::get('setlocale/{locale}', function ($locale) {
  if (in_array($locale, \Config::get('app.locales'))) {
    Session::put('locale', $locale);
  }
  return redirect()->back();
});

Route::group(['middlewareGroups' => ['web'], 'middleware' => ['forceSSL']], function ()
{
	$this->get('/', 'Frontend\HomeController@index')->name('home');

	// Authentication Routes...
	$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
	$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
	$this->post('login', 'Auth\LoginController@login')->name('auth.login');
	$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

	// Registration
	$this->get('/registration', 'Frontend\HomeController@registration')->name('home.registration');
	$this->post('/registration', 'Frontend\HomeController@postRegistration')->name('home.registration');

	// Change Password Routes...
	$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
	$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

	// Password Reset Routes...
	$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
	$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
	$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


	// Product view
	Route::get('/product/{unique_id}', 'Frontend\ProductController@byUniqueId')->name('product.index');
	Route::post('/product/{unique_id}/attributes', 'Frontend\ProductController@StoreSessionAttributes')->name('product.store.session.attributes');
	
	// Order view
	Route::post('/order/{unique_id}', 'Frontend\OrderController@byUniqueId')->name('order.index');
	
	
	
	//Docs
	Route::get('/terms_and_conditions', 'Frontend\HomeController@termsAndConditions')->name('tac');
	Route::get('/privacy_policy', 'Frontend\HomeController@privacyPolicy')->name('pp');
	
	Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'backend.'], function () {
		
		Route::get('/', 'Backend\HomeController@index')->name('home');
		
		Route::get('/dashboard', 'Backend\DashboardController@index')->name('dashboard.index');
		
		Route::resource('permissions', 'Backend\PermissionsController');
		Route::resource('roles', 'Backend\RolesController');
		Route::resource('users', 'Backend\UsersController');
		
		
		Route::resource('shop', 'Backend\UserShopController');
		Route::resource('supplier', 'Backend\UserSupplierController');
		Route::resource('order', 'Backend\UserOrderController');
		Route::resource('customer', 'Backend\UserCustomerController');
		
		
		Route::resource('product', 'Backend\UserShopProductController');
		Route::put('/product/gallery/{product}', 'Backend\UserShopProductController@updateGallery')->name('product.update.gallery');
		Route::delete('/product/gallery/{product}', 'Backend\UserShopProductController@deleteGallery')->name('product.delete.gallery');
		Route::put('/product/gallery/{product}/position', 'Backend\UserShopProductController@updateGalleryPosition')->name('product.update.gallery.position');
		/*************************************** FEATURES ***************************************/
		Route::post('/product/feature/{product}', 'Backend\UserShopProductController@createFeature')->name('product.create.feature');
		Route::delete('/product/feature/{product}', 'Backend\UserShopProductController@deleteFeature')->name('product.delete.feature');
		Route::put('/product/feature/{product}/position', 'Backend\UserShopProductController@updateFeaturePosition')->name('product.update.feature.position');
		/*************************************** FEATURES ***************************************/
		/************************************** ATTRIBUTES **************************************/
		Route::post('/product/attribute/{product}', 'Backend\UserShopProductController@createAttribute')->name('product.create.attribute');
		Route::delete('/product/attribute/{product}', 'Backend\UserShopProductController@deleteAttribute')->name('product.delete.attribute');
		Route::put('/product/attribute/{product}/position', 'Backend\UserShopProductController@updateAttributePosition')->name('product.update.attribute.position');
		/************************************** ATTRIBUTES **************************************/
		/*********************************** ATTRIBUTES VALUES **********************************/
		Route::post('/product/attribute/value/{product}', 'Backend\UserShopProductController@createAttributeValue')->name('product.create.attribute.value');
		Route::delete('/product/attribute/value/{product}', 'Backend\UserShopProductController@deleteAttributeValue')->name('product.delete.attribute.value');
		Route::put('/product/attribute/value/{product}/position', 'Backend\UserShopProductController@updateAttributeValuePosition')->name('product.update.attribute.value.position');
		/*********************************** ATTRIBUTES VALUES **********************************/
		Route::get('/product/variants/{product}', 'Backend\UserShopProductController@getVariants')->name('product.variants');
		Route::post('/product/variants/{product}', 'Backend\UserShopProductController@createVariant')->name('product.variant.create');
		Route::delete('/product/variants/{product}', 'Backend\UserShopProductController@deleteVariant')->name('product.variant.delete');
		

	});
});