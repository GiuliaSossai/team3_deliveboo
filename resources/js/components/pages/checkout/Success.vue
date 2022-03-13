<template>
    <div id="overlay">
        <Sending v-if="!isSuccess" />
        <div v-else class="ls-success">
            <span><i class="fas fa-check-circle fa-7x"></i></span>
            <h1>Ordine completato!</h1>
            <p>Grazie! Il tuo ordine è stato approvato.</p>
            <p>A breve riceverai il riepilogo dell'ordine via email</p>
            <router-link :to="{ name: 'restaurants' }" class="text-white">
                <div class="ls-btn">
                    <span>Torna ai Ristoranti &#128523;</span>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
import Sending from "./Sending.vue";
export default {
    name: "Success",
    props: {
        isSuccess: Boolean,
    },
    components: {
        Sending,
    },
    data() {
        return {};
    },
};
</script>

<style lang="scss" scoped>
#overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.466);
    z-index: 998;
}
a {
    &:hover {
        text-decoration: none;
    }
}
.ls-success {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 350px;
    min-width: 525px;
    background-color: white;
    border-radius: 15px;
    z-index: 999;
    span {
        padding-bottom: 15px;
        color: green;
    }
    p {
        margin: 0;
        font-size: 18px;
    }
    .ls-btn {
        width: 100%;
        background-color: rgb(4, 136, 72);
        padding: 10px 20px;
        text-align: center;
        color: white;
        font-size: 20px;
        font-weight: 600;
        border: 0;
        margin-top: 15px;
        &:hover {
            filter: opacity(90%);
        }
        span {
            color: white;
        }
    }
}

@media only screen and (max-width: 767px) {
    .ls-success {
        min-height: 350px;
        min-width: 450px;
    }
}
</style>
