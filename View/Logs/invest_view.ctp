<h2>Detalles de Novedad</h2>
<?php
echo "<h3>" . $log['Log']['title'] ."</h3>";

echo "<p>" . $log['Log']['content'] ."</p>";

?>
<h3><?php echo count($explore) ?> Archivos e imagenes:</h3>

<div class="slide-container">
    <?php
    $id        = $log['Log']['id'];
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