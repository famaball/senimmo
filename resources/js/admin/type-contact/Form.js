import AppForm from '../app-components/Form/AppForm';

Vue.component('type-contact-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                libelle:  '' ,
                
            }
        }
    }

});