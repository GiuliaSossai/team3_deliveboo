<template>
    <div id="ls-cart">
        <router-link :to="{ name: 'checkout' }">
            <i class="fa-solid fa-cart-shopping fa-sm"></i>
            <span>Carrello</span> <span>•</span>
            <span>{{ cartQuantity }}</span></router-link
        >
    </div>
</template>

<script>
import { list } from "cart-localstorage";

import { EventBus } from "../../global-event-bus.js";

export default {
    name: "Cart",
    data() {
        return {
            cartQuantity: this.printQuantity(),
        };
    },
    mounted() {
        EventBus.$on("getCartQuantity", (data) => {
            this.cartQuantity = data;
        });
    },
    methods: {
        printQuantity() {
            let dishes = list();
            this.cartQuantity = 0;
            for (let key in dishes) {
                this.cartQuantity += dishes[key].quantity;
            }
            return this.cartQuantity;
        },
    },
};
</script>

<style lang="scss" scoped>
#ls-cart {
    background-color: rgb(26, 26, 26);
    padding: 4px 16px;
    border-radius: 20px;
    &:hover {
        outline: 2px solid black;
        outline-offset: 3px;
    }
    span {
        font-size: 14px;
    }
    a {
        color: white;
        &:hover {
            text-decoration: none;
        }
    }
}
</style>
