<template>
    
    <section>
        <KeepAlive>
        <DishModal :dish="currentDish"></DishModal>
    </KeepAlive>
        <div class="container">
            <div class="row">
                <!-- Restautant menù -->
                
                <div class="col col-8">
                        <div class="row row-cols-2 g-3 mt-4">
                            <div class="col" v-for="dish in dishes" :key="dish.id">
                                <button data-bs-toggle="modal" @mouseenter="setCurrentDish(dish)" :data-bs-target="'#dish' + dish.id" class="my-card">
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
                                <img src="../../../public/img/sad_bag.png" alt="Carrello vuoto">
                                <p>Il carrello è vuoto</p>
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
                cart: JSON.parse(window.localStorage.getItem('cart'))
            }
        },
        methods: {
            fetchMenu() {
                console.log(this.$route.params.id)
                axios.get("/api/users/" + this.$route.params.id + "/dishes")
                .then((resp) => {
                    this.dishes = resp.data
                })
            },

            setCurrentDish (dish){
                this.currentDish = dish
                
            }
        },
        mounted() {
            this.fetchMenu();
            console.log(window.localStorage.getItem('cart'));
            if(!window.localStorage.getItem('cart')) {
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
        border: 1px solid rgba(0,0,0,.04);

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