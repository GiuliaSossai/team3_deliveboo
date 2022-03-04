<template>
    <div>
        <div v-if="loading">
            <Loading />
        </div>
        <div v-else>
            <Header :cart="cart" />
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
            cart: false,
        };
    },
    mounted() {
        this.getOrder();
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
    },
};
</script>

<style lang="scss" scoped>
main {
    margin-top: 100px;
    min-height: 500px;
}
</style>
