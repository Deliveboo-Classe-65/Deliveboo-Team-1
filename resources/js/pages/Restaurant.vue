<template>
    <div class="container">
        <h2>ciao</h2>

        <h1>{{user.name}}</h1>
    </div>



</template>


<script>
import axios from 'axios';
export default {
    data() {
        return {
            user: {}
        }
    },
    methods: {
        fetchData() {
            axios.get("/api/users/" + this.$route.params.id)
                .then((resp) => {
                    this.user = resp.data
                })
        }
    },
    mounted() {
        this.fetchData();
    }
}
</script>