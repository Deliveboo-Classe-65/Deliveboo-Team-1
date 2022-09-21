
import Vue from 'vue'
import { ValidationProvider, extend } from 'vee-validate';
import { required, email, min, max, min_value, digits, image } from 'vee-validate/dist/rules';
import { ValidationObserver } from 'vee-validate';

// Add a rule.
extend('required', {
    ...required,
    params: ['name'],
    message: 'Il campo {_field_} è obbligatorio'
});

extend('image', {
    ...image,
    message: 'Il file deve essere un\'immagine'
});

extend('email', {
    ...email,
    params: ['email'],
    message: 'Inserire una mail valida'
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

extend('digits', {
    ...digits,
    message: 'Il campo partita IVA deve contenere solo 11 numeri'
})

// extend('confirmed', {
//     ...confirmed,
//     params: ['confirm'],
//     message: 'Le password non coincidono'
// })

extend('password', {
    params: ['target'],
    validate(value, { target }) {
      return value === target;
    },
    message: 'Le password non coincidono'
  });



// Register it globally
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

new Vue({
    el: '#app',
    data: {
        wasValidated: false,
        nome: undefined,
        email: undefined,
        indirizzo: undefined,
        partitaiva: undefined,
        categorie: [],
        password: undefined,
        confirmation: undefined,
    },

    methods: {

        onSubmit(e) {
            
            this.$refs.form.validate().then(success => {
                if (success) {
                    e.target.submit()
                }
                this.wasValidated = true;
                
            })
        },

        mounted() {
            // this.nome = window.MyLib.name;
            // this.descrizione = window.MyLib.descrizione;


        }
    }
})