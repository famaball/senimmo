import AppForm from '../app-components/Form/AppForm';

Vue.component('agence-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nom:  '' ,
                adresse:  '' ,
                telephone:  '' ,
                email:  '' ,
                email_verified_at:  '' ,
                
            }
        }
    }

});