<template>
    <div class="second-section">
        <div class="container">
            <h2>Città Vicine</h2>
            <div class="row">
                <div class="col-12 ls-map">
                    <img src="/img/homepage/mappa.png" alt="mappa" />
                </div>
            </div>
            <div class="d-md-none">
                <div class="row row-cols-2">
                    <div
                        v-for="(city, index) in cities.slice(0, 10)"
                        :key="index"
                        class="col"
                    >
                        <a href="#" @click="takeValue">{{ city }}</a>
                    </div>
                </div>
            </div>
            <div class="d-none d-md-block">
                <div class="row row-cols-4">
                    <div
                        v-for="(city, index) in cities"
                        :key="index"
                        class="col"
                    >
                        <a href="#" @click="takeValue(city)">{{ city }}</a>
                    </div>
                </div>
            </div>
            <h2>Paesi in cui è disponibile deliveBoo</h2>
            <div class="d-md-none">
                <div class="row row-cols-2">
                    <div
                        v-for="(country, index) in countries.slice(0, 10)"
                        :key="index"
                        class="col"
                    >
                        <a href="#">{{ country }}</a>
                    </div>
                </div>
            </div>
            <div class="d-none d-md-block">
                <div class="row row-cols-4">
                    <div
                        v-for="(country, index) in countries"
                        :key="index"
                        class="col"
                    >
                        <a href="#">{{ country }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SecondSection",
    data() {
        return {
            cities: [
                "Bari",
                "Bologna",
                "Cagliari",
                "Catania",
                "Ferrara",
                "Perugia",
                "Firenze",
                "Genova",
                "Milano",
                "Napoli",
                "Padova",
                "Palermo",
                "Pisa",
                "Prato",
                "Reggio Emilia",
                "Rimini",
            ],
            countries: [
                "Stati Uniti",
                "Spagna",
                "Brasile",
                "Messico",
                "Francia",
                "Giappone",
                "Canada",
                "Australia",
                "Polonia",
                "Regno Unito",
                "Italia",
                "Portogallo",
                "Svizzera",
                "Nuova Zelanda",
                "Taiwan (ROC)",
                "Sud Africa",
                "Belgio",
                "Ecuador",
                "Irlanda",
                "Sri Lanka",
                "Svezia",
                "Guatemala",
                "Costa Rica",
            ],
        };
    },
    mounted() {},
    methods: {
        takeValue(city) {
            console.log(city);
            this.$emit("takeCity", city);
        },
    },
};
</script>

<style lang="scss" scooped>
.second-section {
    margin: 50px 0;
    .ls-map {
        margin-bottom: 25px;
        img {
            width: 100%;
        }
    }
    h2 {
        font-weight: 600;
        margin-top: 50px;
        margin-bottom: 20px;
    }
    a {
        display: inline-block;
        color: black;
        padding: 10px 0;
        &:hover {
            text-decoration: none;
        }
    }
}
</style>
