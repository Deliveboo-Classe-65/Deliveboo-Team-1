<template>
    <div>
        <Video></Video>
        <WorkWithUs></WorkWithUs>
    </div>
</template>
  
<script>
    import axios from "axios"
    import Restaurant from '../pages/Restaurant.vue';
    import Menu from '../pages/Menu.vue';
    import Video from '../components/Video.vue';
    import WorkWithUs from '../components/WorkWithUs.vue';

    export default {
        components: { Restaurant, Menu, Video, WorkWithUs },

        data() {
            return {
                users: [],
                categories: [],
            }
        },

        methods: {
            fetchDataUsers() {
                axios.get("/api/users/")
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
        }
    }
</script>