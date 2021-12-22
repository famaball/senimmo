import AppForm from '../app-components/Form/AppForm';

Vue.component('contact-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nom:  '' ,
                prenom:  '' ,
                email:  '' ,
                telephone:  '' ,
                localite:  '' ,
                sexe:  '' ,
                id_type_contact:  '' ,
                
            }
        }
    }

});