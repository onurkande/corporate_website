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
    use App\Http\Controllers\HeaderController;
    use App\Http\Controllers\SliderController;

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
            Route::post('/team-update',[TeamController::class, 'update'])->name('team-update');
            Route::get('/team-delete/{index}',[TeamController::class, 'delete'])->name('team-delete');
            Route::get('/team-allDelete',[TeamController::class, 'allDelete'])->name('team-allDelete');

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
            Route::post('/featuredProject-insert',[FeaturedProjectController::class, 'store']);
            Route::post('/featuredProject-update/{id}',[FeaturedProjectController::class, 'update']);
            Route::get('/featuredProject-delete/{id}',[FeaturedProjectController::class, 'delete'])->name('featuredProject-delete');;

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
            Route::post('/InfoBox-update',[InfoBoxController::class, 'update'])->name('InfoBox-update');
            Route::get('InfoBox-delete/infoBox/{index}',[InfoBoxController::class,'deleteFile'])->name('infoBox-image-delete');
            Route::get('/allInfoBoxAll-delete',[InfoBoxController::class, 'allDelete'])->name('InfoBoxAllDelete');
            
            Route::get('/our-services',[OurServicesController::class, 'index']);
            Route::post('/ourServices-update',[OurServicesController::class, 'update'])->name('our-services-update');
            Route::get('/ourServices-delete/{index}',[OurServicesController::class, 'delete'])->name('our-services-content-row-delete');
            Route::get('/ourServices-allDelete',[OurServicesController::class, 'allDelete'])->name('our-services-allDelete');
            
            Route::get('/info',[InfoController::class, 'index']);
            Route::post('/info-update',[InfoController::class, 'update'])->name('info-update');
            Route::get('/info-delete',[InfoController::class, 'delete'])->name('info-delete');
            
            Route::get('/service-detail',[ServiceDetailController::class, 'index']);
            Route::post('/serviceDetail-update',[ServiceDetailController::class, 'update'])->name('ServiceDetail-update');
            Route::get('/serviceDetail-delete',[ServiceDetailController::class, 'delete'])->name('serviceDetail-delete');
            
            Route::get('/header',[HeaderController::class, 'index']);
            Route::put('/header',[HeaderController::class, 'update'])->name('headerUpdate');
            Route::get('/header-icon-delete/{index}',[HeaderController::class, 'deleteIcon'])->name('header-icon-delete');

            Route::get('/footer',[FooterController::class, 'index']);
            Route::post('/footer',[FooterController::class, 'update'])->name('footerUpdate');
            Route::get('/footer-contact-delete/{index}',[FooterController::class, 'deleteContactItem'])->name('footer-contact-delete');
            Route::get('/footer-tag-delete/{index}',[FooterController::class, 'deleteTag'])->name('footer-tag-delete');
            Route::get('/footer-photo-delete/{index}',[FooterController::class, 'deletePhoto'])->name('footer-photo-delete');

            Route::resource('sliders', SliderController::class);

        });
    });

    Route::get('/images/InfoBoxDownloads/{file}', [InfoBoxController::class, 'downloadFile'])->name('download');