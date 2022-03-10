<template>
    <div id="ls-cart">
        <div class="ls-cart__btn" @click="isOpen = !isOpen">
            <i class="fa-solid fa-cart-shopping fa-sm"></i>
            <span>Carrello</span> <span>•</span>
            <span>{{ cartQuantity }}</span>
        </div>
        <div v-if="isOpen" class="ls-cart__content">
            <div class="cart-close">
                <div id="close" @click="isOpen = false">
                    <i class="fa-solid fa-circle-xmark fa-2xl"></i>
                </div>
            </div>

            <div class="cart-list">
                <!-- Se il Carrello è vuoto -->
                <div v-if="cartQuantity == 0" class="row h-100">
                    <div class="col cart-empty">
                        <img src="/img/cart/cart.png" alt="cart" />
                        <p>
                            Aggiungi articoli da un ristorante o locale per
                            iniziare con un nuovo carrello
                        </p>
                    </div>
                </div>
                <!-- Se il carrello è pieno -->
                <div v-else class="cart-full">
                    <div class="name-restaurant">
                        {{ cartLlist[0].restaurant_name }}
                    </div>
                    <div class="cart-full__content">
                        <div
                            v-for="item in cartLlist"
                            :key="item.id"
                            class="row item-list"
                        >
                            <div class="col-5">
                                <p id="name-item">{{ item.name }}</p>
                            </div>
                            <div class="col-4 text-center" id="quantity">
                                <span @click="changeQuantity(item.id, -1)"
                                    ><i class="fa-solid fa-circle-minus"></i
                                ></span>
                                <p>{{ item.quantity }}</p>
                                <span @click="changeQuantity(item.id, +1)"
                                    ><i class="fa-solid fa-circle-plus"></i
                                ></span>
                            </div>
                            <div class="col-3 text-center">
                                <span
                                    >{{
                                        parseFloat(
                                            item.price * item.quantity
                                        ).toFixed(2)
                                    }}
                                    €</span
                                >
                            </div>
                        </div>
                    </div>
                    <!-- Bottone per andare alla cassa  -->
                    <router-link :to="{ name: 'checkout' }">
                        <div class="btn-checkout">
                            <span>Vai alla Cassa</span>
                            <span>•</span>
                            <span
                                >{{ parseFloat(cartTotal).toFixed(2) }} €</span
                            >
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { list, total, quantity } from "cart-localstorage";

import { EventBus } from "../../global-event-bus.js";

export default {
    name: "Cart",
    data() {
        return {
            cartQuantity: this.printQuantity(),
            cartLlist: this.printCartList(),
            cartTotal: this.printCartTotal(),
            isOpen: false,
        };
    },
    computed: {},
    mounted() {
        EventBus.$on("getCartQuantity", (data) => {
            this.cartQuantity = data;
        });
        EventBus.$on("getCartList", (data) => {
            this.cartLlist = data;
        });
        EventBus.$on("getCartTotal", (data) => {
            this.cartTotal = data;
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
        printCartList() {
            this.cartLlist = list();
            return this.cartLlist;
        },
        printCartTotal() {
            this.cartTotal = total();
            return parseFloat(this.cartTotal).toFixed(2);
        },
        changeQuantity(id, change) {
            quantity(id, change);
            this.cartTotal = total();
            this.cartLlist = list();
            this.cartQuantity = this.printQuantity();
        },
    },
};
</script>

<style lang="scss" scoped>
#ls-cart {
    position: relative;
    user-select: none;
    // /*Custom Scrollbar*/
    // scrollbar-color: rgb(255, 255, 255) rgb(0, 0, 0);
    // scrollbar-width: thin;

    /* Custom Scrollbar Chrome */
    *::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    *::-webkit-scrollbar-track {
        background: rgb(0, 0, 0, 0);
    }

    *::-webkit-scrollbar-thumb {
        background-color: #000000;
        border-radius: 20px;
    }
    .ls-cart__btn {
        background-color: rgb(26, 26, 26);
        padding: 4px 16px;
        border-radius: 20px;
        color: white;
        cursor: pointer;
        &:hover {
            outline: 2px solid black;
            outline-offset: 3px;
        }
        span {
            font-size: 14px;
        }
    }
    // carrello contenuto
    .ls-cart__content {
        position: absolute;
        top: 40px;
        right: 0px;
        height: 300px;
        width: 380px;
        background-color: white;
        border-radius: 15px;
        // cross chiusura carrello
        .cart-close {
            position: relative;
            #close {
                position: absolute;
                top: 5px;
                left: 5px;
                cursor: pointer;
                z-index: 1;
                &:hover {
                    filter: opacity(85%);
                }
            }
        }
        // lista carrello
        .cart-list {
            width: 100%;
            height: 100%;
            // se il carrello è vuoto
            .cart-empty {
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                img {
                    width: 125px;
                }
                p {
                    padding: 15px;
                    text-align: center;
                }
            }
            // se il carrello è pieno
            .cart-full {
                width: 100%;
                height: 100%;
                padding: 0 15px;
                .name-restaurant {
                    font-size: 27px;
                    font-weight: 700;
                    margin-left: 30px;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    width: calc(100% - 30px);
                }
                .cart-full__content {
                    width: 100%;
                    height: 68%;
                    overflow: hidden;
                    overflow-y: auto;
                    padding: 0 10px;
                    .item-list {
                        align-items: center;
                        padding: 12px 0px;
                        border-bottom: 1px solid black;
                        #name-item {
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                            width: 100%;
                            margin: 0;
                        }
                        #quantity {
                            p {
                                display: inline-block;
                                margin: 0 5px;
                            }
                            span {
                                cursor: pointer;
                                display: inline-block;
                                &:hover {
                                    transform: scale(1.2);
                                }
                            }
                        }
                    }
                }
            }
            .btn-checkout {
                position: absolute;
                bottom: 8px;
                left: 50%;
                transform: translateX(-50%);
                width: 80%;
                padding: 10px 15px;
                border-radius: 15px;
                background-color: black;
                color: white;
                text-align: center;
                &:hover {
                    text-decoration: underline;
                }
            }
        }
    }
}
</style>
