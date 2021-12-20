import AppForm from '../app-components/Form/AppForm';

Vue.component('bien-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                libelle:  '' ,
                adresse:  '' ,
                prix:  '' ,
                type:  '' ,
                surface:  '' ,
                description:  '' ,
                image:  '' ,
                id_user:  '' ,
                id_agence:  '' ,
                id_typebien:  '' ,
                id_statut_bien:  '' ,
                id_etat_bien:  '' ,
                id_localite:  '' ,
                
            }
        }
    }

});