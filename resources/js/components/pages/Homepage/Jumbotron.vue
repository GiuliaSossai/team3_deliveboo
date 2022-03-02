<template>
  <div class="jumbo">
   
  <!-- 
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/homepage/italian.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block p-1 rounded-pill t3-opacity bg-success text-white">
            <h5>Ordina il cibo con un click</h5>
            <p>Con Delive Boo può mangiare i piatti dei migliri ristoranti, comodamente da casa tua!</p>
          </div>
      </div>
      <div class="carousel-item">
        <img src="img/homepage/japanese.png" class="d-block w-100" alt="...">
         <div class="carousel-caption d-none d-md-block p-1 rounded-pill bg-success text-white">
            <h5>Ordina il cibo con un click</h5>
            <p>Con Delive Boo può mangiare i piatti dei migliri ristoranti, comodamente da casa tua!</p>
          </div>
      </div>
      <div class="carousel-item">
        <img src="img/homepage/mex.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block p-1 rounded-pill bg-success text-white">
            <h5>Ordina il cibo con un click</h5>
            <p>Con Delive Boo può mangiare i piatti dei migliri ristoranti, comodamente da casa tua!</p>
          </div>
      </div>
      <div class="carousel-item">
        <img src="img/homepage/sushi.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block p-1 rounded-pill bg-success text-white">
            <h5 class="">Ordina il cibo con un click</h5>
            <p>Con Delive Boo può mangiare i piatti dei migliri ristoranti, comodamente da casa tua!</p>
          </div>
      </div>
    </div>
    /**<button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button> 
  </div>
  -->

  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="img/homepage/italian.png" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="img/homepage/mex.png" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="img/homepage/sushi.png" alt="Third slide">
      </div>
    </div>
  </div>
   
  <div class="content-jumbo ">
    <h5>Ordina cosa vuoi mangiare, a casa tua.</h5>
    <p class="m-0 rounded-pill">La tua città, <span class=" font-weight-bold">Perugia</span></p>
    <div class="mdg-btn">
      <router-link :to="{name:'restaurants'}" class="text-white">
        Vedi i ristoranti
      </router-link>
    </div>
  </div>
 

  </div>
</template>

<script>
export default {
    name: 'Jumbotron',
}
</script>

<style lang="scss" scoped>

// .t3-opacity{
//   opacity: 0.3;
// }

.jumbo{
  position: relative;

  .content-jumbo{
    position: absolute;
    top:50vh;
    left: 100px;

    h5{
      font-size: 52px;
      color: black;
      font-weight: 700;
    }

    p{
      font-size: 36px;
      background-color: whitesmoke;
      padding: 10px 25px;
      display: inline-block;
    }

    .mdg-btn{
      font-size: 24px;
      background-color: black;
      color: white;
      padding: 10px 25px;
      display: inline-block;
      margin-left: 50px;     
      cursor: pointer; 
    }
  }
}

#carouselExampleSlidesOnly{
  height: 100vh;
  width: 100%;
}

.jumbo img{
  height: 100vh;
  object-fit: cover;
  filter: opacity(85%);
}


</style>