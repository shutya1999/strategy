<?php

/* @var $this yii\web\View */

use app\models\Lang;
use yii\helpers\Html;

$this->title = 'Thank you';
$this->registerMetaTag([
    'name' => 'description',
    'content' => ''
]);
$this->registerMetaTag([
    'name' => 'author',
    'content' => 'uaitlab'
]);
$this->registerMetaTag([
    'property' => 'og:title',
    'content' => ''
]);
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => ''
]);
//$this->registerMetaTag([
//    'property' => 'og:image',
//    'content' => '/images/openGraphImage.png'
//]);



//header("Location: https://api.getresponse.com/v3/contacts");
//header("X-Auth-Token: api-key 5dd4b29ab4ab49992612f3404587def6");
//header("Content-Type: application/json");

//$headers = [
//    "charset=\"utf-8\"",
//    "X-Auth-Token: api-key 5dd4b29ab4ab49992612f3404587def6",
//    "Content-type: application/json",
//    "Accept: application/json",
//    "fields: email",
//];
//$post = json_encode([
//    'campaign'=>'office',
//    "campaignId"=>'pF8sU',
//    "fields"=>'email',
//]);
//$myCurl = curl_init();
//curl_setopt_array($myCurl, array(
//    CURLOPT_URL => 'https://api.getresponse.com/v3/contacts',
//    CURLOPT_HTTPHEADER => $headers,
//    CURLOPT_RETURNTRANSFER => true,
//    CURLOPT_POST => false,
////    CURLOPT_POSTFIELDS => $post
//));
//$response = curl_exec($myCurl);
//curl_close($myCurl);
////file_put_contents(Yii::getAlias('@app/web/').'getresponse.txt', 'Ответ: '.$response."\r\n");
//
//$response = json_decode($response);
////$response[1]->email;
//foreach ($response as $item){
//    echo '<p>'.$item->email.'</p>';
//}

$lang = Lang::getCurrent();

?>

<!--
<div class="thank-body">
    <div class="row thank">
        <div class="col-md-6 col-md-offset-3">
            <div class="thank-block">
                <div class="center-block">
                    <img src="/images/logoBig.png" alt="logo">
                </div>
                <div class="center-text">
                    <h2></h2>
                    <h3>Спасибо за регистрацию!</h3>
                    <p>Менеджер свяжется с Вами в ближайшее время.</p>
                    <a class="btn btn-warning" href="/">На главную</a>
                </div>
            </div>
        </div>
    </div>
</div>
-->

<style>
    #footer-bottom, #footer{
        display: none;
    }
</style>
<div class="site-error h-100">

    <div class="d-table h-100 w-100">
        <div class="d-table-row">
            <div class="d-table-cell text-center">
                <div class="content content-thanks">
<!--                    <h5>--><?//= $local['txt404-01'] ?><!--</h5>-->
                    <div class="h1 text-center">Спасибо <img src="/images/like.png" class="d-inline"></div>
                    <p><?= $local['txtThanks'] ?></p>
                    <a href="/<?= $lang->url ?>" class="btn-light-blue"><?= $local['txt404-03'] ?></a>
                </div>
            </div>
        </div>
    </div>

</div>




<script>
    setTimeout(function () {
        //window.location.href = "https://wep.wf/WdTYi";
        //alert ("Не забыть поставить перенаправление на правильного бота");
    }, 1000);
</script>