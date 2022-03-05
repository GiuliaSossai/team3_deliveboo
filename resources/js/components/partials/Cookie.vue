<template>
    <div>
        <div class="ls-cookie">
            <h3>Utilizziamo i cookie</h3>
            <p>
                Fai clic su "Accetta" per consentire a deliveBoo di utilizzare i
                cookie per personalizzare questo sito, pubblicare annunci e
                misurarne l'efficacia su altre app e siti web, compresi i social
                media. Se non desideri che i cookie vengano impiegati a tale
                scopo, personalizza le tue preferenze nelle impostazioni dei
                cookie o fai clic su "Rifiuta". Ulteriori informazioni nella
                sezione <a href="#">Informativa sui cookie</a>.
            </p>
            <div class="ls-btn-container">
                <div class="ls-imp">Impostazioni dei cookie</div>
                <div class="ls-rif" @click="getCookie">Rifiuta</div>
                <div class="ls-acc" @click="getCookie">Accetta</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Cookie",
    data() {
        return {};
    },
    methods: {
        getCookie() {
            this.$emit("getCookie", true);
        },
    },
};
</script>

<style lang="scss" scoped>
.ls-cookie {
    position: fixed;
    bottom: 50px;
    right: 50px;
    z-index: 10;
    max-width: 500px;
    min-height: 180px;
    padding: 25px;
    font-size: 12px;
    box-shadow: 0px 0px 20px rgb(0 0 0 / 8%);
    background-color: #ffffff;
    .ls-btn-container {
        display: flex;
        justify-content: flex-end;
        .ls-imp {
            padding: 8px 22px;
            cursor: pointer;
            &:hover {
                background: #cccccc;
            }
        }
        .ls-rif {
            padding: 8px 18px;
            background: #eeeeee;
            margin-left: 15px;
            font-size: 14px;
            font-weight: 400;
            cursor: pointer;
            &:hover {
                background: #e2e2e2;
            }
        }
        .ls-acc {
            padding: 8px 30px;
            color: white;
            background: #000000;
            margin-left: 15px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            &:hover {
                background: #333333;
            }
        }
    }
}
</style>
