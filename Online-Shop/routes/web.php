<?php



Route::get('/', function () {return view('pages.index');});


//auth & user
Auth::routes(['verify' => true ]);
Route::get('/home','HomeController@index')->name('home');
Route::get('/password-change','HomeController@changePassword')->name('password.change');
Route::post('/password/update','HomeController@updatePassword')->name('password.update');
Route::get('/user/logout','HomeController@Logout')->name('user.logout');




//admin=======
Route::get('admin/home','AdminController@index');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@login');


        // Password Reset Routes...
Route::get('admin/password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


//admin dashbord work.............................................


//categories
Route::get('admin/categories','Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category','Admin\Category\CategoryController@storecategory')->name('store.category');
Route::get('delete/category/{id}','Admin\Category\CategoryController@DeleteCategory');
Route::get('edit/category/{id}','Admin\Category\CategoryController@EditCategory');
Route::post('update/category/{id}','Admin\Category\CategoryController@UpdateCategory');

//Brand
Route::get('admin/brands','Admin\Category\BrandController@brand')->name('brands');
Route::post('admin/store/brand','Admin\Category\BrandController@storebrand')->name('store.brand');
Route::get('delete/brand/{id}','Admin\Category\BrandController@DeleteBrand');
Route::get('edit/brand/{id}','Admin\Category\BrandController@EditBrand');
Route::post('update/brand/{id}','Admin\Category\BrandController@UpdateBrand');



//sub-categories
Route::get('admin/sub/category','Admin\Category\SubCategoryController@subcategories')->name('sub.categories');
Route::post('admin/store/subcategory','Admin\Category\SubCategoryController@storesubcategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}','Admin\Category\SubCategoryController@DeleteSubCategory');
Route::get('edit/subcategory/{id}','Admin\Category\SubCategoryController@EditSubCategory');
Route::post('update/subcategory/{id}','Admin\Category\SubCategoryController@UpdateSubCategory');


//Coupon
Route::get('admin/coupon','Admin\Category\CouponController@Coupon')->name('coupon');
Route::post('admin/store/coupon','Admin\Category\CouponController@storecoupon')->name('store.coupon');
Route::get('delete/coupon/{id}','Admin\Category\CouponController@DeleteCoupon');
Route::get('edit/coupon/{id}','Admin\Category\CouponController@EditCoupon');
Route::post('update/coupon/{id}','Admin\Category\CouponController@UpdateCoupon');
Route::get('coupon/remove/','CartController@CouponRemove')->name('coupon.remove');

//newslater
Route::get('admin/newslater','Admin\Category\NewsLaterController@Newslater')->name('admin.newslater');
Route::get('delete/subscribing/{id}','Admin\Category\NewsLaterController@DeleteSubscrib');

//Contact
Route::get('admin/allcontact','Admin\AllContuctController@AllContact')->name('all.contact');
Route::get('delete/contact/{id}','Admin\AllContuctController@DeleteContact');



//products
Route::get('admin/product/all','Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add','Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product','Admin\ProductController@store')->name('store.product');
Route::get('inactive/product/{id}','Admin\ProductController@Inactive');
Route::get('active/product/{id}','Admin\ProductController@Active');
Route::get('delete/product/{id}','Admin\ProductController@DeleteProduct');
Route::get('view/product/{id}','Admin\ProductController@ViewProduct');
Route::get('edit/product/{id}','Admin\ProductController@EditProduct');
Route::post('update/product/{id}','Admin\ProductController@UpdateProduct');
//get sub categories by ajx
Route::get('/get/subcategory/{category_id}','Admin\ProductController@GetSubcat');

//all post Category related
Route::get('admin/postcat','Admin\PostController@PostCat')->name('allpostcategory');
Route::post('admin/store/postcategory','Admin\PostController@storpostecategory')->name('store.postcategory');
Route::get('delete/postcategory/{id}','Admin\PostController@DeletePostCategory');
Route::get('edit/postcategory/{id}','Admin\PostController@EditPostCategory');
Route::post('update/postcategory/{id}','Admin\PostController@UpdatePostCategory');





//all blog post related
Route::get('admin/add/post','Admin\PostController@Create')->name('add.blogpost');
Route::post('admin/store/post','Admin\PostController@store')->name('store.post');
Route::get('admin/all/post','Admin\PostController@index')->name('all.blogpost');
Route::get('delete/post/{id}','Admin\PostController@DeletePost');
Route::get('edit/post/{id}','Admin\PostController@EditPost');
Route::post('update/post/{id}','Admin\PostController@UpdatePost');


//Search product by user
Route::post('product/search','FrontController@ProductSearch')->name('product.search');





// ************************Front work*********************
//newslater
Route::post('store/newslater','FrontController@StoreNewslater')->name('store.newslater');


//Contact
Route::get('admin/contact','Admin\ContactController@contact')->name('admin.contact');
Route::post('store/contact','Admin\ContactController@StoreContact')->name('store.contact');

//setting forent
Route::get('admin/setting','Admin\SettingController@setting')->name('admin.setting');
Route::post('store/setting','Admin\SettingController@StoreSetting')->name('store.setting');
Route::get('delete/setting/{id}','Admin\SettingController@DeleteSetting');
Route::get('inactive/setting/{id}','Admin\SettingController@Inactive');
Route::get('active/setting/{id}','Admin\SettingController@Active');

//Extra Setting
Route::get('admin/extra/setting','Admin\ExtraSettingController@extrasetting')->name('admin.extrasetting');
Route::post('store/extra/setting','Admin\ExtraSettingController@StoreExtraSetting')->name('store.extrasetting');
Route::get('delete/extra/setting/{id}','Admin\ExtraSettingController@DeleteExtraSetting');




//add wishlist............
Route::get('add/wishlist/{id}','WishlistController@AddWishlist');


//cart............
Route::get('add/cart/{id}','CartController@AddCart');
Route::get('check','CartController@CheckCart');
Route::get('product/cart','CartController@ShowCart')->name('show.cart');
Route::get('remove/cart/{rowId}','CartController@RemoveCart');
Route::post('update/cart/item','CartController@UpdateCart')->name('update.cartitem');
Route::get('cart/product/view/{id}','CartController@ViewProduct');
Route::post('insert/into/cart/','CartController@InsertCart')->name('insert.into.cart');
Route::get('user/checkout/','CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/','CartController@Wishlist')->name('user.wishlist');
Route::post('user/apply/coupon/','CartController@Coupon')->name('apply.coupon');

//user payment
Route::get('payment/page/','CartController@PaymentPage')->name('payment.step');
Route::post('payment/process/','PaymentController@Payment')->name('payment.process');
Route::post('/stripe/charge','PaymentController@StripeCharge')->name('stripe.charge');




//Social
Route::get('/auth/redirect/{provider}','SocialController@redirect');
Route::get('/callback/{provider}','SocialController@callback');

//product details
Route::get('product/details/{id}/{product_name}','ProductController@ProductView');

Route::post('cart/product/add/{id}','ProductController@AddCart');

Route::get('products/{id}','ProductController@Product');

//customer profile related route



//blog
Route::get('blog/post/','BlogController@Blog')->name('blog.post');
Route::get('language/english/','BlogController@English')->name('language.english');
Route::get('language/bangla/','BlogController@Bangla')->name('language.bangla');
Route::get('blog/details/{id}','BlogController@BlogDetails');


//admin order related route

Route::get('admin/pending/order/','Admin\OrderController@NewOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}','Admin\OrderController@ViewOrder');

Route::get('admin/payment/accept/{id}','Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}','Admin\OrderController@PaymentCancel');

Route::get('admin/accept/payment','Admin\OrderController@AcceptPaymentOrder')->name('admin.accept.payment');
Route::get('admin/cancel/order','Admin\OrderController@CancelPaymentOrder')->name('admin.cancel.order');

Route::get('admin/progress/payment','Admin\OrderController@ProgressPaymentOrder')->name('admin.progress.payment');
Route::get('admin/success/payment','Admin\OrderController@SuccessPaymentOrder')->name('admin.success.payment');

Route::get('admin/delevery/progress/{id}','Admin\OrderController@DeleveryProgress');
Route::get('admin/delevery/done/{id}','Admin\OrderController@DeleveryDone');

//seo setting
Route::get('admin/seo/','Admin\SeoController@Seo')->name('admin.seo');
Route::post('admin/update/seo/','Admin\SeoController@UpdateSeo')->name('update.seo');

//order tracking
Route::post('order/tracking','FrontController@OrderTracking')->name('order.tracking');
//admin order report

Route::get('admin/today/order','Admin\ReportController@TodyOrder')->name('today.order');
Route::get('admin/today/delevered','Admin\ReportController@TodyDelevered')->name('today.delevered');
Route::get('admin/search/report','Admin\ReportController@SearchReport')->name('search.report');


Route::post('admin/search/byyear', 'Admin\ReportController@searchByYear')->name('search.by.year');
Route::post('admin/search/bymonth', 'Admin\ReportController@searchByMonth')->name('search.by.month');
Route::post('admin/search/bydate', 'Admin\ReportController@searchByDate')->name('search.by.date');


//return order user
Route::get('success/orderlist/','ReturnOrderController@SuccessOrderlist')->name('success.orderlist');
Route::get('request/return/{id}','ReturnOrderController@RequestReturn');

//return order admin
Route::get('admin/return/request','Admin\ReturnController@Request')->name('admin.return.request');
Route::get('admin/approve/return/{id}','Admin\ReturnController@ApproveReturn');
Route::get('admin/all/return','Admin\ReturnController@AllReturn')->name('admin.all.return');
