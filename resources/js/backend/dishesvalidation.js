
import Vue from 'vue'
import { ValidationProvider, extend } from 'vee-validate';
import { required, email, min, min_value } from 'vee-validate/dist/rules';

// Add a rule.
extend('required', {
    ...required,
    params: ['name'],
    message: 'Il campo {_field_} è obbligatorio'
});

extend('min', {
    ...min,
    params: ['length'],
    message: 'Il campo {_field_} deve contenere almeno {length} caratteri'
})

extend('min_value', {
    ...min_value,
    message: 'Il campo {_field_} non può essere negativo'
})

// Register it globally
Vue.component('ValidationProvider', ValidationProvider);

new Vue ({
    el: '#app',
    data: {
        nome: '',
        prezzo: undefined,
        immagine: undefined,
        descrizione: undefined
    },

    methods: {
        required(str){
            return str.length < 1;
        }
    },

    mounted(){
        // (() => {
        //     'use strict'
        
        //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
        //     const forms = document.querySelectorAll('.needs-validation')
        
        //     // Loop over them and prevent submission
        //     Array.from(forms).forEach(form => {
        //         form.addEventListener('submit', event => {
        //             if (!form.checkValidity()) {
        //                 event.preventDefault()
        //                 event.stopPropagation()
        //             }
        
        //             form.classList.add('was-validated')
        //         }, false)
        //     })
        
        // })()
    }
})