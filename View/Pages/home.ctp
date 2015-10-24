<style>

  .slide-container {
      margin: 0 auto;
      width: 910px;
      height: auto; 
      padding: 5px;
      box-shadow: 10px 10px 5px #888888;
      border: 1px solid #444;
      border-radius: 10px;
  }

  .slide-image{
      width: 900px;
      height: 400px;
      clear: none;
      padding: 10px;
      background-repeat: no-repeat;
      background-position: 0 10px;
  }
  .image-one {
      background-image: url(<?php echo $this->webroot ?>img/website/image-slide-one.jpg);
  }
  .image-two {
      background-image: url(<?php echo $this->webroot ?>img/website/image-slide-two.jpg);
  }
  .image-thr {
      background-position: 0 0;
      background-image: url(<?php echo $this->webroot ?>img/website/image-slide-thr.jpg);
  }

</style>

<div class="slide-container">
    <div class="slide-image image-one"> </div>
    <div class="slide-image image-two"> </div>
    <div class="slide-image image-thr"> </div>
</div>

<script>
$(function () {
  $('.slide-container').slick({
      dots     : true,
      autoplay : true
  });
});
		
</script>
