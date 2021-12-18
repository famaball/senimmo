import AppForm from '../app-components/Form/AppForm';

Vue.component('profile-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nom:  '' ,
                description:  '' ,
                
            }
        }
    }

});