<template>
    <footer>
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-6">
                        <div class="logo">
                            <p class="d-inline-block m-0 p-0 text-black">
                                delive<span class="m-0 p-0 font-weight-bold"
                                    >Boo</span
                                >
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
                            <li>
                                <a
                                    href="https://www.linkedin.com/in/luca-sunseri/"
                                    >Luca Sunseri</a
                                >
                            </li>
                            <li><a href="#">Giulia Sossai</a></li>
                            <li><a href="#">Giuseppe Salis</a></li>
                            <li><a href="#">Anthony Barbagallo</a></li>
                            <li><a href="#">Michele Di Gennaro</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="footer__botton">
                <div class="row align-items-center">
                    <div class="col-12 col-md-3 mb-5">
                        <div class="ls-icon">
                            <span
                                ><i class="fa-brands fa-instagram ml-2"></i
                            ></span>
                            <span
                                ><i class="fa-brands fa-facebook ml-2"></i
                            ></span>
                            <span>
                                <i class="fa-brands fa-twitter ml-2"></i
                            ></span>
                            <span>
                                <i class="fa-brands fa-tiktok ml-2"></i
                            ></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 mb-5">
                        <ul class="text-md-right">
                            <li class="d-md-inline-block mb-2 mb-md-0">
                                <a href="#">Informativa sulla privacy</a>
                            </li>
                            <li class="d-md-inline-block mb-2 mb-md-0 ml-md-4">
                                <a href="#">Termini e condizioni</a>
                            </li>
                            <li class="d-md-inline-block mb-2 mb-md-0 ml-md-4">
                                <a href="#">Tariffe</a>
                            </li>
                            <li class="d-md-inline-block mb-2 mb-md-0 ml-md-4">
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
            span {
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
                cursor: pointer;
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
        .ls-icon {
            span {
                font-size: 16px;
                margin-left: 3px;
                cursor: pointer;
            }
        }
        ul {
            margin: 0;
            padding: 0;
        }
        p {
            margin-top: 5px;
            text-align: right;
        }
    }
}
</style>
