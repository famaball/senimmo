import AppForm from '../app-components/Form/AppForm';

Vue.component('contact-campagne-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                id_type_contact:  '' ,
                id_campagne:  '' ,
                id_contact:  '' ,
                
            }
        }
    }

});