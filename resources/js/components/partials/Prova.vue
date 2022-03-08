<template>
  <div class="container">
    Pagamento
    <v-braintree
      :authorization="token"
      @success="onSuccess"
      @error="onError"
      locale="it_IT"
      ></v-braintree>
  </div>
</template>

<script>
export default {
  name: 'Prova',

  data(){
    return {
      token: "",
    }
  },


  // mounted() {
  //     this.getToken();
  // },

   created() {
    // console.log(this.shoppingCart);
    // this.showConsoleLog(this.shoppingCart, this.totalPrice);
    this.getTokenFromApi();
  },

   methods: {
    getTokenFromApi() {
      axios
        .get("/api/generate")
        .then((res) => {
          this.token = res.data.token;
        })
        .catch()
        .then(() => {
          // this.isLoading = false;
        });
    },


    onSuccess (payload) {
      let nonce = payload.nonce;

      this.form.token = nonce
      
      console.log('ciao');
      console.log(nonce);
      // Do something great with the nonce...
    },
    onError (error) {
      let message = error.message;
       console.log(message);
      // Whoops, an error has occured while trying to get the nonce
    },

    sendForm() {
            axios
                .post("/api/make-payment", {
                  token: this.form.token,
                  f_price: this.finalPrice
                })
                .then((response) => {

                    } );
        },
  }
}



</script>

<style>

</style>
