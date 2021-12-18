import AppForm from '../app-components/Form/AppForm';

Vue.component('reservation-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                date:  '' ,
                etat:  '' ,
                description:  '' ,
                prenom:  '' ,
                nom:  '' ,
                telephone:  '' ,
                email:  '' ,
                adresse:  '' ,
                
            }
        }
    }

});