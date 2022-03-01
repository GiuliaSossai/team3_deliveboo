<template>
   <div>
     <h1>Home</h1>
     <Jumbotron />
     <FirstSection />
     
   </div>
</template>

<script>

import Jumbotron from './Jumbotron.vue';
import FirstSection from './FirstSection.vue';

    export default {
      name: "Home",
      components: {
        Jumbotron,
        FirstSection,
      }
        
    }
</script>

<style lang="scss">

</style>