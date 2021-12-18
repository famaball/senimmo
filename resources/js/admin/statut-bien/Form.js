import AppForm from '../app-components/Form/AppForm';

Vue.component('statut-bien-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                designation:  '' ,
                description:  '' ,
                
            }
        }
    }

});