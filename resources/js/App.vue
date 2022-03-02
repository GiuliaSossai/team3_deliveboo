<template>
    <div>
        <Header />
        <router-view></router-view>
        <Footer />
    </div>
</template>

<script>
import Header from "./components/partials/Header.vue";
import Footer from "./components/partials/Footer.vue";
import Home from "./components/pages/Homepage/Home.vue";

export default {
    name: "App",
    components: {
        Header,
        Footer,
        Home
    },
};
</script>

<style lang="scss"></style>
