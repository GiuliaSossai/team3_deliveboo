<template>
    <div>
        <div v-if="loading">
            <Loading />
        </div>
        <div v-else>
            <Header />
            <main>
                <h1>Ristorante:</h1>
            </main>
            <Footer />
        </div>
    </div>
</template>

<script>
import Header from "../../partials/Header.vue";
import Footer from "../../partials/Footer.vue";
import Loading from "../Loading.vue";

export default {
    name: "Show",
    components: {
        Header,
        Footer,
        Loading,
    },
    data() {
        return {
            loading: false,
        };
    },
};
</script>

<style lang="scss" scoped>
main {
    min-height: 500px;
}
</style>
