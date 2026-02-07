<?php
/* global-settings-google-font-api.php
 * Descripion: google font api 
 */
   
	$fontArray = get_option('google_fonts_list');

	if (false == $fontArray){
		// get Google Fonts data
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyDDpjSS5f4m9mbFZj0ZCNVUOUdqtGUC0d0&sort=popularity",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
			"authorization: Basic ZXdhc3RlNDExOm5nTUQqQ3RFTDgwVFYmdGk0Vw==",
			"cache-control: no-cache",
			"content-type: application/x-www-form-urlencoded",
			"postman-token: 9587751d-ccb6-29ff-7b8a-38110ac9229a"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		// convert JSON to an associative array
		$jsonResponse = json_decode($response, true);
		// drill down to items
		$fonts = $jsonResponse['items'];

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
			} else {
				
				// create an array to put each font family name into
				$fontArray = array();
				
				//go through each font family and add it to an associative array to use in the add_control below
				foreach($fonts as $key => $value){
					$fontArray[$value['family']] = $value['family'];
				}
				// pull the first 399 fonts
				$inputFonts = array_slice($fontArray,0,399);
				ksort($inputFonts);
				$default = array('' => 'Theme Default');
				$fonts = array_merge($default, $inputFonts);

		}

	update_option('google_fonts_list', $fonts );

	}

?>