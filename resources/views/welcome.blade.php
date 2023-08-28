<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Тату салоны Ижевска, сделать тату в Ижевске, лучшие тату мастера Ижевска">
    <meta name="keywords" content="тату, Ижевск, тату салон, тату мастер, naumtattoo, сделать тату">
    <link rel="stylesheet" href="{{ asset('./css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('./libs/fancybox/fancybox.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('./libs/splide/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./libs/wow/wow.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/styles.css') }}">
    <title>NaumTattoo | Татуировки Ижевск</title>
</head>

<body>
<section class="main full">
    <div class="layout">
        <h1 class="wow fadeInLeft" data-wow-duration="2s">NaumTattoo</h1>
        <h2 class="main__subtitle wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
            Место, где татуировка становится искусством
            <br/>
            воплощая ваши идеи
        </h2>
        <a alt="appointment" href="https://vk.com/tatuizhevsk1" class="appointmentBtn wow fadeInLeft"
           data-wow-duration="2s" data-wow-delay="0.4s">
            <span>Записаться</span>
        </a>
    </div>
</section>

<section class="about full">
    <div class="content layout">
        <div class="left">
            <div class="text">
                <h2 class="base_title wow fadeInLeft" data-wow-duration="2s">О нас</h2>
                <p class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of
                    letters, as opposed to using 'Content here, content here', making it look like readable English.
                    Many
                    desktop publishing packages and web page editors now use Lorem Ipsum as their default model text,
                    and a
                    search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have
                    evolved
                    over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                <p/>
            </div>
            <img src="./images/about_2.webp" loading="lazy" alt="example tattoo" class="wow fadeInUp"
                 data-wow-duration="2s"
                 data-wow-delay="0.4s"/>
        </div>
        <div class="right">
            <img src="./images/about_1.webp" loading="lazy" alt="example tattoo" class="wow fadeInRight"
                 data-wow-duration="2s" data-wow-delay="0.2s"/>
        </div>
    </div>
</section>

<section class="masters full">
    <div class="layout">
        <h2 class="base_title wow fadeInUp" data-wow-duration="2s">Наши мастера</h2>
        <div class="splide splide_masters">
            <div class="mobile_arrows">
                <span>←</span>
                <span>→</span>
            </div>
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev">
                    ←
                </button>
                <button class="splide__arrow splide__arrow--next">
                    →
                </button>
            </div>
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($masters as $master)
                        <li data-description="{{ $master->description }}" class="splide__slide master wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                            <img src="{{ asset('storage/' . $master->image) }}" alt="master"/>
                            <h2>{{ $master->name }}</h2>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <a alt="appointment" href="https://vk.com/tatuizhevsk1" class="appointmentBtn wow fadeInUp"
           data-wow-duration="2s"
           data-wow-delay="0.4s">
            <span>Записаться</span>
        </a>
    </div>
</section>

<section class="gallery full">
    <div class="layout">
        <h2 class="base_title wow fadeInUp" data-wow-duration="2s">Галлерея</h2>
        <div class="mobile_arrows">
            <span>←</span>
            <span>→</span>
        </div>
        <div class="gallery_content">
            @foreach($tattoos as $tattoo)
                <a data-fancybox href="{{ asset('storage/' . $tattoo->image) }}" aria-multiline="example tattoo"
                   class="wow fadeIn {{ $tattoo->format === 'square' ? '' : $tattoo->format }}" data-wow-duration="2s"
                   data-wow-delay="0.2s">
                    <img src="{{ asset('storage/' . $tattoo->image) }}" loading="lazy" alt="example tattoo"/>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="calculator full">
    <div class="layout">
        <h2 class="base_title wow fadeInUp" data-wow-duration="2s">Узнай стоимость тату</h2>
        <div class="calculator_content">
            <div class="text">
          <span class="tattoo_price_title wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
            Тату будет стоить <span class="red">примерно</span>:
          </span>
                <span class="tattoo_price wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.4s">
            <span id="total_tattoo_price" class="red">1000000</span> рублей
          </span>
            </div>
            <div class="selects">
                <div class="tabs wow fadeInRight data-wow-duration="2s"">
                <button class="active">Тату</button>
                <button>Макияж</button>
            </div>
            <div class="makeupSelects hidden">
                <div id="procedure" class="custom_select"></div>
                <div id="type" class="custom_select"></div>
            </div>
            <div class="tattooSelects">
                <div id="size" class="custom_select wow fadeInRight" data-wow-duration="2s"></div>
                <div id="color" class="custom_select wow fadeInRight" data-wow-duration="2s"></div>
            </div>
                <button id="show_tattoo_price" class="show_price wow fadeInRight" data-wow-duration="2s"
                        data-wow-delay="0.6s">Узнать цену
                </button>
            </div>
        </div>
    </div>
