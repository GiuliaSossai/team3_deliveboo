<template>
    <div>
        <div v-if="dish.visible" class="ls-dish">
            <div class="ls-dish__image">
                <img :src="`/${dish.photo}`" :alt="dish.name" />
            </div>
            <div class="ls-dish__text">
                <div class="div">
                    <h4>{{ dish.name }}</h4>
                    <p>{{ dish.price }}€</p>
                    <p>{{ dish.description }}</p>
                </div>
                <div class="div">
                    <div
                        class="ls-plus p-2"
                        @click="
                            addItem();
                            getCartQuantity();
                            getCartList();
                            getCartTotal();
                        "
                    >
                        <i class="fas fa-plus-circle fa-xl"></i>
                    </div>
                </div>
            </div>
        </div>
        <NewOrder
            :newOrder="newOrder"
            :restaurantName="restaurantName"
            @confrimNewOrder="newOrderCart"
            @cancel="noNewOrder"
        />
    </div>
</template>

<script>
import NewOrder from "./NewOrder.vue";
import { add, list, destroy, total } from "cart-localstorage";

import { EventBus } from "../../../global-event-bus.js";

export default {
    name: "CardDish",
    components: {
        NewOrder,
    },
    props: {
        dish: Object,
        restaurant: Object,
    },
    data() {
        return {
            cartQuantity: 0,
            newOrder: false,
            cart: {},
            restaurantName: this.restaurant.name,
        };
    },
    mounted() {
        this.printQuantity();
        EventBus.$on("sendCartQuantity", (data) => {
            this.cartQuantity = data;
        });
    },
    methods: {
        addItem() {
            this.cart = {
                id: this.dish.id,
                name: this.dish.name,
                price: this.dish.price,
                restaurant_id: this.restaurant.id,
                restaurant_slug: this.restaurant.slug,
                restaurant_name: this.restaurant.name,
                delivery_price: this.restaurant.delivery_price,
                delivery_time: this.restaurant.delivery_time,
            };
            if (
                this.cartQuantity == 0 ||
                this.restaurant.id == this.getRestaurantIdFromCart()
            ) {
                add(this.cart);
            } else {
                this.newOrder = true;
            }
        },
        newOrderCart(value) {
            if (value == true) {
                destroy();
                add(this.cart);
                this.newOrder = false;
                this.getCartQuantity();
            }
        },
        noNewOrder() {
            this.newOrder = false;
        },
        getRestaurantIdFromCart() {
            let dishes = list();
            const id = dishes[0].restaurant_id;
            return id;
        },
        printQuantity() {
            let dishes = list();
            this.cartQuantity = 0;
            for (let key in dishes) {
                this.cartQuantity += dishes[key].quantity;
            }
            return this.cartQuantity;
        },
        // Passo al componente Cart la quantità
        getCartQuantity() {
            this.cartQuantity = this.printQuantity();
            EventBus.$emit("getCartQuantity", this.cartQuantity);
        },
        // Passo al componente Cart la Lista
        getCartList() {
            let cartList = list();
            EventBus.$emit("getCartList", cartList);
        },
        // Passo al componente Cart il Totale
        getCartTotal() {
            let cartTotal = total();
            EventBus.$emit("getCartTotal", cartTotal);
        },
    },
};
</script>

<style lang="scss" scoped>
.ls-dish {
    display: flex;
    align-items: center;
    height: 100%;
    margin: 25px 0;
    user-select: none;
    cursor: pointer;
    &:hover {
        box-shadow: 0px 4px 16px rgb(0 0 0 / 12%);
        transition: box-shadow 0.3s linear 0s;
    }
    .ls-dish__image {
        width: 75px;
        height: 75px;
        border-radius: 50%;
        overflow: hidden;
        margin: 8px;
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }
    .ls-dish__text {
        display: flex;
        justify-content: space-between;
        width: calc(100% - 75px);
        padding-left: 15px;
        p {
            margin: 0;
            padding: 0;
        }
        .ls-plus {
            padding: 2px;
            margin-right: 25px;
            cursor: pointer;
            &:hover {
                transform: scale(1.15);
                transition: transform 0.3s ease-in-out 0s;
            }
        }
    }
}
</style>
