<?
	$data = array("UserName"=>"ProductViewer","Password"=>"_bS]2(md:<R5A4]g");
	$data_string =json_encode($data) ;
//	print_r($data_string);
	$curl_handle=curl_init();
	curl_setopt($curl_handle, CURLOPT_URL,'http://ledneveugene-001-site2.ftempurl.com/api/auth');
	curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 1);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($curl_handle, CURLOPT_USERAGENT, 'UAITLAB');
	curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	$token_out = curl_exec($curl_handle);
	curl_close($curl_handle);


	$token = json_decode($token_out,true);

//	$data = array("UserName"=>"ProductViewer","Password"=>"_bS]2(md:<R5A4]g");
        $headers = array(
//            "POST ".$page." HTTP/1.0",
            "Content-Type: application/json;charset=\"utf-8\"",
//            "Content-length: ".strlen($xml_data),
            "Authorization: Bearer " . $token["token"]
        ); 
	
	$curl_handle=curl_init();
	curl_setopt($curl_handle, CURLOPT_URL,'http://ledneveugene-001-site2.ftempurl.com/api/products-feed');
	curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 60);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
//	curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($curl_handle, CURLOPT_USERAGENT, 'UAITLAB');
	curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
	$products_out = curl_exec($curl_handle);
	curl_close($curl_handle);
//	print_r($products_out);
//	echo "products_out";


	$products = json_decode($products_out,true);
	echo "<pre>";
	print_r($products);
	echo "</pre>";
//	echo json_decode($out);
?>