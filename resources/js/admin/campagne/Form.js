import AppForm from '../app-components/Form/AppForm';

Vue.component('campagne-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nom:  '' ,
                sujet:  '' ,
                contenu:  '' ,
                nom_emetteur:  '' ,
                email_emetteur:  '' ,
                send_to_all:  '' ,
                id_type_campagne:  '' ,
                id_statut_campagne:  '' ,
                
            }
        }
    }

});