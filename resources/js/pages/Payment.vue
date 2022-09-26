<template>
    <div>
        <v-braintree
        authorization="sandbox_v28gf96h_zmpjvh5p8dt7rtdz"
        locale="it_IT"
        @success="onSuccess"
        >

        </v-braintree>
        <div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

    export default {
        methods: {
            onSuccess (payload) {
                const token = payload.nonce
                axios.post('/api/checkout', {'token': token})
                    .then(resp => console.log(resp))
            }
        }
    }
</script>