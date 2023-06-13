<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDS\AccessRoles;
use App\Http\Controllers\CRUDS\ComController;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\CRUDS\userController;
use App\Http\Controllers\CRUDS\AvoirController;
use App\Http\Controllers\CRUDS\CarteController;
use App\Http\Controllers\CRUDS\GradeController;
use App\Http\Controllers\CRUDS\TenueController;
use App\Http\Controllers\CRUDS\AccessPermission;
use App\Http\Controllers\CRUDS\StatutController;
use App\Http\Controllers\CRUDS\InconnuController;
use App\Http\Controllers\CRUDS\SectionController;
use App\Http\Controllers\CRUDS\ArmementController;
use App\Http\Controllers\CRUDS\LieuStockController;
use App\Http\Controllers\CRUDS\MaterielController;
use App\Http\Controllers\CRUDS\MuniAffController;
use App\Http\Controllers\CRUDS\MunitionController;
use App\Http\Controllers\CRUDS\VehiculeController;
use App\Http\Controllers\CRUDS\ResidenceController;
use App\Http\Controllers\CRUDS\TenueAffController;
use App\Http\Controllers\CRUDS\VoitAffecteController;
use App\Http\Controllers\UserCompte\UserProfilSecurity;
use App\Http\Controllers\laravel_example\UserManagement;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\UserCompte\UserProfilView;
use App\Http\Middleware\ActiveMiddleware;


//Route de redirection quand le mdp est 123456
// Route::middleware(['Mot_passe:123456'])->group(function () {
// });


// Route pour les visiteurs
Route::get('/Accueil', function () {
        return ("Bonjour");
})->name('Accueil');


