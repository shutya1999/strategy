<?php
$lang_cur = $langCur->url;

$this->registerCssFile('@web/css/index.css', ['depends' => \app\assets\AppAsset::class]);
?>

<div class="header">
    <div class="container">
        <h1>Ефективні стратегії для організацій, бізнесу та громад</h1>
    </div>
</div>

<div class="mission">
    <div class="container">
        <div class="subtitle">Наша міссія</div>
        <p class="h4">
            Ми пишемо стратегії для підприємств та організацій, готуємо концепції стратегічних документів.
            Наші стратегії прості та зрозумілі, а метод їх створення є цікавим, інтерактивними та оперативним.
        </p>
        <div class="mission-clients df">
            <img src="/img/index/amazon_logo.svg" alt="">
            <img src="/img/index/netflix_logo.svg" alt="">
            <img src="/img/index/mashable_logo.svg" alt="">
            <img src="/img/index/atlassian-logo.svg" alt="">
            <img src="/img/index/forbes_logo.svg" alt="">
        </div>
    </div>
</div>

<div class="index-about">
    <div class="container">
        <div class="subtitle">Експертиза</div>
        <h2 class="title">Чим ми займаємося</h2>
        <div class="list">
            <a href="" class="item">
                    <span class="h4 list-title">
                        <span class="list-number">01.</span>
                        Стратегічний процес в громадах
                    </span>
                <span class="list-text">
                        Консалтингова організація «H-Strategy» створена, щоб допомагати керівникам розробляти якісні стратегії
                        для розвитку організацій та громад, розкривати свій потенціал і ставати
                    </span>
                <span class="arrow-list"></span>
            </a>
            <a href="" class="item">
                    <span class="h4 list-title">
                        <span class="list-number">02.</span>
                        Громадські організації
                    </span>
                <span class="list-text">
                        Консалтингова організація «H-Strategy» створена, щоб допомагати керівникам розробляти якісні стратегії
                        для розвитку організацій та громад, розкривати свій потенціал і ставати
                    </span>
                <span class="arrow-list"></span>
            </a>
            <a href="" class="item">
                    <span class="h4 list-title">
                        <span class="list-number">03.</span>
                        Бізнес
                    </span>
                <span class="list-text">
                        Консалтингова організація «H-Strategy» створена, щоб допомагати керівникам розробляти якісні стратегії
                        для розвитку організацій та громад, розкривати свій потенціал і ставати
                    </span>
                <span class="arrow-list"></span>
            </a>
        </div>
    </div>
