<template>
    <div>
        <div v-if="loading">
            <Loading />
        </div>
        <div v-else>
            <Header :route="route" />
            <main class="container">
                <h1>Checkout</h1>

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
                        <tr v-for="dish in dishes" :key="dish.id">
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

                <div v-if="prova" class="container m-5">
                    <div class="proviamo">
                        <v-braintree
                            :authorization="apiToken"
                            locale="it_IT"
                            @success="onSuccess"
                            @error="onError"
                        >
                        </v-braintree>
                    </div>
                </div>
            </main>

            <Footer />
        </div>
    </div>
</template>

<script>
import Header from "../partials/Header.vue";
import Footer from "../partials/Footer.vue";
import Loading from "./Loading.vue";

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
            dishes: [],
            finalPrice: "",
            loading: false,
            route: this.$route.path,
            apiToken: "",
            prova: false,
            token: "",
        };
    },
    mounted() {
        this.getOrder();
        this.getApiToken();
    },
    methods: {
        getOrder() {
            this.dishes = list();
        },
        getfinalPrice() {
            this.finalPrice = total();
            return parseFloat(this.finalPrice).toFixed(2);
        },
        deleteDish(id) {
            remove(id);
            this.dishes = list();
        },
        changeQuantity(id, change) {
            quantity(id, change);
            this.dishes = list();
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
            axios
                .post("/api/payment/make", {
                    token: this.token,
                    price: this.getfinalPrice(),
                })
                .then((res) => {
                    alert(res.data.message);
                    console.log(res);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        getApiToken() {
            axios
                .get("/api/payment/generate")
                .then((res) => {
                    this.apiToken = res.data.token;
                    this.prova = true;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>

<style lang="scss" scoped>
main {
    margin-top: 80px;

    .proviamo {
        width: 40%;
        margin: 0 auto;
    }
}
</style>
