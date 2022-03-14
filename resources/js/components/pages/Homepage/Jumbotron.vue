<template>
    <div class="jumbo-custom">
        <div
            class="background-jumbo"
            :style="{ 'background-color': currentJumbo.backgroundColor }"
        >
            <img
                class="left-jumbo"
                :src="currentJumbo.imgLeft"
                alt="sfondo 1"
            />
            <img
                class="right-jumbo"
                :src="currentJumbo.imgRight"
                alt="sfondo 2"
            />
        </div>

        <div class="content-jumbo">
            <div class="row">
                <div class="col">
                    <h5>Ordina cosa vuoi mangiare, a casa tua.</h5>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-12 mb-3 mb-md-0 col-md-7 col-lg-5">
                    <p>
                        La tua città<span
                            v-if="takeCity"
                            class="font-weight-bold"
                            >, {{ takeCity }}</span
                        >
                        <span v-else class="font-weight-bold"> &#128154;</span>
                    </p>
                </div>
                <div class="col-12 col-md-5">
                    <router-link
                        :to="{ name: 'restaurants' }"
                        class="text-white"
                    >
                        <div class="mdg-btn">
                            <span>Vedi i ristoranti</span>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Jumbotron",
    props: {
        takeCity: String,
    },
    data() {
        return {
            backgroundColor: ["#ffad88", "#FFC043", "#FA9269"],
            currentBackground: null,
            backJumbo: [
                {
                    backgroundColor: "#FFC043",
                    imgLeft: "/img/homepage/jumbo/jumbo-sinistra-1.svg",
                    imgRight: "/img/homepage/jumbo/jumbo-destra-1.svg",
                },
                {
                    backgroundColor: "#FA9269",
                    imgLeft: "/img/homepage/jumbo/jumbo-sinistra-2.svg",
                    imgRight: "/img/homepage/jumbo/jumbo-destra-2.svg",
                },
                {
                    backgroundColor: "#FFD7D2",
                    imgLeft: "/img/homepage/jumbo/jumbo-sinistra-3.svg",
                    imgRight: "/img/homepage/jumbo/jumbo-destra-3.svg",
                },
                {
                    backgroundColor: "#FFF2D9",
                    imgLeft: "/img/homepage/jumbo/jumbo-sinistra-4.svg",
                    imgRight: "/img/homepage/jumbo/jumbo-destra-4.svg",
                },
            ],
            currentJumbo: {},
        };
    },
    mounted() {
        this.getRandomBack();
    },
    methods: {
        getRandomBack() {
            let random = Math.floor(Math.random() * this.backJumbo.length);
            this.currentJumbo = this.backJumbo[random];
        },
    },
};
</script>

<style lang="scss" scoped>
.jumbo-custom {
    position: relative;
    height: 100vh;
    width: 100%;

    .background-jumbo {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        overflow: hidden;

        img .left-jumbo {
            object-fit: auto;
        }

        img .right-jumbo {
            object-fit: auto;
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
            padding-bottom: 15px;
        }

        p {
            margin: 0;
            font-size: 34px;
            background-color: white;
            padding: 5px 25px;
            display: inline-block;
            border-radius: 50px;
        }

        .mdg-btn {
            font-size: 24px;
            background-color: black;
            color: white;
            padding: 10px 25px;
            display: inline-block;
            cursor: pointer;
            &:hover {
                filter: opacity(75%);
            }
        }
    }
}
</style>
