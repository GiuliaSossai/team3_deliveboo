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

                <div class="row my-3">
                    <div class="col-6 col-md-8 col-lg-9">
                        <span
                            v-for="category in restaurant.categories"
                            :key="category.id"
                            class="badge rounded-pill bg-light text-dark mr-1"
                            >{{ category.name }}</span
                        >
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="banner-info">
                            <p>Consegna</p>
                            <div class="banner-info__content">
                                <span
                                    >{{ restaurant.delivery_time }} -
                                    {{ restaurant.delivery_time + 15 }}
                                    min</span
                                >
                                <span>-</span>
                                <span>{{ restaurant.delivery_price }} €</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row py-5">
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

                            <div class="row">
                                <div
                                    class="col-12"
                                    v-for="dish in restaurant.dishes"
                                    :key="`dish${dish.id}`"
                                >
                                    <div
                                        v-if="type.id == dish.type_id"
                                        class="ls-dish"
                                    >
                                        <CardDish
                                            :dish="dish"
                                            :restaurant="restaurant"
                                        />
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
import CardDish from "./CardDish.vue";
import Footer from "../../partials/Footer.vue";
import Loading from "../Loading.vue";

export default {
    name: "Show",
    components: {
        Header,
        CardDish,
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
            idRestaurant: null,
        };
    },
    mounted() {
        this.getApi();
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
    .banner-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border: 5px solid #80808052;
        border-radius: 50px;
        p {
            font-size: 14px;
            font-weight: bold;
            margin: 0;
            border-bottom: 1px solid grey;
        }
        .banner-info__content {
            font-size: 12px;
        }
    }
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
}
</style>
