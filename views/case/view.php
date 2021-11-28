<?php

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
$this->registerCssFile('@web/css/case.css', ['depends' => \app\assets\AppAsset::class]);

$lang_id = $lang->url;
$lang_url = ($lang->url == 'ua') ? '' : "/" . $lang->url ;

$this->params['breadcrumbs'][] = array(
    'label'=> 'Кейси',
    'url'=> $lang_url . '/case'
);
$this->params['breadcrumbs'][] = $case['title_' . $lang_id];
//\yii\helpers\VarDumper::dump($lang_id)
?>

<div class="container">

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <div class="case-page">
<!--        <div class="subtitle">Держава</div>-->
        <h1 class="h3"><?= $case['title_' . $lang_id] ?></h1>
        <p><?= $case['s_desc_' . $lang_id] ?></p>
        <div class="main-img">
            <div class="_desc">
                <picture>
                    <source srcset="/img/case/case-desc.webp" type="image/webp">
                    <source srcset="/img/case/case-desc.jpg" type="image/jpeg">
                    <img src="/img/case/case-desc.jpg" alt="Стратегічна сесія для Mashable">
                </picture>
            </div>
            <div class="_tablet">
                <picture>
                    <source srcset="/img/case/case-tablet.webp" type="image/webp">
                    <source srcset="/img/case/case-tablet.jpg" type="image/jpeg">
                    <img src="/img/case/case-tablet.jpg" alt="Стратегічна сесія для Mashable">
                </picture>
            </div>
            <div class="_mob">
                <picture>
                    <source srcset="/img/case/case-mob.webp" type="image/webp">
                    <source srcset="/img/case/case-mob.jpg" type="image/jpeg">
                    <img src="/img/case/case-mob.jpg" alt="Стратегічна сесія для Mashable">
                </picture>
            </div>
            <p class="author">Фото: Unsplash</p>
        </div>

        <div class="redactor">
            <?= $case['text_' . $lang_id] ?>
        </div>
    </div>
</div>

<div class="gallery-case">
    <div class="swiper gallery-slider">
        <p class="h4">Фотогалерея</p>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="img">
                    <picture>
                        <source srcset="/img/case/gallery-1.webp" type="image/webp">
                        <source srcset="/img/case/gallery-1.jpg" type="image/jpeg">
                        <img src="/img/case/gallery-1.jpg" alt="Стратегічна сесія для Mashable">
                    </picture>
                </div>
                <p class="desc">
                    Нараза з приводу створення стратегії (фото: Іван Іванов) <br>
                    Перший день
                </p>
            </div>
            <div class="swiper-slide">
                <div class="img">
                    <picture>
                        <source srcset="/img/case/gallery-1.webp" type="image/webp">
                        <source srcset="/img/case/gallery-1.jpg" type="image/jpeg">
                        <img src="/img/case/gallery-1.jpg" alt="Стратегічна сесія для Mashable">
                    </picture>
                </div>
                <p class="desc">
                    Нараза з приводу створення стратегії (фото: Іван Іванов) <br>
                    Перший день
                </p>
            </div>
            <div class="swiper-slide">
                <div class="img">
                    <picture>
                        <source srcset="/img/case/gallery-1.webp" type="image/webp">
                        <source srcset="/img/case/gallery-1.jpg" type="image/jpeg">
                        <img src="/img/case/gallery-1.jpg" alt="Стратегічна сесія для Mashable">
                    </picture>
                </div>
                <p class="desc">
                    Нараза з приводу створення стратегії (фото: Іван Іванов) <br>
                    Перший день
                </p>
            </div>
            <div class="swiper-slide">
                <div class="img">
                    <picture>
                        <source srcset="/img/case/gallery-1.webp" type="image/webp">
                        <source srcset="/img/case/gallery-1.jpg" type="image/jpeg">
                        <img src="/img/case/gallery-1.jpg" alt="Стратегічна сесія для Mashable">
                    </picture>
                </div>
                <p class="desc">
                    Нараза з приводу створення стратегії (фото: Іван Іванов) <br>
                    Перший день
                </p>
            </div>
            <div class="swiper-slide">
                <div class="img">
                    <picture>
                        <source srcset="/img/case/gallery-1.webp" type="image/webp">
                        <source srcset="/img/case/gallery-1.jpg" type="image/jpeg">
                        <img src="/img/case/gallery-1.jpg" alt="Стратегічна сесія для Mashable">
                    </picture>
                </div>
                <p class="desc">
                    Нараза з приводу створення стратегії (фото: Іван Іванов) <br>
                    Перший день
                </p>
            </div>
        </div>

        <div class="gallery-bottom">
            <div class="slider-nav">
                <div class="arrow prev prev-gallery" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-ada1018e85a648d79"></div>
                <div class="arrow next next-gallery" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-ada1018e85a648d79"></div>
            </div>
            <div class="pagination-gallery"></div>
        </div>

    </div>
