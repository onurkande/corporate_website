<?php
    use App\Http\Controllers\FeaturedProjectController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\CounterController;
    use App\Http\Controllers\TeamController;
    use App\Http\Controllers\FaqController;
    use App\Http\Controllers\AboutController;
    use App\Http\Controllers\AboutRowController;
    use App\Http\Controllers\BestServicesController;
use App\Http\Controllers\ConsultWithUsController;
use App\Http\Controllers\ContactUsLineController;
    use App\Http\Controllers\ContactUsRowController;
    use App\Http\Controllers\DynamicIndexController;
    use App\Http\Controllers\EmailBoxController;

    Route::prefix('dashboard/dynamic-edit')->group(function () {

        Route::get('/',[DynamicIndexController::class, 'index']);

        Route::get('/faqs',[FaqController::class, 'index']);
        Route::post('/faqs',[FaqController::class, 'store']);
        Route::post('/faq-update',[FaqController::class, 'update']);
        Route::get('/faq-delete',[FaqController::class, 'delete'])->name('faq-delete');

        Route::get('/contact-us-row', [ContactUsRowController::class, 'index']);
        Route::post('/contact-us-row', [ContactUsRowController::class, 'store']);
        Route::post('/ContactUsRow-update', [ContactUsRowController::class, 'update']);
        Route::get('/ContactUsRow-delete', [ContactUsRowController::class, 'delete'])->name('ContactUsRow-delete');

        Route::get('/contact-us-line',[ContactUsLineController::class, 'index']);
        Route::post('/contact-us-line',[ContactUsLineController::class, 'store']);
        Route::post('/ContactUsLine-update',[ContactUsLineController::class, 'update']);

        Route::get('/counter', [CounterController::class, 'index']);
        Route::post('/counter', [CounterController::class, 'store']);
        Route::post('/counter-update',[CounterController::class, 'update']);
        Route::get('/counter-delete',[CounterController::class, 'delete'])->name('counter-delete');

        Route::get('/team', [TeamController::class,'index']);
        Route::post('/team',[TeamController::class, 'store']);
        Route::post('/team-update',[TeamController::class, 'update']);
        Route::get('/team-delete',[TeamController::class, 'delete'])->name('team-delete');

        Route::get('/about',[AboutController::class, 'index']);
        Route::post('/about',[AboutController::class, 'store']);
        Route::post('/about-update',[AboutController::class, 'update']);

        Route::get('/about-row',[AboutRowController::class, 'index']);
        Route::post('/about-row',[AboutRowController::class, 'store']);
        Route::post('/aboutRow-update',[AboutRowController::class, 'update']);
        Route::get('/aboutRow-delete',[AboutRowController::class, 'delete'])->name('aboutRows-delete');

        Route::get('/featured-project',[FeaturedProjectController::class, 'index']);
        Route::post('/featured-project',[FeaturedProjectController::class, 'store']);
        Route::post('/featuredProject-update',[FeaturedProjectController::class, 'update']);
        Route::get('/featuredProject-delete',[FeaturedProjectController::class, 'delete'])->name('featuredProject-delete');;

        Route::get('/best-services',[BestServicesController::class, 'index']);
        Route::post('/best-services',[BestServicesController::class, 'store']);
        Route::post('/bestServices-update',[BestServicesController::class, 'update']);
        Route::get('/bestServices-delete',[BestServicesController::class, 'delete'])->name('bestServices-delete');
        
        Route::get('/email-box',[EmailBoxController::class, 'index']);
        Route::post('/email-box',[EmailBoxController::class, 'store']);
        Route::post('/emailBox-update',[EmailBoxController::class, 'update']);
        
        Route::get('/consult-with-us',[ConsultWithUsController::class, 'index']);
        Route::post('/consult-with-us',[ConsultWithUsController::class, 'store']);
        Route::post('/ConsultWithUs-update',[ConsultWithUsController::class, 'update']);
        Route::get('/ConsultWithUs-delete',[ConsultWithUsController::class, 'delete'])->name('ConsultWithUs-delete');
    });