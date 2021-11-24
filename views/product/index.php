<?php
use yii\helpers\VarDumper;
$this->registerCssFile('@web/css/product.css', ['depends' => \app\assets\AppAsset::class]);

//VarDumper::dump($product);
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
?>

<?php
$this->params['breadcrumbs'][] = $product->name_ua;
?>


<div class="header-product">
    <div class="container">
        <h1 class="h3">Стратегічний процес в громадах
        </h1>
    </div>
</div>

<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <div class="product">
        <h2 class="h3">Чому стратегування важливе?</h2>
        <p>
            В межах реформи місцевого самоврядування місцева влада стає все більше самостійним гравцем та
            відповідальним за розвиток населеного пункту.
            Все більше обовязків делегується державою на місцевий рівень, а кошти доводиться шукати місцевій владі
            самостійно.
            ОМС на сьогодні мають вирішувати питання не лише якості доріг, комунальних послуг, ремонтів і т.д., а й
            опікуватись закладами культури, освітніми установами,
            медичними закладами колись районного рівня. Навантаження на бюджет зростає. <br><br>
            ДФРР, інші державні фонди не завжди підтримують і дають додаткове фінансування. Дотації та субвенції
            зменшуються. Кваліфікованих кадрів для вирішення нових завдань бракує.
            Більше того, молоде покоління та експерти часто густо виїзджають або в більші громади, або взагалі за
            кордон. Що ж цим робити? <br><br>
            Відповідь Н-Strategy – організувати якісний стратегічний процес в громаді і знайти креативні ідеї
            розвитку громади, залучення інвесторів, зупинити відтік кадрів закордон....
        </p>

        <div class="main-img">
            <div class="_desc">
                <picture>
                    <source srcset="/img/product/main-img-1_desc.webp" type="image/webp">
                    <source srcset="/img/product/main-img-1_desc.jpg" type="image/jpeg">
                    <img src="/img/product/main-img-1_desc.jpg" alt="Стратегічна сесія для Mashable">
                </picture>
            </div>
            <div class="_tablet">
                <picture>
                    <source srcset="/img/product/main-img-1_tablet.webp" type="image/webp">
                    <source srcset="/img/product/main-img-1_tablet.jpg" type="image/jpeg">
                    <img src="/img/product/main-img-1_tablet.jpg" alt="Стратегічна сесія для Mashable">
                </picture>
            </div>
            <div class="_mob">
                <picture>
                    <source srcset="/img/product/main-img-1_mob.webp" type="image/webp">
                    <source srcset="/img/product/main-img-1_mob.jpg" type="image/jpeg">
                    <img src="/img/product/main-img-1_mob.jpg" alt="Стратегічна сесія для Mashable">
                </picture>
            </div>
        </div>

        <p class="h3">Як ми працюємо?</p>
        <p>
            Н-Strategy організує якісний стратегічний процес в громаді і знайти креативні ідеї розвитку громади,
            <br> залучення інвесторів, зупинити відтік кадрів закордон....
        </p>
    </div>
</div>

