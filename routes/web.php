<?php

use App\Http\Controllers\admin\BookingController;
use App\Http\Controllers\admin\ClientController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Visitor\HomeController;
use App\Http\Controllers\Visitor\AboutController;
use App\Http\Controllers\Visitor\ProjectController;
use App\Http\Controllers\Visitor\GalleryController;
use App\Http\Controllers\Visitor\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// visitor routes

Route::get("/", [HomeController::class, "index"])->name("home.index");

Route::get("/about", [AboutController::class, "about"])->name("about");

Route::get("/project", [ProjectController::class, "project"])->name("projects");

Route::get("/gallery", [GalleryController::class, "gallery"])->name("gallery");

Route::get("/contact", [ContactController::class, "contact"])->name("contact");

Route::get("/contact", [ContactController::class, "contact"])->name("contact");
Route::post("/contact/add", [ContactController::class, "add"])->name('addcontact');

Route::get("/contact/delete/{id}", [ContactController::class, "delete"])->name('deletecontact');
Route::get("/contact/restore/{id}", [ContactController::class, "restore"])->name('restore');
Route::get("/contact/destroy/{id}", [ContactController::class, "destroy"])->name('contact.destroy');

Route::get("/project-details/{id}/{title}", [ProjectController::class, "projectDetails"])->name("projectdetails");



//user route

