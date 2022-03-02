<template>
    <main>
        <FirstSection />
        <div class="container">
            <h2 class="mb-4">Esplora per Categorie</h2>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5">
                <div class="col">
                    <CategoryCard />
                </div>
                <div class="col">
                    <CategoryCard />
                </div>
                <div class="col">
                    <CategoryCard />
                </div>
                <div class="col">
                    <CategoryCard />
                </div>
                <div class="col">
                    <CategoryCard />
                </div>
            </div>
            <h1 class="my-5">I Ristoranti</h1>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                <!-- <div class="col d-flex">
                    <RestaurantCard />
                </div> -->
                <div class="col d-flex justify-content-center">
                    <RestaurantCard />
                </div>
                <div class="col d-flex justify-content-center">
                    <RestaurantCard />
                </div>
                <div class="col d-flex justify-content-center">
                    <RestaurantCard />
                </div>
                <div class="col d-flex justify-content-center">
                    <RestaurantCard />
                </div>
                <div class="col d-flex justify-content-center">
                    <RestaurantCard />
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
};
</script>

<style lang="scss" scoped>
main {
    margin-top: 90px;
}
</style>
