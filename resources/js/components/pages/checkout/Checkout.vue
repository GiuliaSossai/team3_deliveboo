<template>
    <div>
        <div v-if="loading">
            <Loading />
        </div>
        <div v-else :class="{ overflowhidden: isLoading }">
            <div class="row p-0 m-0" id="ls-mobile">
                <div class="col-12 col-md-7 col-lg-6 p-0">
                    <div class="ls-logo">
                        <router-link :to="{ name: 'home' }">
                            <div class="logo">
                                <p class="d-inline-block m-0 p-0 text-black">
                                    delive<span class="m-0 p-0 font-weight-bold"
                                        >Boo</span
                                    >
                                </p>
                            </div>
                        </router-link>
                    </div>
                    <div class="ls-container__left">
                        <h1>{{ cart[0].restaurant_name }}</h1>
                        <form @submit.prevent="buy">
                            <div class="ls-form">
                                <div class="ls-form name">
                                    <div class="logo">
                                        <i
                                            class="fa-solid fa-id-card fa-2xl"
                                        ></i>
                                    </div>
                                    <div class="content">
                                        <input
                                            type="text"
                                            v-model="name"
                                            id="name"
                                            placeholder="Inserisci il nome"
                                        />
                                        <p v-if="errors.name" class="errors">
                                            {{ errors.name[0] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="ls-form surname">
                                    <div class="logo">
                                        <i
                                            class="fa-solid fa-id-card fa-2xl"
                                        ></i>
                                    </div>
                                    <div class="content">
                                        <input
                                            type="text"
                                            v-model="surname"
                                            id="surname"
                                            placeholder="Inserisci il cognome"
                                        />
                                        <p v-if="errors.surname" class="errors">
                                            {{ errors.surname[0] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="ls-form address">
                                    <div class="logo">
                                        <i
                                            class="fa-solid fa-location-dot fa-2xl"
                                        ></i>
                                    </div>
                                    <div class="content">
                                        <input
                                            type="text"
                                            v-model="address"
                                            id="address"
                                            placeholder="Inserisci l'indirizzo di consegna"
                                        />
                                        <p v-if="errors.address" class="errors">
                                            {{ errors.address[0] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="ls-form email">
                                    <div class="logo">
                                        <i
                                            class="fa-solid fa-envelope fa-2xl"
                                        ></i>
                                    </div>
                                    <div class="content">
                                        <input
                                            type="email"
                                            v-model="email"
                                            id="email"
                                            placeholder="Inserisci l'indirizzo email"
                                        />
                                        <p v-if="errors.email" class="errors">
                                            {{ errors.email[0] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="ls-form phone">
                                    <div class="logo">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="content">
                                        <input
                                            type="text"
                                            v-model="phone"
                                            id="phone"
                                            placeholder="Inserisci il numero di telefono"
                                        />
                                        <p v-if="errors.phone" class="errors">
                                            {{ errors.phone[0] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Bottone d-none richiamato al bottone invia ordine  -->
                            <button
                                ref="takeForm"
                                type="submit"
                                class="d-none"
                            />
                        </form>
                        <div class="ls-braintree">
                            <v-braintree
                                :authorization="apiToken"
                                locale="it_IT"
                                @success="onSuccess"
                                @error="onError"
                            >
                                <template v-slot:button="slotProps">
                                    <button
                                        @click="slotProps.submit"
                                        class="d-none"
                                        ref="payBtn"
                                    ></button>
                                </template>
                            </v-braintree>
                        </div>

                        <Cart />
                    </div>
                </div>
                <div class="col-12 col-md-5 offset-lg-1 col-lg-5 p-0">
                    <ContentRight
                        class="h-100"
                        @sendOrder="beforeBuy()"
                        :sending="sending"
                    />
                </div>
            </div>
            <footer class="footer">
                <div class="footer_left">
                    <span>© 2022 deliveBoo Technologies Inc.</span>
                </div>
                <div class="footer_right">
                    <a href="#">Informativa sulla privacy</a>
                    <span>|</span>
                    <a href="#">Termini e condizioni</a>
                </div>
            </footer>
            <Success v-if="isLoading" :isSuccess="isSuccess" />
        </div>
    </div>
</template>

<script>
import Cart from "./Cart.vue";
import ContentRight from "./ContentRight.vue";
import Success from "./Success.vue";
import Loading from "../Loading.vue";

import { list, total, destroy } from "cart-localstorage";

export default {
    name: "Checkout",
    components: {
        Cart,
        ContentRight,
        Success,
        Loading,
    },

    data() {
        return {
            cart: [],
            loading: true,
            apiToken: "",
            name: "",
            surname: "",
            address: "",
            email: "",
            phone: "",
            errors: {},
            sending: false,
            isLoading: false,
            isSuccess: false,
        };
    },
    mounted() {
        this.getOrder();
        this.getApiToken();
        this.backRestaurantUrl();
    },
    methods: {
        getOrder() {
            this.cart = list();
        },
        getfinalPrice() {
            let totalPrice = parseFloat(total());
            let delivery_price = parseFloat(this.cart[0].delivery_price);
            let finalPrice = (totalPrice + delivery_price).toFixed(2);
            return finalPrice;
        },

        // Prendo il token da inserire nel campo authorization
        getApiToken() {
            axios
                .get("/api/payment/generate")
                .then((res) => {
                    this.apiToken = res.data.token;
                    this.loading = false;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        // Funzioni di Braintree
        onSuccess(payload) {
            let token = payload.nonce;
            this.buy(token);
        },
        onError(error) {
            // let message = error.message;
        },

        buy(token) {
            this.sending = true;
            this.isLoading = true;
            axios
                .post("/api/payment/make", {
                    token: token,
                    total: this.getfinalPrice(),
                    name: this.name,
                    surname: this.surname,
                    address: this.address,
                    email: this.email,
                    phone: this.phone,
                    cart: list(),
                })
                .then((res) => {
                    this.sending = false;
                    this.isLoading = false;
                    console.log("Ritorna chiamata post", res.data);
                    if (res.data.errors) {
                        this.errors = res.data.errors;
                    } else {
                        this.isLoading = true;
                        this.isSuccess = true;
                        console.log("success", this.isSuccess);
                        this.errors = {};
                        this.name = "";
                        this.surname = "";
                        this.address = "";
                        this.email = "";
                        this.phone = "";
                        if (res.data.success == true) {
                            destroy();
                        }
                        // alert(res.data.message);
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        // Intercetto il click del bottone vue-braintree
        beforeBuy() {
            this.$refs.payBtn.click();
            this.$refs.takeForm.click();
        },

        // Torno alla home dei ristoranti sei il carrello è vuoto
        backRestaurantUrl() {
            if (this.cart == 0) this.$router.push({ name: "restaurants" });
        },
    },
};
</script>

<style lang="scss" scoped>
.ls-logo {
    margin: 25px 50px;
    a {
        color: black;
    }
    .logo {
        cursor: pointer;
        font-size: 38px;
        span {
            color: rgb(96, 218, 96);
        }
    }
}
.ls-container__left {
    padding: 0 50px;
    h1 {
        font-weight: 700;
    }
    .ls-form {
        label {
            display: block;
        }
        .ls-form {
            padding: 20px 0;
            display: flex;
            align-items: center;
            border-bottom: 1px solid grey;
            .logo {
                margin-right: 15px;
            }
            .content {
                width: 100%;
            }
        }
        input {
            border: hidden;
            width: 100%;
            padding: 8px 20px;
        }
        .errors {
            font-size: 12px;
            color: red;
            margin: 0;
            padding: 0 20px;
        }
    }
    .ls-braintree {
        padding-top: 15px;
        padding-bottom: 35px;
    }
}

.footer {
    display: flex;
    justify-content: space-between;
    background-color: black;
    padding: 15px 25px;
    color: white;
    font-size: 14px;
    a {
        color: white;
    }
}

.overflowhidden {
    height: 100vh;
    overflow: hidden;
}
</style>
