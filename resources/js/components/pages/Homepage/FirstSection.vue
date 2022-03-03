<template>
    <section class="container my-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <img
                    src="img/homepage/d68c5f5ddd33d16a8d6855987410673b.svg"
                    alt=""
                />
                <h5>Offri da mangiare ai tuoi dipendenti</h5>
                <a href="#">Crea account aziendale</a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <img
                    src="img/homepage/f37288f1ff264310c703ea536190f79c.svg"
                    alt=""
                />
                <h5>Il tuo ristorante, a domicilio</h5>
                <a href="/register">Aggiungi il tuo ristorante</a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <img
                    src="img/homepage/43d9d02eb8ef72ff2029a296cfb91180.svg"
                    alt=""
                />
                <h5>Consegna con DeliveBoo</h5>
                <a href="#">Registrati per consegnare</a>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "FirstSection",
};
</script>

<style lang="scss" scoped>
section {
    img {
        width: 100%;
    }
    h5 {
        font-size: 19px;
        color: black;
    }
    a {
        text-decoration: underline;
        font-size: 14px;
        color: black;
    }
}
</style>
