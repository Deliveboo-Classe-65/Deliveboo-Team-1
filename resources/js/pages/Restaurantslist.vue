<template>
    <div>
        <div class="container p-2">
            <div class="section-title">
                <h2 class="mt-4">Ricerca per categoria</h2>
                <div class="row g-1 mb-5 mt-4 categories-list">
                    <div class="col flex-grow-0" v-for="category in categories" :key="category.id">
                        <div class="cat action">
                            <label :for="category.name">
                                <input :id="category.name" type="checkbox" @change="fetchDataUsers" :value="category.id"
                                    v-model="searchSelection">
                                <span>{{category.name}}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Restaurant image -->
            <div class="row g-4 restaurant-row">

                <div class="col-12 col-sm-6 col-md-4 col-lg-3" v-for="user in users" :key="user.id">
                    <router-link class="text-decoration-none" :to="{ name: 'restaurant.show', params:{ id: user.id}}">
                        <div class="my-card card rounded-0 h-100">
                            <img :src="'/storage/img/restaurants/' + user.image" :alt="user.name"
                                        class="card-img-top rounded-0">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="m-0">{{user.name}}</h5>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from "axios"
import Restaurant from '../pages/Restaurant.vue';


export default {
    components: { Restaurant },



    data() {
        return {
            users: [],
            categories: [],
            searchSelection: []
        }
    },
    methods: {
        fetchDataUsers() {
            let query = ''

            for (let i = 0; i < this.searchSelection.length; i++) {
                query += (i > 0 ? '&' : '') + 'categories[]=' + this.searchSelection[i]
            }
            axios.get("/api/users?" + query)
                .then((resp) => {
                    this.users = resp.data
                })
        },
        fetchDataCategories() {
            axios.get("/api/categories/")
                .then((resp) => {
                    this.categories = resp.data
                })
        }


    },
    mounted() {
        this.fetchDataUsers();
        this.fetchDataCategories();
    },



}
</script>

<style lang="scss">

    .my-card {
    box-shadow: 0 1px 4px rgb(0 0 0 / 8%);
    height: 130px;
    width: 100%;
    overflow: hidden;
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, .04);

}
label {
    cursor: pointer;
}

.cat {
    background-color: #104068;
    border-radius: 4px;
    border: 1px solid #fff;
    overflow: hidden;

}

.cat label {
    float: left;
    line-height: 2.0em;
    height: 2.0em;
}

.cat label span {
    text-align: center;
    display: block;
    padding: 0 .8rem;
    white-space: nowrap;
}

.cat label input {
    position: absolute;
    display: none;
    color: #fff !important;
}

.cat label input+span {
    color: #fff;
}

.cat input:checked+span {
    color: #ffffff;
    text-shadow: 0 0 6px rgba(0, 0, 0, 0.8);
}

input:checked+span {
    background-color: #F75A1B;
}

.card-img-top {
    height: 150px;
    object-fit: cover;
}
</style>