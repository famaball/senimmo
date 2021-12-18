import AppForm from '../app-components/Form/AppForm';

Vue.component('etat-bien-form', {
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