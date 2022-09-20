<template>
    <div class="container">
        <div class="row">
            <!-- Restaurant image -->
            <div class="col">
                <h1>restaurant component</h1>
                <img src="" alt="">
            </div>
            <!-- Restaurant description -->
            <div class="col">

            </div>
            <!-- Restaurant time to deliver -->
            <div class="col">

            </div>
        </div>
        <div class="row">
            <!-- Restautant menù -->
            <div class="col col-8"></div>
            <!--  Checkout-->
            <div class="col col-4"></div>
        </div>
    </div>
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