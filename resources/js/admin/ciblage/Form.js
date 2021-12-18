import AppForm from '../app-components/Form/AppForm';

Vue.component('ciblage-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                designation:  '' ,
                
            }
        }
    }

});