Route::get('/login', [App\Http\Controllers\admin\UserController::class, 'login'])->name('admin.login');
Route::post('/login/authenticate', [App\Http\Controllers\admin\UserController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/login/forgotpassword', [App\Http\Controllers\admin\UserController::class, 'forgotpassword'])->name('forgotpassword');

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Middleware\StatusMiddleware;

// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\admin\UserController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\admin\UserController::class, 'showResetForm'])->name('password.reset');
// Route::('password/reset/{token}', [App\Http\Controllers\admin\UserController::class, 'reset'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\admin\UserController::class, 'reset'])->name('password.update');




Route::middleware('auth')->group(function () {
    // ...
    Route::get("/contact/view", [ContactController::class, "view"])->name('viewcontact');
    Route::get("/contact/view/trash", [ContactController::class, "trashdata"])->name('contact.trash');

    // admin routes 

    Route::get('admin/slider', [\App\Http\Controllers\admin\SliderController::class, 'index'])->name('slider.index');
    Route::get('admin/slider/trashdata', [\App\Http\Controllers\admin\SliderController::class, 'trashdata'])->name('slider.trash');
    Route::get('admin/slider/create', [\App\Http\Controllers\admin\SliderController::class, 'create'])->name('slider.create');
    Route::post('admin/slider/store', [\App\Http\Controllers\admin\SliderController::class, 'store'])->name('slider.store');
    Route::get('admin/slider/edit/{slider}', [\App\Http\Controllers\admin\SliderController::class, 'edit'])->name('slider.edit');
    Route::put('admin/slider/update/{slider}', [\App\Http\Controllers\admin\SliderController::class, 'update'])->name('slider.update');
    Route::get('admin/slider/delete/{id}', [\App\Http\Controllers\admin\SliderController::class, 'delete'])->name('slider.delete');
    Route::get('admin/slider/restore/{id}', [\App\Http\Controllers\admin\SliderController::class, 'restore'])->name('slider.restore');
    Route::get('admin/slider/destroy/{id}', [\App\Http\Controllers\admin\SliderController::class, 'destroy'])->name('slider.destroy');

    Route::get('admin/topbar', [App\Http\Controllers\admin\TopbarController::class, 'index'])->name('topbar.index');
    Route::get('admin/topbar/edit/{topbar}', [App\Http\Controllers\admin\TopbarController::class, 'edit'])->name('topbar.edit');
    Route::put('admin/topbar/update/{topbar}', [App\Http\Controllers\admin\TopbarController::class, 'update'])->name('topbar.update');
    // Route::get('/topbar/delete/{id}', [App\Http\Controllers\admin\TopbarController::class, 'destroy'])->name('topbar.delete');

    Route::get('admin/project', [App\Http\Controllers\admin\ProjectController::class, 'index'])->name('project.index');
    Route::get('admin/project/trashdata', [App\Http\Controllers\admin\ProjectController::class, 'trashdata'])->name('project.trash');
    Route::get('admin/project/create', [App\Http\Controllers\admin\ProjectController::class, 'create'])->name('project.create');
    Route::post('admin/project/store', [App\Http\Controllers\admin\ProjectController::class, 'store'])->name('project.store');
    Route::get('admin/project/edit/{project}', [App\Http\Controllers\admin\ProjectController::class, 'edit'])->name('project.edit');
    Route::put('admin/project/update/{project}', [App\Http\Controllers\admin\ProjectController::class, 'update'])->name('project.update');
    Route::get('admin/project/delete/{id}', [App\Http\Controllers\admin\ProjectController::class, 'delete'])->name('project.delete');
    Route::get('admin/project/restore/{id}', [App\Http\Controllers\admin\ProjectController::class, 'restore'])->name('project.restore');
    Route::get('admin/project/destroy/{id}', [App\Http\Controllers\admin\ProjectController::class, 'destroy'])->name('project.destroy');

    Route::get('admin/project/show/all/{project}', [App\Http\Controllers\admin\ProjectController::class, 'show'])->name('project.show');


    Route::get('admin/sector/project/{projectid?}', [App\Http\Controllers\admin\SectormasterController::class, 'index'])->name('sector.index');
    Route::get('admin/sector/project/trashdata/{projectid?}', [App\Http\Controllers\admin\SectormasterController::class, 'trashdata'])->name('sector.trash');
    Route::get('admin/sector/create/{projectid}', [App\Http\Controllers\admin\SectormasterController::class, 'create'])->name('sector.create');
    Route::post('admin/sector/store', [App\Http\Controllers\admin\SectormasterController::class, 'store'])->name('sector.store');
    Route::get('admin/sector/edit/{sectormaster}', [App\Http\Controllers\admin\SectormasterController::class, 'edit'])->name('sector.edit');
    Route::put('admin/sector/update/{sectormaster}', [App\Http\Controllers\admin\SectormasterController::class, 'update'])->name('sector.update');
    Route::get('/sector/delete/{id}', [App\Http\Controllers\admin\SectormasterController::class, 'delete'])->name('sector.delete');
    Route::get('/sector/restore/{id}', [App\Http\Controllers\admin\SectormasterController::class, 'restore'])->name('sector.restore');
    Route::get('/sector/destroy/{id}', [App\Http\Controllers\admin\SectormasterController::class, 'destroy'])->name('sector.destroy');

    Route::get('admin/project-gallery/project/{projectid?}', [App\Http\Controllers\admin\ProjectgalleryController::class, 'index'])->name('progallery.index');
    Route::get('admin/project-gallery/project/trashdata/{projectid?}', [App\Http\Controllers\admin\ProjectgalleryController::class, 'trashdata'])->name('progallery.trash');
    Route::get('admin/project-gallery/create/{projectid}', [App\Http\Controllers\admin\ProjectgalleryController::class, 'create'])->name('progallery.create');
    Route::post('admin/project-gallery/store/{projectid}', [App\Http\Controllers\admin\ProjectgalleryController::class, 'store'])->name('progallery.store');
    Route::get('admin/project-gallery/{projectgallery}', [App\Http\Controllers\admin\ProjectgalleryController::class, 'edit'])->name('progallery.edit');
    Route::put('admin/project-gallery/{projectgallery}', [App\Http\Controllers\admin\ProjectgalleryController::class, 'update'])->name('progallery.update');
    Route::get('/project-gallery/delete/{id}', [App\Http\Controllers\admin\ProjectgalleryController::class, 'delete'])->name('progallery.delete');
    Route::get('/project-gallery/restore/{id}', [App\Http\Controllers\admin\ProjectgalleryController::class, 'restore'])->name('progallery.restore');
    Route::get('/project-gallery/destroy/{id}', [App\Http\Controllers\admin\ProjectgalleryController::class, 'destroy'])->name('progallery.destroy');

    Route::get('admin/plot-master/sector/{projectid?}', [App\Http\Controllers\admin\PlotmasterController::class, 'index'])->name('plot.index');
    Route::get('admin/plot-master/sector/trashdata/{projectid?}', [App\Http\Controllers\admin\PlotmasterController::class, 'trashdata'])->name('plot.trash');
    Route::get('admin/plot-master/sectorresold/resoldshow', [App\Http\Controllers\admin\PlotmasterController::class, 'resoldshow'])->name('plot.resoldshow');
    Route::get('admin/plot-master/sectorplotcreate/{sectormasterid}', [App\Http\Controllers\admin\PlotmasterController::class, 'sectorplot'])->name('sectorplot.create');
    Route::post('admin/plot-master/sectorplotcreate/{sectormasterid}', [App\Http\Controllers\admin\PlotmasterController::class, 'sectorplotstore'])->name('sectorplot.store');
    Route::get('admin/plot-master/create/{sectormasterid}', [App\Http\Controllers\admin\PlotmasterController::class, 'create'])->name('plot.create');
    Route::post('admin/plot-master/store', [App\Http\Controllers\admin\PlotmasterController::class, 'store'])->name('plot.store');
    Route::get('admin/plot-master/{plotmaster}', [App\Http\Controllers\admin\PlotmasterController::class, 'edit'])->name('plot.edit');
    Route::put('admin/plot-master/{plotmaster}', [App\Http\Controllers\admin\PlotmasterController::class, 'update'])->name('plot.update');
    Route::get('/plot-master/resold/{bookingid}', [App\Http\Controllers\admin\PlotmasterController::class, 'resold'])->name('plot.resold');

    Route::get('admin/booking/plotdetails/{id}', [App\Http\Controllers\admin\PlotmasterController::class, 'plotdetails'])->name('plotdetails');
    Route::get('/plot-master/delete/{id}', [App\Http\Controllers\admin\PlotmasterController::class, 'delete'])->name('plot.delete');
    Route::get('/plot-master/restore/{id}', [App\Http\Controllers\admin\PlotmasterController::class, 'restore'])->name('plot.restore');
    Route::get('/plot-master/force-delete/{id}', [App\Http\Controllers\admin\PlotmasterController::class, 'destroy'])->name('plot.destroy');


    Route::get('/logout', [App\Http\Controllers\admin\UserController::class, 'logout'])->name('admin.logout');

    Route::get('admin/dashboard', [App\Http\Controllers\admin\UserController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('admin/user', [App\Http\Controllers\admin\UserController::class, 'index'])->name('admin.user.index');
    Route::get('admin/user/trashdata', [App\Http\Controllers\admin\UserController::class, 'trashdata'])->name('admin.trash.index');
    Route::get('admin/user/adduser', [App\Http\Controllers\admin\UserController::class, 'adduser'])->name('admin.user.adduser');
    Route::post('admin/user/adduser', [App\Http\Controllers\admin\UserController::class, 'createuser'])->name('admin.user.adduserpost');
    Route::get('admin/user/edituser/{user}', [App\Http\Controllers\admin\UserController::class, 'edituser'])->name('admin.user.edituser');
    Route::get('admin/user/changepassword/{id}', [App\Http\Controllers\admin\UserController::class, 'changepassword'])->name('admin.user.changepassword');
    Route::post('admin/user/updatepassword/{id}', [App\Http\Controllers\admin\UserController::class, 'updatepassword'])->name('admin.user.updatepassword');
    Route::put('admin/user/updateuser/{user}', [App\Http\Controllers\admin\UserController::class, 'updateuser'])->name('admin.user.updateuser');
    Route::get('admin/user/agentcommision/{projectid}', [App\Http\Controllers\admin\UserController::class, 'agentcommission'])->name('agentcommission');
    Route::get('admin/user/editagentcommision/{id}', [App\Http\Controllers\admin\UserController::class, 'editagentcommission'])->name('agentcommission.edit');
    Route::put('admin/user/commissionupdate/{id}', [App\Http\Controllers\admin\UserController::class, 'commissionupdate'])->name('admin.user.commissionupdate');
    Route::get('admin/user/agentbookings', [App\Http\Controllers\admin\UserController::class, 'agentbookings'])->name('admin.user.agentbookings');
    // Route::get('admin/user/deleteuser/{id}', [App\Http\Controllers\admin\UserController::class, 'deleteuser'])->name('admin.user.deleteuser');
    Route::post('admin/user/update/agentcommission', [App\Http\Controllers\admin\AgentCommissionController::class, 'store'])->name('updatecommission');
    Route::put('admin/user/update/updateagentcommission', [App\Http\Controllers\admin\AgentCommissionController::class, 'update'])->name('updateagentcommission');
    Route::get('/users/delete/{id}', [App\Http\Controllers\admin\UserController::class, 'delete'])->name('users.delete');
    Route::get('/users/restore/{id}', [App\Http\Controllers\admin\UserController::class, 'restore'])->name('users.restore');
    Route::get('/users/force-delete/{id}', [App\Http\Controllers\admin\UserController::class, 'destroy'])->name('users.destroy');

    Route::get('admin/client/addclient', [ClientController::class, 'addclient'])->name('admin.user.addclient');
    Route::post('admin/client/store', [ClientController::class, 'store'])->name('store.client');
    Route::get('admin/client/viewclient', [ClientController::class, 'viewclient'])->name('admin.user.viewclient');
    Route::get('admin/client/editclient/{client}', [ClientController::class, 'editclient'])->name('admin.user.editclient');
    Route::put('admin/client/updateclient/{client}', [ClientController::class, 'updateclient'])->name('admin.user.updateclient');
    // Route::get('admin/client/delete/{client}', [ClientController::class, 'deleteclient'])->name('admin.user.deleteclient');
    Route::get('/admin/client/delete/{client}', [ClientController::class, 'delete'])->name('client.delete');
    //boooking Routes

    Route::get('admin/booking/viewbooking/{projectid}', [BookingController::class, 'viewbooking'])->name('admin.booking.viewbooking');
    Route::get('viewtrash/{projectid}', [BookingController::class, 'trashview'])->name('trashview');
    Route::get('admin/booking/officedetails/{id}', [BookingController::class, 'officedetails'])->name('officedetails');
    Route::get('admin/booking/pdf/{id}', [BookingController::class, 'pdf'])->name('pdf');
    Route::get('admin/booking/bookingpdf/{id}', [BookingController::class, 'bookingpdf'])->name('bookingpdf');
    Route::get('admin/booking/newbooking/{id}', [BookingController::class, 'newbooking'])->name('admin.booking.newbooking');
    Route::post('admin/booking/store', [BookingController::class, 'store'])->name('admin.booking.store');
    Route::get('admin/booking/edit/{booking}', [BookingController::class, 'edit'])->name('admin.booking.edit');
    Route::put('admin/booking/update/{booking}', [BookingController::class, 'update'])->name('admin.booking.update');
    Route::get('admin/booking/delete/{id}', [BookingController::class, 'delete'])->name('admin.booking.delete');
    Route::get('admin/booking/restore/{id}', [BookingController::class, 'restore'])->name('admin.booking.restore');
    Route::get('admin/booking/destroy/{id}', [BookingController::class, 'destroy'])->name('admin.booking.destroy');
    // aminities

    Route::get('admin/aminitie/project/{projectid?}', [\App\Http\Controllers\admin\AminitiController::class, 'index'])->name('aminiti.index');
    Route::get('admin/aminitie/project/trash/{projectid?}', [\App\Http\Controllers\admin\AminitiController::class, 'trashdata'])->name('aminiti.trash');
    Route::get('admin/aminitie/create/{projectid}', [\App\Http\Controllers\admin\AminitiController::class, 'create'])->name('aminiti.create');
    Route::post('admin/aminitie/store/{projectid}', [\App\Http\Controllers\admin\AminitiController::class, 'store'])->name('aminiti.store');
    Route::get('admin/aminitie/edit/{aminitie}', [\App\Http\Controllers\admin\AminitiController::class, 'edit'])->name('aminiti.edit');
    Route::put('admin/aminitie/update/{aminitie}', [\App\Http\Controllers\admin\AminitiController::class, 'update'])->name('aminiti.update');
    Route::get('admin/aminitie/delete/{id}', [\App\Http\Controllers\admin\AminitiController::class, 'delete'])->name('aminiti.delete');
    Route::get('admin/aminitie/restore/{id}', [\App\Http\Controllers\admin\AminitiController::class, 'restore'])->name('aminiti.restore');
    Route::get('admin/aminitie/destroy/{id}', [\App\Http\Controllers\admin\AminitiController::class, 'destroy'])->name('aminiti.destroy');
    //youtube slider routes

    Route::get('admin/youtube', [App\Http\Controllers\admin\Youtube_sliderController::class, 'index'])->name('youtube.index');
    Route::get('admin/youtube/trash', [App\Http\Controllers\admin\Youtube_sliderController::class, 'trashdata'])->name('youtube.trash');
    Route::get('admin/youtube/create', [App\Http\Controllers\admin\Youtube_sliderController::class, 'create'])->name('youtube.create');
    Route::post('admin/youtube/store', [App\Http\Controllers\admin\Youtube_sliderController::class, 'store'])->name('youtube.store');
    Route::get('admin/youtube/edit/{youtube}', [App\Http\Controllers\admin\Youtube_sliderController::class, 'edit'])->name('youtube.edit');
    Route::put('admin/youtube/update/{youtube}', [App\Http\Controllers\admin\Youtube_sliderController::class, 'update'])->name('youtube.update');
    Route::get('admin/youtube/delete/{id}', [App\Http\Controllers\admin\Youtube_sliderController::class, 'delete'])->name('youtube.delete');
    Route::get('admin/youtube/restore/{id}', [App\Http\Controllers\admin\Youtube_sliderController::class, 'restore'])->name('youtube.restore');
    Route::get('admin/youtube/destroy/{id}', [App\Http\Controllers\admin\Youtube_sliderController::class, 'destroy'])->name('youtube.destroy');

    //flipbook routes

    Route::get('admin/flipbook/project/{projectid?}', [\App\Http\Controllers\admin\FlipbookController::class, 'index'])->name('flipbook.index');
    Route::get('admin/flipbook/project/trash/{projectid?}', [\App\Http\Controllers\admin\FlipbookController::class, 'trashdata'])->name('flipbook.trash');
    Route::get('admin/flipbook/create/{projectid}', [\App\Http\Controllers\admin\FlipbookController::class, 'create'])->name('flipbook.create');
    Route::post('admin/flipbook/store/{projectid}', [\App\Http\Controllers\admin\FlipbookController::class, 'store'])->name('flipbook.store');
    Route::get('admin/flipbook/edit/{flipbook}', [\App\Http\Controllers\admin\FlipbookController::class, 'edit'])->name('flipbook.edit');
    Route::put('admin/flipbook/update/{flipbook}', [\App\Http\Controllers\admin\FlipbookController::class, 'update'])->name('flipbook.update');
    Route::get('admin/flipbook/delete/{id}', [\App\Http\Controllers\admin\FlipbookController::class, 'delete'])->name('flipbook.delete');
    Route::get('admin/flipbook/restore/{id}', [\App\Http\Controllers\admin\FlipbookController::class, 'restore'])->name('flipbook.restore');
    Route::get('admin/flipbook/destroy/{id}', [\App\Http\Controllers\admin\FlipbookController::class, 'destroy'])->name('flipbook.destroy');

    //bacground images routes

    Route::get('admin/backgroundimage', [\App\Http\Controllers\admin\BackgroundImageController::class, 'index'])->name('backgroundimage.index');
    Route::get('admin/backgroundimage/create', [\App\Http\Controllers\admin\BackgroundImageController::class, 'create'])->name('backgroundimage.create');
    Route::post('admin/backgroundimage/store', [\App\Http\Controllers\admin\BackgroundImageController::class, 'store'])->name('backgroundimage.store');
    Route::get('admin/backgroundimage/edit/{backgroundimage}', [\App\Http\Controllers\admin\BackgroundImageController::class, 'edit'])->name('backgroundimage.edit');
    Route::put('admin/backgroundimage/update/{backgroundimage}', [\App\Http\Controllers\admin\BackgroundImageController::class, 'update'])->name('backgroundimage.update');
    Route::get('admin/backgroundimage/delete/{id}', [\App\Http\Controllers\admin\BackgroundImageController::class, 'destroy'])->name('backgroundimage.delete');

    //bacground images routes

    Route::get('admin/aboutusimage', [\App\Http\Controllers\admin\AboutusImageController::class, 'index'])->name('aboutusimage.index');
    Route::get('admin/aboutusimage/create', [\App\Http\Controllers\admin\AboutusImageController::class, 'create'])->name('aboutusimage.create');
    Route::post('admin/aboutusimage/store', [\App\Http\Controllers\admin\AboutusImageController::class, 'store'])->name('aboutusimage.store');
    Route::get('admin/aboutusimage/edit/{aboutusimage}', [\App\Http\Controllers\admin\AboutusImageController::class, 'edit'])->name('aboutusimage.edit');
    Route::put('admin/aboutusimage/update/{aboutusimage}', [\App\Http\Controllers\admin\AboutusImageController::class, 'update'])->name('aboutusimage.update');
    Route::get('admin/aboutusimage/delete/{id}', [\App\Http\Controllers\admin\AboutusImageController::class, 'destroy'])->name('aboutusimage.delete');

    Route::get('admin/installment/{projectid}', [\App\Http\Controllers\admin\InstallmentController::class, 'index'])->name('installment.index');
    Route::get('admin/trashinstallmentdata/{projectid}', [\App\Http\Controllers\admin\InstallmentController::class, 'trashdata'])->name('installment.trashdata');
    Route::get('admin/installment/edit/{id}', [\App\Http\Controllers\admin\InstallmentController::class, 'edit'])->name('installment.edit');
    Route::get('admin/installment/viewmore/{id}', [\App\Http\Controllers\admin\InstallmentController::class, 'viewmore'])->name('installment.viewmore');
    Route::put('admin/installment/update/{id}', [\App\Http\Controllers\admin\InstallmentController::class, 'update'])->name('installment.update');
    Route::get('admin/installment/delete/{id}', [\App\Http\Controllers\admin\InstallmentController::class, 'delete'])->name('installment.delete');
    Route::get('admin/installment/restore/{id}', [\App\Http\Controllers\admin\InstallmentController::class, 'restore'])->name('installment.restore');
    Route::get('admin/installment/destroy/{id}', [\App\Http\Controllers\admin\InstallmentController::class, 'destroy'])->name('installment.destroy');

    Route::get('admin/report', [\App\Http\Controllers\admin\ReportController::class, 'index'])->name('report.index');
    Route::get('/filter-data', [\App\Http\Controllers\admin\ReportController::class, 'filterData'])->name('filter-data');

    Route::get('/layoutplan/{projectid}', [\App\Http\Controllers\admin\CoordinatesController::class, 'index'])->name('layout.index');
    Route::get('/admin/coordinates/show/{projectid}', [\App\Http\Controllers\admin\CoordinatesController::class, 'show'])->name('coordinate.show');
    Route::get('/admin/coordinates/showtrash/{projectid}', [\App\Http\Controllers\admin\CoordinatesController::class, 'showtrash'])->name('coordinate.trash');
    Route::get('/layoutplan/create/{projectid}', [\App\Http\Controllers\admin\CoordinatesController::class, 'create'])->name('coordinate.create');
    Route::post('/layoutplan/store/{projectid}', [\App\Http\Controllers\admin\CoordinatesController::class, 'store'])->name('coordinate.store');
    Route::get('/layoutplan/edit/{projectid}', [\App\Http\Controllers\admin\CoordinatesController::class, 'edit'])->name('coordinate.edit');
    Route::put('/layoutplan/update/{projectid}', [\App\Http\Controllers\admin\CoordinatesController::class, 'update'])->name('coordinate.update');
    Route::get('/layoutplan/delete/{id}', [\App\Http\Controllers\admin\CoordinatesController::class, 'delete'])->name('coordinate.delete');
    Route::get('/layoutplan/restore/{id}', [\App\Http\Controllers\admin\CoordinatesController::class, 'restore'])->name('coordinate.restore');
    Route::get('/layoutplan/destroy/{id}', [\App\Http\Controllers\admin\CoordinatesController::class, 'destroy'])->name('coordinate.destroy');

    // editor 
    Route::get('admin/editor/{projectid?}', [\App\Http\Controllers\admin\EditorController::class, 'index'])->name('editor.index');
    Route::get('admin/editor/create/{projectid}', [\App\Http\Controllers\admin\EditorController::class, 'create'])->name('editor.create');
    Route::post('admin/editor/store/{projectid}', [\App\Http\Controllers\admin\EditorController::class, 'store'])->name('editor.store');
    Route::get('admin/editor/edit/{editor}', [\App\Http\Controllers\admin\EditorController::class, 'edit'])->name('editor.edit');
    Route::put('admin/editor/update/{editor}', [\App\Http\Controllers\admin\EditorController::class, 'update'])->name('editor.update');

    // company details
    Route::get('admin/company/{projectid?}', [\App\Http\Controllers\admin\CompanydetailController::class, 'index'])->name('company.index');
    Route::get('admin/company/trashdata/{projectid?}', [\App\Http\Controllers\admin\CompanydetailController::class, 'trashdata'])->name('company.trash');
    Route::get('admin/company/create/{projectid}', [\App\Http\Controllers\admin\CompanydetailController::class, 'create'])->name('company.create');
    Route::post('admin/company/companystore/{projectid}', [\App\Http\Controllers\admin\CompanydetailController::class, 'store'])->name('company.store');
    Route::get('admin/company/edit/{companydetail}', [\App\Http\Controllers\admin\CompanydetailController::class, 'edit'])->name('company.edit');
    Route::put('admin/company/update/{companydetail}', [\App\Http\Controllers\admin\CompanydetailController::class, 'update'])->name('company.update');
    Route::get('admin/company/delete/{id}', [\App\Http\Controllers\admin\CompanydetailController::class, 'delete'])->name('company.delete');
    Route::get('admin/company/restore/{id}', [\App\Http\Controllers\admin\CompanydetailController::class, 'restore'])->name('company.restore');
    Route::get('admin/company/destroy/{id}', [\App\Http\Controllers\admin\CompanydetailController::class, 'destroy'])->name('company.destroy');
});
//client Routes
