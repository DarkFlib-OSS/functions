<?php

namespace App;

require '/home/app/function/vendor/autoload.php';

/**
 * Class Handler
 * @package App
 */
class Handler {
    /**
     * @param $data
     * @return
     */
	public function handle($data) {
		$access_key=$this->getsecret('wasabi.access-key-id');
		$access_key_secret=$this->getsecret('wasabi.secret-access-key');
		$s3 = new \Aws\S3\S3Client([
		'version' => 'latest',
		'region' => 'eu-central-1',
		'endpoint' => 'https://s3.eu-central-1.wasabisys.com',
		'credentials' => [
			'key'    => $access_key,
			'secret' => $access_key_secret,
			],
		]);
		$buckets = $s3->listBuckets();
		foreach ($buckets['Buckets'] as $bucket) {
			    $data.=$bucket['Name'] . "\n";
		}
        return $data;
	}

	public function getsecret($name) {
		return file_get_contents('/var/openfaas/secrets/'.$name);
	}
}
