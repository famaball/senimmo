<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Agence::class, static function (Faker\Generator $faker) {
    return [
        'nom' => $faker->sentence,
        'adresse' => $faker->sentence,
        'telephone' => $faker->sentence,
        'email' => $faker->email,
        'email_verified_at' => $faker->dateTime,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Profile::class, static function (Faker\Generator $faker) {
    return [
        'nom' => $faker->sentence,
        'description' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'email_verified_at' => $faker->dateTime,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Reservation::class, static function (Faker\Generator $faker) {
    return [
        'date' => $faker->dateTime,
        'etat' => $faker->sentence,
        'description' => $faker->sentence,
        'prenom' => $faker->sentence,
        'nom' => $faker->sentence,
        'telephone' => $faker->sentence,
        'email' => $faker->email,
        'adresse' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Bien::class, static function (Faker\Generator $faker) {
    return [
        'libelle' => $faker->sentence,
        'adresse' => $faker->sentence,
        'prix' => $faker->sentence,
        'type' => $faker->sentence,
        'surface' => $faker->sentence,
        'description' => $faker->sentence,
        'image' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TypeBien::class, static function (Faker\Generator $faker) {
    return [
        'nom' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\StatutBien::class, static function (Faker\Generator $faker) {
    return [
        'designation' => $faker->sentence,
        'description' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EtatBien::class, static function (Faker\Generator $faker) {
    return [
        'designation' => $faker->sentence,
        'description' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Localite::class, static function (Faker\Generator $faker) {
    return [
        'nom' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Contact::class, static function (Faker\Generator $faker) {
    return [
        'nom' => $faker->sentence,
        'prenom' => $faker->sentence,
        'email' => $faker->email,
        'telephone' => $faker->sentence,
        'localite' => $faker->sentence,
        'sexe' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TypeContact::class, static function (Faker\Generator $faker) {
    return [
        'libelle' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Campagne::class, static function (Faker\Generator $faker) {
    return [
        'nom' => $faker->sentence,
        'sujet' => $faker->sentence,
        'contenu' => $faker->sentence,
        'nom_emetteur' => $faker->sentence,
        'email_emetteur' => $faker->sentence,
        'send_to_all' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TypeCampagne::class, static function (Faker\Generator $faker) {
    return [
        'description' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\StatutCampagne::class, static function (Faker\Generator $faker) {
    return [
        'description' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Ciblage::class, static function (Faker\Generator $faker) {
    return [
        'designation' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ReservationBien::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'id_users' => $faker->randomNumber(5),
        'id_bien' => $faker->randomNumber(5),
        'id_reservation' => $faker->randomNumber(5),
        'date_reservation' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, static function (Faker\Generator $faker) {
    return [
        'age' => $faker->randomNumber(5),
        'nom' => $faker->sentence,
        'prenom' => $faker->sentence,
        'email' => $faker->email,
        'email_verified_at' => $faker->dateTime,
        'mot_de_passe' => $faker->sentence,
        'remember_token' => null,
        'telephone' => $faker->sentence,
        'id_profile' => $faker->randomNumber(5),
        'id_agence' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ContactCampagne::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'id_type_contact' => $faker->randomNumber(5),
        'id_campagne' => $faker->randomNumber(5),
        'id_contact' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CiblageCampagne::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'id_ciblage' => $faker->randomNumber(5),
        'id_campagne' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Bien::class, static function (Faker\Generator $faker) {
    return [
        'libelle' => $faker->sentence,
        'adresse' => $faker->sentence,
        'prix' => $faker->sentence,
        'type' => $faker->sentence,
        'surface' => $faker->sentence,
        'description' => $faker->sentence,
        'image' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'id_user' => $faker->randomNumber(5),
        'id_agence' => $faker->randomNumber(5),
        'id_type_bien' => $faker->randomNumber(5),
        'id_statut_bien' => $faker->randomNumber(5),
        'id_etat_bien' => $faker->randomNumber(5),
        'id_localite' => $faker->randomNumber(5),
        
        
    ];
});
