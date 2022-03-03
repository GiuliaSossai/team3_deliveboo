<template>
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
                        @getCategory = "getRestaurantsByCategory"
                    />
                </div>

                <div class="col">
                    <div class="card-all"
                        @click="getApi"
                    >
                        <div class="card-cat__text">
                            <p>tutti i ristoranti</p>
                        </div>   
                    </div>
                </div>
            </div>

            <h2>I Ristoranti</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mb-5">
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
</template>

<script>
import FirstSection from "./FirstSection.vue";
import CategoryCard from "./CategoryCard.vue";
import RestaurantCard from "./RestaurantCard.vue";

export default {
    name: "Restaurants",
    components: {
        FirstSection,
        CategoryCard,
        RestaurantCard,
    },

    data() {
        return {
            categories: [],
            apiUrl: "/api/restaurants",
            restaurants: [],
        };
    },

    mounted() {
        this.getApi();
    },

    methods: {
        getApi() {
            this.restaurants = [];
            axios
                .get(this.apiUrl)
                .then((res) => {
                    this.restaurants = res.data.restaurants;
                    this.categories = res.data.categories;
                    //console.log(this.categories);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        getRestaurantsByCategory($slug){
            this.restaurants = [];
            //console.log($slug);
            axios.get(this.apiUrl + '/restaurantcategory/' + $slug)
            .then( res => {
                this.restaurants = res.data.category.restaurants;
                //console.log(res.data.category.restaurants);
            })
            .catch((error) => {
                console.log(error);
            });
        }
    },
};
</script>

<style lang="scss" scoped>
main {
    margin-top: 90px;
    .card-all {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 220px;
        height: 80px;
        padding: 15px 5px;
        background-color: rgb(246, 246, 246);
        color: rgb(96, 218, 96);
        text-decoration: none;
        border-radius: 15px;
        margin-bottom: 15px;
        text-transform: uppercase;
        cursor: pointer;
        .card-cat__text {
            p {
                margin: 0;
                font-size: 20px;
                font-weight: 500;
            }
        }
    }
}
</style>
