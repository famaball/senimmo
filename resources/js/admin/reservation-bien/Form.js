import AppForm from '../app-components/Form/AppForm';

Vue.component('reservation-bien-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                id_users:  '' ,
                id_bien:  '' ,
                id_reservation:  '' ,
                date_reservation:  '' ,
                
            }
        }
    }

});