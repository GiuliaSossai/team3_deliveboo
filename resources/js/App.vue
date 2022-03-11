<template>
    <div>
        <router-view></router-view>
        <Cookie
            v-if="clickCookie == false"
            @getCookieRifiuta="getCookieRifiuta"
            @getCookieAccetta="getCookieAccetta"
        />
    </div>
</template>

<script>
import Cookie from "./components/partials/Cookie.vue";
export default {
    name: "App",
    components: {
        Cookie,
    },
    data() {
        return {
            clickCookie: false,
        };
    },
    computed: {},
    mounted() {
        this.getCookieAccetta();
        if (localStorage.getItem("cookie")) {
            this.clickCookie = true;
        }
    },
    methods: {
        getCookieRifiuta(value) {
            this.clickCookie = value;
        },
        getCookieAccetta(value) {
            if (value == 1) {
                this.clickCookie = true;
            }
        },
    },
};
</script>

<style lang="scss"></style>
