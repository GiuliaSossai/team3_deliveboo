<template>
    <header class="">
        <div
            class="container d-flex justify-content-between align-items-center gs-box"
        >
            <router-link :to="{ name: 'home' }">
                <div class="logo">
                    <p class="d-inline-block m-0 p-0 text-black">
                        delive<span class="m-0 p-0 font-weight-bold">Boo</span>
                    </p>
                </div>
            </router-link>

            <!-- aggiungere if: se sei già loggato, entri in area admin personale -->
            <a href="/admin/dashboard" class="gs-button">Accedi</a>
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
    },
};
</script>

<style lang="scss" scoped>
header {
    position: fixed;
    width: 100%;
    top: 0;
    height: 80px;
    background-color: rgb(245, 245, 245);
    // background: rgb(253, 238, 238) none repeat scroll 0% 0%;
    box-shadow: rgb(226, 226, 226) 0px -2px 0px inset;
    color: rgb(26, 26, 26);
    z-index: 999;
    .gs-box {
        height: 100%;
        a {
            color: black;
        }
        .logo {
            cursor: pointer;
            font-size: 38px;
            span {
                color: rgb(96, 218, 96);
            }
        }
        .gs-button {
            color: rgb(26, 26, 26);
            padding: 8px 22px;
            font-weight: 600;
            border-radius: 16px;
            background-color: rgb(218, 216, 216);
            &:hover {
                background-color: rgb(191, 189, 189);
                text-decoration: none;
            }
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
