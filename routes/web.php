<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agence\BienController;


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


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('agences')->name('agences/')->group(static function() {
            Route::get('/',                                             'AgenceController@index')->name('index');
            Route::get('/create',                                       'AgenceController@create')->name('create');
            Route::post('/',                                            'AgenceController@store')->name('store');
            Route::get('/{agence}/edit',                                'AgenceController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AgenceController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{agence}',                                    'AgenceController@update')->name('update');
            Route::delete('/{agence}',                                  'AgenceController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('profiles')->name('profiles/')->group(static function() {
            Route::get('/',                                             'ProfileController@index')->name('index');
            Route::get('/create',                                       'ProfileController@create')->name('create');
            Route::post('/',                                            'ProfileController@store')->name('store');
            Route::get('/{profile}/edit',                               'ProfileController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProfileController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{profile}',                                   'ProfileController@update')->name('update');
            Route::delete('/{profile}',                                 'ProfileController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('users')->name('users/')->group(static function() {
            Route::get('/',                                             'UsersController@index')->name('index');
            Route::get('/create',                                       'UsersController@create')->name('create');
            Route::post('/',                                            'UsersController@store')->name('store');
            Route::get('/{user}/edit',                                  'UsersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UsersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{user}',                                      'UsersController@update')->name('update');
            Route::delete('/{user}',                                    'UsersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('reservations')->name('reservations/')->group(static function() {
            Route::get('/',                                             'ReservationController@index')->name('index');
            Route::get('/create',                                       'ReservationController@create')->name('create');
            Route::post('/',                                            'ReservationController@store')->name('store');
            Route::get('/{reservation}/edit',                           'ReservationController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ReservationController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{reservation}',                               'ReservationController@update')->name('update');
            Route::delete('/{reservation}',                             'ReservationController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('biens')->name('biens/')->group(static function() {
            Route::get('/',                                             'BienController@index')->name('index');
            Route::get('/create',                                       'BienController@create')->name('create');
            Route::post('/',                                            'BienController@store')->name('store');
            Route::get('/{bien}/edit',                                  'BienController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BienController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{bien}',                                      'BienController@update')->name('update');
            Route::delete('/{bien}',                                    'BienController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('type-biens')->name('type-biens/')->group(static function() {
            Route::get('/',                                             'TypeBienController@index')->name('index');
            Route::get('/create',                                       'TypeBienController@create')->name('create');
            Route::post('/',                                            'TypeBienController@store')->name('store');
            Route::get('/{typeBien}/edit',                              'TypeBienController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TypeBienController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{typeBien}',                                  'TypeBienController@update')->name('update');
            Route::delete('/{typeBien}',                                'TypeBienController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('statut-biens')->name('statut-biens/')->group(static function() {
            Route::get('/',                                             'StatutBienController@index')->name('index');
            Route::get('/create',                                       'StatutBienController@create')->name('create');
            Route::post('/',                                            'StatutBienController@store')->name('store');
            Route::get('/{statutBien}/edit',                            'StatutBienController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StatutBienController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{statutBien}',                                'StatutBienController@update')->name('update');
            Route::delete('/{statutBien}',                              'StatutBienController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('etat-biens')->name('etat-biens/')->group(static function() {
            Route::get('/',                                             'EtatBienController@index')->name('index');
            Route::get('/create',                                       'EtatBienController@create')->name('create');
            Route::post('/',                                            'EtatBienController@store')->name('store');
            Route::get('/{etatBien}/edit',                              'EtatBienController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EtatBienController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{etatBien}',                                  'EtatBienController@update')->name('update');
            Route::delete('/{etatBien}',                                'EtatBienController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('localites')->name('localites/')->group(static function() {
            Route::get('/',                                             'LocaliteController@index')->name('index');
            Route::get('/create',                                       'LocaliteController@create')->name('create');
            Route::post('/',                                            'LocaliteController@store')->name('store');
            Route::get('/{localite}/edit',                              'LocaliteController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LocaliteController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{localite}',                                  'LocaliteController@update')->name('update');
            Route::delete('/{localite}',                                'LocaliteController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('contacts')->name('contacts/')->group(static function() {
            Route::get('/',                                             'ContactController@index')->name('index');
            Route::get('/create',                                       'ContactController@create')->name('create');
            Route::post('/',                                            'ContactController@store')->name('store');
            Route::get('/{contact}/edit',                               'ContactController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ContactController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{contact}',                                   'ContactController@update')->name('update');
            Route::delete('/{contact}',                                 'ContactController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('type-contacts')->name('type-contacts/')->group(static function() {
            Route::get('/',                                             'TypeContactController@index')->name('index');
            Route::get('/create',                                       'TypeContactController@create')->name('create');
            Route::post('/',                                            'TypeContactController@store')->name('store');
            Route::get('/{typeContact}/edit',                           'TypeContactController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TypeContactController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{typeContact}',                               'TypeContactController@update')->name('update');
            Route::delete('/{typeContact}',                             'TypeContactController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('campagnes')->name('campagnes/')->group(static function() {
            Route::get('/',                                             'CampagneController@index')->name('index');
            Route::get('/create',                                       'CampagneController@create')->name('create');
            Route::post('/',                                            'CampagneController@store')->name('store');
            Route::get('/{campagne}/edit',                              'CampagneController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CampagneController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{campagne}',                                  'CampagneController@update')->name('update');
            Route::delete('/{campagne}',                                'CampagneController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('type-campagnes')->name('type-campagnes/')->group(static function() {
            Route::get('/',                                             'TypeCampagneController@index')->name('index');
            Route::get('/create',                                       'TypeCampagneController@create')->name('create');
            Route::post('/',                                            'TypeCampagneController@store')->name('store');
            Route::get('/{typeCampagne}/edit',                          'TypeCampagneController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TypeCampagneController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{typeCampagne}',                              'TypeCampagneController@update')->name('update');
            Route::delete('/{typeCampagne}',                            'TypeCampagneController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('statut-campagnes')->name('statut-campagnes/')->group(static function() {
            Route::get('/',                                             'StatutCampagneController@index')->name('index');
            Route::get('/create',                                       'StatutCampagneController@create')->name('create');
            Route::post('/',                                            'StatutCampagneController@store')->name('store');
            Route::get('/{statutCampagne}/edit',                        'StatutCampagneController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StatutCampagneController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{statutCampagne}',                            'StatutCampagneController@update')->name('update');
            Route::delete('/{statutCampagne}',                          'StatutCampagneController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('ciblages')->name('ciblages/')->group(static function() {
            Route::get('/',                                             'CiblageController@index')->name('index');
            Route::get('/create',                                       'CiblageController@create')->name('create');
            Route::post('/',                                            'CiblageController@store')->name('store');
            Route::get('/{ciblage}/edit',                               'CiblageController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CiblageController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ciblage}',                                   'CiblageController@update')->name('update');
            Route::delete('/{ciblage}',                                 'CiblageController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('reservation-biens')->name('reservation-biens/')->group(static function() {
            Route::get('/',                                             'ReservationBienController@index')->name('index');
            Route::get('/create',                                       'ReservationBienController@create')->name('create');
            Route::post('/',                                            'ReservationBienController@store')->name('store');
            Route::get('/{reservationBien}/edit',                       'ReservationBienController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ReservationBienController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{reservationBien}',                           'ReservationBienController@update')->name('update');
            Route::delete('/{reservationBien}',                         'ReservationBienController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('contact-campagnes')->name('contact-campagnes/')->group(static function() {
            Route::get('/',                                             'ContactCampagneController@index')->name('index');
            Route::get('/create',                                       'ContactCampagneController@create')->name('create');
            Route::post('/',                                            'ContactCampagneController@store')->name('store');
            Route::get('/{contactCampagne}/edit',                       'ContactCampagneController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ContactCampagneController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{contactCampagne}',                           'ContactCampagneController@update')->name('update');
            Route::delete('/{contactCampagne}',                         'ContactCampagneController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('ciblage-campagnes')->name('ciblage-campagnes/')->group(static function() {
            Route::get('/',                                             'CiblageCampagneController@index')->name('index');
            Route::get('/create',                                       'CiblageCampagneController@create')->name('create');
            Route::post('/',                                            'CiblageCampagneController@store')->name('store');
            Route::get('/{ciblageCampagne}/edit',                       'CiblageCampagneController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CiblageCampagneController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ciblageCampagne}',                           'CiblageCampagneController@update')->name('update');
            Route::delete('/{ciblageCampagne}',                         'CiblageCampagneController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('roles')->name('roles/')->group(static function() {
            Route::get('/',                                             'RolesController@index')->name('index');
            Route::get('/create',                                       'RolesController@create')->name('create');
            Route::post('/',                                            'RolesController@store')->name('store');
            Route::get('/{role}/edit',                                  'RolesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RolesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{role}',                                      'RolesController@update')->name('update');
            Route::delete('/{role}',                                    'RolesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('permissions')->name('permissions/')->group(static function() {
            Route::get('/',                                             'PermissionsController@index')->name('index');
            Route::get('/create',                                       'PermissionsController@create')->name('create');
            Route::post('/',                                            'PermissionsController@store')->name('store');
            Route::get('/{permission}/edit',                            'PermissionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PermissionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{permission}',                                'PermissionsController@update')->name('update');
            Route::delete('/{permission}',                              'PermissionsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('roles-has-permissions')->name('roles-has-permissions/')->group(static function() {
            Route::get('/',                                             'RolesHasPermissionsController@index')->name('index');
            Route::get('/create',                                       'RolesHasPermissionsController@create')->name('create');
            Route::post('/',                                            'RolesHasPermissionsController@store')->name('store');
            Route::get('/{rolesHasPermission}/edit',                    'RolesHasPermissionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RolesHasPermissionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{rolesHasPermission}',                        'RolesHasPermissionsController@update')->name('update');
            Route::delete('/{rolesHasPermission}',                      'RolesHasPermissionsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('role-has-permissions')->name('role-has-permissions/')->group(static function() {
            Route::get('/',                                             'RoleHasPermissionsController@index')->name('index');
            Route::get('/create',                                       'RoleHasPermissionsController@create')->name('create');
            Route::post('/',                                            'RoleHasPermissionsController@store')->name('store');
            Route::get('/{roleHasPermission}/edit',                     'RoleHasPermissionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RoleHasPermissionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{roleHasPermission}',                         'RoleHasPermissionsController@update')->name('update');
            Route::delete('/{roleHasPermission}',                       'RoleHasPermissionsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('typebiens')->name('typebiens/')->group(static function() {
            Route::get('/',                                             'TypebienController@index')->name('index');
            Route::get('/create',                                       'TypebienController@create')->name('create');
            Route::post('/',                                            'TypebienController@store')->name('store');
            Route::get('/{typebien}/edit',                              'TypebienController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TypebienController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{typebien}',                                  'TypebienController@update')->name('update');
            Route::delete('/{typebien}',                                'TypebienController@destroy')->name('destroy');
        });
    });
});
Route::post('logged_in', [LoginController::class, 'authenticate']);


Route::get('form', [LoginController::class, 'create']);




/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('logins')->name('logins/')->group(static function() {
            Route::get('/',                                             'LoginController@index')->name('index');
            Route::get('/create',                                       'LoginController@create')->name('create');
            Route::post('/',                                            'LoginController@store')->name('store');
            Route::get('/{login}/edit',                                 'LoginController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LoginController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{login}',                                     'LoginController@update')->name('update');
            Route::delete('/{login}',                                   'LoginController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {

    Route::prefix('agence')->namespace('App\Http\Controllers\Agence')->name('agence/')->group(static function() {
        Route::prefix('biens')->name('biens/')->group(static function() {
            Route::get('/',                                             'BienController@index')->name('index');
            Route::get('/create',                                       'BienController@create')->name('create');
            Route::post('/',                                            'BienController@store')->name('store');
            Route::get('/{bien}/edit',                                  'BienController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BienController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{bien}',                                      'BienController@update')->name('update');
            Route::delete('/{bien}',                                    'BienController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
// Route::middleware()->group(static function () {
//     Route::prefix('agence')->namespace('App\Http\Controllers\Agence')->name('agence/')->group(static function() {
//         Route::prefix('type-biens')->name('type-biens/')->group(static function() {
//             Route::get('/',                                             'TypeBienController@index')->name('index');
//             Route::get('/create',                                       'TypeBienController@create')->name('create');
//             Route::post('/',                                            'TypeBienController@store')->name('store');
//             Route::get('/{typeBien}/edit',                              'TypeBienController@edit')->name('edit');
//             Route::post('/bulk-destroy',                                'TypeBienController@bulkDestroy')->name('bulk-destroy');
//             Route::post('/{typeBien}',                                  'TypeBienController@update')->name('update');
//             Route::delete('/{typeBien}',                                'TypeBienController@destroy')->name('destroy');
//         });
//     });
// });

Route::prefix('agence')->group(function () {
Route::get("biens",'BienController@index')->name('index');
Route::get('bien', [Agence\BienController::class, 'index'])->name('index1');

});


