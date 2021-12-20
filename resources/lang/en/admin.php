<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'agence' => [
        'title' => 'Agence',

        'actions' => [
            'index' => 'Agence',
            'create' => 'New Agence',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            'adresse' => 'Adresse',
            'telephone' => 'Telephone',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            
        ],
    ],

    'profile' => [
        'title' => 'Profile',

        'actions' => [
            'index' => 'Profile',
            'create' => 'New Profile',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            'description' => 'Description',
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'password' => 'Password',
            
        ],
    ],

    'reservation' => [
        'title' => 'Reservation',

        'actions' => [
            'index' => 'Reservation',
            'create' => 'New Reservation',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'date' => 'Date',
            'etat' => 'Etat',
            'description' => 'Description',
            'prenom' => 'Prenom',
            'nom' => 'Nom',
            'telephone' => 'Telephone',
            'email' => 'Email',
            'adresse' => 'Adresse',
            
        ],
    ],

    'bien' => [
        'title' => 'Bien',

        'actions' => [
            'index' => 'Bien',
            'create' => 'New Bien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'libelle' => 'Libelle',
            'adresse' => 'Adresse',
            'prix' => 'Prix',
            'type' => 'Type',
            'surface' => 'Surface',
            'description' => 'Description',
            'image' => 'Image',
            
        ],
    ],

    'type-bien' => [
        'title' => 'Type Bien',

        'actions' => [
            'index' => 'Type Bien',
            'create' => 'New Type Bien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            
        ],
    ],

    'statut-bien' => [
        'title' => 'Statut Bien',

        'actions' => [
            'index' => 'Statut Bien',
            'create' => 'New Statut Bien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'designation' => 'Designation',
            'description' => 'Description',
            
        ],
    ],

    'etat-bien' => [
        'title' => 'Etat Bien',

        'actions' => [
            'index' => 'Etat Bien',
            'create' => 'New Etat Bien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'designation' => 'Designation',
            'description' => 'Description',
            
        ],
    ],

    'localite' => [
        'title' => 'Localite',

        'actions' => [
            'index' => 'Localite',
            'create' => 'New Localite',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            
        ],
    ],

    'contact' => [
        'title' => 'Contact',

        'actions' => [
            'index' => 'Contact',
            'create' => 'New Contact',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            'prenom' => 'Prenom',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'localite' => 'Localite',
            'sexe' => 'Sexe',
            
        ],
    ],

    'type-contact' => [
        'title' => 'Type Contact',

        'actions' => [
            'index' => 'Type Contact',
            'create' => 'New Type Contact',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'libelle' => 'Libelle',
            
        ],
    ],

    'campagne' => [
        'title' => 'Campagne',

        'actions' => [
            'index' => 'Campagne',
            'create' => 'New Campagne',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            'sujet' => 'Sujet',
            'contenu' => 'Contenu',
            'nom_emetteur' => 'Nom emetteur',
            'email_emetteur' => 'Email emetteur',
            'send_to_all' => 'Send to all',
            
        ],
    ],

    'type-campagne' => [
        'title' => 'Type Campagne',

        'actions' => [
            'index' => 'Type Campagne',
            'create' => 'New Type Campagne',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            
        ],
    ],

    'statut-campagne' => [
        'title' => 'Statut Campagne',

        'actions' => [
            'index' => 'Statut Campagne',
            'create' => 'New Statut Campagne',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            
        ],
    ],

    'ciblage' => [
        'title' => 'Ciblage',

        'actions' => [
            'index' => 'Ciblage',
            'create' => 'New Ciblage',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'designation' => 'Designation',
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'password' => 'Password',
            
        ],
    ],

    'reservation-bien' => [
        'title' => 'Reservation Bien',

        'actions' => [
            'index' => 'Reservation Bien',
            'create' => 'New Reservation Bien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_users' => 'Id users',
            'id_bien' => 'Id bien',
            'id_reservation' => 'Id reservation',
            'date_reservation' => 'Date reservation',
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'age' => 'Age',
            'nom' => 'Nom',
            'prenom' => 'Prenom',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'mot_de_passe' => 'Mot de passe',
            'telephone' => 'Telephone',
            'id_profile' => 'Id profile',
            'id_agence' => 'Id agence',
            
        ],
    ],

    'contact-campagne' => [
        'title' => 'Contact Campagne',

        'actions' => [
            'index' => 'Contact Campagne',
            'create' => 'New Contact Campagne',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_type_contact' => 'Id type contact',
            'id_campagne' => 'Id campagne',
            'id_contact' => 'Id contact',
            
        ],
    ],

    'ciblage-campagne' => [
        'title' => 'Ciblage Campagne',

        'actions' => [
            'index' => 'Ciblage Campagne',
            'create' => 'New Ciblage Campagne',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_ciblage' => 'Id ciblage',
            'id_campagne' => 'Id campagne',
            
        ],
    ],

    'bien' => [
        'title' => 'Bien',

        'actions' => [
            'index' => 'Bien',
            'create' => 'New Bien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'libelle' => 'Libelle',
            'adresse' => 'Adresse',
            'prix' => 'Prix',
            'type' => 'Type',
            'surface' => 'Surface',
            'description' => 'Description',
            'image' => 'Image',
            
        ],
    ],

    'bien' => [
        'title' => 'Bien',

        'actions' => [
            'index' => 'Bien',
            'create' => 'New Bien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'libelle' => 'Libelle',
            'adresse' => 'Adresse',
            'prix' => 'Prix',
            'type' => 'Type',
            'surface' => 'Surface',
            'description' => 'Description',
            'image' => 'Image',
            'id_user' => 'Id user',
            'id_agence' => 'Id agence',
            'id_type_bien' => 'Id type bien',
            'id_statut_bien' => 'Id statut bien',
            'id_etat_bien' => 'Id etat bien',
            'id_localite' => 'Id localite',
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'age' => 'Age',
            'nom' => 'Nom',
            'prenom' => 'Prenom',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'mot_de_passe' => 'Mot de passe',
            'telephone' => 'Telephone',
            'id_profile' => 'Id profile',
            'id_agence' => 'Id agence',
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            'prenom' => 'Prenom',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'mot_de_passe' => 'Mot de passe',
            'telephone' => 'Telephone',
            'id_profile' => 'Id profile',
            'id_agence' => 'Id agence',
            
        ],
    ],

    'profile' => [
        'title' => 'Profile',

        'actions' => [
            'index' => 'Profile',
            'create' => 'New Profile',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            'description' => 'Description',
            
        ],
    ],

    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'permission' => [
        'title' => 'Permissions',

        'actions' => [
            'index' => 'Permissions',
            'create' => 'New Permission',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'roles-has-permission' => [
        'title' => 'Roles Has Permissions',

        'actions' => [
            'index' => 'Roles Has Permissions',
            'create' => 'New Roles Has Permission',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'role-has-permission' => [
        'title' => 'Role Has Permissions',

        'actions' => [
            'index' => 'Role Has Permissions',
            'create' => 'New Role Has Permission',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'permission_id' => 'Permission',
            'role_id' => 'Role',
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            'prenom' => 'Prenom',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'mot_de_passe' => 'Mot de passe',
            'telephone' => 'Telephone',
            'id_roles' => 'Id roles',
            'id_agence' => 'Id agence',
            
        ],
    ],

    'localite' => [
        'title' => 'Localite',

        'actions' => [
            'index' => 'Localite',
            'create' => 'New Localite',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            
        ],
    ],

    'type-bien' => [
        'title' => 'Type Bien',

        'actions' => [
            'index' => 'Type Bien',
            'create' => 'New Type Bien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            
        ],
    ],

    'type-bien' => [
        'title' => 'Typebien',

        'actions' => [
            'index' => 'Typebien',
            'create' => 'New Typebien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'type-bien' => [
        'title' => 'Typebien',

        'actions' => [
            'index' => 'Typebien',
            'create' => 'New Typebien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            
        ],
    ],

    'bien' => [
        'title' => 'Bien',

        'actions' => [
            'index' => 'Bien',
            'create' => 'New Bien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'libelle' => 'Libelle',
            'adresse' => 'Adresse',
            'prix' => 'Prix',
            'type' => 'Type',
            'surface' => 'Surface',
            'description' => 'Description',
            'image' => 'Image',
            'id_user' => 'Id user',
            'id_agence' => 'Id agence',
            'id_statut_bien' => 'Id statut bien',
            'id_etat_bien' => 'Id etat bien',
            'id_localite' => 'Id localite',
            
        ],
    ],

    'typebien' => [
        'title' => 'Typebien',

        'actions' => [
            'index' => 'Typebien',
            'create' => 'New Typebien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            
        ],
    ],

    'bien' => [
        'title' => 'Bien',

        'actions' => [
            'index' => 'Bien',
            'create' => 'New Bien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'libelle' => 'Libelle',
            'adresse' => 'Adresse',
            'prix' => 'Prix',
            'type' => 'Type',
            'surface' => 'Surface',
            'description' => 'Description',
            'image' => 'Image',
            'id_user' => 'Id user',
            'id_agence' => 'Id agence',
            'id_typebien' => 'Id typebien',
            'id_statut_bien' => 'Id statut bien',
            'id_etat_bien' => 'Id etat bien',
            'id_localite' => 'Id localite',
            
        ],
    ],

    'typebien' => [
        'title' => 'Typebien',

        'actions' => [
            'index' => 'Typebien',
            'create' => 'New Typebien',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nom' => 'Nom',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];