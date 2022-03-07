<template>
    <div class="card-cat" @click="getRestaurantsByCategory">
        <div class="card-cat__text">
            <p>{{ category.name }}</p>
        </div>
        <div class="card-cat__image">
            <img :src="`/${category.image}`" :alt="category.name" />
        </div>
    </div>
</template>

<script>
export default {
    name: "CategoryCard",
    props: {
        category: Object,
    },
    data() {
        return {};
    },
    methods: {
        getRestaurantsByCategory() {
            this.$emit("getCategory", this.category.slug);
        },
        getClick() {
            this.isActive;
            isaActive = id;
        },
    },
};
</script>

<style lang="scss" scoped>
.card-cat {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 200px;
    height: 70px;
    padding: 0px 15px;
    background-color: rgb(246, 246, 246);
    color: black;
    text-decoration: none;
    border-radius: 15px;
    margin-bottom: 15px;
    cursor: pointer;
    // transizioni
    outline: 0px solid #60da60;
    transform: scale(1);
    transition: all 0.2s ease-in-out;
    &:hover {
        transform: scale(1.05);
        outline: 2px solid #60da60;
        outline-offset: 3px;
    }
    .card-cat__text {
        p {
            margin: 0;
            font-size: 20px;
            font-weight: 500;
        }
    }
    .card-cat__image {
        display: flex;
        justify-content: flex-end;
        width: 60%;
        height: 100%;
        img {
            width: 80%;
            height: 100%;
            object-fit: contain;
        }
    }
}
.card-cat.active {
    transform: scale(1.05);
    outline: 2px solid #60da60;
    outline-offset: 4px;
}
</style>
