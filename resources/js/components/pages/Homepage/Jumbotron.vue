<template>
    <div class="jumbo-custom">
        <div
            id="carouselExampleSlidesOnly"
            class="carousel slide"
            data-ride="carousel"
        >
            <div class="carousel-inner">
                <div class="carousel-item active ls-1">
                    <img
                        class="d-block w-100"
                        src="/img/homepage/jumbo/jumbo.svg"
                        alt="First slide"
                    />
                </div>
                <div class="carousel-item ls-2">
                    <img
                        class="d-block w-100"
                        src="/img/homepage/jumbo/jumbo.svg"
                        alt="Second slide"
                    />
                </div>
                <div class="carousel-item ls-3">
                    <img
                        class="d-block w-100"
                        src="/img/homepage/jumbo/jumbo.svg"
                        alt="Third slide"
                    />
                </div>
            </div>
        </div>

        <div class="content-jumbo">
            <h5>Ordina cosa vuoi mangiare, a casa tua.</h5>
            <p class="m-0 rounded-pill">
                La tua città, <span class="font-weight-bold">Perugia</span>
            </p>
            <div class="mdg-btn">
                <router-link :to="{ name: 'restaurants' }" class="text-white">
                    Vedi i ristoranti
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Jumbotron",
};
</script>

<style lang="scss" scoped>
// .t3-opacity{
//   opacity: 0.3;
// }

.jumbo-custom {
    position: relative;
    #carouselExampleSlidesOnly {
        height: 100vh;
        width: 100%;
        .ls-1 {
            background-color: #ffa600;
        }
        .ls-2 {
            background-color: #ff7038;
        }
        .ls-3 {
            background-color: #33ffccf8;
        }
        img {
            height: 100vh;
            object-fit: cover;
            filter: opacity(85%);
        }
    }
    .content-jumbo {
        position: absolute;
        top: 35vh;
        left: 25px;

        h5 {
            font-size: 52px;
            color: black;
            font-weight: 700;
        }

        p {
            font-size: 36px;
            background-color: white;
            padding: 10px 25px;
            display: inline-block;
        }

        .mdg-btn {
            font-size: 24px;
            background-color: black;
            color: white;
            padding: 10px 25px;
            display: inline-block;
            margin-left: 50px;
            cursor: pointer;
        }
    }
}
</style>
