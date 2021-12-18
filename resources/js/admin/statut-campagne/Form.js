import AppForm from '../app-components/Form/AppForm';

Vue.component('statut-campagne-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                description:  '' ,
                
            }
        }
    }

});