</div>

<div class="case-slider_wrap">
    <div class="container">
        <p class="h3">Наші кейси</p>
        <div class="swiper case-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide show _organi_samovryaduvanya active">
                    <div class="img">
                        <picture>
                            <source srcset="/img/index/case-1.webp" type="image/webp">
                            <source srcset="/img/index/case-1.jpg" type="image/jpeg">
                            <img src="/img/index/case-1.jpg" alt="H-Strategy">
                        </picture>
                    </div>
                    <p class="h5 name">Стратегічна сесія для Mashable</p>
                    <p class="desc">
                        В то время некий безымянный печатник создал большую коллекцию размеров
                        В то время некий безымянный печатник создал большую коллекцию размеров </p>
                </div>
                <div class="swiper-slide show _gromadski_organizaciy">
                    <div class="img">
                        <picture>
                            <source srcset="/img/index/case-1.webp" type="image/webp">
                            <source srcset="/img/index/case-1.jpg" type="image/jpeg">
                            <img src="/img/index/case-1.jpg" alt="H-Strategy">
                        </picture>
                    </div>
                    <p class="h5 name">Стратегічна сесія для Львівської міської Ради</p>
                    <p class="desc">
                        В то время некий безымянный печатник создал большую коллекцию размеров
                        В то время некий безымянный печатник создал большую коллекцию размеров
                        В то время некий безымянный печатник создал большую коллекцию размеров
                        В то время некий безымянный печатник создал большую коллекцию размеров
                        В то время некий безымянный печатник создал большую коллекцию размеров
                        В то время некий безымянный печатник создал большую коллекцию размеров
                    </p>
                </div>
                <div class="swiper-slide show _biznes">
                    <div class="img">
                        <picture>
                            <source srcset="/img/index/case-1.webp" type="image/webp">
                            <source srcset="/img/index/case-1.jpg" type="image/jpeg">
                            <img src="/img/index/case-1.jpg" alt="H-Strategy">
                        </picture>
                    </div>
                    <p class="h5 name">Стратегічна сесія для Mashable</p>
                    <p class="desc">В то время некий безымянный печатник создал большую коллекцию размеров В то время некий безымянный печатник создал большую коллекцию размеров </p>
                </div>
            </div>
            <div class="navigation-bottom df">
                <a href="" class="btn btn-border">Всі кейси</a>
                <div class="slider-nav">
                    <div class="arrow prev"></div>
                    <div class="arrow next"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="callback">
    <div class="container">
        <div class="info">
            <p class="h2">
                Давайте ефективно працювати разом
            </p>
            <p class="desc">
                Залиште свої контакти та запит.  Ми обов’язково з вами зв’яжемося для початку роботи або телефонуйте нам та слідкуйте у соцмережах.
            </p>
            <p class="address">Київ, вул. Т. Шевченко, 34, оф. 25</p>
            <p class="phone">
                <a href="tel:+38 (097) 394-32-15">+38 (097) 394-32-15</a>, <a href="tel:+38 (066) 980-19-86"> +38 (066) 980-19-86</a></p>
            <p class="email">
                <a href="mailto:h_strategy@gmail.com" target="_blank">h_strategy@gmail.com</a></p>
            <div class="mesh">
                <a href="" class="fb"></a>
                <a href="" class="li"></a>
                <a href="" class="ig"></a>
            </div>
        </div>
        <form action="" class="form form-callback">
            <div class="form-group">
                <label for="user_name">Як вас звати?</label>
                <input id="user_name" type="text" placeholder="Ім’я">
                <div class="help-block">Введіть ім’я!</div>
            </div>
            <div class="form-group">
                <label for="user_email">Ваш email?</label>
                <input id="user_email" type="text" placeholder="Електронна адреса">
                <div class="help-block">Введіть електронну адресу!</div>
            </div>
            <div class="form-group">
                <label for="comments">Чим ми вожемо вам допомогти?</label>
                <textarea id="comments" placeholder="Опишіть ваш запит"></textarea>
            </div>
            <button class="btn btn-white">Відправити</button>
        </form>
    </div>
</div>