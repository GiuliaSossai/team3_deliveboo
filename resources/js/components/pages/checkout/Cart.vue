<template>
    <div class="ls-cart-checkout mb-5">
        <div class="ls-cart-checkout__header">
            <h4>I tuoi articoli</h4>
            <router-link
                :to="{
                    name: 'restaurants-show',
                    params: { slug: cart[0].restaurant_slug },
                }"
                ><span>
                    <i class="fa-solid fa-plus fa-sm"></i> Aggiungi
                    articoli</span
                ></router-link
            >
        </div>
        <div class="ls-cart-checkout__body">
            <div v-for="dish in cart" :key="dish.id" class="body__item">
                <div class="row row-cols-3 ls-name">
                    <div class="col ls-name">
                        <p>{{ dish.name }}</p>
                    </div>
                    <div class="col ls-quantity">
                        <span
                            @click="
                                changeQuantity(dish.id, -1);
                                backRestaurantUrl();
                            "
                            ><i class="fa-solid fa-circle-minus fa-lg"></i
                        ></span>
                        <p>{{ dish.quantity }}</p>
                        <span @click="changeQuantity(dish.id, +1)"
                            ><i class="fa-solid fa-circle-plus fa-lg"></i
                        ></span>
                    </div>
                    <div class="col ls-price">
                        <p>
                            {{
                                parseFloat(dish.price * dish.quantity).toFixed(
                                    2
                                )
                            }}€
                        </p>
                        <span
                            @click="
                                deleteDish(dish.id);
                                backRestaurantUrl();
                            "
                        >
                            <i class="fa-solid fa-trash-can fa"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { EventBus } from "../../../global-event-bus.js";
import { list, total, remove, quantity } from "cart-localstorage";

export default {
    name: "Cart",
    data() {
        return {
            cart: [],
        };
    },
    beforeMount() {
        this.getOrder();
    },
    methods: {
        // Prendo tutta la lista del carrello
        getOrder() {
            this.cart = list();
        },
        // Elimina un intero oggetto dal carrello
        deleteDish(id) {
            remove(id);
            this.sendFinalPrice();
            this.cart = list();
        },
        // Aggiungi o rimuove quantità al carrello
        changeQuantity(id, change) {
            quantity(id, change);
            this.cart = list();
            this.sendFinalPrice();
        },
        // Manda il prezzo finale seenza la consegna al componente ContentCheckout
        sendFinalPrice() {
            let totalPrice = total();
            EventBus.$emit("sendTotalPrice", totalPrice);
        },
        // Se il carrello è vuoto rimanda alla lista dei ristoranti
        backRestaurantUrl() {
            if (this.cart == 0) this.$router.push({ name: "restaurants" });
        },
    },
};
</script>

<style lang="scss" scoped>
.ls-cart-checkout {
    .ls-cart-checkout__header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        h4 {
            margin: 0;
        }
        a {
            span {
                color: black;
                background: #eeeeee;
                display: inline-block;
                padding: 10px 20px;
                border-radius: 20px;
                font-weight: 500;
                &:hover {
                    background-color: #e2e2e2;
                }
            }
        }
    }
    .ls-cart-checkout__body {
        .body__item {
            padding: 15px 0;
            border-bottom: 1px solid grey;
            .ls-name {
                p {
                    margin: 0;
                    font-size: 18px;
                    font-weight: 500;
                }
            }
            .ls-quantity {
                user-select: none;
                text-align: center;
                p {
                    display: inline-block;
                    margin: 0 5px;
                    font-size: 18px;
                    font-weight: 500;
                }
                span {
                    cursor: pointer;
                    display: inline-block;
                    &:hover {
                        transform: scale(1.2);
                        color: rgb(4, 136, 72);
                    }
                }
            }
            .ls-price {
                text-align: end;
                p {
                    margin: 0;
                    display: inline-block;
                }
                span {
                    margin-left: 5px;
                    cursor: pointer;
                    &:hover {
                        transform: scale(1.5);
                        color: red;
                    }
                }
            }
        }
    }
}
</style>
