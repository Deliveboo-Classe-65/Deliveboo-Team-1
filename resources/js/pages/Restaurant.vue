<template>
    <div class="container">
      

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