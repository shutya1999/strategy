<?

error_reporting(E_ALL);
ini_set("display_errors", 1);
function pp($sw,$name=""){
    if($_SERVER['REMOTE_ADDR']=="127.0.0.1" || $_SERVER['REMOTE_ADDR']=="31.134.124.13")
    {
        echo "<pre>".(($name)?$name." = ":false);
        if(is_array($sw))
        {
            print_r($sw);
        }
        else
        {
            echo $sw;
        }
        echo "</pre>";
    }
}

//echo '<pre>';
//print_r($_POST);
if($_POST['file'] && $_POST['edrpou'] && $_POST['email'])
{
    $file = $_SERVER['DOCUMENT_ROOT']."/uploads/".$_GET['file'];
    $edrpou = strip_tags($_GET['edrpou']);
    $email = strip_tags($_GET['email']);
    $headers = array(
        "Authorization:c3351102-828d-42ee-8048-215e86dfa2ec",
        "Content-Type: multipart/form-data"
    );
    $url = "https://vchasno.com.ua/api/v2/documents?expected_owner_signatures=0&expected_recipient_signatures=1&first_sign_by=recipient";

    // $data_string =json_encode($data) ;
    //	print_r($data_string);

    // echo realpath("/uploads/42395797_3174517457_20190410_ДоговірНаСтрахування_docnum73458_mukhaboyka@gmail.com_dogovor-4.pdf");
    // pp(file_exists($file),"file_exists");
    // echo $file;
    if (function_exists('curl_file_create')) { // php 5.5+
        $cFile = curl_file_create($file);
    } else {
        $cFile = '@' . realpath($file);
    }
    $post = array('file'=> $cFile);
    $curl_handle=curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $url);
    curl_setopt($curl_handle, CURLOPT_POST,1);
    curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $post);
    curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
    $out = curl_exec($curl_handle);
    curl_close($curl_handle);

    // pp($out,"out");

    $out_data = json_decode($out,true);
    // pp($out_data,"out_data");


    if($out_data) // Если есть файл на вчасно то запускаем сессию для подписи
    {
        if( $out_data[documents][0][id] )
        {
            $headers = array(
                "Authorization: c3351102-828d-42ee-8048-215e86dfa2ec",
                "Content-Type: application/json"
            );
            $url = "https://vchasno.com.ua/api/v2/sign-sessions";
            $data = array(
                "document_id" => $out_data[documents][0][id],
                "edrpou" => $edrpou,
                "email" => $email,
                "type" => "sign_session",
                "on_cancel_url" => "/images/thank_you.jpg",
                "on_finish_url" => "/images/thank_you.jpg",
            );
            $data_string =json_encode($data);
            //	print_r($data_string);
            $curl_handle=curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, $url);
            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            // curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $post);
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($curl_handle, CURLOPT_USERAGENT, 'UAITLAB');
            curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
            $out_session = curl_exec($curl_handle);
            curl_close($curl_handle);

            // pp($out,"out");



            $out_data_session = json_decode($out_session,true);

            // pp($out_data_session,"out_data");



//            echo $out_data_session['url'];
            echo json_encode(array('url'=>$out_data_session['url']));


            /*
            if($out_data_session){
              if($out_data_session['url']){
                ?>
                <iframe src="<?= $out_data_session['url']; ?>" width="600" height="480"></iframe>
                <?
              }
            }
            */

        }
    }

}

?>
