<template>
    <div class="card rounded-0 mb-5">
        <div class="card-body">
            <div class="cart-title mb-3 fs-5">Indirizzo di consegna</div>
            <validation-observer ref="form" v-slot="{ errors }">
                <form @submit.prevent="onSubmit"  novalidate>
                    <fieldset class="row" :disabled="validClient">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="name">Nome</label>
                                <validation-provider name="nome" :immediate="true" rules="required" v-slot="{ errors }">
                                    <input id="name" v-model="nome" type="text" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " class="form-control" name="name" autocomplete="name" autofocus>
                                    <div v-for="error in errors" class="invalid-feedback">{{ error }}</div>
                                </validation-provider>
                            </div> 
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="cognome">Cognome</label>
                                <validation-provider name="cognome" :immediate="true" rules="required" v-slot="{ errors }">
                                    <input id="name" v-model="cognome" type="text" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " class="form-control" name="cognome" autocomplete="surname" autofocus>
                                    <div v-for="error in errors" class="invalid-feedback">{{ error }}</div>
                                </validation-provider>
                            </div> 
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="email">Indirizzo e-mail</label>
                                <validation-provider name="email" :immediate="true" rules="required|email" v-slot="{ errors }">
                                    <input id="email" v-model="email" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " type="email" class="form-control" name="email" required autocomplete="email">
                                    <div  class="invalid-feedback">
                                        <ul class="px-0">
                                            <li class="list-unstyled" v-for="error in errors">  {{ error }}</li>
                                        </ul>
                                    </div>
                                </validation-provider>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="telefono">Telefono</label>
                                <validation-provider name="telefono" :immediate="true" rules="required|digits:10" v-slot="{ errors }">
                                    <input id="vat_number" v-model="telefono" type="text" maxlength="10" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " class="form-control" name="telefono" autocomplete="vat_number" autofocus>
                                    <div v-for="error in errors" class="invalid-feedback">{{ error }}</div>
                                </validation-provider>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="mb-3">
                                <label for="indirizzo">Indirizzo di spedizione</label>
                                <validation-provider name="indirizzo" :immediate="true" rules="required|min:5" v-slot="{ errors }">
                                    <input id="name" v-model="indirizzo" type="text" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " class="form-control" name="indirizzo" autocomplete="address" autofocus>
                                    <div v-for="error in errors" class="invalid-feedback">{{ error }}</div>
                                </validation-provider>
                            </div> 
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="orario">Orario Consegna</label>
                                <validation-provider name="orario" :immediate="true" rules="required" v-slot="{ errors }">
                                    <input ref="timeInput" v-model="orario" type="time" step="300" min="14:30" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " class="form-control" name="orario" autocomplete="name" autofocus>
                                    <div v-for="error in errors" class="invalid-feedback">{{ error }}</div>
                                </validation-provider>
                            </div> 
                        </div>
                        <div class="my-3 text-center">
                            <button type="submit" ref="clientSubmitBtn" class="btn btn-primary">Inserisci metodo di pagamento</button>
                        </div>
                    </fieldset>
                </form>
            </validation-observer>
        </div>
    </div>
</template>

<script>
    import { ValidationProvider, extend } from 'vee-validate';
    import { required, email, min, max, min_value, digits } from 'vee-validate/dist/rules';
    import { ValidationObserver } from 'vee-validate';

    // Add a rule.
    extend('required', {
        ...required,
        params: ['name'],
        message: 'Il campo {_field_} è obbligatorio'
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
        message: 'Il campo deve essere formato da 10 numeri'
    })

    export default {
        components: {
            ValidationObserver, ValidationProvider
        },

        data (){
            return {
                wasValidated: false,
                validClient: false,
                nome: undefined,
                cognome: undefined,
                email: undefined,
                telefono: undefined,
                indirizzo: undefined,
                orario: undefined
            }
        },

        methods: {
            onSubmit() {
                this.$refs.form.validate().then(success => {
                    if (success) {
                        this.validClient = true
                        this.$emit('clientValid', {
                            name: this.nome,
                            surname: this.cognome,
                            email: this.email,
                            phone: this.telefono,
                            address: this.indirizzo,
                            delivery: this.orario
                        })
                    }
                    this.wasValidated = true;
                })
            }
        },

        mounted(){
            const nowTime = new Date()
            this.orario = String((nowTime.getHours()) + 1).padStart(2, '0') + ':' + String(nowTime.getMinutes()).padStart(2, '0')
        }
    }
</script>

<style scoped lang="scss">
    input {
        border-radius: 0;
    }
</style>