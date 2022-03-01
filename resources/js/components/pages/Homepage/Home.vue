<template>
    <main>
        <h1>Home</h1>
        <Jumbotron />
        <FirstSection />
    </main>
</template>

<script>
import Jumbotron from "./Jumbotron.vue";
import FirstSection from "./FirstSection.vue";

export default {
    name: "Home",
    components: {
        Jumbotron,
        FirstSection,
    },
};
</script>

<style lang="scss" scoped>
main {
    margin-top: 120px;
    background-color: rgb(253, 241, 241);
    height: 500px;
}
</style>
