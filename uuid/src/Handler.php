<?php

namespace App;

//require_once('../vendor/autoload.php');

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
	$uuid = \Ramsey\Uuid\Uuid::uuid1();	
        return $uuid;
    }
}
