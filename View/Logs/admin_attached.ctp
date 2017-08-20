<?php
/*
echo $this->Thumbnail->render('../files/logs/3/cedula2015.jpg', array(
  'path' => '',
  'width' => '36',
  'height' => '36',
  'resize' => 'portrait',
  'quality' => '60'
), array('id' => 'img-test', 'alt' => 'thumbnail test'));
*/

 /*
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
*/

//pr($explore);

$folderExp = $this->webroot . "files/logs/" . $id .'/';
$folderRaw = WWW_ROOT . "files/logs/" . $id .'/';
$foldThmbs = '../files/logs/' . $id . '/';
$thumbSave = 'thumbnails/' . $id;

$gallery = ['Files'=>[],'Images'=>[]];

foreach ($explore as $exp) :
    
    $bgUrl   = $folderExp . $exp;

    $filePts = explode('.',$exp);

    if ($filePts[1] != 'pdf') {
		$gallery['Images'][] = $exp;
    } else {
    	$gallery['Files'][] = $exp;
    }
    	
    	//$fullImg = $folderRaw . $exp;
		

    	/*
    	echo '../files/logs/' . $id . '/' . $exp;

    	echo $this->Thumbnail->render('../files/logs/' . $id . '/' . $exp , array(
                      'folder' => 'thumbnails/' . $id,
                      'width' => '36',
                      'height' => '36',
                      'resize' => 'portrait',
                      'quality' => '60'
                    ), array('id' => 'img-test', 'alt' => 'thumbnail test'));

        <img src="<?php echo $bgUrl  ?>" width='640' height='480'/>
        */

    
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



//pr($gallery);

?>
<h2>Novedad XXX</h2>

<h3><?php echo count($gallery['Images']) ?> Imágenes</h3>

<?php
// 
?>



<div class="gallery">
	
	<div class="image-thumbs">
		<ul class="thumbs-list" style="width: <?= (count($gallery['Images']) * 120)?>px">
	
		<?php
		foreach ( $gallery['Images'] as $thk => $thumb ) {
			$toImage = $folderExp . $thumb;
			$imgSize = getimagesize( $folderRaw . $thumb);
			//pr($imgSize);
			$imgWidth  = $imgSize[0];
			$imgHeight = $imgSize[1];
			/*
			$isVertic  = 0;
			$topMeasu  = $imgWidth;
			if ( $imgHeight > $imgWidth ) {
				$isVertic = 1;
				$topMeasu  = $imgHeight;
			}*/

			echo "<li><div class='thumbnail'><a href='#' data-pos='$thk'".  
				 " data-img='$toImage' data-width='$imgWidth' data-height='$imgHeight'>";
			//echo  $thumb;
			echo $this->Thumbnail->render( $foldThmbs . $thumb , array(
                      'folder' => $thumbSave,
                      'width' => '64',
                      'height' => '64',
                      'resize' => 'portrait',
                      'quality' => '30'
                    ), array('id' => $thk , 'alt' => $thumb )); 
			echo "</a></div></li>";
		}
		?>
	
		</ul>
	</div>

	<div class="image-show">
		
		<div class="image">
			wait for loading
		</div>
			
			<?php
			/*
			foreach ( $gallery['Images'] as $thk => $image ) {
				
				$toImage = $folderExp . $image;

				//echo "<div class='image' data-pos='$thk'>";
				echo "<li style='display: inline'>";
				echo "<img src='$toImage' width='640' height='480'/>";
				echo "</li>";
				//echo "</div>";
			}
			*/
			?>
		
		
	</div>


</div>	
<!---->
<h3><?php echo count($gallery['Files']) ?> Archivos</h3>

<div class="pdf-preview">
<div class="iconslist">
	