</section>

<section class="sliders full">
    <div class="layout">
        <h2 class="base_title wow fadeInUp" data-wow-duration="2s">Отзывы</h2>
        <div class="splide splide_reviews wow fadeInUp" data-wow-duration="2s">
            <div class="mobile_arrows">
                <span>←</span>
                <span>→</span>
            </div>
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev">
                    ←
                </button>
                <button class="splide__arrow splide__arrow--next">
                    →
                </button>
            </div>
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($reviews as $review)
                        <li class="splide__slide review">
                            <h3>{{ $review->client_name }}</h3>
                            <span>{{ $review->text }}</span>
                            <div class="line"></div>
                            <!-- Прописать ассет --> <img src="./images/stars-{{ $review->grade }}-icon.png"
                                                          loading="lazy" alt="stars"/>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <h2 class="base_title wow fadeInUp" data-wow-duration="2s">Товары</h2>
        <div class="splide splide_products wow fadeInUp" data-wow-duration="2s">
            <div class="mobile_arrows">
                <span>←</span>
                <span>→</span>
            </div>
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev">
                    ←
                </button>
                <button class="splide__arrow splide__arrow--next">
                    →
                </button>
            </div>
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($products as $product)
                        <li class="splide__slide product">
                            <a href="{{ $product->link }}">
                                <img src="{{ asset('storage/' . $product->image) }}" loading="lazy" alt="product"/>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="howto full margin_bottom_standart">
    <div class="layout">
        <h2 class="base_title wow fadeInUp" data-wow-duration="2s">Как делается тату?</h2>
        <div class="content">
            <div class="left">
                <div class="info_block small space_bottom_standart low_screen wow fadeInLeft" data-wow-duration="2s">
                    <h3>Шаг 1</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page
                        when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of
                        letters, as opposed to using 'Content here, content here', making it look like readable English.
                        Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a
                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions
                        have evolved
                        over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
                <img src="./images/tattoo_gallery_1.webp" loading="lazy" alt="step photo"
                     class="small_photo photo_right space_bottom_standart large_screen wow fadeInLeft"
                     data-wow-duration="2s"/>
                <div class="info_block wow fadeInLeft" data-wow-duration="2s">
                    <h3>Шаг 2</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page
                        when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of
                        letters, as opposed to using 'Content here, content here', making it look like readable English.
                        Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a
                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions
                        have evolved
                        over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
                <div class="info_block small wow fadeInLeft" data-wow-duration="2s">
                    <h3>Шаг 3</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page
                        when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of
                        letters, as opposed to using 'Content here, content here', making it look like readable English.
                        Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a
                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions
                        have evolved
                        over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
            </div>
            <div class="steps">
                <div class="step wow fadeInUp" data-wow-duration="2s">
                    <div class="border"></div>
                    <span>1</span>
                </div>
                <hr class="line wow fadeInUp" data-wow-duration="2s">
                </hr>
                <div class="step wow fadeInUp" data-wow-duration="2s">
                    <div class="border"></div>
                    <span>2</span>
                </div>
                <hr class="line wow fadeInUp" data-wow-duration="2s">
                </hr>
                <div class="step wow fadeInUp" data-wow-duration="2s">
                    <div class="border"></div>
                    <span>3</span>
                </div>
            </div>
            <div class="right">
                <div class="info_block small space_bottom_standart wow fadeInRight" data-wow-duration="2s">
                    <h3>Шаг 1</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page
                        when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of
                        letters, as opposed to using 'Content here, content here', making it look like readable English.
                        Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a
                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions
                        have evolved
                        over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
                <div class="photo_block space_bottom_large">
                    <img src="./images/tattoo_gallery_2.webp" loading="lazy" alt="step photo"
                         class="small_photo wow fadeInRight" data-wow-duration="2s"/>
                    <img src="./images/tattoo_gallery_3.webp" loading="lazy" alt="step photo"
                         class="photo_vertical wow fadeInRight" data-wow-duration="2s"/>
                </div>
                <img src="./images/tattoo_gallery_4.webp" loading="lazy" alt="step photo"
                     class="photo photo_left wow fadeInRight" data-wow-duration="2s"/>
            </div>
        </div>
    </div>
</section>

