<template>
    <section class="restaurant py-3">
        <div class="container">
            <div class="row restaurant-row">
                <!-- Restaurant image -->
                <div class="col col-4 my-3">
                    <img src="../../../public/img/bk.jpeg" alt="Burger King" class="w-100">
                </div>
                <!-- Restaurant name and description -->
                <div class="col col-6 my-3">
                    <h1>Burger King</h1>
                    <div class="d-flex categories">
                        <p class="delivery-time">20 - 25 minuti</p>
                        <p class="me-3">Americano</p>
                        <p class="me-3">Hamburger</p>
                    </div>
                    <h5>IL NOSTRO GUSTO? SUPERIORE. BURGER KING®. A MODO TUO.</h5>
                </div>
                <!-- Restaurant time to deliver -->
                <div class="col col-2 my-3 d-flex">
                    <div class="icon">
                        <img src="../../../public/img/biker_icon.png" alt="biker icon" class="w-100">
                    </div>
                    <p>Consegna: 20 - 25 minuti</p>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
    
    import axios from "axios"

    export default {
        data() {
            return {
                restaurant: [], 
            }
        },
        methods: {
            fetchData() {
            axios.get("/api/{restaurant}")
            .then((resp) => {
                this.restaurant = resp.data
            })
        }
        },
        mounted() {
            this.fetchData();
        }
    }

</script>

<style lang="scss">

.restaurant {
        background-color: #fff;
        border-bottom: 1px solid rgba(0,0,0,.08);
    }
.restaurant-row {
    height: 100%;
    min-height: 244px;
    display: flex;
}

.icon {
        width: 20px;
        height: 20px;
        margin-right: 4px;
    }
</style>