</div>
	<?php
	foreach ( $gallery['Files'] as $fk => $file ) {
		//echo $file . '-';
		$filename = $folderExp . $file;
		?>
			<div class="pdf-icon">
				<a href="#" data-file="<?php echo $file ?>">
					<?php
					echo $this->Html->image('icon-pdf.jpeg',['width'=>'24px']);
					?>						
					<span style="font-size: 80%">
					<br><?php
					echo $file;
					?>	
					</span>
					
				</a>
					
			</div>
		<?php
	}

	/*
	echo "<object data='$filename' type'application/pd' width='680px' height='400px'>";
    echo "If you are unable to view file, you can download from <a href = '$filename'>";
    echo "here</a> or download <a target ='_blank' ";
    echo "href='http://get.adobe.com/reader/'>Adobe PDF Reader</a> to view the file.";
    echo "</object>";
	*/
	?>
	<div class="pdf-zone">
		
	</div>
</div>
<?php



echo $this->Form->create('Log', array('type' => 'file','url' => 'upfile'));

echo $this->Form->input('id');

echo $this->Form->input('fileup',array('label' => 'Agregar...','type' => 'file'));

echo $this->Form->end('SUBIR');

?>
<script>
var folderExp = '<?php echo $folderExp ?>';

$(function () {
  	
  	$('.thumbnail a').click(function () {
		
		//alert($(this).data('pos')); 
		var $image     = $(this).data('img'),
			$imgWidth  = $(this).data('width'),
			$imgHeight = $(this).data('height');

		//smallize it
		$complem = "";
		//center small ones
		$cntfix  = "";
		
		if ( $imgHeight > 480 || $imgWidth > 640) {
			
			if ( $imgHeight > $imgWidth ) {
				$complem = " height='480'";
			} else {
				$complem = " width='640'";
			}
			
			$styvert = 'height: auto;';
			if ( $imgHeight > $imgWidth )
				$styvert = 'width: auto;';

			$('.image-show .image').attr('style',$styvert);

		} else {
			$pleft  = (640 - $imgWidth) / 2;
			$ptop   = (480 - $imgHeight) / 2;
			$cntfix = "padding: " + $ptop + 'px ' + $pleft + 'px';
			$('.image-show .image').attr('style',$cntfix);
		}
		

		//$(".image-show .image").html("<img src='" + $image + "' alt='waiting' " + $complem + "/>");
		var	img = $("<img id='image-show' alt='waiting' " + $complem + ">");

		img.attr('src', $image);

		$('.image-show .image').html(img);
		
		return false;		
  	});

  	$('.pdf-icon a').click(function(){
  		$filename = folderExp + $(this).data('file');
  		$adobeObj  = "<object data='"+ $filename + "' type'application/pd' width='600px' height='400px'>";
		$adobeObj += "If you are unable to view file, you can download from <a href = '";
  		$adobeObj += $filename + "'>here</a> or download <a target ='_blank' ";
		$adobeObj += "href='http://get.adobe.com/reader/'>Adobe PDF Reader</a> to view the file.";
	    $adobeObj += "</object>";

  		$('.pdf-zone').html($adobeObj);
  		return false;
  	});

});
</script>
<style type="text/css">
.gallery {
	width: 660px;
	height: 500;
	border: 1px solid #CCC;
}
.gallery .image-show{
	width: 650px;
	height: 490px;
	border: 1px solid #CCC;
	margin: 10px 5px;	
	overflow: hidden;
}
.gallery .image-show .image{
	width: 642px;
	height: 482px;
	background-color: #888;
	margin: 5px 3px;

}
.gallery .image-thumbs{
	width: 648px;
	height: 110px;
	border: 1px solid #CCC;
	margin: 5px;	
	overflow-x: scroll;
}
ul.thumbs-list{
	padding: 4px;
	margin: 2px;
	height: 80px;
}

	ul.thumbs-list li {
		display: inline;
		background-color: #888;
		width: auto;
		float: left;
		margin: 1px 4px;
	}
	li .thumbnail {
		background-color: #DDD;
		padding: 4px 8px;
		height: auto;
		width: auto;
	}
.gallery .image-thumbs .thumbs-list .thumbnail a{
	width: 100%;
}
</style>
