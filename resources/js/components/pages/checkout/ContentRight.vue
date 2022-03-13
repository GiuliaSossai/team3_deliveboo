<template>
    <div>
        <div class="ls-container__right">
            <div class="ls-content">
                <div class="ls-recap-order">
                    <button
                        type="submit"
                        class="ls-btn-send"
                        @click="$emit('sendOrder')"
                        :disabled="sending"
                    >
                        {{ sending ? "Invio in corso..." : "Invia Ordine" }}
                    </button>
                    <div class="ls-privacy">
                        <p>
                            <span>Termini:</span> Facendo clic sul pulsante per
                            inviare l'ordine, accetti
                            <a href="#"
                                >Accordo sui servizi di consegna di deliveBoo in
                                Italia</a
                            >
                        </p>
                        <p>
                            Se al suo arrivo non sarai disponibile, il delivery
                            partner lascerà l'ordine alla porta. Se invii
                            l'ordine, accetti di assumertene la piena
                            responsabilità dopo la consegna.
                        </p>
                    </div>
                    <div class="ls-total">
                        <div class="row">
                            <div class="col">
                                <span>Subtotale</span>
                            </div>
                            <div class="col text-right">
                                <span
                                    >{{
                                        parseFloat(totalPrice).toFixed(2)
                                    }}
                                    €</span
                                >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span>
                                    Costi
                                    <span class="ls-info"
                                        ><i
                                            class="fa-solid fa-circle-info fa-sm"
                                            title="I costi di consegna dipendono dal ristorante"
                                        ></i
                                    ></span>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span>Consegna</span>
                            </div>
                            <div class="col text-right">
                                <span>{{ cart[0].delivery_price }} €</span>
                            </div>
                        </div>
                    </div>
                    <div class="ls-futur">
                        <p>
                            In questo momento i delivery partner svolgono un
                            ruolo fondamentale per le nostre comunità. Per
                            questo stiamo pensando di dare la possibilità di
                            aggiungere una mancia. Facci sapere che ne pensi!
                        </p>
                    </div>
                    <div class="ls-final-price">
                        <div class="row">
                            <div class="col">
                                <span>Totale</span>
                            </div>
                            <div class="col text-right">
                                <span>{{ getfinalPrice() }} €</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { EventBus } from "../../../global-event-bus.js";
import { list, total } from "cart-localstorage";

export default {
    name: "ContentRight",
    props: {
        sending: Boolean,
    },
    data() {
        return {
            cart: [],
            totalPrice: this.getTotalPrice(),
        };
    },
    beforeMount() {
        this.getOrder();
    },
    mounted() {
        EventBus.$on("sendTotalPrice", (data) => {
            this.totalPrice = data;
        });
    },
    methods: {
        // Prendo tutta la lista del carrello
        getOrder() {
            this.cart = list();
        },
        // Prendo il prezzo finale seenza la consegna
        getTotalPrice() {
            let totalPrice = parseFloat(total());
            return totalPrice;
        },
        // Calcolo del prezzo finale compresa la consegna
        getfinalPrice() {
            let delivery_price = parseFloat(this.cart[0].delivery_price);
            let finalPrice = (this.totalPrice + delivery_price).toFixed(2);
            return finalPrice;
        },
    },
};
</script>

<style lang="scss" scoped>
.ls-container__right {
    background-color: #f6f6f6;
    height: 100%;
    padding-top: 120px;
    .ls-content {
        height: 100%;
        .ls-recap-order {
            position: sticky;
            top: 50px;
            padding: 0 15%;
            .ls-btn-send {
                width: 100%;
                background-color: rgb(4, 136, 72);
                padding: 16px 0;
                text-align: center;
                color: white;
                font-size: 20px;
                font-weight: 600;
                border: 0;
                &:hover {
                    filter: opacity(85%);
                }
            }
            .ls-privacy {
                p {
                    margin: 15px 0;
                    font-size: 12px;
                    span {
                        color: grey;
                    }
                    a {
                        color: rgb(4, 136, 72);
                    }
                }
            }
            .ls-total {
                font-size: 18px;
                border-top: 1px solid grey;
                border-bottom: 1px solid grey;
                .row {
                    margin: 15px 0;
                    .col {
                        padding: 0;
                        .ls-info {
                            cursor: pointer;
                            color: grey;
                        }
                    }
                }
            }
            .ls-futur {
                p {
                    margin: 15px 0;
                    font-size: 14px;
                }
            }
            .ls-final-price {
                font-size: 24px;
                font-weight: 600;
                border-top: 1px solid grey;
                padding: 15px 0;
            }
        }
    }
}

@media only screen and (max-width: 767px) {
    .ls-container__right {
        padding-top: 50px;
    }
}
</style>
