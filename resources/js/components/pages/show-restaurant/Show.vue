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
                            v-for="(category, index) in restaurant.categories"
                            :key="`category${index}`"
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
                    <div
                        class="col-3 d-flex flex-column align-items-center"
                        id="sticky"
                    >
                        <div class="ls-types mb-5">
                            <div v-for="type in types" :key="`type${type.id}`">
                                <a :href="`#${type.name}`">{{ type.name }}</a>
                            </div>
                        </div>
                        <div class="d-none d-md-block">
                            <p class="font-weight-bold">
                                Ulteriori informazioni:
                            </p>
                            <ul>
                                <li>
                                    <span
                                        ><i class="fa-solid fa-location-dot"></i
                                    ></span>
                                    {{ restaurant.address }}
                                </li>
                                <li>
                                    <span
                                        ><i class="fa-solid fa-phone"></i
                                    ></span>
                                    {{ restaurant.phone }}
                                </li>
                                <li>
                                    <span
                                        ><i class="fa-solid fa-envelope"></i
                                    ></span>
                                    {{ restaurant.email }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-9 offset-md-1 col-md-8 ls-style">
                        <div v-for="type in types" :key="`type2-${type.id}`">
                            <div :id="type.name" class="anchor"></div>
                            <h4>{{ type.name }}</h4>

                            <div class="row">
                                <div
                                    class="col-12 col-lg-6"
                                    v-for="dish in restaurant.dishes.filter(
                                        (dish) => type.id == dish.type_id
                                    )"
                                    :key="`dish${dish.id}`"
                                >
                                    <div class="ls-dish">
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
#sticky {
    position: -webkit-sticky;
    position: sticky;
    top: 100px;
    max-height: 100vh;
}

.anchor {
    display: block;
    position: relative;
    top: -90px;
    visibility: hidden;
}

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
    ul {
        list-style: none;
        padding: 5px;
        li {
            font-size: 14px;
        }
        span {
            color: #60da60;
            font-size: 16px;
        }
    }
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

// @media only screen and (max-width: 767px) {
//     #sticky {
//         position: static;
//     }
// }
</style>
