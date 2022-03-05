<template>
    <div>
        <router-view></router-view>
        <Cookie v-if="clickCookie == false" @getCookie="getCookie" />
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
    mounted() {},
    methods: {
        getCookie(value) {
            this.clickCookie = value;
        },
    },
};
</script>

<style lang="scss"></style>
