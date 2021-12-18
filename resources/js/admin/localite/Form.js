import AppForm from '../app-components/Form/AppForm';

Vue.component('localite-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nom:  '' ,
                
            }
        }
    }

});