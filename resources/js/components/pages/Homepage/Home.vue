<template>
    <div class="all-web">
        <Header />
        <main>
            <Jumbotron />
            <FirstSection />
        </main>
        <Footer />
    </div>
</template>

<script>
import Header from "../../partials/Header.vue";
import Jumbotron from "./Jumbotron.vue";
import FirstSection from "./FirstSection.vue";
import Footer from "../../partials/Footer.vue";

export default {
    name: "Home",
    components: {
        Header,
        Jumbotron,
        FirstSection,
        Footer,
    },
};
</script>

<style lang="scss" scoped>
.all-web {
    overflow: hidden;
}
</style>
