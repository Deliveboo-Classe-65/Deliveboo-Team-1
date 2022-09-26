<template>
    <div>
    <section class="restaurant p-3">
        <div class="container">
            <div class="row restaurant-row">
                <!-- Restaurant image -->
                <div class="col-12 col-md-4 my-3">
                    <img :src="'storage/img/restaurants/' + user.image" :alt="user.name" class="w-100">
                </div>
                <!-- Restaurant name and description -->
                <div class="col-12 col-md-6 my-3">
                    <h1>{{user.name}}</h1>
                    <div class="d-flex categories">
                        <p class="delivery-time">{{randomNumber}} - {{randomNumber + 15}} minuti - 
                            <span v-for="category in user.categories" :key="'category' + category.id">{{category.name}}</span>
                        </p>
                        
                        <!-- <p class="me-3">Americano</p>
                        <p class="me-3">Hamburger</p> -->
                    </div>
                    <h5>{{user.description}}</h5>
                </div>
                <!-- Restaurant time to deliver -->
                <div class="col col-2 my-3 d-flex">
                    <div class="icon">
                        <img src="../../../public/img/biker_icon.png" alt="biker icon" class="w-100">
                    </div>
                    <p>Consegna: {{randomNumber}} - {{randomNumber + 15}} minuti</p>
                </div>
            </div>
        </div>
    </section>
    <Menu></Menu>

    </div>
</template>


<script>
import axios from 'axios';
import Menu from './Menu.vue';


export default {
    components: { Menu },
    data() {
        return {
            user: {},
            randomNumber: '',

        }
    },
    methods: {
        fetchData() {
            axios.get("/api/users/" + this.$route.params.id)
                .then((resp) => {
                    this.user = resp.data
                })
        },

        randomDelivery() {
            let min = 15;
            let max = 90;
            let randomNumber =  Math.floor(Math.random() * (max - min) + min);
                return this.randomNumber = randomNumber;
        },

    },
    mounted() {
        this.fetchData();
        this.randomDelivery();
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

