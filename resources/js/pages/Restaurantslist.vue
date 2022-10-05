<template>
    <main>
        <section class="py-5">
            <div class="container">
                <h2 class="mb-4 text-center text-sm-start">Ristoranti</h2>
                <div class="mb-5 mt-4 position-relative">
                    <div ref="toScroll" class="row g-1 flex-nowrap scroll">
                        <div v-for="category in categories" :key="category.id" class="col-auto">
                            <div class="category" :style="'background:#' + category.color">
                                <label :for="category.name" :class="searchSelection.includes(category.id) ? 'selected' : ''">
                                    <input :id="category.name" type="checkbox" @change="fetchDataUsers" :value="category.id" v-model="searchSelection">
                                    <span>{{category.name}}</span>
                                </label>
                                <img :src="'/storage/img/categories/' + category.image" :alt="category.name">
                            </div>
                        </div>
                    </div>
                    <button @click="scroll('left')" class="btn btn-secondary rounded-circle left-button absolute-button"><font-awesome-icon icon="fa-solid fa-chevron-left" /></button>
                    <button @click="scroll('right')" class="btn btn-secondary rounded-circle right-button absolute-button"><font-awesome-icon icon="fa-solid fa-chevron-right" /></button>
                </div>
                <div class="row g-4 restaurant-row">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3" v-for="user in users" :key="user.id">
                        <router-link class="text-decoration-none" :to="{ name: 'restaurant.show', params:{ id: user.id}}">
                            <div class="my-card card rounded-0 h-100">
                                <img :src="'/storage/img/restaurants/' + user.image" :alt="user.name" class="card-img-top rounded-0">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h5 class="m-0">{{user.name}}</h5>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
            },

            scroll(direction) {
                if(direction === "right") {
                    this.$refs.toScroll.scrollBy({
                        left: 500,
                        behavior: 'smooth'
                    })
                }
                if (direction === "left") {
                    this.$refs.toScroll.scrollBy({
                        left: -500,
                        behavior: 'smooth'
                    })
                }
            }
        },

        mounted() {
            this.fetchDataUsers();
            this.fetchDataCategories();
        },
    }
</script>

<style lang="scss" scoped>
    @import '../../sass/variables';

    main {
        min-height: 60vh;
    }

    a {
        color: inherit;
    }

    .scroll {
        overflow-x: scroll;
    }

    .scroll::-webkit-scrollbar {
        display: none;
    }

    .absolute-button {
        position: absolute;
        top: 50%;

        &.left-button {
            left: 0;
            transform: translate(-30%, -50%);
        }
        &.right-button {
            right: 0;
            transform: translate(30%, -50%);
        }
    }

    .my-card {
        box-shadow: 0 1px 4px rgb(0 0 0 / 8%);
        height: 130px;
        width: 100%;
        overflow: hidden;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, .04);

        &:hover {
            box-shadow: 0 22px 24px 0 rgb(0 0 0 / 8%);
        }

        @media only screen and (max-width: 575px) {
            width: 90%;
            margin: 0 auto;
        }
    }

    label {
        cursor: pointer;
    }

    .category {
        width: 125px;
        height: 75px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;

        input {
            display: none;
        }

        label {
            color: white;
            font-weight: bold;
            text-transform: capitalize;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 0.5rem;
            display: flex;
            align-items: flex-end;

            &.selected {
                border: 5px solid $primary;

                span {
                    transform: translate(-5px, 5px);
                }
            }
        }

        img {
            width: 100%;
        }
    }

    .card-img-top {
        height: 150px;
        object-fit: cover;

        @media only screen and (max-width: 575px) {
            height: 250px;
        }
    }
</style>