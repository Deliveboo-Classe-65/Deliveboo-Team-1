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
                                            <h5 class="card-title product-name">Big king</h5>
                                            <p class="card-text product-description">Il re degli hamburger è qui. Il nostro BIG KING® ti c...</p>
                                            <p class="price">€ 6.80</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="product-img p-3">
                                            <img src="../../../public/img/big_king.jpeg" alt="Big King burger" class="w-100 h-100">
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card my-card">
                                <div class="row">
                                    <div class="col col-8">
                                        <div class="card-body">
                                            <h5 class="card-title product-name">Big king</h5>
                                            <p class="card-text product-description">Il re degli hamburger è qui. Il nostro BIG KING® ti c...</p>
                                            <p class="price">€ 6.80</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="product-img p-3">
                                            <img src="../../../public/img/big_king.jpeg" alt="Big King burger" class="w-100 h-100">
                                        </div>
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
                                            <h5 class="card-title product-name">Big king</h5>
                                            <p class="card-text product-description">Il re degli hamburger è qui. Il nostro BIG KING® ti c...</p>
                                            <p class="price">€ 6.80</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="product-img p-3">
                                            <img src="../../../public/img/big_king.jpeg" alt="Big King burger" class="w-100 h-100">
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card my-card">
                                <div class="row">
                                    <div class="col col-8">
                                        <div class="card-body">
                                            <h5 class="card-title product-name">Big king</h5>
                                            <p class="card-text product-description">Il re degli hamburger è qui. Il nostro BIG KING® ti c...</p>
                                            <p class="price">€ 6.80</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="product-img p-3">
                                            <img src="../../../public/img/big_king.jpeg" alt="Big King burger" class="w-100 h-100">
                                        </div>
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
                            <img src="../../../public/img/sad_bag.png" alt="Carrello vuoto" class="w-100">
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
        max-height: 132px;
        max-width: 100%;
        overflow: hidden;

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

    .product-name {
        font-size: 16px;
        line-height: 22px;
        font-weight: bold;
    }

    .product-description {
        font-size: 14px;
        line-height: 19px;
    }

    .price {
        font-size: 16px;
        line-height: 22px;
    }

    .product-img {
        height: 98px;
        width: 98px;
    }
    
</style>