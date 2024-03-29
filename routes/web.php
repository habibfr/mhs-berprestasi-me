<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KaryaTulisController;
use App\Http\Controllers\KlasifikasiKaryaTulisController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\RankingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;

use App\Http\Controllers\MahasiswaController;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

// authentication
Route::get('/login', [LoginBasic::class, 'index'])->name('login');
Route::post('/login-proses', [LoginBasic::class, 'proses_login'])->name('login.proses');
Route::get('/register', [RegisterBasic::class, 'index'])->name('register');
Route::get('/forgot-password', [ForgotPasswordBasic::class, 'index'])->name('forgot.password');


// Route::group(
//   ['prefix' => "member", 'as' => 'member.', "middleware" => ['auth:sanctum', 'verified']],
//   function () {

Route::group(['prefix' => 'admin', 'as' => '', 'middleware' => 'auth'], function(){
  // Main Page Route
  Route::get('/dashboard', [Analytics::class, 'index'])->name('dashboard');
  Route::get('/dashboard/kriteria', [Analytics::class, 'kriteriaDashboard'])->name('kriteria_dashboard');

  // logout
  Route::get('/logout', [LoginBasic::class, 'logout'])->name('logout');

  


  // Route for Mahasiswa
  Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');

  // import data for mahasiswa
  Route::post('/mahasiswa/import', [MahasiswaController::class, 'importData'])->name('mahasiswa.import');

  // Filter Mahasiswa
  Route::get('/mahasiswa/filter', [MahasiswaController::class, 'filter'])->name('mahasiswa.filter');

  // get mahasiswa by id
  Route::get('/mahasiswa/get-mahasiswa/{id}', [MahasiswaController::class, 'getMahasiswaById']);

  // update mahasiswa by id
  Route::post('/mahasiswa/update-mahasiswa/{id}', [MahasiswaController::class, 'updateMahasiswa']);

  // hapus mahasiswa by id
  Route::post('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy']);



  // Route for Nilai
  Route::get('/nilais/nilai', [NilaiController::class, 'index'])->name('nilais-nilai');
  
  // get nilai by id
  Route::get('/nilai/get-nilai/{id}', [NilaiController::class, 'getNilaiByMhsId']);
  
  
  // update nilai by id
  Route::post('/nilai/update-nilai/{id}', [NilaiController::class, 'updateNilai']);
  
  // nilai karya tulis
  Route::get('/nilais/nilai-karya-tulis', [KaryaTulisController::class, 'nilai_karya_tulis'])->name('nilais-nilai-karya-tulis');
  // get nilai karya tulis by id
  Route::get('/nilai/get-nilai-karya-tulis/{id}', [KaryaTulisController::class, 'getNilaiKaryaTulisById']);

  // update 
  // update nilai karya tulis by id
  Route::post('/nilai/update-nilai-karya-tulis/{id}', [KaryaTulisController::class, 'updateNilaiKaryaTulis']);

  
  // hapus kt by id
  Route::post('/nilai/nilai-karya-tulis/delete/{id}', [KaryaTulisController::class, 'destroy']);


  // Route for Peringkat
  // Route::get('/peringkat', [RankingController::class, 'prosesHitung'])->name('peringkat');
  // Route::get('/peringkat', function () {
  //     return view('content.peringkat.index');
  // })
  //         ->name('peringkat');

  // Route for Kriteria
  Route::get('/kriterias/kriteria', [KriteriaController::class, 'index'])->name('kriterias-kriteria');

  // tambah kriteria
  Route::post('/kriteria/tambah-kriteria', [KriteriaController::class, 'tambahKriteria'])->name('kriterias.tambah');

  // hapus kriteria
  Route::post('/kriteria/delete/{id}', [KriteriaController::class, 'destroy']);
  
  // get kriteria by id
  Route::get('/kriteria/get-kriteria/{id}', [KriteriaController::class, 'getKriteriaById']);
  
  // update kriteria by id
  Route::post('/kriteria/update-kriteria/{id}', [KriteriaController::class, 'updateKriteria']);
  

  // klasifikasi karya tulis
  Route::get('/kriterias/klasifikasi-karya-tulis', [KlasifikasiKaryaTulisController::class, 'klasifikasi_karya_tulis'])->name('kriterias-klasifikasi-karya-tulis');
  // get klasifikasi by id
  Route::get('/kriterias/get-klasifikasi/{id}', [KlasifikasiKaryaTulisController::class, 'getKlasifikasiById']);
  // update klasfikasi by id
  Route::post('/kriterias/update-klasifikasi/{id}', [KlasifikasiKaryaTulisController::class, 'updateKlasifikasi']);

  // Route for Ranking
  Route::get('/ranking', [RankingController::class, 'index'])->name('ranking');

  Route::get('/ranking/hitung/{periode}', [RankingController::class, 'prosesHitung']);


  //  Route for Peringkat
  // Route::get('/about', [RankingController::class, 'prosesHitung'])->name('peringkat');
  Route::get('/about', [MiscUnderMaintenance::class, 'index'])->name('under-maintenance');
});


Route::get('/test', function(){
  return view('test');
});


  // layout
  Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
  Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
  Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
  Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
  Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');


  // pages
  Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
  Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
  Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
  Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
  Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');


  // cards
  Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

  // User Interface
  Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
  Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
  Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
  Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
  Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
  Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
  Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
  Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
  Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
  Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
  Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
  Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
  Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
  Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
  Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
  Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
  Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
  Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
  Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

  // extended ui
  Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
  Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

  // icons
  Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

  // form elements
  Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
  Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

  // form layouts
  Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
  Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

  // tables
  Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');
