<template>
    <div class="all-web">
        <Header />
        <main>
            <Jumbotron :takeCity="city" />
            <FirstSection />
            <SecondSection @takeCity="takeCity" />
        </main>
        <Footer />
    </div>
</template>

<script>
import Header from "../../partials/Header.vue";
import Jumbotron from "./Jumbotron.vue";
import FirstSection from "./FirstSection.vue";
import SecondSection from "./SecondSection.vue";
import Footer from "../../partials/Footer.vue";

export default {
    name: "Home",
    components: {
        Header,
        Jumbotron,
        FirstSection,
        SecondSection,
        Footer,
    },
    data() {
        return {
            city: "",
        };
    },
    mounted() {},
    methods: {
        takeCity(city) {
            this.city = city;
        },
    },
};
</script>

<style lang="scss" scoped>
.all-web {
    overflow: hidden;
}
</style>
