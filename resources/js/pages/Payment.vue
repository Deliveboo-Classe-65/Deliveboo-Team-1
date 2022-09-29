<template>
    <div class="container" style="min-height: 80vh;">
        <div v-if="cartTotal > 0 || loading" class="row justify-content-center h-100 align-items-center">
            <div v-if="paymentComplete" class="col-12 col-md-8 col-lg-6">
                <div class="card rounded-0 fs-5 my-2 py-5">
                    <div class="card-body text-center">
                        <h3>Grazie per aver acquistato da noi</h3>
                        <div class="py-3">
                            <a href="/" class="btn btn-outline-primary">Torna alla HomePage</a>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="!paymentComplete && !payloadRecived && cartTotal > 0" class="col-12 col-md-8 col-lg-6">
                <div class="card rounded-0 fs-5 my-2 py-5">
                    <div class="card-body">
                        <div class="card-title">Carrello</div>
                        <div class="row card-text align-items-center">
                            <div v-for="dish in pageCart" :key="dish.id" class="row align-items-center">
                                <div class="col-1 text-start text-black-50">{{ dish.qty }}x</div>
                                <div class="col-9 text-start text-muted">{{ dish.name }}</div>
                                <div class="col-2 text-end text-muted">€ {{ (dish.price * dish.qty).toFixed(2) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer fs-5 fw-bold">
                        <div class="row">
                            <div class="col-6 text-start">Totale</div>
                            <div class="col-6 text-end">€ {{ cartTotal }}</div>
                        </div>
                    </div>
                </div>
                <client-form v-if="!clientValid" @clientValid="setClientValid"></client-form>
                <div v-if="tokenAuth && clientValid && !payloadRecived" class="card rounded-0 mb-5 py-5">
                    <div class="card-body mb-2">
                        <v-braintree class="rounded-0" :authorization="tokenAuth" locale="it_IT" @success="onSuccess">
                            <template #button="slotProps">
                                <button hidden ref="paymentBtnRef" @click="slotProps.submit"></button>
                            </template>
                        </v-braintree>
                        <div class="mb-2 text-center">
                            <button v-if="!loading" @click="clickInsideButtons" class="btn  btn-primary">Effettua il pagamento</button>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="loading" class="col-12 col-md-8 col-lg-6">
                <div class="card rounded-0 fs-5 my-2 py-5">
                    <div class="card-body text-center">
                        <div class="py-5 fs-1">
                            <font-awesome-icon class="fa-spin" icon="fa-solid fa-circle-notch" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="cartTotal == 0 && !loading && cart.length === 0" class="row justify-content-center h-100 align-items-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card rounded-0 fs-5 my-2 py-5">
                    <div class="card-body text-center">
                        <div style="font-size: 52px">
                            <font-awesome-icon icon="fa-solid fa-basket-shopping" />
                        </div>
                        <p class="mt-2">Il carrello è vuoto</p>
                        <a class="nav-link btn btn-primary" href="/restaurants">Torna a ristoranti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import ClientForm from '../components/ClientForm.vue'
import { updateCart } from '../store'

    export default {
        components: { ClientForm },

        data() {
            return {
                loading: true,
                payloadRecived: false,
                paymentComplete: false,
                tokenAuth: undefined,
                cart: undefined,
                dishes: undefined,
                pageCart: [],
                cartTotal: 0,
                clientValid: false,
                client: undefined
            }
        },

        methods: {
            setClientValid(data) {
                this.clientValid = true
                this.client = data
            },

            fetchMenu() {
                this.loading = true
                axios.get("/api/users/" + window.localStorage.restaurant + "/dishes")
                    .then((resp) => {
                        this.dishes = resp.data
                        this.setPageCart()
                        this.loading = false
                    })
            },

            onSuccess(payload) {
                const token = payload.nonce
                this.payloadRecived = true
                this.loading = true
                axios.post('/api/checkout', {
                    'token': token,
                    'cart': this.cart,
                    'restaurant': window.localStorage.restaurant,
                    ...this.client
                })
                    .then(resp => {
                        if (resp.data.success) {
                            window.localStorage.cart = JSON.stringify([])
                            window.localStorage.removeItem('restaurant')
                            updateCart([])
                        this.paymentComplete = true
                            this.loading = false
                        }
                    })
            },

            setPageCart() {
                let cart = []
                this.cart.forEach(item => {
                    this.dishes.forEach(dish => {
                        if (item.id == dish.id) {
                            dish.qty = item.qty
                            cart.push(dish)
                        }
                    })
                })
                this.pageCart = cart
                this.setCartTotal()
            },

            setCartTotal() {
                let total = 0
                this.pageCart.forEach(dish => {
                    total += dish.price * dish.qty
                })
                this.cartTotal = total.toFixed(2)
            },

            clickInsideButtons() {
                this.$refs.paymentBtnRef.click()
            }

        },

        mounted() {
            axios.get("/api/generate")
                .then(resp => {
                    this.tokenAuth = resp.data
                    this.loading = false
                })
            this.cart = JSON.parse(window.localStorage.getItem('cart'))
            this.fetchMenu()
        }
    }
</script>

<style lang="scss">
    .cart {
        display: flex;
        flex-direction: column;
        text-align: center;
        justify-content: center;
        align-items: center;
        min-height: 180px;
        max-height: 300px;
        position: sticky;
        top: 1.5rem;
    }

    .braintree-sheet {
        border-radius: 0;
    }
</style>