<section class="howto full margin_bottom_standart">
    <div class="layout">
        <h2 class="base_title wow fadeInUp" data-wow-duration="2s">Как заживает тату?</h2>
        <div class="content">
            <div class="left">
                <div class="info_block small space_bottom_standart low_screen wow fadeInLeft" data-wow-duration="2s">
                    <h3>Шаг 1</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page
                        when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of
                        letters, as opposed to using 'Content here, content here', making it look like readable English.
                        Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a
                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions
                        have evolved
                        over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
                <img src="./images/tattoo_gallery_1.webp" loading="lazy" alt="step photo"
                     class="small_photo photo_right space_bottom_standart large_screen wow fadeInLeft"
                     data-wow-duration="2s"/>
                <div class="info_block wow fadeInLeft" data-wow-duration="2s">
                    <h3>Шаг 2</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page
                        when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of
                        letters, as opposed to using 'Content here, content here', making it look like readable English.
                        Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a
                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions
                        have evolved
                        over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
                <div class="info_block small wow fadeInLeft" data-wow-duration="2s">
                    <h3>Шаг 3</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page
                        when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of
                        letters, as opposed to using 'Content here, content here', making it look like readable English.
                        Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a
                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions
                        have evolved
                        over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
            </div>
            <div class="steps">
                <div class="step wow fadeInUp" data-wow-duration="2s">
                    <div class="border"></div>
                    <span>1</span>
                </div>
                <hr class="line wow fadeInUp" data-wow-duration="2s">
                </hr>
                <div class="step wow fadeInUp" data-wow-duration="2s">
                    <div class="border"></div>
                    <span>2</span>
                </div>
                <hr class="line wow fadeInUp" data-wow-duration="2s">
                </hr>
                <div class="step wow fadeInUp" data-wow-duration="2s">
                    <div class="border"></div>
                    <span>3</span>
                </div>
            </div>
            <div class="right">
                <div class="info_block small space_bottom_standart wow fadeInRight" data-wow-duration="2s">
                    <h3>Шаг 1</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page
                        when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of
                        letters, as opposed to using 'Content here, content here', making it look like readable English.
                        Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a
                        search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions
                        have evolved
                        over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
                <div class="photo_block space_bottom_large">
                    <img src="./images/tattoo_gallery_2.webp" loading="lazy" alt="step photo"
                         class="small_photo wow fadeInRight" data-wow-duration="2s"/>
                    <img src="./images/tattoo_gallery_3.webp" loading="lazy" alt="step photo"
                         class="photo_vertical wow fadeInRight" data-wow-duration="2s"/>
                </div>
                <img src="./images/tattoo_gallery_4.webp" loading="lazy" alt="step photo"
                     class="photo photo_left wow fadeInRight" data-wow-duration="2s"/>
            </div>
        </div>
    </div>
</section>

<section class="contacts">
    <div class="layout">
        <h2 class="base_title wow fadeInUp" data-wow-duration="2s">Как нас найти?</h2>
        <div class="content">
            <div id="yandexmap" class="wow fadeInLeft" data-wow-duration="2s"></div>
            <div class="info">
                <h3 class="wow fadeInRight" data-wow-duration="2s">Мы есть в этих соц.сетях</h3>
                <div class="icons wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                    <a alt="vk" href="https://vk.com/tatuizhevsk1">
                        <img alt="vk" src="./images/vk-icon.png" loading="lazy"/>
                    </a>
                </div>
                <h3 class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">Наши контакты</h3>
                <span class="contacts_row wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.4s">
            <img alt="phone" src="./images/phone-icon.png" loading="lazy"/>
            <h4>8-888-888-88-88</h4>
          </span>
                <span class="contacts_row wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.5s">
            <img alt="phone" src="./images/phone-icon.png" loading="lazy"/>
            <h4>8-888-888-88-88</h4>
          </span>
                <h3 class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.6s">Наш адрес</h3>
                <span class="contacts_row wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.7s">
            <img alt="position" src="./images/position-icon.png" loading="lazy"/>
            <h4>г. Ижевск, Удмуртская 205</h4>
          </span>
            </div>
        </div>
    </div>
</section>

<dialog id="master_modal" class="hidden">
    <div class="layout">
        <div class="master_wrapper">
            <button id="close_modal">
                <img src="images/cross.png" loading="lazy" alt="cross"/>
            </button>
            <img class="photo" src="images/master_aleksandr.webp" loading="lazy" alt="master"/>
            <div class="description">
                <div>
                    <h2 class="master_name">Александр</h2>
                    <p class="master_description">It is a long established fact that a reader will be distracted by the
                        readable
                        content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less
                        normal distribution of letters, as opposed to using 'Content here, content here', making it look
                        like
                        readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                        their
                        default
                        model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                        Various
                        versions have evolved over the years, sometimes by accident, sometimes on purpose (injected
                        humour and the
                        like).
                    </p>
                </div>
                <a alt="appointment" href="https://vk.com/tatuizhevsk1" class="appointmentBtn">
                    <span>Записаться</span>
                </a>
            </div>
        </div>
    </div>
</dialog>

<script src="{{ asset('js/selects.js') }}"></script>
<script src="{{ asset('./libs/splide/splide.min.js') }}"></script>
<script src="{{ asset('./libs/wow/wow.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ asset('./libs/fancybox/fancybox.min.js') }}"></script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
