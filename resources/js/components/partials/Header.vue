<template>
   <div>
     <h1>HEADER</h1>
     <ul>
       <li><router-link :to="{name: 'home'}">Home</router-link></li>
     </ul>
   </div>
</template>

<script>
    export default {
      name: "Header",
        
    }
</script>

<style lang="scss">

</style>