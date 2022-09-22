<template>
    <div>
        <div class="container p-2">
        <div class="section-title">
            <h2>Ricerca per categoria</h2>
            <div class="categories-list row justify-content-start g-1">
                <div class="col flex-grow-0" v-for="category in categories" :key="category.id">
                    <div class="cat action">
                        <label :for="category.name">
                            <input :id="category.name" type="checkbox" @change="fetchDataUsers" :value="category.id" v-model="searchSelection">
                            <span>{{category.name}}</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Restaurant image -->
        <div class="row restaurant-row">

            <div class="col-3" v-for="user in users" :key="user.id">
                <router-link class="text-decoration-none" :to="{ name: 'restaurant.show', params:{ id: user.id}}">
                    <div class="content">
                        <img :src="user.image" alt="Burger King" class="w-100">
                        <h4>{{user.name}}</h4>
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

                for (let i = 0; i < this.searchSelection.length; i++ ){
                    query+= (i > 0 ? '&' : '') + 'categories[]=' + this.searchSelection[i] 
                    console.log(query)
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
    label {
    cursor: pointer;
}
.cat{
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
.cat label input + span{color: #fff;}
.cat input:checked + span {
    color: #ffffff;
    text-shadow: 0 0  6px rgba(0, 0, 0, 0.8);
}
input:checked + span{background-color: #F75A1B;}
</style>