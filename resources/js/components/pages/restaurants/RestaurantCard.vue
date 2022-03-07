<template>
    <router-link
        :to="{ name: 'restaurants-show', params: { slug: restaurant.slug } }"
        class="card-rest"
    >
        <div class="card-rest-box">
            <div class="card-rest-box-image">
                <img :src="`/${restaurant.photo}`" :alt="restaurant.name" />
            </div>
            <div class="card-rest-box-text">
                <h5>{{ restaurant.name }}</h5>
                <span v-if="restaurant.delivery_price != 0">Consegna: {{ restaurant.delivery_price }}€</span>
                <span v-else>Consegna: Gratuita</span>
                <span>•</span>
                <span class="ls-min">{{ restaurant.delivery_time }} min</span>
            </div>
        </div>
    </router-link>
</template>

<script>
export default {
    name: "RestaurantCard",
    props: {
        restaurant: Object,
    },
};
</script>

<style lang="scss" scoped>
.card-rest {
    color: black;
    text-decoration: none;
}

.card-rest-box {
    width: 300px;
    cursor: pointer;
    transform: scale(1);
    transition: all 0.3s ease-in-out;
    margin: 15px 0;
    &:hover {
        transform: scale(1.15);
    }
    .card-rest-box-image {
        height: 150px;
        border-radius: 8px;
        overflow: hidden;
        img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            filter: opacity(90%);
            transition: all 0.3s ease-in-out;
            &:hover {
                filter: opacity(100%);
            }
        }
    }
    .card-rest-box-text {
        h5 {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            width: 100%;
            margin: 0;
            margin-top: 10px;
        }
        .ls-min {
            color: grey;
        }
    }
}
</style>
