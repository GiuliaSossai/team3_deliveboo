<template>
    <main class="container">
        <h1>Pagina Ristoranti</h1>
    </main>
</template>

<script>
import FirstSection from "./FirstSection.vue";

export default {
    name: "Restaurants",
    components: {
        FirstSection,
    },
};
</script>

<style lang="scss" scoped>
main {
    margin-top: 200px;
    height: 500px;
}
</style>
