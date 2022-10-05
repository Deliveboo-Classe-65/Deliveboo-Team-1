<template>
    <section>
        <DishModal @updateCart="setPageCart" @changeCart="testCart" :dish="currentDish"></DishModal>
        <CartControlModal :data="dishToPass" @updateCart="setPageCart"></CartControlModal>
        <button id="cartControlModalButton" data-bs-toggle="modal" data-bs-target="#testModal" hidden></button>
        <div class="container">
            <div class="row">
                <!-- Restautant menù -->
                <div class="col-12 col-lg-8">
                    <h2 class="my-3">Menu</h2>
                    <div class="row row-cols-1 row-cols-md-2 g-3 mb-4">
                        <div class="col" v-for="dish in dishes" :key="dish.id">
                            <button data-bs-toggle="modal" @mouseenter="setCurrentDish(dish)" :data-bs-target="'#dish' + dish.id" class="my-card">
                                <div class="card-body h-100 text-start pb-3">
                                    <h5 class="card-title product-name">{{ dish.name }}</h5>
                                    <p class="card-text text-muted product-description h-50">{{ dish.description.substr(0, 100) + (dish.description.length > 100 ? '...' : '') }}</p>
                                    <div class="row">
                                        <p class="price col">€ {{dish.price}}</p>
                                        <div class="col text-end" v-if="dish.types">
                                            <template v-for="type in dish.types">
                                                <font-awesome-icon v-if="type.id === 1" icon="fa-solid fa-leaf" class="text-success" />
                                                <font-awesome-icon v-if="type.id === 2" icon="fa-solid fa-pepper-hot" class="text-danger" />
                                                <font-awesome-icon v-if="type.id === 3" icon="fa-solid fa-wheat-awn" class="text-warning" />
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <!--  Checkout-->
                <div class="col-12 col-lg-4 border mt-4 cart">
                    <div class="container">
                        <div v-if="pageCart.length === 0" class="row justify-content-center">
                            <div class="col-12" style="font-size: 52px">
                                <font-awesome-icon icon="fa-solid fa-basket-shopping" />
                            </div>
                            <p class="mt-2 cole-12">Il carrello è vuoto</p>
                        </div>
                        <div class="row g-0 align-items-center" v-for="dish in pageCart" :key="'cartrow' + dish.id" :id="'item' + dish.id">
                            <div class="col-6 text-start">{{ dish.name }}</div>
                            <div class="col-3 text-end">
                                <button @click="updateCartRows(dish.id, 'minus')" class="text-primary rounded-circle px-1 btn btn-sm">
                                    <font-awesome-icon icon="fa-solid fa-circle-minus" />
                                </button>
                                <span>{{ dish.qty }}</span>
                                <button @click="updateCartRows(dish.id, 'plus')" class="px-1 btn btn-sm rounded-circle text-primary">
                                    <font-awesome-icon icon="fa-solid fa-circle-plus" />
                                </button>
                            </div>
                            <div class="col-3 text-end">€ {{ (dish.price * dish.qty).toFixed(2) }}</div>
                        </div>
                        <div class="row my-3 fs-5" v-if="pageCart.length > 0">
                            <div class="col-6 text-start">Totale</div>
                            <div class="col-6 text-end">€ {{ cartTotal }}</div>
                        </div>
                        <router-link tag="button" class="w-75 text-center btn btn-warning" :disabled="pageCart.length === 0" to="/checkout">Vai al pagamento</router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import axios from 'axios';
    import DishModal from '../components/DishModal.vue';
    import CartControlModal from "../components/CartControlModal.vue";
    import { updateCart } from '../store'

export default {
    components: {
        DishModal, CartControlModal
    },
    data() {
        return {
            currentDish: {},
            dishes: [],
            cart: JSON.parse(window.localStorage.getItem('cart')),
            pageCart: [],
            cartTotal: 0,
            dishToPass: undefined
        }
    },

        watch:{
        $route (){
            this.fetchMenu()
        }
    },

    methods: {
        fetchMenu() {
            axios.get("/api/users/" + this.$route.params.id + "/dishes")
                .then((resp) => {
                    this.dishes = resp.data
                    this.setPageCart()
                })
        },

            setCurrentDish(dish) {
                this.currentDish = dish
            },

            updateCartRows(dishId, operator) {
                let cart = JSON.parse(window.localStorage.getItem('cart'))
                if (operator == 'plus') {
                    cart.forEach(item => {
                        if (item.id === dishId){
                            item.qty++
                        }
                    })
                }
                if (operator === 'minus') {
                    cart.forEach((item, index) => {
                        if (item.id === dishId && item.qty === 1){
                            cart.splice(index, 1)
                            if(this.pageCart.length === 1) {
                                window.localStorage.removeItem('restaurant')
                            }
                        
                    } else if ( item.id === dishId ){
                            item.qty--
                        }
                    });
                }
                window.localStorage.cart = JSON.stringify(cart)
                this.setPageCart()
            },

            updateCurrentCart() {
                this.cart = JSON.parse(window.localStorage.getItem('cart'))
            },

            setPageCart() {
                this.updateCurrentCart()
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
                if (window.localStorage.restaurant == this.$route.params.id){
                    updateCart(this.cartTotal, window.localStorage.restaurant)
                }
            },

            testCart(data) {
                this.dishToPass = data;
            }
        },

        mounted() {
            this.fetchMenu();
            if (!window.localStorage.getItem('cart')) {
                window.localStorage.setItem('cart', JSON.stringify([]));
            }
        }
    }
</script>

<style lang="scss" scoped>
    .my-card {
        box-shadow: 0 1px 4px rgb(0 0 0 / 8%);
        height: 130px;
        width: 100%;
        overflow: hidden;
        border-radius: 4px;
        padding: 1rem;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, .04);
    }
    
    .my-card:hover {
        box-shadow: 0 22px 24px 0 rgb(0 0 0 / 8%);
    }

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

        img {
            height: 100px;
            width: 100px;
        }
    }

    .product-name {
        font-size: 16px;
        line-height: 22px;
        font-weight: bold;
    }

    .product-description {
        font-size: 14px;
        line-height: 19px;
    }

    .price {
        font-size: 16px;
        line-height: 22px;
    }

    .product-img {
        height: 98px;
        width: 98px;
    }
</style>