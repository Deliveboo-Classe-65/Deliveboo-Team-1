<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="cart">
                    <div v-for="dish in pageCart" :key="dish.id" class="row g-0 align-items-center">
                        <div class="col-6 text-start">
                            {{ dish.name }}
                        </div>

                        <div class="col-3 text-end">
                            {{ dish.qty }}
                        </div>
                        <div class="col-3 text-end">
                            € {{ (dish.price * dish.qty).toFixed(2) }}
                        </div>

                    </div>
                    <div class="row my-3 fs-5">
                        <div class="col-6 text-start">
                            Totale
                        </div>
                        <div class="col-6 text-end"> € {{ cartTotal }}
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