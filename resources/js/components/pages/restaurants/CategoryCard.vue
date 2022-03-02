<template>
    <a class="card-cat">
        <div class="card-cat__text">
            <p>Pizza</p>
        </div>
        <div class="card-cat__image">
            <img
                src="https://duyt4h9nfnj50.cloudfront.net/new_search_home_eats_icon/Pizza_BrowseHome@2x.png"
                alt="italiana"
            />
        </div>
    </a>
</template>

<script>
export default {
    name: "CategoryCard",
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
            font-size: 22px;
            font-weight: 500;
        }
    }
    .card-cat__image {
        img {
            width: 90%;
            height: 90%;
        }
    }
}
</style>
