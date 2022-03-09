<template>
    <div>
        <v-braintree
            ref="paymentRef"
            :authorization="apiToken"
            locale="it_IT"
            @success="onSuccess"
            @error="onError"
        >
            <template v-slot:button="slotProps">
                <button
                    @click="
                        slotProps.submit;
                        passToken();
                    "
                    class="d-none"
                    ref="payBtn"
                ></button>
            </template>
        </v-braintree>
    </div>
</template>

<script>
export default {
    name: "Payment",
    props: {
        apiToken: String,
    },
    data() {
        return {
            token: "",
        };
    },
    methods: {
        onSuccess(payload) {
            this.token = payload.nonce;
        },
        onError(error) {
            // let message = error.message;
        },
        passToken() {
            this.$emit("getToken", this.token);
        },
    },
};
</script>

<style lang="scss" scoped></style>
