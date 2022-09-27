<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card rounded-0 fs-5 mt-2">
                    <div class="card-body">
                        <div class="card-title">
                            Carrello
                        </div>
                        <div class="row card-text align-items-center">
                            <div v-for="dish in pageCart" :key="dish.id" class="row align-items-center">
                                <div class="col-1 text-start text-black-50">
                                    {{ dish.qty }}x
                                </div>

                                <div class="col-9 text-start text-muted">
                                    {{ dish.name }}
                                </div>
                                <div class="col-2 text-end text-muted">
                                    € {{ (dish.price * dish.qty).toFixed(2) }}
                                </div>

                            </div>
                            
                        </div>
                    </div>
                    <div class="card-footer fs-5 fw-bold">
                        <div class="row">
                            <div class="col-6 text-start">
                                Totale
                            </div>
                            <div class="col-6 text-end">
                                € {{ cartTotal }}
                            </div>
                    </div>
                    </div>
                </div>
                <v-braintree v-if="tokenAuth" :authorization="tokenAuth" locale="it_IT" @success="onSuccess" btnText="Paga"></v-braintree>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

    export default {
        data() {
            return {
                tokenAuth: undefined,
                cart: undefined,
                dishes: undefined,
                pageCart: [],
                cartTotal: 0
            }
        },

        methods: {
            fetchMenu() {
                axios.get("/api/users/" + window.localStorage.restaurant + "/dishes")
                    .then((resp) => {
                        this.dishes = resp.data
                        this.setPageCart()
                    })
             },

            onSuccess (payload) {
                const token = payload.nonce
                axios.post('/api/checkout', {
                        'token': token,
                        'cart': this.cart
                    })
                    .then(resp => {
                        if(resp.data.success) {
                            window.localStorage.removeItem('cart')
                            window.localStorage.removeItem('restaurant')
                            window.location.href = '/'
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
            }

        },


        mounted() {
            axios.get("/api/generate")
                .then(resp => this.tokenAuth = resp.data)
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
</style>