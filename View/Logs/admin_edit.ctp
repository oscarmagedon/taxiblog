<style>
    form{
        width: 800px;
    }
    .log-unit{
        float: left;
        clear:none;
    }  
    .log-unit select {
        clear:both;
    }
    .log-title{
        float: left;
        clear: none;
    }

  .slide-container {
      margin-left: 30px;
      width: 710px;
      height: auto; 
      padding: 5px;
      border: 1px solid #444;
  }

  .slide-image{
      width: 700px;
      height: 400px;
      clear: none;
      padding: 10px;
      background-repeat: no-repeat;
      background-position: 0 10px;
      overflow: auto;
  }

</style>
<h2>Detalles de Novedad</h2>
<?php
echo $this->Thumbnail->render('logo.png', array(
  'path' => '',
  'width' => '36',
  'height' => '36',
  'resize' => 'portrait',
  'quality' => '60'
), array('id' => 'img-test', 'alt' => 'thumbnail test'));

//
echo $this->Form->create('Log');

echo $this->Form->input('id');

echo $this->Form->input('unit_id',array('label'=>'Unidad', 
    'div' => 'input select required log-unit'));

echo $this->Form->input('title', array('label' => 'Titulo', 
    'div' => 'input text log-title'));

echo $this->Form->input('content',array('label' => 'Descripcion','rows' => 4,
    'div' => 'input textarea log-descr'));

echo $this->Form->end('Guardar');

?>
<h3><?php echo count($explore) ?> Archivos e imagenes</h3>
<div class="slide-container">
    <?php
    $id        = $this->data['Log']['id'];
    $folderExp = $this->webroot . "files/logs/" . $id .'/';
    $folderRaw = WWW_ROOT . "files/logs/" . $id .'/';
    //pr($explore);

    foreach ($explore as $exp) :
        
        echo "<div class='slide-image'>";
    
        $bgUrl   = $folderExp . $exp;

        $filePts = explode('.',$exp);

        if ($filePts[1] != 'pdf') :

            $imgSize = getimagesize( $folderRaw . $exp);

    ?>
            <div style="
                    background-image: url(<?php echo $bgUrl ?>);
                    width  :<?php echo $imgSize[0] ?>px;
                    height :<?php echo $imgSize[1] ?>px;
                    border : 1px solid black;
                    padding: 5px;">

            </div>
    <?php
        endif;

        if ($filePts[1] == 'pdf') {

            $filename = $bgUrl;
            echo "<object data='$filename' type'application/pd' width='680px' height='400px'>";
            echo "If you are unable to view file, you can download from <a href = '$filename'>";
            echo "here</a> or download <a target ='_blank' ";
            echo "href='http://get.adobe.com/reader/'>Adobe PDF Reader</a> to view the file.";
            echo "</object>";
        }
        echo "</div>";
    endforeach;
    ?>
</div>
<?php

echo $this->Form->create('Log', array('type' => 'file','url' => 'upfile'));

echo $this->Form->input('id');

echo $this->Form->input('fileup',array('label' => 'Agregar...','type' => 'file'));

echo $this->Form->end('SUBIR');

?>
<div class="item">            
    <div class="clearfix">
        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
            <?php

            foreach ($explore as $exp) :
                
                $bgUrl   = $folderExp . $exp;

                $filePts = explode('.',$exp);

                if ($filePts[1] != 'pdf') :
                    
                    $imgSize = getimagesize( $folderRaw . $exp);

                $this->Thumbnail->render($folderRaw . $exp, array(
                                  'path' => '',
                                  'width' => '36',
                                  'height' => '36',
                                  'resize' => 'portrait',
                                  'quality' => '60'
                                ), array('id' => 'img-test', 'alt' => 'thumbnail test'));

                $thumbRoute = '/thumbnails/36x36q60rportrait/' . $folderRaw . $exp;
            ?>
                    <li data-thumb="<?php echo $thumbRoute ?>"> 
                        <img src="<?php echo $bgUrl ?>" />
                    </li>
            <?php
                    
                endif;
                /*
                if ($filePts[1] == 'pdf') {

                    $filename = $bgUrl;
                    echo "<object data='$filename' type'application/pd' width='680px' height='400px'>";
                    echo "If you are unable to view file, you can download from <a href = '$filename'>";
                    echo "here</a> or download <a target ='_blank' ";
                    echo "href='http://get.adobe.com/reader/'>Adobe PDF Reader</a> to view the file.";
                    echo "</object>";
                }
                echo "</div>";
                */
            endforeach;


            ?>
            <!--
            <li data-thumb="img/thumb/cS-1.jpg"> 
                <img src="img/cS-1.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-2.jpg"> 
                <img src="img/cS-2.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-3.jpg"> 
                <img src="img/cS-3.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-4.jpg"> 
                <img src="img/cS-4.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-5.jpg"> 
                <img src="img/cS-5.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-6.jpg"> 
                <img src="img/cS-6.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-7.jpg"> 
                <img src="img/cS-7.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-8.jpg"> 
                <img src="img/cS-8.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-9.jpg"> 
                <img src="img/cS-9.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-10.jpg"> 
                <img src="img/cS-10.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-11.jpg"> 
                <img src="img/cS-11.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-12.jpg"> 
                <img src="img/cS-12.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-13.jpg"> 
                <img src="img/cS-13.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-14.jpg"> 
                <img src="img/cS-14.jpg" />
                 </li>
            <li data-thumb="img/thumb/cS-15.jpg"> 
                <img src="img/cS-15.jpg" />
                 </li>
             -->
        </ul>
    </div>
</div>


<?php
//pr($explore);
?>
<script>
$(function () {
  $('.slide-container').slick({
      dots     : true
  });

  $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });

});
		
    
</script>