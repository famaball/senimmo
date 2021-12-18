import AppForm from '../app-components/Form/AppForm';

Vue.component('type-bien-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nom:  '' ,
                
            }
        }
    }

});