<template>
  <div>
   
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
    <!-- <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button> -->
  </div>

   
 

  </div>
</template>

<script>
export default {
    name: 'Jumbotron',
}
</script>

<style lang="scss" scoped>

.t3-opacity{
  opacity: 0.3;
}

</style>