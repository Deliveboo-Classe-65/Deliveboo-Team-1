<template>

    <div>
        <header>
            <nav class="navbar">
                <div class="container-fluid justify-content-between px-5">
                    <a class="navbar-brand" href="/">
                        <img src="/img/logo-db.png" class="d-inline-block align-text-top w-100">
                    </a>

                    <button v-if="returnTotal > 0" class="btn btn-secondary">
                        <template>
                            <font-awesome-icon class="me-2" icon="fa-solid fa-cart-shopping" />
                        </template>
                        {{ returnTotal }}
                        <template>
                            <font-awesome-icon icon="fa-solid fa-euro-sign" />
                        </template>
                    </button>

                    <button class="btn btn-secondary fs-6" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <font-awesome-icon icon="fa-solid fa-bars"/>
                        <span class="d-none d-md-inline-block ms-1"> {{ !isLogged ? 'Registrati o accedi' : 'Menu' }}</span>
                    </button>



                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <img src="img/logo-db-inverted.png" class="d-inline-block align-text-top w-100">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a v-if="isLogged" class="nav-link btn btn-primary" href="/admin">Visualizza Profilo</a>
                                    <a v-if="!isLogged" class="nav-link btn btn-primary" href="/admin">Registrati o accedi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

    </div>


</template>

<script>
import {store} from '../store'

export default {
    data() {
        return {
            isLogged: isLogged
        }
    },
    methods: {

    },
    computed: {
        returnTotal(){
            return store.cartTotal
        }
    },
}
</script>

<style lang="scss" scoped>
nav {
    background-color: #00CCBC;
}

li {

    a {
        background-color: #00CCBC;
        letter-spacing: 1px;
        border-radius: 4px;
        padding: .5rem;
        text-align: center;
        margin-bottom: 1rem;
    }
}

img {
    width: 150px;
    height: 50px;
    object-fit: contain;
}

.btn-secondary {
    padding: 0.5rem 1rem;
}
</style>