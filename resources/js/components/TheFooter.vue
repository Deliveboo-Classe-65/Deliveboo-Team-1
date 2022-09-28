<template>
    <div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col p-3">
                        <h3>Scopri Deliveroo</h3>
                        <ul class="list-unstyled">
                            <li>Investitori</li>
                            <li>Chi siamo</li>
                            <li>Ristoranti</li>
                            <li>Altro</li>
                            <li>Pressroom</li>
                            <li>Programmazione</li>
                            <li>Design</li>
                            <li>Lavora con noi</li>
                            <li>Diventa nostro partner</li>
                        </ul>
                    </div>
                    <div class="col p-3">
                        <h3>Note legali</h3>
                        <ul class="list-unstyled">
                            <li>Termini & Condizioni</li>
                            <li>Informativa sulla privacy</li>
                            <li>Cookies</li>
                        </ul>
                    </div>
                    <div class="col p-3">
                        <h3>Aiuto</h3>
                        <ul class="list-unstyled">
                            <li>Contatti</li>
                            <li>FAQ</li>
                            <li>Tipi di cucina</li>
                        </ul>
                    </div>
                    <div class="col p-3">
                        <h3>Porta Deliveboo con te</h3>
                        <div class="store-icon"><img src="/storage/img/footer/disponibile_su_app_store.png" alt="App Store icon"></div>
                        <div class="store-icon"><img src="/storage/img/footer/disponibile_su_google_play.png" alt="Google Play icon"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 d-flex flex-row">
                        <font-awesome-icon icon="fa-brands fa-facebook" class="socials" />
                        <font-awesome-icon icon="fa-brands fa-twitter" class="socials" />
                        <font-awesome-icon icon="fa-brands fa-instagram" class="socials" />
                    </div>
                    <div class="col-6 copyright">©2022 DeliveBoo</div>
                </div>
            </div>


        </footer>
    </div>
</template>




<script>
export default {

}
</script>

<style lang="scss" scoped>
footer {
    background-color: #2E3333;
    //     position: absolute;
    //     bottom: 0;
    //     width: 100%;

    li:hover {
        color: #00b8a9;
    }

    .col {
        background-color: #434848;
        color: #fff;
        margin: 2rem 0.5rem;
        border-radius: 4px;
    }

    .store-icon {
        width: 135px;
        height: 40px;
        margin: 1rem 0;

        img {
            width: 100%;
        }
    }

    .socials {
        display: flex;
        flex-direction: row;
        height: 20px;
        width: 20px;
        color: #fff;
        margin: 1rem 1rem 1rem 0;

        &:hover {
            color: #1877f2;
        }
    }

    .copyright {
        color: #585c5c;
        text-align: right;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .container {
        max-width: 1140px;
    }
}
</style>