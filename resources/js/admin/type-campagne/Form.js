import AppForm from '../app-components/Form/AppForm';

Vue.component('type-campagne-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                description:  '' ,
                
            }
        }
    }

});