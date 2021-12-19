import AppForm from '../app-components/Form/AppForm';

Vue.component('user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nom:  '' ,
                prenom:  '' ,
                email:  '' ,
                email_verified_at:  '' ,
                mot_de_passe:  '' ,
                telephone:  '' ,
                id_profile:  '' ,
                id_agence:  '' ,
                
            }
        }
    }

});