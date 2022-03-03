<template>
    <a class="card-cat">
        <div class="card-cat__text">
            <p>{{ category.name }}</p>
        </div>
        <div class="card-cat__image">
            <img :src="category.image" :alt="category.name" />
        </div>
    </a>
</template>

<script>
export default {
    name: "CategoryCard",
    props: {
        category: Object,
    },
};
</script>

<style lang="scss" scoped>
.card-cat {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 220px;
    height: 80px;
    padding: 15px 5px;
    background-color: rgb(246, 246, 246);
    color: black;
    text-decoration: none;
    border-radius: 15px;
    margin-bottom: 15px;
    cursor: pointer;
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
            object-fit: cover;
        }
    }
}
</style>
