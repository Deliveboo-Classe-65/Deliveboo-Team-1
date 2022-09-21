<template>

    <div>
        <header>
            <nav class="navbar fixed-top ">
                <div class="container-fluid justify-content-around">
                    <a class="navbar-brand" href="">
                        <img src="img/logo-db.png" class="d-inline-block align-text-top w-100">
                    </a>
                    <button type="button" class="btn btn-outline-secondary">
                        <router-link class="nav-link" :to="{ name: 'home.index' }">
                            Visualizza i ristoranti</router-link>
                    </button>

                    <button class="navbar-toggler border-none" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon bg-light m-1"></span>
                        <span class="text-white fw-bold">Registrati o accedi</span>
                    </button>



                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <img src="images/deliveboo.png" class="d-inline-block align-text-top w-100">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link text-white fw-bold " href="/admin">Registrati o accedi
                                    </a>
<<<<<<< HEAD
=======



>>>>>>> 845caf46854709747529423f74f08a9fd5d82ec4
                                </li>
                            </ul>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

<<<<<<< HEAD
    </div>
=======
        <div class="content">
            <div class="video">
                <video autoplay muted loop class="video-jb">
                    <source src="img/jb.mp4">
                </video>
            </div>
        </div>
>>>>>>> 845caf46854709747529423f74f08a9fd5d82ec4

    

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

.navbar-toggler-icon {
    color: #00CCBC;
}

// .video-jb {

//     max-width: 100%;
//     max-height: 80%;
//     z-index: -1;
//     margin-top: 4rem;


// }

// @media(min-aspect-ratio: 16/9) {
//     .video-jb {
//         width: 100%;
//         height: auto;
//     }
// }

// @media(max-aspect-ratio: 16/9) {
//     .video-jb {
//         height: 100%;
//         width: auto;
//     }
// }

// @media(max-width:576px) {
//     .video-jb {
//         display: none;
//     }

//     .content {
//         background-image: url('../../../public/img/rider-mobile.jpg');
//         background-size: cover;
//         width: 100%;
//         aspect-ratio: 1;
//         margin-top: 3rem;

//     }
// }
</style>