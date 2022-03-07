<template>
    <div>
        <div v-if="loading">
            <Loading />
        </div>
        <div v-else>
            <Header class="ls-header" />

            <div class="ls-jumbo">
                <img :src="`/${restaurant.photo_bg}`" :alt="restaurant.name" />
            </div>

            <main class="container">
                <h1>{{ restaurant.name }}</h1>
                <span
                    v-for="category in restaurant.categories"
                    :key="category.id"
                    class="badge rounded-pill bg-light text-dark mr-1"
                    >{{ category.name }}</span
                >

                <div class="row">
                    <div class="col-3">
                        <div class="ls-types">
                            <div v-for="type in types" :key="`type${type.id}`">
                                <p>{{ type.name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 offset-md-1 col-md-8 ls-style">
                        <div v-for="type in types" :key="`type2-${type.id}`">
                            <h4>{{ type.name }}</h4>

                            <div
                                v-for="dish in restaurant.dishes"
                                :key="`dish${dish.id}`"
                            >
                                <div
                                    v-if="type.id == dish.type_id"
                                    class="ls-dish"
                                >
                                    <div class="ls-dish__image">
                                        <img
                                            :src="`/${dish.photo}`"
                                            :alt="dish.name"
                                        />
                                    </div>
                                    <div class="ls-dish__text">
                                        <div class="div">
                                            <h4>{{ dish.name }}</h4>
                                            <p>{{ dish.price }}€</p>
                                            <p>{{ dish.description }}</p>
                                        </div>
                                        <div class="div">
                                            <div
                                                class="ls-plus p-2"
                                                @click="
                                                    addItem(dish);
                                                    getCartQuantity();
                                                "
                                            >
                                                <i
                                                    class="fas fa-plus-circle fa-xl"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

import { add, list, destroy } from "cart-localstorage";

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
            types: [],
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
                    this.restaurant = response.data.restaurant;
                    this.types = response.data.types;
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
.ls-header {
    box-shadow: rgb(226, 226, 226) 0px -2px 0px inset;
    background-color: rgb(245, 245, 245);
}
.ls-jumbo {
    margin-top: 80px;
    img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
}
main {
    margin-top: 15px;
    margin-bottom: 100px;
    min-height: 500px;
    .ls-types {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 35px;
        div {
            padding: 10px;
            a {
                color: black;
                text-decoration: none;
            }
        }
    }
    .ls-style {
        border-left: 1px solid rgb(68, 68, 68);
        padding-left: 6%;
    }
    .ls-dish {
        display: flex;
        align-items: center;
        margin: 25px 0;
        user-select: none;
        cursor: pointer;
        &:hover {
            box-shadow: 0px 4px 16px rgb(0 0 0 / 12%);
            transition: box-shadow 0.3s linear 0s;
        }
        .ls-dish__image {
            width: 75px;
            height: 75px;
            border: 1px solid black;
            border-radius: 50%;
            overflow: hidden;
            margin: 8px;
            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
        .ls-dish__text {
            display: flex;
            justify-content: space-between;
            width: calc(100% - 75px);
            padding-left: 15px;
            p {
                margin: 0;
                padding: 0;
            }
            .ls-plus {
                padding: 2px;
                margin-right: 25px;
                cursor: pointer;
                &:hover {
                    transform: scale(1.15);
                    transition: transform 0.3s ease-in-out 0s;
                }
            }
        }
    }
}
</style>
