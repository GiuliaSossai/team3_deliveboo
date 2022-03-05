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
                <div id="ls-cart" v-if="checkRoute !== route">
                    <router-link :to="{ name: 'checkout' }">
                        Carrello <span>•</span> {{ cartQuantity }}</router-link
                    >
                </div>
                <!-- aggiungere if: se sei già loggato, entri in area admin personale -->
                <a href="/admin/dashboard" class="gs-button">Accedi</a>
            </div>
        </div>
    </header>
</template>

<script>
import { list } from "cart-localstorage";

import { EventBus } from "../../global-event-bus.js";

export default {
    name: "Header",
    props: {
        route: String,
    },
    data() {
        return {
            cartQuantity: this.printQuantity(),
            checkRoute: this.$route.path,
            topOfPage: true,
        };
    },
    beforeMount() {
        window.addEventListener("scroll", this.handleScroll);
    },
    mounted() {
        EventBus.$on("getCartQuantity", (data) => {
            this.cartQuantity = data;
        });
    },
    computed: {},
    methods: {
        printQuantity() {
            let dishes = list();
            this.cartQuantity = 0;
            for (let key in dishes) {
                this.cartQuantity += dishes[key].quantity;
            }
            return this.cartQuantity;
        },
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
    z-index: 999;
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
            #ls-cart {
                background-color: rgb(26, 26, 26);
                padding: 4px 16px;
                border-radius: 20px;
                &:hover {
                    outline: 2px solid black;
                    outline-offset: 3px;
                }
                a {
                    color: white;
                    &:hover {
                        text-decoration: none;
                    }
                }
            }
            .gs-button {
                color: rgb(26, 26, 26);
                padding: 8px 22px;
                margin-left: 25px;
                font-weight: 600;
                border-radius: 15px;
                background-color: rgb(218, 216, 216);
                &:hover {
                    background-color: rgb(191, 189, 189);
                    text-decoration: none;
                }
            }
        }
    }
}

//   .header{
//     width:100%;
//     height:100px;
//     position:fixed;
//     top:0px;
//     z-index:3;
// }

// body{
//     margin:0px;
// }
// .header #background, .header #labels
// {
//     position:absolute;
//     top:0px;
//     width:100%;
//     height:100%;
// }

// .header #labels{
//     background-color:transperent;
// }

// .header #background{
//     background-color:yellow;
//     display:none;
// }

// .content{
//     width:100%;
//     height:5000px;
//     background-color:green;
// }
</style>
