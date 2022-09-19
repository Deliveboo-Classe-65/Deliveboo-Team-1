<template>
    <div class="container">
        <div class="row">
            <!-- Restautant menù -->
            <div class="col col-8">                
                    
                
                <div class="row mt-4 gap-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card my-card">
                                <div class="row">
                                    <div class="col col-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Big king</h5>
                                            <p class="card-text">Il re degli hamburger è qui. Il nostro BIG KING® ti conquisterà con doppia carne di manzo alla griglia, formaggio e deliziosa salsa BIG KING®. Un hamburger decisamente maestoso, che, con i suoi 4 pollici di diametro, rende merito al proprio nome.</p>
                                            <p>€ 6.80</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <img src="" alt="">
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card my-card">
                                <div class="row">
                                    <div class="col col-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Big king</h5>
                                            <p class="card-text">Il re degli hamburger è qui. Il nostro BIG KING® ti conquisterà con doppia carne di manzo alla griglia, formaggio e deliziosa salsa BIG KING®. Un hamburger decisamente maestoso, che, con i suoi 4 pollici di diametro, rende merito al proprio nome.</p>
                                            <p>€ 6.80</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <img src="" alt="">
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card my-card">
                                <div class="row">
                                    <div class="col col-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Big king</h5>
                                            <p class="card-text">Il re degli hamburger è qui. Il nostro BIG KING® ti conquisterà con doppia carne di manzo alla griglia, formaggio e deliziosa salsa BIG KING®. Un hamburger decisamente maestoso, che, con i suoi 4 pollici di diametro, rende merito al proprio nome.</p>
                                            <p>€ 6.80</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <img src="" alt="">
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card my-card">
                                <div class="row">
                                    <div class="col col-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Big king</h5>
                                            <p class="card-text">Il re degli hamburger è qui. Il nostro BIG KING® ti conquisterà con doppia carne di manzo alla griglia, formaggio e deliziosa salsa BIG KING®. Un hamburger decisamente maestoso, che, con i suoi 4 pollici di diametro, rende merito al proprio nome.</p>
                                            <p>€ 6.80</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <img src="" alt="">
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!--  Checkout-->
            
            <div class="col col-4 border mt-4 cart">
                    <div class="container">
                            <img src="" alt="Carrello vuoto">
                            <p>Il carrello è vuoto</p>
                        <div class="btn btn-warning d-flex flex-grow-1 justify-content-center">Vai al pagamento</div>
                    </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        methods: {

        },
        mounted() {

        }
    }

</script>

<style lang="scss" scoped>
    .my-card {
        box-shadow: 0 1px 4px rgb(0 0 0 / 8%);
        max-height: 100px;
        max-width: 100%;
        overflow: auto;

    }

    .my-card:hover {
        box-shadow: 0 22px 24px 0 rgb(0 0 0 / 8%);
    }
    .cart {
        display: flex;
        flex-direction: column;
        text-align: center;
        justify-content: center;
        align-items: center;
        min-height: 180px;
        max-height: 100%;
    }
    
</style>