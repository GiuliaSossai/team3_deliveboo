<template>
    <main>
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
/*main {
    margin-top: 90px;
}*/
</style>
