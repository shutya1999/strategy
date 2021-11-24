<?php
?>

<div class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Напоминания об оплате</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <p>По умолчанию напоминания будут проиходить на электронный адрес указанный при регистрации аккаунта.</p>
                    <p>Если желаете получать уведомления в Telegram о том, что приближается время оплаты - перейдите по ссылке.</p>
                    <a href="https://t.me/sviy_doctor_bot?start=<?= Yii::$app->user->identity->token?>" target="_blank" class="btn btn-success ml-2 d-inline">Получать уведомления</a>
                    <a href="https://t.me/sviy_doctor_bot?stop=<?= Yii::$app->user->identity->token?>" target="_blank" class="btn btn-success ml-2 d-inline">Отписаться</a>
                    <br><br>
                    <p>Если ссылки не срабатывают, то начните вручную чат с ботом <strong>@sviy_doctor_bot</strong> и отправьте ему сообщение (вместе с пробелом). <br>Чтоб получать напоминания об оплате:</p>
                    <pre style="font-style: italic">/start <?= Yii::$app->user->identity->token?></pre>
                    <p>чтоб прекратить получать напоминания:</p>
                    <pre style="font-style: italic">/stop <?= Yii::$app->user->identity->token?></pre>
                </div><!-- /.box-body -->
            </div>

        </div>
    </div>
</div>
