<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.05.2018
 * Time: 11:33
 */


$data = \app\models\Profile1::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
if(isset($_POST['profileSubmit'])){
//    echo '<pre>';
//    var_dump($data);die();
//    echo '</pre>';

    $data = \app\models\Profile1::find()->where(['user_id'=>$_POST['user_id']])->one();
    if($data==null){$data = new \app\models\Profile1();}

    $data->user_id = (int)trim(htmlspecialchars($_POST['user_id']));
//    $data->code = trim(htmlspecialchars($_POST['code']));
//    $data->date = trim(htmlspecialchars($_POST['date']));
//    $data->period = (int)trim(htmlspecialchars($_POST['period']));
//    $data->program = trim(htmlspecialchars($_POST['prog']));
//    $data->payment = (int)trim(htmlspecialchars($_POST['pay']));
//    $data->payment_date = trim(htmlspecialchars($_POST['pay_date']));
//    $data->card_num = (int)trim(htmlspecialchars($_POST['card_num']));
    $data->surname = trim(htmlspecialchars($_POST['name']));
    $data->name = trim(htmlspecialchars($_POST['name2']));
    $data->midname = trim(htmlspecialchars($_POST['name3']));
    $data->birth = trim(htmlspecialchars($_POST['birth']));
    $data->address = trim(htmlspecialchars($_POST['adr']));
//    $data->pasport = trim(htmlspecialchars($_POST['pasport']));
//    $data->pasport_date = trim(htmlspecialchars($_POST['pasport_date']));
     $data->pasport = '-';
    $data->pasport_date = '-';
    $data->code_id = '-';
    $data->company = '-';
    $data->job = '-';
    $data->tel = trim(htmlspecialchars($_POST['tel']));
    if($data->validate()){
        $data->save();
    }else{
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die('Ошибка записи. Обратитесь к разработчику');
    }
    exit('<meta http-equiv="refresh" content="0; url=/user/settings/profile" />');
}
?>
<div class="row">
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                Настройки профиля            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">

                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="profile-name">Фамилия</label>
                        <div class="col-lg-9"><input id="profile-name" class="form-control" name="name" value="<?= $data->surname ?>" placeholder="Иванов"></div>
                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="profile-name2">Имя</label>
                        <div class="col-lg-9"><input id="profile-name2" class="form-control" name="name2" value="<?= $data->name ?>" placeholder="Иван"></div>
                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="profile-name3">Отчество</label>
                        <div class="col-lg-9"><input id="profile-name3" class="form-control" name="name3" value="<?= $data->midname ?>" placeholder="Иванович"></div>
                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                        </div>
                    </div>

<!--                    <div class="form-group">-->
<!--                        <label class="col-lg-3 control-label" for="profile-code">ДМС (ф) №</label>-->
<!--                        <div class="col-lg-9"><input id="profile-code" class="form-control" name="code" value="--><?//= $data->code ?><!--" placeholder=""></div>-->
<!--                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-lg-3 control-label" for="profile-date">Дата заключения договора</label>-->
<!--                        <div class="col-lg-9"><input type="date" id="profile-date" class="form-control" name="date" value="--><?//= $data->date ?><!--" placeholder=""></div>-->
<!--                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-lg-3 control-label" for="profile-period">Период действия договора (лет)</label>-->
<!--                        <div class="col-lg-9"><input id="profile-period" class="form-control" name="period" value="--><?//= $data->period ?><!--" placeholder="1"></div>-->
<!--                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-lg-3 control-label" for="profile-prog">Программа страхования</label>-->
<!--                        <div class="col-lg-9"><input id="profile-prog" class="form-control" name="prog" value="--><?//= $data->program ?><!--" placeholder=""></div>-->
<!--                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-lg-3 control-label" for="profile-pay">Страховой платеж</label>-->
<!--                        <div class="col-lg-9"><input id="profile-pay" class="form-control" name="pay" value="--><?//= $data->payment ?><!--" placeholder=""></div>-->
<!--                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-lg-3 control-label" for="profile-pay-date">Дата выплаты страхового платежа</label>-->
<!--                        <div class="col-lg-9"><input type="date" id="profile-pay-date" class="form-control" name="pay_date" value="--><?//= $data->payment_date ?><!--" placeholder=""></div>-->
<!--                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-lg-3 control-label" for="profile-card-num">№ страховой карты</label>-->
<!--                        <div class="col-lg-9"><input id="profile-card-num" class="form-control" name="card_num" value="--><?//= $data->card_num ?><!--" placeholder=""></div>-->
<!--                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="profile-birth">Дата рождения</label>
                        <div class="col-lg-9"><input type="date" id="profile-birth" class="form-control" name="birth" value="<?= $data->birth ?>" placeholder=""></div>
                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="profile-adr">Адрес</label>
                        <div class="col-lg-9"><input id="profile-adr" class="form-control" name="adr" value="<?= $data->address ?>" placeholder=""></div>
                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                        </div>
                    </div>

<!--                    <div class="form-group">-->
<!--                        <label class="col-lg-3 control-label" for="profile-pasport">Паспортные данные</label>-->
<!--                        <div class="col-lg-9"><input id="profile-pasport" class="form-control" name="pasport" value="--><?//= $data->pasport ?><!--" placeholder=""></div>-->
<!--                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-lg-3 control-label" for="profile-pasport-date">Дата выдачи паспорта</label>-->
<!--                        <div class="col-lg-9"><input type="date" id="profile-pasport-date" class="form-control" name="pasport_date" value="--><?//= $data->pasport_date ?><!--" placeholder=""></div>-->
<!--                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <div class="form-group">-->
<!--                        <label class="col-lg-3 control-label" for="profile-id-code">Идентификационный код</label>-->
<!--                        <div class="col-lg-9"><input id="profile-id-code" class="form-control" name="code_id" value="--><?//= $data->code_id ?><!--" placeholder=""></div>-->
<!--                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <div class="form-group">-->
<!--                        <label class="col-lg-3 control-label" for="profile-id-comp">Место работы</label>-->
<!--                        <div class="col-lg-9"><input id="profile-id-comp" class="form-control" name="company" value="--><?//= $data->company ?><!--" placeholder=""></div>-->
<!--                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="col-lg-3 control-label" for="profile-id-job">Должность</label>-->
<!--                        <div class="col-lg-9"><input id="profile-id-job" class="form-control" name="job" value="--><?//= $data->job ?><!--" placeholder=""></div>-->
<!--                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="profile-id-tel">Контактный телефон</label>
                        <div class="col-lg-9"><input id="profile-id-tel" class="form-control" name="tel" value="<?= $data->tel ?>" placeholder=""></div>
                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="<?= Yii::$app->user->identity->id ?>">
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <button type="submit" class="btn btn-block btn-success" name="profileSubmit">Сохранить</button>                        <br>
                        </div>
                    </div>

                </form>            </div>
        </div>
    </div>
</div>