<div class="slider-product__wrap">
    <div class="container">
        <div class="swiper slider-product">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="top">
                        <div class="icon">
                            <img src="/img/product/icon-prod-1_1.svg" alt="">
                        </div>
                    </div>
                    <p class="h4">Інтерв’ю</p>
                    <p>Проводимо інтерв’ю із замовником, щоб визначити ситуацію в громаді і запропонувати дієвий
                        сфокусований план стратегування без зайвих кроків</p>
                </div>
                <div class="swiper-slide">
                    <div class="top">
                        <div class="icon">
                            <img src="/img/product/icon-prod-1_2.svg" alt="">
                        </div>
                    </div>
                    <p class="h4">План</p>
                    <p>
                        Формуємо план стратегічного процесу спільно з виконавчим органом місцевої влади. Зазвичай з
                        нуля стратегічний процес триває мінімум півроку.
                    </p>
                </div>
                <div class="swiper-slide">
                    <div class="top">
                        <div class="icon">
                            <img src="/img/product/icon-prod-1_3.svg" alt="">
                        </div>
                    </div>
                    <p class="h4">Методика</p>
                    <p>
                        Обираємо методику та інструменти стратегування, які підходять саме вашій организації.
                    </p>
                </div>
                <div class="swiper-slide">
                    <div class="top">
                        <div class="icon">
                            <img src="/img/product/icon-prod-1_4.svg" alt="">
                        </div>
                    </div>
                    <p class="h4">Аналіз та ретроспектива</p>
                    <p>
                        Аналізуємо стратегічні документи громади – стратегію за попередні роки, цільові програми,
                        плани соціально-економічного розвитку, бюджети тощо.
                        Окрім того, стратегії сусідніх громад, області, національні стратегії для синергії ідей.
                    </p>
                </div>
                <div class="swiper-slide">
                    <div class="top">
                        <div class="icon">
                            <img src="/img/product/icon-prod-1_5.svg" alt="">
                        </div>
                    </div>
                    <p class="h4">Опитування ЦА</p>
                    <p>
                        Проводимо стратегічні сесії та опитування серед цільових груп, широкої громадськості
                    </p>
                </div>
                <div class="swiper-slide">
                    <div class="top">
                        <div class="icon">
                            <img src="/img/product/icon-prod-1_6.svg" alt="">
                        </div>
                    </div>
                    <p class="h4">Наради та стратег сесії</p>
                    <p>
                        Беремо участь у нарадах стратегічного комітету при місцевій раді. Оформлюємо стратегію в
                        документ.
                    </p>
                </div>
            </div>
            <div class="slider-nav">
                <div class="arrow prev prev-product"></div>
                <div class="arrow next next-product"></div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="expertise">
        <div class="subtitle">Експертиза</div>
        <h2 class="h3 title">
            Що отримає ОМС від співпрації з <br> H-Strategy?
        </h2>
        <div class="list">
            <div class="item">
                        <span class="h4 list-title">
                            <span class="list-number">01.</span>
                            Чіткий процес стратегування
                        </span>
                <span class="list-text">
                            Модерований процес стратегування з включенням активних громадян, бізнесу, новоприєднаних населених пунктів та інших важливих учасників розвитку громади
                        </span>
            </div>
            <div class="item">
                        <span class="h4 list-title">
                            <span class="list-number">02.</span>
                            Якісну стратегію
                        </span>
                <span class="list-text">
                             Якісну стратегію, що допоможе залучити залучити партнерів та нових партнерів;
                        </span>
            </div>
            <div class="item">
                        <span class="h4 list-title">
                            <span class="list-number">03.</span>
                            Можливість залучити кошти
                        </span>
                <span class="list-text">
                            Офіційні причини – стратегію – можливість отримати додаткові кошти або збергти суми попередніх надходжень на майбутнє від держави та міжнародних фондів – субвенції,
                            дотації, кошти з ДФРР, УКФ та ін.
                        </span>
            </div>
            <div class="item">
                        <span class="h4 list-title">
                            <span class="list-number">04.</span>
                            Об’єднання громади
                        </span>
                <span class="list-text">
                            Знизити потенційний або існуючий конфлікт в громаді, об’єднати навколо спільної ідеї
                        </span>
            </div>
            <div class="item">
                        <span class="h4 list-title">
                            <span class="list-number">05.</span>
                            Підвищити рівень добробуту громади
                        </span>
                <span class="list-text">
                            Позиціонування та унікальність громади, що допоможе в розвитку економіки, а отже підняття рівня доходів в громаді, збільшення надходження в бюджет,
                            збережання кадрів, а то й спричинити позитивну динаміку міграції в громаду.
                        </span>
            </div>
        </div>
    </div>
</div>

<div class="case-slider_wrap">
    <div class="container">
        <div class="subtitle">що ми вже зробили</div>
        <p class="h3">Кейси громад</p>
        <div class="swiper case-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide show">
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
                <div class="swiper-slide show">
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
                <div class="swiper-slide show">
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
                    <div class="arrow prev prev-case"></div>
                    <div class="arrow next next-case"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="faq">
    <div class="container">
        <p class="h3 title">Популярні питання</p>
        <div class="faq-content">
            <div class="item">
                <div class="question">
                    Нове популярне питання
                    <div class="arrow"></div>
                </div>
                <div class="answer">
                    В то время некий безымянный печатник создал большую коллекцию размеров В то время некий безымянный печатник создал большую коллекцию размеров
                </div>
            </div>
            <div class="item">
                <div class="question">
                    Нове популярне питання
                    <div class="arrow"></div>
                </div>
                <div class="answer">
                    В то время некий безымянный печатник создал большую коллекцию размеров В то время некий безымянный печатник создал большую коллекцию размеров
                </div>
            </div>
            <div class="item">
                <div class="question">
                    Нове популярне питання
                    <div class="arrow"></div>
                </div>
                <div class="answer">
                    В то время некий безымянный печатник создал большую коллекцию размеров В то время некий безымянный печатник создал большую коллекцию размеров
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
                Залиште свої контакти та запит. Ми обов’язково з вами зв’яжемося для початку роботи або телефонуйте
                нам та слідкуйте у соцмережах.
            </p>
            <p class="address">Київ, вул. Т. Шевченко, 34, оф. 25</p>
            <p class="phone">
                <a href="tel:+38 (097) 394-32-15">+38 (097) 394-32-15</a>, <a href="tel:+38 (066) 980-19-86"> +38
                    (066) 980-19-86</a></p>
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