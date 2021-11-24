    //Меню мобильная версия
    let burger = document.querySelector('.burger'),
        nav = document.querySelector('.top-header .nav'),
        overlay = document.querySelector('.overlay'),
        body = document.body;

    burger.addEventListener('click', toggleMenu);

    function toggleMenu() {
        burger.classList.toggle('active');
        nav.classList.toggle('active');
        overlay.classList.toggle('active');
        body.classList.toggle('no-scroll');
    }

    function closeMenu() {
        burger.classList.remove('active');
        nav.classList.remove('active');
        overlay.classList.remove('active');
        body.classList.remove('no-scroll');
    }

    window.addEventListener('click', function (event) {
        let tg = event.target;
        let active_popup = document.querySelector('.popup.active');
        if (tg.closest('.nav') === null &&
            tg.closest('.burger') === null &&
            tg.closest('.btn-registration') === null &&
            tg.closest('.popup') === null) {
            closeMenu();
        }

        if (tg === active_popup){
            closePopUp();
        }
    })

    //Подсветить стрелку слайдера при нажатии
    function highlightArrow(swiper) {
        swiper.on('slideNextTransitionStart', function () {
            this.navigation.nextEl.classList.add('active');
        });
        swiper.on('slideNextTransitionEnd', function () {
            this.navigation.nextEl.classList.remove('active');
        });
        swiper.on('slidePrevTransitionStart', function () {
            this.navigation.prevEl.classList.add('active');
        });
        swiper.on('slidePrevTransitionEnd', function () {
            this.navigation.prevEl.classList.remove('active');
        });
    }

    //Менять цвет кнопок при нажатии
    let btns = document.querySelectorAll('.btn');
    btns.forEach(btn => {
        btn.addEventListener('mousedown', function () {
            btn.classList.add('press');
        })
        btn.addEventListener('mouseup', function () {
            setTimeout(function () {
                btn.classList.remove('press');
            }, 200)
        })
    })


    function removeClass(data, className) {
        data.forEach(item => {
            item.classList.remove(className)
        })
    }

    //F.A.Q.
    let faq_item = document.querySelectorAll('.faq .item');

    faq_item.forEach(item => {
        item.addEventListener('click', function (e) {
            let tg = e.target;
            console.log(e.target);
            if (tg.closest('.answer') === null){
                // removeClass(faq_item, 'active')
                item.classList.toggle('active');
                // let answer = item.querySelector('.answer');
                // answer.classList.toggle('active');
            }
        })
    })

    //Закрыть попАп
    let btn_close_popup = document.querySelectorAll('.close-popup');
    function closePopUp() {
        let popup = document.querySelectorAll('.popup');
        if (popup.length !== 0){
            popup.forEach(item => {
                item.classList.remove('active');
                overlay.classList.remove('active');
                overlay.classList.remove('_popup');
                document.body.classList.remove('no-scroll');
            })
        }
    }
    if(btn_close_popup.length !== 0){
        btn_close_popup.forEach(btn => {
            btn.addEventListener('click', closePopUp)
        })
    }

