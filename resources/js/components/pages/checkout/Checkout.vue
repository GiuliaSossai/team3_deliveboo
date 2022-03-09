<template>
    <div>
        <div v-if="loading">
            <Loading />
        </div>
        <div v-else>
            <Header :route="route" />
            <main class="container">
                <h1>Nome Ristorante</h1>

                <div class="row">
                    <div class="col-6">
                        <form @submit.prevent="buy">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="name"
                                            id="name"
                                            required
                                        />
                                        <p v-if="errors.name" class="errors">
                                            {{ errors.name[0] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="surname">Cognome</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="surname"
                                            id="surname"
                                            required
                                        />
                                        <p v-if="errors.surname" class="errors">
                                            {{ errors.surname[0] }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Indirizzo</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="address"
                                            id="address"
                                            required
                                        />
                                        <p v-if="errors.address" class="errors">
                                            {{ errors.address[0] }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            v-model="email"
                                            id="email"
                                            required
                                        />
                                        <p v-if="errors.email" class="errors">
                                            {{ errors.email[0] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phone">Telefono</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="phone"
                                            id="phone"
                                            required
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

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Prezzo</th>
                                    <th scope="col">Quantità</th>
                                    <th scope="col">Totale</th>
                                    <th scope="col">Elimina</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="dish in cart" :key="dish.id">
                                    <td>{{ dish.name }}</td>
                                    <td>{{ dish.price }}€</td>
                                    <td>
                                        <div
                                            class="btn btn-success"
                                            @click="changeQuantity(dish.id, -1)"
                                        >
                                            -
                                        </div>
                                        {{ dish.quantity }}
                                        <div
                                            class="btn btn-success"
                                            @click="changeQuantity(dish.id, +1)"
                                        >
                                            +
                                        </div>
                                    </td>
                                    <td>
                                        {{
                                            parseFloat(
                                                dish.price * dish.quantity
                                            ).toFixed(2)
                                        }}€
                                    </td>
                                    <td>
                                        <div
                                            class="btn btn-danger"
                                            @click="deleteDish(dish.id)"
                                        >
                                            Elimina
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Totale:</td>
                                    <td>{{ getfinalPrice() }}€</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-5 offset-1">
                        <h2>Riepilogo ordine</h2>
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

                        <div class="btn btn-success" @click.prevent="beforeBuy">
                            Invia Ordine
                        </div>
                    </div>
                    <!-- <div v-if="prova" class="col-6">
                        <form @submit.prevent="buy">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="name"
                                            id="name"
                                            required
                                        />
                                        <p v-if="errors.name" class="errors">
                                            {{ errors.name[0] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="surname">Cognome</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="surname"
                                            id="surname"
                                            required
                                        />
                                        <p v-if="errors.surname" class="errors">
                                            {{ errors.surname[0] }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Indirizzo</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="address"
                                            id="address"
                                            required
                                        />
                                        <p v-if="errors.address" class="errors">
                                            {{ errors.address[0] }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            v-model="email"
                                            id="email"
                                            required
                                        />
                                        <p v-if="errors.email" class="errors">
                                            {{ errors.email[0] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phone">Telefono</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="phone"
                                            id="phone"
                                            required
                                        />
                                        <p v-if="errors.phone" class="errors">
                                            {{ errors.phone[0] }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8">
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
                            </div>

                            <button
                                type="submit"
                                class="btn btn-danger m-2"
                                @click="beforeBuy"
                            >
                                Prova
                            </button>
                        </form>
                    </div> -->
                </div>
            </main>

            <Footer />
        </div>
    </div>
</template>

<script>
import Header from "../../partials/Header.vue";
import Footer from "../../partials/Footer.vue";
import Loading from "../Loading.vue";

import { list, total, remove, quantity } from "cart-localstorage";

export default {
    name: "Checkout",
    components: {
        Header,
        Footer,
        Loading,
    },

    data() {
        return {
            restaurant: {},
            cart: [],
            finalPrice: "",
            loading: true,
            route: this.$route.path,
            apiToken: "",
            prova: false,
            token: "",
            name: "",
            surname: "",
            address: "",
            email: "",
            phone: "",
            errors: {},
        };
    },
    mounted() {
        this.getOrder();
        this.getApiToken();
    },
    methods: {
        getOrder() {
            this.cart = list();
        },
        getfinalPrice() {
            this.finalPrice = total();
            return parseFloat(this.finalPrice).toFixed(2);
        },
        deleteDish(id) {
            remove(id);
            this.cart = list();
        },
        changeQuantity(id, change) {
            quantity(id, change);
            this.cart = list();
        },

        // Prendo il token da inserire nel campo authorization
        getApiToken() {
            axios
                .get("/api/payment/generate")
                .then((res) => {
                    this.apiToken = res.data.token;
                    this.prova = true;
                    this.loading = false;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        onSuccess(payload) {
            let token = payload.nonce;
            this.token = token;
            this.buy();
        },
        onError(error) {
            // let message = error.message;
        },

        buy() {
            console.log("clicco");
            axios
                .post("/api/payment/make", {
                    token: this.token,
                    total: this.getfinalPrice(),
                    name: this.name,
                    surname: this.surname,
                    address: this.address,
                    email: this.email,
                    phone: this.phone,
                    cart: list(),
                })
                .then((res) => {
                    console.log("primo", res.data);
                    if (res.data.errors) {
                        this.errors = res.data.errors;
                    } else {
                        this.errors = {};
                        this.name = "";
                        this.surname = "";
                        this.address = "";
                        this.email = "";
                        this.phone = "";
                        // alert(res.data.message);
                        console.log(this.errors);
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
    },
};
</script>

<style lang="scss" scoped>
main {
    margin-top: 80px;
}
.errors {
    font-size: 12px;
    color: red;
}
</style>
