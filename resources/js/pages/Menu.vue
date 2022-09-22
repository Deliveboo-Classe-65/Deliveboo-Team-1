<template>

    <section>

        <DishModal @updateCart="setPageCart" :dish="currentDish"></DishModal>

        <div class="container">
            <div class="row">
                <!-- Restautant menù -->

                <div class="col col-8">
                    <div class="row row-cols-2 g-3 mt-4">
                        <div class="col" v-for="dish in dishes" :key="dish.id">
                            <button data-bs-toggle="modal" @mouseenter="setCurrentDish(dish)"
                                :data-bs-target="'#dish' + dish.id" class="my-card">
                                <div class="row">
                                    <div class="col col-8">
                                        <div class="card-body">
                                            <h5 class="card-title product-name">{{ dish.name }}</h5>
                                            <p class="card-text product-description">{{ dish.description }}</p>
                                            <p class="price">€ {{dish.price}}</p>
                                        </div>
                                    </div>
                                </div>
                            </button>

                        </div>
                    </div>
                </div>

                <!--  Checkout-->

                <div class="col col-4 border mt-4 cart">
                    <div class="container">
                        <img v-if="pageCart.length == 0" src="../../../public/img/sad_bag.png" alt="Carrello vuoto">

                        <div class="row g-0 align-items-center" v-for="dish in pageCart" :id="'item' + dish.id">
                            <div class="col-8 text-start">
                                {{ dish.name }}
                            </div>

                            <div class="col-2 text-end">
                                <button @click="updateCartRows(dish.id, 'minus')"
                                    class="text-primary rounded-circle px-1 btn btn-sm">
                                    <font-awesome-icon icon="fa-solid fa-circle-minus" />
                                </button>
                                {{ cart[dish.id] }}
                                <button @click="updateCartRows(dish.id, 'plus')"
                                    class="px-1 btn btn-sm rounded-circle text-primary">
                                    <font-awesome-icon icon="fa-solid fa-circle-plus" />
                                </button>
                            </div>
                            <div class="col-2 text-end">
                                € {{ (dish.price * cart[dish.id]).toFixed(2) }}
                            </div>
                        </div>

                        <div class="row my-3 fs-5" v-if="pageCart.length > 0">
                            <div class="col-6 text-start">
                                Totale
                            </div>
                            <div class="col-6 text-end"> € {{ cartTotal }}
                            </div>
                        </div>
                        <div class="btn btn-warning d-flex flex-grow-1 justify-content-center">Vai al pagamento</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import axios from 'axios';
import DishModal from '../components/DishModal.vue';

export default {
    components: {
        DishModal
    },
    data() {
        return {
            currentDish: {},
            dishes: [],
            cart: JSON.parse(window.localStorage.getItem('cart')),
            pageCart: [],
            cartTotal: 0
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

            let rowQuantity = cart[dishId]
            if (operator == 'plus') {
                cart[dishId] = rowQuantity + 1;

            }

            if (operator === 'minus') {
                if (rowQuantity === 1) {

                    delete cart[dishId]

                } else { cart[dishId] = rowQuantity - 1 }
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
            for (const id in this.cart) {
                this.dishes.forEach(dish => {
                    if (dish.id == id) {
                        cart.push(dish)
                    }
                })
            }
            this.pageCart = cart
            this.setCartTotal()
        },

        setCartTotal() {
            let total = 0
            this.pageCart.forEach(dish => {
                total += dish.price * this.cart[dish.id]
            })

            this.cartTotal = total.toFixed(2)
        }
    },

    mounted() {
        this.fetchMenu();
        if (!window.localStorage.getItem('cart')) {
            window.localStorage.setItem('cart', JSON.stringify({}));
        }
    }
}

</script>

<style lang="scss" scoped>
.my-card {
    box-shadow: 0 1px 4px rgb(0 0 0 / 8%);
    max-height: 132px;
    max-width: 100%;
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