<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
header("Content-Type: text/json");
		
$results = array();

$idrand = rand(20, 6000);

function thumbnail($inputFileName, $maxSize = 100){
    $info = getimagesize($inputFileName);

    $type = isset($info['type']) ? $info['type'] : $info[2];

    // Check support of file type
    if ( !(imagetypes() & $type) ){
        return false;
    }

    $width  = isset($info['width'])  ? $info['width']  : $info[0];
    $height = isset($info['height']) ? $info['height'] : $info[1];

    $wRatio = $maxSize / $width;
    $hRatio = $maxSize / $height;

    $sourceImage = imagecreatefromstring(file_get_contents($inputFileName));

    if ( ($width <= $maxSize) && ($height <= $maxSize) ){
        return $sourceImage;
    }else if ( ($wRatio * $height) < $maxSize ){
        // horizontal
        $tHeight = ceil($wRatio * $height);
        $tWidth  = $maxSize;
    }else{
        // vertical
        $tWidth  = ceil($hRatio * $width);
        $tHeight = $maxSize;
    }

    $thumb = imagecreatetruecolor($tWidth, $tHeight);

    if ( $sourceImage === false ){
        // Could not load image
        return false;
    }

    // Copy resampled makes a smooth thumbnail
    imagecopyresampled($thumb, $sourceImage, 0, 0, 0, 0, $tWidth, $tHeight, $width, $height);
    imagedestroy($sourceImage);

    return $thumb;
}

function imageToFile($im, $fileName, $quality = 80){
    if ( !$im || file_exists($fileName) ){
        return false;
    }

    $ext = strtolower(substr($fileName, strrpos($fileName, '.')));

    switch ( $ext ){
        case '.gif':
            imagegif($im, $fileName);
            break;
        case '.jpg':
        case '.jpeg':
            imagejpeg($im, $fileName, $quality);
            break;
        case '.png':
            imagepng($im, $fileName);
            break;
        case '.bmp':
            imagewbmp($im, $fileName);
            break;
        default:
            return false;
    }

    return true;
}
 
$total = 0;

foreach (glob("fotos/*.JPG") as $nombre_fichero) {

	$idrand++;
	
	$nombre_fichero_th = str_replace('fotos', 'thumbs', $nombre_fichero);

	$tamano = getimagesize($nombre_fichero);

	if(!is_file($nombre_fichero_th)){
		$im = thumbnail($nombre_fichero, 400);
		imageToFile($im, $nombre_fichero_th);
	}

	$resultado = '{
		"id": "cok-'.$idrand.'",
		"width": '.$tamano[0].',
		"height": '.$tamano[1].',
		"color": "#00AAE4",
		"description": "Brindis 2018",
		"urls": {
			"regular": "'.$nombre_fichero.'",
			"small": "'.$nombre_fichero_th.'"
		}
	}';

	array_push($results, $resultado);

	$total++;
}

$pages = (int) ($total / 20);

$salida = '{
    "total": '.$total.',
    "total_pages": '.$pages.',
    "results": [
        '.implode(',', $results).'
	]
}';

echo ($salida);
?>