<template>
    <main>
        <section class="work-with-us my-5">
            <div class="container">
                <h2 class="my-3 text-center text-md-start">Lavora con Deliveboo</h2>
                <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1 g-3 text-center justify-content-center">
                    <div class="col">
                        <div class="my-card my-w-75 mx-auto bg-red">
                            <div class="my-card-img">
                                <img src="/img/rider.jpeg" alt="deliveboo-rider">
                            </div>
                            <div class="my-card-body">
                                <h3>Rider</h3>
                                <p>Diventa un rider: flessibilità, ottimi guadagni e un mondo di vantaggi per te.</p>
                                <button class="btn btn-primary">Unisciti a noi</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="my-card my-w-75 mx-auto bg-orange">
                            <div class="my-card-img">
                                <img src="/img/restaurant.png" alt="deliveboo-restaurant">
                            </div>
                            <div class="my-card-body">
                                <h3>Ristoranti</h3>
                                <p>Diventa partner di Deliveroo e raggiungi sempre più clienti. Ci occupiamo noi della consegna, così che la tua unica preoccupazione sia continuare a preparare il miglior cibo.</p>
                                <button class="btn btn-primary">Diventa nostro partner</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="my-card my-w-75 mx-auto bg-gray">
                            <div class="my-card-img">
                                <img src="/img/work_with_us.jpeg" alt="deliveboo-work-with-us">
                            </div>
                            <div class="my-card-body">
                                <h3>Lavora con noi</h3>
                                <p>La nostra missione è trasformare il modo in cui le persone mangiano. È un obiettivo ambizioso, come noi, e ci servono persone che ci aiutino a raggiungerlo.</p>
                                <button class="btn btn-primary">Scopri di più</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
    export default {

    }
</script>

<style lang="scss" scoped>

.work-with-us{

        .container {
            max-width: 1140px;
        }

        .bg-red {
            background-color: #ED4437;
        }

        .bg-orange {
            background-color: #F1803A;
        }

        .bg-gray {
            background-color: #BAC3C3;
        }

        .my-card {
            min-height: 500px;

            .card-text {
                min-height: 92px;
            }

            .my-card-body {
                padding: 1rem;
                color: #fff;

                p {
                    height: 125px;
                }
            }

            .my-card-img {
                width: 100%;
                clip-path: polygon(0 0, 100% 0, 100% 80%, 0% 100%);

                img {
                    width: 100%;
                    height: 200px;
                    object-fit: cover;
                }
            }
        }
    }

    @media only screen and (max-width: 768px) {

        .my-card {
            margin: 0 4rem;
        }
    }
</style>