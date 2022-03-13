<template>
    <header :class="{ onScroll: !topOfPage }">
        <div
            class="container d-flex justify-content-between align-items-center gs-box"
        >
            <div class="header__left">
                <router-link :to="{ name: 'home' }">
                    <div class="logo">
                        <p class="d-inline-block m-0 p-0 text-black">
                            delive<span class="m-0 p-0 font-weight-bold"
                                >Boo</span
                            >
                        </p>
                    </div>
                </router-link>
            </div>

            <div
                class="header__right d-flex justify-content-between align-items-center"
            >
                <Cart v-if="checkRoute !== route" />

                <a href="/admin/dashboard" class="gs-button">Accedi</a>
            </div>
        </div>
    </header>
</template>

<script>
import Cart from "./Cart.vue";

export default {
    name: "Header",
    components: {
        Cart,
    },
    props: {
        route: String,
    },
    data() {
        return {
            checkRoute: this.$route.path,
            topOfPage: true,
        };
    },
    beforeMount() {
        window.addEventListener("scroll", this.handleScroll);
    },
    mounted() {},
    computed: {},
    methods: {
        handleScroll() {
            if (window.pageYOffset > 0) {
                if (this.topOfPage) this.topOfPage = false;
            } else {
                if (!this.topOfPage) this.topOfPage = true;
            }
        },
    },
};
</script>

<style lang="scss" scoped>
header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 80px;
    background-color: transparent;
    color: rgb(26, 26, 26);
    transition: all 0.2s ease-in-out;
    z-index: 950;
    &.onScroll {
        box-shadow: rgb(226, 226, 226) 0px -2px 0px inset;
        background-color: rgb(245, 245, 245);
    }
    .gs-box {
        height: 100%;
        a {
            color: black;
        }
        .logo {
            cursor: pointer;
            font-size: 38px;
            span {
                color: rgb(96, 218, 96);
            }
        }
        .header__right {
            .gs-button {
                color: rgb(26, 26, 26);
                padding: 7px 18px;
                margin-left: 25px;
                font-weight: 600;
                background-color: rgb(218, 216, 216);
                &:hover {
                    background-color: rgb(191, 189, 189);
                    text-decoration: none;
                }
            }
        }
    }
}
</style>
