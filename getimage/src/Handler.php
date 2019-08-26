<?php

namespace App;

/**
 * Class Handler
 * @package App
 */
class Handler
{
    /**
     * @param $data
     * @return
     */
	public function handle($data) {
	    $img = new Imagick(realpath($image));
	    $profiles = $img->getImageProfiles("icc", true);
	    $img->stripImage();
	    if(!empty($profiles)){
		    $img->profileImage("icc", $profiles['icc']);
	    }
	    $img->writeImage($image);
	    $img->clear();
	    $img->destroy();
            return $data;
    }
}
