import AppForm from '../app-components/Form/AppForm';

Vue.component('typebien-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nom:  '' ,
                
            }
        }
    }

});