</div>
<div class="team">
    <div class="container">
        <div class="subtitle">хто ми</div>
        <h2 class="title">Команда</h2>
        <div class="team-content df">
            <div class="img">
                <picture>
                    <source srcset="/img/index/team.webp" type="image/webp">
                    <source srcset="/img/index/team.jpg" type="image/jpeg">
                    <img src="/img/index/team.jpg" alt="H-Strategy">
                </picture>
            </div>
            <div class="info">
                <p class="h3">H-Strategy — експерти  планування</p>
                <p>
                    Консалтингова організація «H-Strategy» створена, щоб допомагати керівникам розробляти якісні стратегії для розвитку організацій
                    та громад, розкривати свій потенціал і ставати конкурентоспроможними як на національному, так і на міжнародному рівнях.<br><br>

                    Ми маємо 10-річний досвід роботи на керівних посадах у громадській та бізнес-сфері, значний досвід комунікації
                    та співпраці з органами місцевого самоврядування та владою державного рівня<br><br>

                    Методи розробки стратегії H-Strategy побудовані на власному досвіді експертів, українських та
                    міжнародних партнерів у сфері консалтингу. <br><br>
                </p>
                <p class="bottom">
                    Олександра та Віталій Гліжинські
                    <span>Експерти стратегічного планування</span>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="index-case" id="case">
    <div class="container">
        <div class="subtitle">Що ми вже зробили</div>
        <h2 class="title">Наші кейси</h2>
        <div class="swiper case-slider">
            <div class="nav-pagin">
                <div class="nav-pagin__wrap df">
                    <div class="item active" data-nav-id="organi_samovryaduvanya">Органи самововрядування</div>
                    <div class="item" data-nav-id="gromadski_organizaciy">Громадські органзації</div>
                    <div class="item" data-nav-id="biznes">Бізнес</div>
                </div>
            </div>
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
                    <div class="arrow prev prev-case"></div>
                    <div class="arrow next next-case"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="index-event">
    <div class="container">
        <div class="subtitle">Події</div>
        <h2 class="title">Семінари та тренінги</h2>
        <div class="nav-pagin df">
            <div class="nav-pagin__wrap df">
                <div class="item active" data-nav-id="this_month">Цього місяця</div>
                <div class="item" data-nav-id="next_month">наступного місяця</div>
            </div>
        </div>
        <div class="list-event" data-id="this_month">
            <a href="" class="item show">
                <span class="type online">Онлайн</span>
                <span class="h5 date">10 Листопада, 2021</span>
                <span class="time">18:30-20:30</span>
                <span class="desc">
                        <span class="desc-content">
                            Відповідальність у бізнесі: про що дискутуватимуть топменеджери на VII Форумі «Диригенти змін»
                        </span>
                        <span class="arrow-list"></span>
                    </span>
            </a>
            <a href="" class="item show">
                <span class="type offline">Офлайн</span>
                <span class="h5 date">21 Листопада, 2021</span>
                <span class="time">18:30-20:30</span>
                <span class="desc">
                        <span class="desc-content">
                            Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС
                        </span>
                        <span class="arrow-list"></span>
                    </span>
            </a>
            <a href="" class="item show">
                <span class="type online">Онлайн</span>
                <span class="h5 date">10 Листопада, 2021</span>
                <span class="time">18:30-20:30</span>
                <span class="desc">
                        <span class="desc-content">
                            Відповідальність у бізнесі: про що дискутуватимуть топменеджери на VII Форумі «Диригенти змін»
                        </span>
                        <span class="arrow-list"></span>
                    </span>
            </a>
            <a href="" class="item show">
                <span class="type online">Офлайн</span>
                <span class="h5 date">21 Листопада, 2021</span>
                <span class="time">18:30-20:30</span>
                <span class="desc">
                        <span class="desc-content">
                            Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС
                        </span>
                        <span class="arrow-list"></span>
                    </span>
            </a>
            <a href="" class="item show">
                <span class="type offline">Онлайн</span>
                <span class="h5 date">10 Листопада, 2021</span>
                <span class="time">18:30-20:30</span>
                <span class="desc">
                        <span class="desc-content">
                            Відповідальність у бізнесі: про що дискутуватимуть топменеджери на VII Форумі «Диригенти змін»
                        </span>
                        <span class="arrow-list"></span>
                    </span>
            </a>
            <a href="" class="item show">
                <span class="type online">Офлайн</span>
                <span class="h5 date">21 Листопада, 2021</span>
                <span class="time">18:30-20:30</span>
                <span class="desc">
                        <span class="desc-content">
                            Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС
                        </span>
                        <span class="arrow-list"></span>
                    </span>
            </a>
            <a href="" class="item show">
                <span class="type online">Онлайн</span>
                <span class="h5 date">10 Листопада, 2021</span>
                <span class="time">18:30-20:30</span>
                <span class="desc">
                        <span class="desc-content">
                            Відповідальність у бізнесі: про що дискутуватимуть топменеджери на VII Форумі «Диригенти змін»
                        </span>
                        <span class="arrow-list"></span>
                    </span>
            </a>
            <a href="" class="item show">
                <span class="type offline">Офлайн</span>
                <span class="h5 date">21 Листопада, 2021</span>
                <span class="time">18:30-20:30</span>
                <span class="desc">
                        <span class="desc-content">
                            Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС
                        </span>
                        <span class="arrow-list"></span>
                    </span>
            </a>
        </div>
        <a href="" class="btn btn-border">Всі події</a>
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

