
import Vue from 'vue'
import { ValidationProvider, extend } from 'vee-validate';
import { required, email, min, max, min_value } from 'vee-validate/dist/rules';
import { ValidationObserver } from 'vee-validate';

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

extend('max', {
    ...max,
    params: ['length'],
    message: 'Il campo {_field_} non può contenere più di {length} caratteri'
})

extend('min_value', {
    ...min_value,
    message: 'Il campo {_field_} non può essere negativo'
})

// Register it globally
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

new Vue({
    el: '#app',
    data: {
        wasValidated: 1,
        nome: undefined
    },

    methods: {

        onSubmit(e) {
            
            this.$refs.form.validate().then(success => {
                console.log(this.$refs.form)
                if (success) {
                    e.target.submit()
                }
                this.wasValidated++;
                
            })
        },

        mounted() {
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
            // this.nome = window.MyLib.name;
            // this.descrizione = window.MyLib.descrizione;


        }
    }
})