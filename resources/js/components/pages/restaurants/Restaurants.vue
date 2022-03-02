<template>
    <main>
        <FirstSection />
        <div class="container">
            <h2 class="mb-4">Esplora per Categorie</h2>
            <div class="row row-cols-5">
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
            <h1 class="mb-4">I Ristoranti</h1>
        </div>
    </main>
</template>

<script>
import FirstSection from "./FirstSection.vue";
import CategoryCard from "./CategoryCard.vue";

export default {
    name: "Restaurants",
    components: {
        FirstSection,
        CategoryCard,
    },
};
</script>

<style lang="scss" scoped>
main {
    margin-top: 200px;
}
</style>
