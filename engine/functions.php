<?php


function render($file, $variables = [])
{
	if (!is_file($file)) {
		echo 'Template file "' . $file . '" not found';
		exit();
	}

	if (filesize($file) === 0) {
		echo 'Template file "' . $file . '" is empty';
		exit();
	}


	$templateContent = file_get_contents($file);

	foreach ($variables as $key => $value) {
		if (is_array($value)) {
			continue;
		}

		$key = '{{' . strtoupper($key) . '}}';

		$templateContent = str_replace($key, $value, $templateContent);
	}

	return $templateContent;
};

function getPhotos() {
    $imgArray = array_diff(scandir(IMG_DIR), array('..', '.'));
    return $imgArray;
};

function renderPhotos() {
    $imgArray = getPhotos();
    $renderImg = "";
    
    foreach ($imgArray as $img) {
        if (substr($img, 1, 1) === '_'){
            continue;
        }
        $renderImg .= "<img class='smallphoto' src=". IMG_DIR . $img ." alt=". $img .">";
    }
    return $renderImg;
};

