<template>
    <div>
        <div v-if="loading">
            <Loading />
        </div>
        <div v-else>
            <Header />
            <main class="container">
                <h1>Ristorante: {{ restaurant.name }}</h1>
                <ul>
                    <li
                        v-for="dish in restaurant.dishes"
                        :key="dish.id"
                        class="my-5"
                    >
                        {{ dish.name }}
                        <div
                            class="btn btn-primary"
                            @click="
                                addItem(dish);
                                getCartQuantity();
                            "
                        >
                            +
                        </div>
                    </li>
                </ul>
            </main>
            <Footer />
        </div>
    </div>
</template>

<script>
import Header from "../../partials/Header.vue";
import Footer from "../../partials/Footer.vue";
import Loading from "../Loading.vue";

import { add, total, list, quantity, destroy } from "cart-localstorage";

import { EventBus } from "../../../global-event-bus.js";

export default {
    name: "Show",
    components: {
        Header,
        Footer,
        Loading,
    },
    data() {
        return {
            loading: true,
            apiUrl: "/api/restaurants/",
            slug: this.$route.params.slug,
            restaurant: [],
            cartQuantity: 0,
            count: 0,
            idRestaurant: null,
        };
    },
    mounted() {
        this.getApi();
        this.printQuantity();
    },
    methods: {
        getApi() {
            axios
                .get(this.apiUrl + this.slug)
                .then((response) => {
                    // handle success
                    this.restaurant = response.data;
                    this.idRestaurant = this.restaurant.id;
                    this.loading = false;
                })
                .catch((error) => {
                    // handle error
                    console.log(error);
                });
        },
        addItem(item) {
            if (
                this.cartQuantity == 0 ||
                this.idRestaurant == this.getRestaurantIdFromCart()
            ) {
                add(item);
            } else {
                if (confirm("Vuoi davvero eliminare il carrello?")) {
                    destroy();
                    add(item);
                }
            }
        },
        printQuantity() {
            let dishes = list();
            this.cartQuantity = 0;
            for (let key in dishes) {
                this.cartQuantity += dishes[key].quantity;
            }
            return this.cartQuantity;
        },
        getCartQuantity() {
            this.cartQuantity = this.printQuantity();
            EventBus.$emit("getCartQuantity", this.cartQuantity);
        },
        getRestaurantIdFromCart() {
            let dishes = list();
            const id = dishes[0].restaurant_id;
            return id;
        },
    },
};
</script>

<style lang="scss" scoped>
main {
    margin-top: 100px;
    margin-bottom: 100px;
    min-height: 500px;
}
</style>
