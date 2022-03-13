<template>
    <div v-if="newOrder" id="overlay">
        <div class="ls-success">
            <span id="ls-cross" @click="$emit('cancel')"
                ><i class="fas fa-times fa-2x"></i
            ></span>
            <h2>Creare un nuovo ordine?</h2>
            <p>
                L’ordine include articoli da <span>{{ restaurantCart }}</span
                >.
            </p>
            <p>Crea un nuovo ordine per aggiungere articoli da</p>
            <p>
                <span>{{ restaurantName }}</span>
            </p>
            <div
                class="ls-btn"
                @click="$emit('confrimNewOrder', confrimNewOrder)"
            >
                <span>Nuovo ordine</span>
            </div>
        </div>
    </div>
</template>

<script>
import { list } from "cart-localstorage";

export default {
    name: "NewOrder",
    props: {
        newOrder: Boolean,
        restaurantName: String,
    },
    data() {
        return {
            confrimNewOrder: true,
            restaurantCart: "",
        };
    },
    mounted() {
        this.getRestaurantCart();
    },
    methods: {
        getRestaurantCart() {
            let cart = list();
            this.restaurantCart = cart[0].restaurant_name;
            return this.restaurantCart;
        },
    },
};
</script>

<style lang="scss" scoped>
#overlay {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.466);
    z-index: 998;
}
.ls-success {
    position: absolute;
    top: 100px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 260px;
    width: 450px;
    padding: 25px;
    background-color: white;
    border-radius: 8px;
    z-index: 999;
    #ls-cross {
        position: absolute;
        top: 5px;
        left: 10px;
        cursor: pointer;
        user-select: none;
    }
    h2 {
        margin-top: 15px;
        font-weight: 600;
    }
    p {
        margin: 0;
        span {
            font-weight: 600;
        }
    }
    .ls-btn {
        width: 100%;
        background-color: #000;
        padding: 15px 20px;
        text-align: center;
        color: white;
        font-size: 20px;
        font-weight: 600;
        border: 0;
        margin-top: 15px;
        cursor: pointer;
        user-select: none;
        &:hover {
            filter: opacity(90%);
        }
    }
}
</style>
