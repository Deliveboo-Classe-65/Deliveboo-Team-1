<template>
    <div class="modal fade" :id="'dish' + dish.id" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="img-fluid">
                    <img :src="'storage/img/dishes/' + dish.image" alt="">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">{{dish.name}}</h5>
                    <p v-if="dish.description">{{dish.description}}</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <div class="col-12 row justify-content-center text-center">
                        <div class="col-2">
                            <button @click="changeQuantity('minus')" class="btn btn-primary"
                                :class="quantity === 1 ? 'disabled' : ''">-</button>
                        </div>
                        <div class="col-2">
                            {{quantity}}
                        </div>
                        <div class="col-2">
                            <button @click="changeQuantity('plus')" class="btn btn-primary">+</button>
                        </div>
                    </div>
                    <button type="button" data-bs-dismiss="modal" @click="addToCart()"
                        class="btn btn-primary w-75">Aggiungi per {{returnTotal}}€
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        dish: Object
    },
    data() {
        return {
            quantity: 1,
            total: this.dish.price,
            cart: JSON.parse(window.localStorage.getItem('cart'))
        }
    },

    watch: {
        dish: {
            handler() {
                this.total = this.dish.price;
                this.quantity = 1
            },
            deep: true,
            immediate: true,
        }
    },
    methods: {
        changeQuantity(operator) {
            if (operator === "plus") {
                this.quantity++;
            } else {
                this.quantity--;
            }
            this.total = (this.quantity * this.dish.price).toFixed(2);
        },

        isCartCurrentRestaurant() {
            return JSON.parse(window.localStorage.getItem('restaurant')) === this.dish.user_id
        },

        addToCart() {
            if(window.localStorage.getItem('restaurant')) {
                if(!this.isCartCurrentRestaurant()) {
                    document.getElementById("cartControlModalButton").click();
                    this.$emit('changeCart', {
                        'dish': this.dish,
                        'quantity': this.quantity
                    })
                    return
                }
            }

            window.localStorage.setItem('restaurant', this.dish.user_id)
            let cart = JSON.parse(window.localStorage.cart)

            if (cart.length === 0) {
                cart.push(
                    {
                        id: this.dish.id,
                        qty: this.quantity
                    }
                )
            } else {

                let itemNotFinded = true
                cart.forEach(item => {
                    if (item.id === this.dish.id) {
                        item.qty += this.quantity
                        itemNotFinded = false
                    }
                    
                })

                if (itemNotFinded){
                    cart.push(
                        {
                            id: this.dish.id,
                            qty: this.quantity
                        }
                    )
                }
            }

            window.localStorage.cart = JSON.stringify(cart)
            this.cart = JSON.parse(window.localStorage.getItem('cart'));
            this.$emit('updateCart')
        }
    },

    computed: {

        returnTotal() {
            return this.total
        }

    }
}
</script>