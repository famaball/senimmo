import AppForm from '../app-components/Form/AppForm';

Vue.component('ciblage-campagne-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                id_ciblage:  '' ,
                id_campagne:  '' ,
                
            }
        }
    }

});