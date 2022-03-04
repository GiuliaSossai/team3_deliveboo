<template>
    <footer>
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-6">
                        <div class="logo">
                            <p class="d-inline-block m-0 p-0">delive</p>
                            <p class="d-inline-block m-0 p-0 font-weight-bold">
                                Boo
                            </p>
                        </div>
                        <div class="image">
                            <img src="/img/footer/Apple.svg" alt="Apple" />
                            <img src="/img/footer/Google.png" alt="Google" />
                        </div>
                    </div>
                    <div class="col-12 my-5 col-md-4 my-md-0 col-lg-3">
                        <ul>
                            <li><a href="#">Richiedi assistenza</a></li>
                            <li><a href="#">Aggiungi il tuo ristorante</a></li>
                            <li><a href="#">Registrati per consegnare</a></li>
                            <li><a href="#">Crea un account aziendale</a></li>
                            <li>
                                <a href="#">Risparmia sul tuo primo ordine</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <ul>
                            <li><a href="#">Ristoranti nella mia zona</a></li>
                            <li><a href="#">Visualizza tutte le città</a></li>
                            <li><a href="#">Ritiro vicino a me</a></li>
                            <li><a href="#">Crea un account aziendale</a></li>
                            <li>
                                <a href="#">Informazioni su Uber Eats</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="footer__botton">
                <div class="row">
                    <div class="col-12 col-md-3">Icone</div>
                    <div class="col-12 col-md-9">
                        <ul class="text-md-right">
                            <li class="d-md-inline-block">
                                <a href="#">Informativa sulla privacy</a>
                            </li>
                            <li class="d-md-inline-block ml-md-4">
                                <a href="#">Termini e condizioni</a>
                            </li>
                            <li class="d-md-inline-block ml-md-4">
                                <a href="#">Tariffe</a>
                            </li>
                            <li class="d-md-inline-block ml-md-4">
                                <a href="#"
                                    >Non vendere le mie informazioni personali
                                    (California)</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
                <p>
                    Questo sito è protetto da reCAPTCHA. Si applicano
                    <a href="#">Informativa sulla privacy</a> e
                    <a href="#">Termini e condizioni</a> di Google.
                </p>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer",
};
</script>

<style lang="scss" scoped>
footer {
    background-color: #000;
    color: #fff;
    padding-top: 50px;
    padding-bottom: 80px;
    ul {
        list-style: none;
        padding: 0;
    }
    a {
        color: white;
    }
    .footer__top {
        .logo {
            height: 30%;
            cursor: pointer;
            font-size: 38px;
            p:nth-of-type(2) {
                color: rgb(96, 218, 96);
            }
        }
        .image {
            height: 70%;
            display: flex;
            align-items: flex-end;
            img {
                width: 30%;
                margin-right: 25px;
                margin-top: 15px;
            }
        }
        .col {
            margin-bottom: 25px;
        }
        li {
            margin-bottom: 20px;
        }
    }
    .line {
        height: 1px;
        width: 100%;
        background-color: #fff;
        margin: 35px 0;
    }
    .footer__botton {
        font-size: 14px;
        li {
            margin-bottom: 20px;
        }
        p {
            margin-top: 5px;
            text-align: right;
        }
    }
}
</style>
