<template>
    <div id="testModal" class="modal fade" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="modal-title fw-bold" id="staticBackdropLabel">Vuoi creare un nuovo carrello?</h4>
                    <p>In questo modo cancelli il carrello esistente e crei un nuovo carrello.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-outline-primary col-5">Visualizza menu</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-primary col-5" @click="addToCart()">Nuovo carrello</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: {
        data: Object
    },

    methods: {
        addToCart() {
            window.localStorage.restaurant = this.data.dish.user_id
            window.localStorage.cart = JSON.stringify([{
                id: this.data.dish.id,
                qty: this.data.quantity
            }])
            this.$emit("updateCart")
        }
    }
}
</script>

<style lang="scss" scoped>
    .modal-dialog {
        font-family: 'IBM Plex Sans Arabic', sans-serif;
    }
</style>