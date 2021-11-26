window.addEventListener('load', function () {
    //Ссылка для конкретного языка
    //Текущий язык передается в шаблоне и хранится в переменной "lang"
    let lang_url = (lang === 'ua') ? '' : lang + '/';

    //Слайдер кейсов на главной
    const sliderCase = new Swiper('.case-slider', {
        loop: true,
        slidesPerView: 'auto',
        spaceBetween: 20,
        navigation: {
            nextEl: '.next-case',
            prevEl: '.prev-case',
        },
        breakpoints: {
            320: {
                slidesPerView: 'auto',
            },
            768: {
                slidesPerView: 'auto',
            },
            1440: {
                slidesPerView: 'auto',
            }
        },
        on: {
            init: function () {
                console.log(this);
                highlightArrow(this);
                if (+this.currentBreakpoint === 1440) {
                    if (this.loopedSlides < 3) {
                        this.navigation.destroy();
                    }
                } else if (+this.currentBreakpoint === 768) {
                    if (this.loopedSlides < 2) {
                        this.navigation.destroy();
                    }
                } else if (+this.currentBreakpoint === 320) {
                    this.destroy(false, true);
                    // sliderCase = document.querySelector('.')
                }
            },
        },
    });

    //Выбор категории для слайдера Кейсов
    let data_sliderCase = {
        organi_samovryaduvanya: [
            {
                name: 'Стратегічна сесія для Mashable (Органи самоврядування)',
                desc: 'В то время некий безымянный печатник создал большую коллекцию размеров',
                img: 'case-1'
            },
            {
                name: 'Стратегічна сесія для Mashable (Органи самоврядування 2)',
                desc: 'В то время некий безымянный',
                img: 'case-2'
            }
        ],
        gromadski_organizaciy: [
            {
                name: 'Стратегічна сесія для Mashable (Громадські органзації 1)',
                desc: 'В то время некий безымянный печатник создал большую коллекцию размеров',
                img: 'case-1'
            },
            {
                name: 'Стратегічна сесія для Mashable (Громадські органзації 2)',
                desc: 'В то время некий безымянный В то время некий безымянный В то время некий безымянный',
                img: 'case-2'
            },
            {
                name: 'Стратегічна сесія для Mashable (Громадські органзації 2)',
                desc: 'В то время некий безымянный В то время некий безымянный В то время некий безымянный В то время некий безымянный В то время некий безымянный',
                img: 'case-1'
            }
        ],
        biznes: [
            {
                name: 'Стратегічна сесія для Mashable (Бізнес 1)',
                desc: 'Стратегічна сесія для Mashable В то время некий безымянный печатник создал большую коллекцию размеров',
                img: 'case-1'
            },
        ]
    };
    let navCase = document.querySelectorAll('.case-slider .nav-pagin .item');

    if (navCase.length !== 0){
        navCase.forEach(item => {
            item.addEventListener('click', function () {
                let id = item.dataset.navId;//url выбраной услуги

                removeClass(navCase, 'active');
                item.classList.add('active');

                sliderCase.wrapperEl.innerHTML = '';
                data_sliderCase[id].forEach(slide => {
                    if (+sliderCase.currentBreakpoint === 1440 || +sliderCase.currentBreakpoint === 768) {
                        sliderCase.appendSlide(createSlides(slide));
                    } else if (+sliderCase.currentBreakpoint === 320) {
                        sliderCase.wrapperEl.insertAdjacentElement('beforeend', createSlides(slide))
                    }
                })
                switch (+sliderCase.currentBreakpoint) {
                    case 1440:
                        if (data_sliderCase[id].length < 3) {
                            sliderCase.navigation.destroy();
                            document.querySelector('.case-slider .slider-nav').classList.add('dn');
                            sliderCase.loopDestroy();
                        } else {
                            document.querySelector('.case-slider .slider-nav').classList.remove('dn');
                            sliderCase.navigation.init();
                            sliderCase.loopCreate();
                        }
                        sliderCase.updateSlides();
                        sliderCase.update();
                        sliderCase.slideTo(0, 100, true);

                        break;

                    case 768:
                        if (data_sliderCase[id].length < 2) {
                            sliderCase.navigation.destroy();
                            document.querySelector('.case-slider .slider-nav').classList.add('dn');
                            sliderCase.loopDestroy();
                        } else {
                            document.querySelector('.case-slider .slider-nav').classList.remove('dn');
                            sliderCase.navigation.init();
                            sliderCase.loopCreate();
                        }
                        sliderCase.updateSlides();
                        sliderCase.update();
                        sliderCase.slideTo(0, 100, true);

                        break;

                    case 320:
                        break;
                }

                let slides = document.querySelectorAll('.case-slider .swiper-slide');
                for (let i = 0; i < slides.length; i++) {
                    setTimeout(function () {
                        slides[i].classList.add('show');
                    }, 150 * i)
                }

                function createSlides(slide) {
                    let newSlide = document.createElement("div");
                    newSlide.className = `swiper-slide`;
                    newSlide.innerHTML = `                  
                    <div class="img">
                        <picture>
                            <source srcset="assets/img/index/${slide.img}.webp" type="image/webp">
                            <source srcset="assets/img/index/${slide.img}.jpg" type="image/jpeg">
                            <img src="assets/img/index/${slide.img}.jpg" alt="H-Strategy">
                        </picture>
                    </div>
                    <p class="h5 name">${slide.name}</p>
                    <p class="desc">${slide.desc}</p>                 
                `;
                    return newSlide;
                }


            })

        })
    }

    //Выбор месяца на главной странице (Цього місяця, наступного місяця)
    let eventData = {
        this_month: [
            {
                type: 'Онлайн',
                date: '10 Листопада, 2021',
                time: '18:30-20:30',
                title: 'Відповідальність у бізнесі: про що дискутуватимуть топменеджери на VII Форумі «Диригенти змін»',
                link: '/test-link_1/'
            },
            {
                type: 'Офлайн',
                date: '21 Листопада, 2021',
                time: '18:30-20:30',
                title: 'Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС',
                link: '/test-link_4/'
            },
            {
                type: 'Онлайн',
                date: '10 Листопада, 2021',
                time: '18:30-20:30',
                title: 'Відповідальність у бізнесі: про що дискутуватимуть топменеджери на VII Форумі «Диригенти змін»',
                link: '/test-link_1/'
            },
            {
                type: 'Офлайн',
                date: '21 Листопада, 2021',
                time: '18:30-20:30',
                title: 'Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС',
                link: '/test-link_4/'
            },
            {
                type: 'Онлайн',
                date: '10 Листопада, 2021',
                time: '18:30-20:30',
                title: 'Відповідальність у бізнесі: про що дискутуватимуть топменеджери на VII Форумі «Диригенти змін»',
                link: '/test-link_1/'
            },
            {
                type: 'Офлайн',
                date: '21 Листопада, 2021',
                time: '18:30-20:30',
                title: 'Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС',
                link: '/test-link_4/'
            },
            {
                type: 'Онлайн',
                date: '10 Листопада, 2021',
                time: '18:30-20:30',
                title: 'Відповідальність у бізнесі: про що дискутуватимуть топменеджери на VII Форумі «Диригенти змін»',
                link: '/test-link_1/'
            },
            {
                type: 'Офлайн',
                date: '21 Листопада, 2021',
                time: '18:30-20:30',
                title: 'Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС',
                link: '/test-link_4/'
            },
        ],
        next_month: [
            {
                type: 'Онлайн',
                date: '26 Грудня, 2021',
                time: '18:30-20:30',
                title: 'Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС',
                link: '/test-link/'
            },
            {
                type: 'Онлайн',
                date: '05 Грудня, 2021',
                time: '10:00-12:00',
                title: 'Це не справжній текст не звертайте на ньго уваги',
                link: '/test-link_3/'
            },
            {
                type: 'Онлайн',
                date: '26 Грудня, 2021',
                time: '18:30-20:30',
                title: 'Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС',
                link: '/test-link/'
            },
            {
                type: 'Онлайн',
                date: '05 Грудня, 2021',
                time: '10:00-12:00',
                title: 'Це не справжній текст не звертайте на ньго уваги',
                link: '/test-link_3/'
            },
            {
                type: 'Онлайн',
                date: '26 Грудня, 2021',
                time: '18:30-20:30',
                title: 'Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС',
                link: '/test-link/'
            },
            {
                type: 'Онлайн',
                date: '05 Грудня, 2021',
                time: '10:00-12:00',
                title: 'Це не справжній текст не звертайте на ньго уваги',
                link: '/test-link_3/'
            },
            {
                type: 'Онлайн',
                date: '26 Грудня, 2021',
                time: '18:30-20:30',
                title: 'Не тільки "відкрите небо": 12 важливих домовленостей саміту Україна-ЄС',
                link: '/test-link/'
            },
            {
                type: 'Онлайн',
                date: '05 Грудня, 2021',
                time: '10:00-12:00',
                title: 'Це не справжній текст не звертайте на ньго уваги',
                link: '/test-link_3/'
            },
        ]
    };
    let navMonth = document.querySelectorAll('.index-event .nav-pagin .item');

    if (navMonth.length !== 0){
        navMonth.forEach(nav => {
            nav.addEventListener('click', function () {
                removeClass(navMonth, 'active');
                nav.classList.add('active');

                let listBlock = document.querySelector('.index-event .list-event');
                let id = nav.dataset.navId;
                let listId = listBlock.dataset.id;
                if (id !== listId) {
                    listBlock.innerHTML = '';
                    let i = 0;
                    eventData[id].forEach(data_item => {
                        let item = document.createElement('a');
                        item.className = 'item';
                        item.href = data_item.link;
                        item.insertAdjacentHTML('beforeend', `
                        <span class="type">${data_item.type}</span>
                        <span class="h5 date">${data_item.date}</span>
                        <span class="time">${data_item.time}</span>
                        <span class="desc">
                            <span class="desc-content">${data_item.title}</span>
                           <span class="arrow-list"></span>                        
                        </span>                        
                    `)
                        listBlock.insertAdjacentElement('beforeend', item);

                        setTimeout(function () {
                            item.classList.add('show');
                        }, i * 100)

                        i++;
                    });


                    listBlock.dataset.id = id;
                }

            })
        })
    }


    //Выпадающий список
    let select = document.querySelectorAll('.select'),
        select_input = document.querySelectorAll('.select-input'),
        select_item = document.querySelectorAll('.select-list li');

    // Открыть/закрыть выпадающий список
    if (select.length !== 0) {
        select.forEach(item => {
            item.addEventListener('click', function () {
                item.classList.toggle('active');
            });
        })
    }
    //Выбор из выпадающего списка при клике
    if (select_item.length !== 0) {
        select_item.forEach(item => {
            item.addEventListener('click', function () {
                let input = item.closest('.select').querySelector('input'),
                    current_list = item.closest('.select').querySelectorAll('.select-list li');

                input.value = item.dataset.val;

                current_list.forEach(item2 => {
                    item2.innerHTML = item2.textContent;
                    item2.classList.remove('hide');
                })
            })
        })
    }
    if (select_input.length !== 0) {
        select_input.forEach(input => {
            //Закрыть выпадающий список при клике вне поля
            input.addEventListener('blur', function () {
                setTimeout(function () {
                    input.closest('.select').classList.remove('active');
                }, 100)
            })

            //Ввод в ручную
            input.addEventListener('input', function () {
                let val_input = input.value;
                let list = input.closest('.select').querySelectorAll('.select-list li');

                list.forEach(list_item => {
                    let text = list_item.textContent;

                    if (text.toLowerCase().indexOf(val_input.toLowerCase()) === -1) {
                        list_item.classList.add('hide');
                    } else {
                        let start = text.toLowerCase().indexOf(val_input.toLowerCase()),
                            end = val_input.length;

                        let string = list_item.textContent;

                        list_item.innerHTML = string.slice(0, start) + '<strong>' + string.slice(start, start + end) + '</strong>' + string.slice(start + end);
                        list_item.classList.remove('hide');
                    }
                })

                let total_item = list.length;
                let hide_item = input.closest('.select').querySelectorAll('.select-list .hide').length;
                console.log(total_item);
                if (total_item === hide_item) {
                    input.closest('.select').querySelector('._empty').classList.add('active')
                } else {
                    input.closest('.select').querySelector('._empty').classList.remove('active')
                }

            })
        })
    }

    //Datepicker
    if (document.querySelector('#datepicker') !== null){
        let datepickedLang = {
            ua: {
                customMonths: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
                customDays: ['Пн', 'Вт', 'Ср', 'Чт', "Пт", 'Сб', 'Нд'],
                customOverlayMonths: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
                overlayButton: 'Обрати'
            },
        }
        const picker = datepicker('#datepicker', {
            customMonths: datepickedLang.ua.customMonths,
            customDays: datepickedLang.ua.customDays,
            customOverlayMonths: datepickedLang.ua.customOverlayMonths,
            showAllDates: true,
            overlayButton: datepickedLang.ua.overlayButton,
            formatter: (input, date, instance) => {
                const value = date.toLocaleDateString()
            },
            onSelect: (instance, date) => {
                picker.show();
            },
            onShow: instance => {
                //Рисуем кнопки если нужно
                if (picker.calendar.querySelector('.datepicker-bottom') === null){
                    setBtnDatePicker(picker);
                    setDate(picker);
                }
            },
            onMonthChange: instance => {
                //Рисуем кнопки если нужно
                if (picker.calendar.querySelector('.datepicker-bottom') === null){
                    setBtnDatePicker(picker);
                    setDate(picker);
                }
            },
        });

        const picker_mob = datepicker('#datepicker_mob', {
            customMonths: datepickedLang.ua.customMonths,
            customDays: datepickedLang.ua.customDays,
            customOverlayMonths: datepickedLang.ua.customOverlayMonths,
            showAllDates: true,
            overlayButton: datepickedLang.ua.overlayButton,
            formatter: (input, date, instance) => {
                const value = date.toLocaleDateString()
            },
            onSelect: (instance, date) => {
                picker_mob.show();
            },
            onShow: instance => {
                //Рисуем кнопки если нужно
                if (picker_mob.calendar.querySelector('.datepicker-bottom') === null){
                    setBtnDatePicker(picker_mob);
                    setDate(picker_mob);
                }
            },
            onMonthChange: instance => {
                //Рисуем кнопки если нужно
                if (picker_mob.calendar.querySelector('.datepicker-bottom') === null){
                    setBtnDatePicker(picker_mob);
                    setDate(picker_mob);
                }
            },
        });

        function setDate(picker) {
            let btnApply = document.querySelector('.btn-datepicker-apply');
            let btnChanel = document.querySelector('.btn-datepicker-chanel');

            btnApply.addEventListener('click', function () {
                picker.el.value = formatDate(picker.dateSelected);
                picker.hide();
            })
            btnChanel.addEventListener('click', function () {
                picker.el.value = '';
                picker.setDate();
                picker.hide();
            })
        }
        function setBtnDatePicker(picker) {
            let block = picker.calendar;
            let buttons = `
                    <div class="datepicker-bottom">
                        <div class="btn btn-datepicker-chanel">Відміна</div>
                        <div class="btn btn-purple btn-datepicker-apply">Обрати</div>
                    </div>
                `;
            block.insertAdjacentHTML('beforeend', buttons);
        }

        function formatDate(date) {

            var dd = date.getDate();
            if (dd < 10) dd = '0' + dd;

            var mm = date.getMonth() + 1;
            if (mm < 10) mm = '0' + mm;

            var yy = date.getFullYear();
            if (yy < 10) yy = '0' + yy;

            return dd + '.' + mm + '.' + yy;
        }
    }

    //Страница кейсов
    let navCaseCatalog = document.querySelectorAll('.case-catalog_js .item');

    if (navCaseCatalog.length !== 0){
        let caseCatalog = document.querySelector('.case-catalog');

        navCaseCatalog.forEach(nav_item => {
            nav_item.addEventListener('click', function () {
                let id = nav_item.dataset.navId;
                let pagination = document.querySelector('.pagination');

                removeClass(navCaseCatalog, 'active');
                nav_item.classList.add('active');

                $.ajax({
                    url: '/case/',
                    data: {
                        id: id,
                        page: 1
                    },
                    method: "POST",
                    success: function (data) {
                        window.history.pushState('','', window.location.pathname + `?id=${id}`);

                        caseCatalog.innerHTML = data.case;
                        if(pagination !== null){
                            pagination.remove();
                        }
                        caseCatalog.insertAdjacentHTML('afterend', data.pagination);

                        //Анимация появления
                        let slides = caseCatalog.querySelectorAll('.item');
                        for (let i = 0; i < slides.length; i++) {
                            setTimeout(function () {
                                slides[i].classList.add('show');
                            }, 150 * i)
                        }
                        getMoreCase();
                        editPagination();
                    }
                })
            })
        })
    }

    //Кнопка показать еще в каталоге кейсов
    function getMoreCase(){
        let btnMoreCase = document.querySelector('.btn-more-case');
        if (btnMoreCase !== null){
            btnMoreCase.addEventListener('click', function () {
                let nextPage = btnMoreCase.dataset.currentPage;
                let id = document.querySelector('.case-catalog_js .item.active').dataset.navId;
                let caseCatalog = document.querySelector('.case-catalog');
                let pagination = document.querySelector('.pagination');

                $.ajax({
                    url: '/case/',
                    data: {
                        id: id,
                        page: nextPage
                    },
                    method: "POST",
                    success: function (data) {
                        // console.log(btnMoreCase);
                        console.log(data);
                        caseCatalog.insertAdjacentHTML('beforeend', data.case);

                        //Анимация появления
                        let slides = caseCatalog.querySelectorAll('.item');
                        for (let i = 0; i < slides.length; i++) {
                            setTimeout(function () {
                                slides[i].classList.add('show');
                            }, 150 * i)
                        }

                        if(pagination !== null){
                            pagination.remove();
                        }
                        caseCatalog.insertAdjacentHTML('afterend', data.pagination);
                        getMoreCase();
                        editPagination();
                    }
                })
            })
        }
    }
    getMoreCase();

    function editPagination() {
        let pagination = document.querySelector('.pagination');

        if (pagination !== null){
            let paginPage = Array.from(pagination.querySelectorAll('.pagin-page')),
                paginCount = paginPage.length;
            let showCount = 2;

            if (paginCount > 5){
                let pos_active = +pagination.querySelector('.pagin-page.active').dataset.index;

                if (pos_active > 2 && pos_active < paginCount - 3){//Если находимся в середине пагинации
                    let active_elem = paginPage.splice(pos_active - 1, 3);//Три активных элемента

                    for (let i = 0; i < paginPage.length; i++){
                        for (let j = 0; j < active_elem.length; j++){
                            //Удалить все кроме активных, первого и последнего
                            if (paginPage[i] !== active_elem[j] && i !== 0 && i !== paginPage.length - 1){
                                paginPage[i].remove();
                            }
                        }
                    }

                    paginPage[0].insertAdjacentHTML('afterend', '<p class="dots">...</p>')
                    paginPage[paginPage.length - 1].insertAdjacentHTML('beforebegin', '<p class="dots">...</p>')
                }else if (pos_active < 3){//если находимся в начале пагинации
                    let active_elem = paginPage.splice(0, pos_active + 2);//Первые активные элементы

                    for (let i = 0; i < paginPage.length; i++){
                        if (i !== paginPage.length - 1){
                            paginPage[i].remove();
                        }
                    }

                    active_elem[pos_active + 1].insertAdjacentHTML('afterend', '<p class="dots">...</p>')
                }else if (pos_active > paginCount - 4){
                    let pos_end = (paginCount - pos_active) + 1;

                    let active_elem = paginPage.splice(pos_end * -1, pos_end);//Три активных элемента

                    for (let i = 0; i < paginPage.length; i++){
                        for (let j = 0; j < active_elem.length; j++){
                            //Удалить все кроме активных и последнего
                            if (paginPage[i] !== active_elem[j] && i !== 0){
                                paginPage[i].remove();
                            }
                        }
                    }
                    paginPage[0].insertAdjacentHTML('afterend', '<p class="dots">...</p>')
                }
            }
        }
    }
    editPagination();
    //Слайдер фото на странице кейса
    const swiperPhotogallery = new Swiper('.gallery-slider', {
        speed: 700,
        navigation: {
            nextEl: '.next-gallery',
            prevEl: '.prev-gallery',
        },
        pagination: {
            el: '.pagination-gallery',
            type: 'bullets',
        },
    })

    //Слайдер на странице продукта
    const sliderProduct = new Swiper('.slider-product', {
        slidesPerView: 'auto',
        spaceBetween: 20,
        //translate: 330,
        navigation: {
            nextEl: '.next-product',
            prevEl: '.prev-product',
        },
        breakpoints: {
            320: {

            },
            768: {
                spaceBetween: 12,
            },
            1024: {
                spaceBetween: 20,
            }
        },
        on: {
            init: function () {
                let lastSlideWeight = this.slidesSizesGrid[this.slidesSizesGrid.length - 1] + this.params.spaceBetween;
                this.snapGrid[this.snapGrid.length - 1] = (this.snapGrid.length - 1) * lastSlideWeight;

                if (+this.currentBreakpoint === 320){
                    this.destroy();
                }
            }
        }
    })

    //Регистрация на ивент
    let btn_registration = document.querySelector('.btn-registration');
    let popup_registration = document.querySelector('.popup-registration');
    let overlay = document.querySelector('.overlay');

    if (btn_registration !== null){
        btn_registration.addEventListener('click', function () {
            popup_registration.classList.add('active');
            overlay.classList.add('active');
            overlay.classList.add('_popup');
            document.body.classList.add('no-scroll');
        })
    }

    //Табы фильтров на телефоне, открытие
    let filters_item = document.querySelectorAll('.filters-mob .filter-mob__title');
    let btn_filter_mob = document.querySelector('.filters-mob .filters-mob__title');
    let filters_mob = document.querySelector('.filters-mob .filters-mob__content');
    if (btn_filter_mob !== null){
        btn_filter_mob.addEventListener('click', function () {
            filters_mob.classList.toggle('active');
        })
    }

    if (filters_item.length !== 0){
        filters_item.forEach(item => {
            item.addEventListener('click', function () {
                console.log(item);
                let parent = item.closest('.filter-mob__item');
                parent.classList.toggle('active')
            })
        })
    }

})
