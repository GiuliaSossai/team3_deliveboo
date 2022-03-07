<template>
    <div>
        <div v-if="loading">
            <Loading />
        </div>
        <div v-else>
            <Header />
            <main>
                <FirstSection />
                <div class="container">
                    <h2 class="mb-4">Esplora per Categorie</h2>
                    <div
                        class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 my-5"
                    >
                        <div
                            class="col"
                            v-for="category in categories"
                            :key="`cat${category.id}`"
                        >
                            <CategoryCard
                                :category="category"
                                @getCategory="getRestaurantsByCategory"
                            />
                        </div>

                        <div class="col">
                            <div class="card-all" @click="getApi">
                                <div class="card-cat__text">
                                    <p>Tutte</p>
                                </div>
                                <div class="card-cat__image">
                                    <img
                                        src="/img/img-seeder/categories/tutte.png"
                                        alt="Tutte le categorie"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2>I Ristoranti</h2>
                    <div
                        class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mb-5"
                    >
                        <!-- <div class="col d-flex">
                    <RestaurantCard />
                </div> -->
                        <div
                            class="col d-flex justify-content-center"
                            v-for="restaurant in restaurants"
                            :key="`rest${restaurant.id}`"
                        >
                            <RestaurantCard :restaurant="restaurant" />
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
import FirstSection from "./FirstSection.vue";
import CategoryCard from "./CategoryCard.vue";
import RestaurantCard from "./RestaurantCard.vue";
import Footer from "../../partials/Footer.vue";
import Loading from "../Loading.vue";

export default {
    name: "Restaurants",
    components: {
        Header,
        FirstSection,
        CategoryCard,
        RestaurantCard,
        Footer,
        Loading,
    },

    data() {
        return {
            categories: [],
            apiUrl: "/api/restaurants",
            restaurants: [],
            loading: true,
        };
    },

    mounted() {
        this.getApi();
    },

    methods: {
        getApi() {
            this.restaurants = [];
            this.loading = true;
            axios
                .get(this.apiUrl)
                .then((res) => {
                    this.restaurants = res.data.restaurants;
                    this.categories = res.data.categories;
                    //console.log(this.categories);
                    this.loading = false;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        getRestaurantsByCategory($slug) {
            this.restaurants = [];
            this.loading = true;
            //console.log($slug);
            axios
                .get(this.apiUrl + "/restaurantcategory/" + $slug)
                .then((res) => {
                    this.restaurants = res.data.category.restaurants;
                    //console.log(res.data.category.restaurants);
                    this.loading = false;
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
    margin-top: 90px;
    .card-all {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 200px;
        height: 70px;
        padding: 0px 15px;
        background-color: rgb(246, 246, 246);
        color: black;
        text-decoration: none;
        border-radius: 15px;
        margin-bottom: 15px;
        cursor: pointer;
        // transizioni
        outline: 0px solid #60da60;
        transform: scale(1);
        transition: all 0.3s linear;
        &:hover {
            transform: scale(1.05);
            outline: 2px solid #60da60;
            outline-offset: 4px;
        }
        .card-all.active {
            transform: scale(1.05);
            outline: 2px solid #60da60;
            outline-offset: 4px;
        }
        .card-cat__text {
            p {
                margin: 0;
                font-size: 20px;
                font-weight: 500;
            }
        }
        .card-cat__image {
            display: flex;
            justify-content: flex-end;
            width: 60%;
            height: 100%;
            img {
                width: 80%;
                height: 100%;
                object-fit: contain;
            }
        }
    }
}
</style>
