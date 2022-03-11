<template>
    <section class="container">
        <div class="ls-text">
            <h2>Consegna di Cibo a Perugia</h2>
            <p>
                Ordina dal tuo ristorante di Perugia preferito e ricevi il cibo
                alla tua porta con deliveBoo. Non importa se vuoi ordinare la
                colazione, il pranzo, la cena o solo uno snack: con deliveBoo
                puoi scoprire nuovi ristoranti a Perugia in pochi secondi.
                Sfoglia le numerose opzioni disponibili, invia l'ordine e
                monitora tutto il tragitto.
            </p>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="ls-box">
                    <img src="img/restaurants/img1.jpg" alt="img1" />
                    <div class="box__text">
                        <h3>Spendi 50€, ricevi 15€ di sconto &#129321;</h3>
                        <p>Inserisci il codice Sconto20 !</p>
                        <span class="ls-btn">Ricorda SCONTO20! &#128526;</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="ls-box">
                    <img src="img/restaurants/img2.jpg" alt="img2" />
                    <div class="box__text">
                        <h5>
                            Ricorda di inserire il tuo numero civico
                            nell'indirizzo e specifica il citofono!
                        </h5>
                        <p>Non perderti nemmeno una consegna!</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="ls-box">
                    <img src="img/restaurants/img3.jpg" alt="img3" />
                    <div class="box__text">
                        <h3>Ehi! A Perugia ci sono delle gustose novità!</h3>
                        <p>Goditele e osservi tutti i ristoranti!</p>
                        <span class="ls-btn">Buona navigazione &#128521;</span>
                    </div>
                </div>
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
    padding: 25px;
    .ls-text {
        margin-bottom: 50px;
        h2 {
            font-size: 42px;
        }
        p {
            font-size: 18px;
        }
    }
    .ls-box {
        position: relative;
        height: 200px;
        border-radius: 15px;
        margin-bottom: 25px;
        overflow: hidden;
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(60%);
        }
        .box__text {
            position: absolute;
            top: 0;
            left: 0;
            padding: 15px;
            color: #fff;
            z-index: 2;
            .ls-btn {
                display: inline-block;
                padding: 2px 8px;
                border-radius: 15px;
                background-color: #fff;
                color: #000;
                font-weight: 600;
                margin-top: 25px;
            }
        }
    }
}
</style>