// laravel example
Route::get('/laravel/user-management', [UserManagement::class, 'UserManagement'])->name('laravel-example-user-management');
Route::resource('/user-list', UserManagement::class);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'], [testOk::class])->group(function () {

  //Gestion du compte
  Route::get('/Compte/Paramètre/Gestion',[AccountSettingsAccount::class, 'index'])->name('compte-user-modify');
  // Route pour le profil du user
  Route::get('/Compte/Profil', [UserProfilView::class, 'index'])->name('compte-profil-user-view');
  //Routes pour l'acces au compte du user
  Route::get('/Compte/Paramètre/Sécurité', [UserProfilSecurity::class, 'index'])->name('compte-user-settings-security');



  Route::middleware([ActiveMiddleware::class])->group(function () {

    // Pour le modify des donnees du User par lui mm
    Route::put('/Compte/Paramètre/Gestion/{id}', [AccountSettingsAccount::class, 'updateUser'])->name('cpgUpdate');


    // Debut des routes uniquement dedies au role : Informaticien

      //Pour le crud du role
      Route::get('/access-roles', [AccessRoles::class, 'index'])->name('app-access-roles')
              ->middleware('role:Informaticien');
      Route::resource('/role', AccessRoles::class)
              ->middleware('role:Informaticien');

      //Pour le crud de la permission
      Route::get('/access-permission', [AccessPermission::class, 'index'])->name('app-access-permission')
              ->middleware('role:Informaticien');
      Route::resource('/permission', AccessPermission::class)
              ->middleware('role:Informaticien');

    //Fin


    // Debut des routes dedies a l'Informaticien et a l'Administrateur

      // Routes pour le crud du commissariat
      Route::get('/Commissariat', [ComController::class, 'ComView'])->name('comm-view')
              ->middleware('role:Informaticien|Administrateur');
      Route::resource('/Commiss', ComController::class)
              ->middleware('role:Informaticien|Administrateur');

      //Routes pour crud du section
      Route::resource('/Sect', SectionController::class)
              ->middleware('role:Informaticien|Administrateur');

      //Routes pour crud du grade
      Route::get('/Grade', [GradeController::class, 'GradeView'])->name('grade-view')
              ->middleware('role:Informaticien|Administrateur');
      Route::resource('/Grade', GradeController::class)
              ->middleware('role:Informaticien|Administrateur');

      //Route pour vehicule
      Route::get('/vehicule', [VehiculeController::class, 'VehiView'])->name('logistique-vehi-view')
              ->middleware('role:Informaticien|Administrateur');
      Route::resource('/vehi', VehiculeController::class)
              ->middleware('role:Informaticien|Administrateur');

      // Route pour armement
      Route::resource('/Arme', ArmementController::class)
              ->middleware('role:Informaticien|Administrateur');

      // Route pour les tenues
      Route::resource('/Tenue', TenueController::class)
              ->middleware('role:Informaticien|Administrateur');

      // Route pour les minutions
      Route::resource('/Muni', MunitionController::class)
              ->middleware('role:Informaticien|Administrateur');

      // Route pour le crud du user
      Route::resource('/Mbr', userController::class)
              ->middleware('role:Informaticien|Administrateur');

    // Fin


    // Debut des routes dedies a l'Informaticien, a l'Administrateur et au Commissaire

      // Attribuer un role a un membre
      Route::post('/access-roles-user', [AccessRoles::class, 'roleUser'])->name('roles-user')
              ->middleware('role:Informaticien|Administrateur|Commissaire');

    // Fin


    // Debut des routes dedies a l'Informaticien, a l'Administrateur, au Commissaire et au Commissaire Adjoint

      // Tableau de board
      Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

      //Route pour Armement
      Route::get('/Armement', [ArmementController::class, 'ArmeView'])->name('logistique-arme-view')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

      //Route pour tenue
      Route::get('/Tenue', [TenueController::class, 'TenueView'])->name('logistique-tenue-view')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

      //Route pour Munition
      Route::get('/Munition', [MunitionController::class, 'MuniView'])->name('logistique-muni-view')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

      // Route pour la section
      Route::get('/Section', [SectionController::class, 'SectView'])->name('sect-view')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

      //routes pour la vue du user
      Route::get('/Membre', [userController::class, 'index'])->name('user-view')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

      // Route pour la dmde d'affectation
      Route::post('/Compte/Profil', [UserProfilView::class, 'affectationUser'])->name('user_affect')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');


      // Madouba, après tu m'expliques tes routes là

      //Route pour statut
      Route::get('/Statut', [StatutController::class, 'StatutView'])->name('statut-view')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');
      Route::resource('/Statut', StatutController::class)
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

      //Route pour Avoir
      Route::get('/Avoir', [AvoirController::class, 'AvoirView'])->name('avoir-view')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');
      Route::resource('/Avoir', AvoirController::class)
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

      //Route pour voiture affecter
      Route::get('/voitaffecte', [VoitAffecteController::class, 'voitView'])->name('voit')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');
      Route::resource('/voitaffecte', VoitAffecteController::class)
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

      //Route pour Tenueaff
      Route::get('/tenueaff', [TenueAffController::class, 'TenueAff'])->name('tenueaff')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');
      Route::resource('/tenueaff', TenueAffController::class)
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

      // Route pour munition affecter
      Route::get('/muniaff', [MuniAffController::class, 'index'])->name('muniaff')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');
      Route::resource('/muniaff', MuniAffController::class)
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

      //Routes pour le crud Inconnu
      Route::get('/Inconnu', [InconnuController::class, 'IncoView'])->name('inco-view')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

      Route::resource('/Inco', InconnuController::class)
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

    //Routes pour crud du residence
    Route::get('/Residence', [ResidenceController::class, 'ResiView'])->name('resi-view');
    Route::resource('/Resi', ResidenceController::class);
    Route::get('/residencePDF/{id}', [ResidenceController::class, 'PDF'])->name('residencePDF');

      //Lieu de stockage
      Route::get('/lieu/stockage', [LieuStockController::class, 'index'])->name('logistique-lieustock')
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');
      Route::resource('/lieustock', LieuStockController::class)
              ->middleware('role:Informaticien|Administrateur|Commissaire|Commissaire Adjoint');

    // Fin



  });


});

