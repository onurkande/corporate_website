<?php
    use App\Http\Controllers\FeaturedProjectController;
    use App\Http\Controllers\FooterController;
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
    use App\Http\Controllers\InfoBoxController;
    use App\Http\Controllers\OurServicesController;
    use App\Http\Controllers\InfoController;
    use App\Http\Controllers\ServiceDetailController;

    Route::prefix('dashboard/dynamic-edit')->group(function () {
        Route::middleware(['auth','isAdmin'])->group(function () {

            Route::get('/',[DynamicIndexController::class, 'index']);

            Route::get('/faqs',[FaqController::class, 'index']);
            Route::post('/faqs-insert',[FaqController::class, 'store']);
            Route::post('/faqs-update/{id}',[FaqController::class, 'update']);
            Route::get('/faqs-delete/{id}',[FaqController::class, 'delete'])->name('faq-delete');
            Route::get('/allFaqs-delete/{id}', [FaqController::class, 'allDelete']);

            Route::get('/contact-us-row', [ContactUsRowController::class, 'index']);
            Route::post('/ContactUsRow-insert', [ContactUsRowController::class, 'store']);
            Route::post('/ContactUsRow-update/{id}', [ContactUsRowController::class, 'update']);
            Route::get('/ContactUsRow-delete/{id}', [ContactUsRowController::class, 'delete']);
            Route::get('/allContactUsRow-delete/{id}', [ContactUsRowController::class, 'alldelete']);

            Route::get('/contact-us-line',[ContactUsLineController::class, 'index']);
            Route::post('/ContactUsLine-insert',[ContactUsLineController::class, 'store']);
            Route::post('/ContactUsLine-update/{id}',[ContactUsLineController::class, 'update']);
            Route::get('/ContactUsLine-delete/{id}', [ContactUsLineController::class, 'delete']);

            Route::get('/counter', [CounterController::class, 'index']);
            Route::post('/counter-insert', [CounterController::class, 'store']);
            Route::post('/counter-update/{id}',[CounterController::class, 'update']);
            Route::get('/counter-delete/{id}',[CounterController::class, 'delete']);
            Route::get('/allCounter-delete/{id}', [CounterController::class, 'alldelete']);

            Route::get('/team', [TeamController::class,'index']);
            Route::post('/team',[TeamController::class, 'store']);
            Route::post('/team-update',[TeamController::class, 'update']);
            Route::get('/team-delete',[TeamController::class, 'delete'])->name('team-delete');

            Route::get('/about',[AboutController::class, 'index']);
            Route::post('/about-insert',[AboutController::class, 'store']);
            Route::post('/about-update/{id}',[AboutController::class, 'update']);
            Route::get('/about-delete/{id}',[AboutController::class, 'delete'])->name('about-delete');

            Route::get('/about-row',[AboutRowController::class, 'index']);
            Route::post('/aboutRow-insert',[AboutRowController::class, 'store']);
            Route::post('/aboutRow-update/{id}',[AboutRowController::class, 'update']);
            Route::get('/aboutRow-delete/{id}',[AboutRowController::class, 'delete'])->name('aboutRows-delete');
            Route::get('/allAboutRow-delete/{id}',[AboutRowController::class, 'allDelete'])->name('aboutRows-delete');

            Route::get('/featured-project',[FeaturedProjectController::class, 'index']);
            Route::post('/featured-project',[FeaturedProjectController::class, 'store']);
            Route::post('/featuredProject-update',[FeaturedProjectController::class, 'update']);
            Route::get('/featuredProject-delete',[FeaturedProjectController::class, 'delete'])->name('featuredProject-delete');;

            Route::get('/best-services',[BestServicesController::class, 'index']); 
            Route::post('/best-services-insert',[BestServicesController::class, 'store']);
            Route::post('/bestServices-update/{id}',[BestServicesController::class, 'update']);
            Route::get('/bestServices-delete/{id}',[BestServicesController::class, 'delete'])->name('bestServices-delete');
            
            Route::get('/email-box',[EmailBoxController::class, 'index']);
            Route::post('/emailBox-insert',[EmailBoxController::class, 'store']);
            Route::post('/emailBox-update/{id}',[EmailBoxController::class, 'update']);
            Route::get('/allEmailBox-delete/{id}',[EmailBoxController::class, 'allDelete']);
            
            Route::get('/consult-with-us',[ConsultWithUsController::class, 'index']);
            Route::post('/consultWithUs-insert',[ConsultWithUsController::class, 'store']);
            Route::post('/consultWithUs-update/{id}',[ConsultWithUsController::class, 'update']);
            Route::get('/consultWithUs-delete/{id}',[ConsultWithUsController::class, 'delete'])->name('ConsultWithUs-delete');
            Route::get('/allConsultWithUs-delete/{id}',[ConsultWithUsController::class, 'allDelete']);

            Route::get('/info-box',[InfoBoxController::class, 'index']);
            Route::post('/info-box',[InfoBoxController::class, 'store']);
            Route::post('/InfoBox-update',[InfoBoxController::class, 'update']);
            // Route::get('/InfoBox-delete',[InfoBoxController::class, 'delete'])->name('InfoBox-delete');
            Route::get('InfoBox-delete/infoBox/{file}',[InfoBoxController::class,'deleteFile']);
            
            Route::get('/our-services',[OurServicesController::class, 'index']);
            Route::post('/our-services',[OurServicesController::class, 'store']);
            Route::post('/OurServices-update',[OurServicesController::class, 'update']);
            Route::get('/OurServices-delete',[OurServicesController::class, 'delete'])->name('OurServices-delete');
            
            Route::get('/info',[InfoController::class, 'index']);
            Route::post('/info',[InfoController::class, 'store']);
            Route::post('/info-update',[InfoController::class, 'update']);
            
            Route::get('/service-detail',[ServiceDetailController::class, 'index']);
            Route::post('/service-detail',[ServiceDetailController::class, 'store']);
            Route::post('/ServiceDetail-update',[ServiceDetailController::class, 'update']);
            
            Route::get('/footer',[FooterController::class, 'index']);
            
            Route::post('/InfoRows-store',[FooterController::class, 'infostore']);
            Route::post('/InfoRows-update',[FooterController::class, 'infoupdate']);
            Route::get('/inforows-delete',[FooterController::class, 'infodelete'])->name('inforows-delete');

            Route::post('/footer',[FooterController::class, 'tagstore']);
        });
    });

    Route::get('/images/InfoBoxDownloads/{file}', [InfoBoxController::class, 'downloadFile'])->name('download');