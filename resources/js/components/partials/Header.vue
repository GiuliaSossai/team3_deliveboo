<template>
    <header class="py-5">
        <div class="container d-flex justify-content-between">
          <div class="logo font-weight-bold">
            <p class="d-inline-block">delive</p>
            <p class="d-inline-block">Boo</p>
          </div>
          
          <button class="btn font-weight-bold">Accedi</button>
        </div> 
    </header>
   <!-- <div>
      <div class="header">
        <div id="background"></div>
        <div id="labels">
          labels here
        </div>
      </div>

      <div class="content"></div>
   </div> -->
   

</template>

<script>
    export default {
      name: "Header",

      methods: {
        // $(window).scroll(function() {
        //     if ($(this).scrollTop() > 400) {
        //         $( ".header #background" ).fadeIn();
        //     } else {
        //         console.log('there');
        //         $( ".header #background" ).fadeOut();
        //     }
        // }),
      }
        
    }
</script>

<style lang="scss" scoped>
  header {
    position: fixed;
    width: 100%;
    top: 0;
    //background-color: rgb(253, 238, 238);
    background: rgb(253, 238, 238) none repeat scroll 0% 0%;
    box-shadow: rgb(226, 226, 226) 0px -2px 0px inset;
    color: rgb(26, 26, 26);
    .logo {
      cursor: pointer;
      font-size: 48px;
      p:nth-of-type(2) {
      color: rgb(96, 218, 96);
      }
    }
    button {
      padding: 0 16px;
      border-radius: 32px;
      background-color: rgb(253, 196, 196);
      &:hover {
        background-color: rgb(207, 158, 158);
      }
    }
  }

//   .header{
//     width:100%;
//     height:100px;
//     position:fixed;
//     top:0px;
//     z-index:3;
// }

// body{
//     margin:0px;
// }
// .header #background, .header #labels
// {
//     position:absolute;
//     top:0px;
//     width:100%;
//     height:100%;
// }

// .header #labels{
//     background-color:transperent;
// }

// .header #background{
//     background-color:yellow;
//     display:none;
// }


// .content{
//     width:100%;
//     height:5000px;
//     background-color:green;
// }


</style>