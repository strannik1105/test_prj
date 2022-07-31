<?php
	if(($_SERVER['REQUEST_URI'] != '/') &&  ($_SERVER['REQUEST_URI'] != '/index.php'))
	{
		if($_SERVER['REQUEST_URI'] == '/send.php')
		{
			if(array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER))
			{
				if(strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
				{					
					include 'send.php';
					exit;
				}
			}
			include '403.php';
			exit;
		}
		include '404.php';
		exit;
	}


	$config = parse_ini_file('menuconf.ini', true);
	
	$config['home'] = array('url' => '/');
	
	if(!array_key_exists('home', $config))
	{
		include '404.php';
		exit;
	}
?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css">
        <title>Открываете бизнес? Расширяете производство и нужен цех?</title>
        <meta name="description" content=" Наши технологии и опыт позволяет качественно, а главное - быстро и недорого построить Вам готовое здание необходимой конфигурации специально под Ваш Бизнес!" />
        <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script>
            !window.jQuery && document.write('<script src="js/jquery-1.4.3.min.js"><\/script>');
        </script>
        <script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen" />
        <script type="text/javascript">
            $(document).ready(function()
			{
                $("a[rel=item]").fancybox();
                
            });
        </script>
    
    </head>

<body>
	<div class="modal" hidden="true">
        <form class="main__slide1_form modal__form" id="form">
            <div class="modal__container">
                <p class="main__slide1_form_text">
                    Сообщите свой номер телефона, и<br>мы Вам перезвоним: <span style="color: #9cf50d">*</span>
                </p>
                <img src="img/close.png" alt="закрыть" class="modal__close">
            </div>
            <input type="tel" class="main__slide1_form_phone" placeholder="+7 (913) 123-45-66" required>
            <input type="submit" class="main__slide1_form_button" value="ОТПРАВИТЬ" onsubmit="return false;">
            <p class="main__slide1_form_text">
                <span style="color: #9cf50d">*</span> "Заявка в 1 клик" ни к чему Вас не<br>
                обязывает, но позволяет сэкономить время.<br>
                Детали заказа мы запишем сами, позвонив<br>
                Вам по указанному номеру телефона.
            </p>
        </form>
    </div>
	<a name="top"></a>
    <div class="header__top">
        <ul class="header__menu">
			<?php
					if(array_key_exists('home', $config))
					{
						echo('<li class="header__menu_item header__menu_logo">
                <a href="#top"><img src="img/home.png" alt="" class="header__menu_logo"></a><ul class="header__menu_buildings" hidden="true" num="0"></ul>
            </li>');
						unset($config['home']);
					}
					else
					{
						header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
						require '404.php';
						exit;
					}
					$count = 1;
					foreach($config as $i)
					{
						echo('<li class="header__menu_item">
							<a class="header__menu_item_button" href="'.$i['url'].'">'.$i['name'].'</a>
						');
						echo('<ul class="header__menu_buildings" hidden="true" num='.$count.'>');
						unset($i['name']);
						unset($i['url']);
						foreach($i as $j)
						{
							echo('<li class="header__menu_building">
								<a href="#">'.$j.'</a>
							</li>');
						}
						echo('</ul></li>');
						$count++;
					}
				?>
        </ul>
    </div>
    <header class="header">
        
        <div class="header__bottom">
            <div class="header__bottom_logo">
                <img src="img/logo.png" alt="ЗЛМК" class="header__bottom_logo">
                <p class="header__bottom_logo_text">
                    завод легких металлокострукций
                </p>
            </div>
            <div class="header__phone_container">
                <img class="header__phone" src="img/phone.png" alt="Телефон:">
                <div class="header__phone_block">
                    <a href="tel:79236419900" class="header__phone_number">+7 (923) 641-9900</a>
                    <a href="tel:573-003" class="header__phone_number header__phone_number-bottom">573-003</a>
                </div>    
            </div>
            <a class="button header__button modal_button">
                ЗАКАЗАТЬ ЗВОНОК
            </a>
        </div>
    </header>
    <main class="main">
        <div class="main__slide1">
            <img class="main__slide1_img" src="img/slides1.jpg" alt="">
            <div class="main__slide1_img_gradient-box"></div>
            <div class="main__slide1_content">
                <div style="position: relative">
                    <div class="main__slide1_content_container">
                        <h1 class="main__slide1_block main__slide1_block_top">
                            Открываете бизнес?
                            Расширяете производство и нужен цех?
                        </h1>
                        <div class="main__slide1_container">
                            <div>
                                <h2 class="main__slide1_block">
                                    Наши технологии и опыт<br>
                                    позволяет качественно,<br>
                                    а главное - быстро и недорого<br>
                                    построить Вам готовое здание<br>
                                    необходимой конфигурации<br>
                                    <span style="font-weight: 700;">специально под Ваш Бизнес!</span>
                                </h2>
                                <h2 class="main__slide1_block">
                                    Оставьте заявку (за 1 клик)<br>
                                    и мы с Вами свяжемся
                                </h2>
                            </div>
                            <form class="main__slide1_form" enctype="multipart/form-data" id="form">
                                <p id="top_text" class="main__slide1_form_text">
                                    Сообщите свой номер телефона, и<br>мы Вам перезвоним: <span style="color: #9cf50d">*</span>
                                </p>
                                <input id="phone" type="tel" class="main__slide1_form_phone" placeholder="+7 (913) 123-45-66" required>
                                <input id="form_submit" type="submit" class="main__slide1_form_button" value="ОТПРАВИТЬ">
                                <p id="bottom_text" class="main__slide1_form_text">
                                    <span style="color: #9cf50d">*</span> "Заявка в 1 клик" ни к чему Вас не<br>
                                    обязывает, но позволяет сэкономить время.<br>
                                    Детали заказа мы запишем сами, позвонив<br>
                                    Вам по указанному номеру телефона.
                                </p>
								<p id='success' class="main__slide1_form_text" hidden="true">
                                    <span style="font-size: 32px; color: #fcfdff;">Заявка успешно принята</span>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <a href="#slide2" class="main__slide1_mouse-block">
                    <p class="main__slide1_mouse-block_text">ПОДРОБНЕЕ</p>
                    <img class="main__slide1_mouse" src="img/mouse.png" alt="">  
                    <img class="main__slide1_arrow" style="opacity: 0.3;" src="img/arrow.png" alt="">  
                    <img class="main__slide1_arrow" style="opacity: 0.6;" src="img/arrow.png" alt="">  
                    <img class="main__slide1_arrow" src="img/arrow.png" alt="">
                </div> 
            </div>
        </div>
        <a name="slide2"></a>
        <div class="main__slide2">
            <h2 class="main__slide2_title">
                Преимущества каркасного строительства из ЛМК
            </h2>
            <img class="main__split" src="img/split.png" alt="">
            <div class="main__slide2_container">
                <div class="main__slide2_item">
                    <img src="img/slide2-img1.png" alt="" class="main__slide2_item_img">
                    <p class="main__slide2_item_text">
                        Не имеет ограничений по параметрам ширины, длины и высоты
                    </p>
                </div>
                <div class="main__slide2_item main__slide2_item_bottom">
                    <img src="img/slide2-img2.png" alt="" class="main__slide2_item_img">
                    <p class="main__slide2_item_text">
                        Универсален в эксплуатации
                    </p>
                </div>
                <div class="main__slide2_item">
                    <img src="img/slide2-img3.png" alt="" class="main__slide2_item_img">
                    <p class="main__slide2_item_text">
                        Легко изменить под необходимые требования
                    </p>
                </div>
                <div class="main__slide2_item main__slide2_item_bottom">
                    <img src="img/slide2-img4.png" alt="" class="main__slide2_item_img">
                    <p class="main__slide2_item_text">
                        Оптимальное распределение нагрузки, т.к. вес приходится на вертикальные опоры
                    </p>
                </div>
                <div class="main__slide2_item">
                    <img src="img/slide2-img5.png" alt="" class="main__slide2_item_img">
                    <p class="main__slide2_item_text">
                        Самый экономически-выгодный вид ангаров
                    </p>
                </div>
            </div>
            <div class="main__slide3">
                <h2 class="main__slide3_title main__slide2_gallery_title">ЗДАНИЯ ИЗ ЛМК, КОТОРЫЕ МЫ ПОСТРОИЛИ, СЭКОНИМИЛИ ЗАКАЗЧИКАМ СРЕДСТВА И ПОСТАВИЛИ ИХ БИЗНЕС НА НОГИ</h2>
                <img src="img/split.png" alt="" class="main__split">
                <div class="main__slide2_gallery_container">
                    <a class="main__slide2_gallery_item" rel="item" href="img/gallery-image1.png"><img class="main__slide2_gallery_img" alt="item1" src="img/gallery-image1.png" /></a>
                    <a class="main__slide2_gallery_item" rel="item" href="img/gallery-image2.png"><img class="main__slide2_gallery_img" alt="item1" src="img/gallery-image2.png" /></a>
                    <a class="main__slide2_gallery_item" rel="item" href="img/gallery-image3.png"><img class="main__slide2_gallery_img" alt="item1" src="img/gallery-image3.png" /></a>
                    <a class="main__slide2_gallery_item" rel="item" href="img/gallery-image4.png"><img class="main__slide2_gallery_img" alt="item1" src="img/gallery-image4.png" /></a>
                    <a class="main__slide2_gallery_item" rel="item" href="img/gallery-image1.png"><img class="main__slide2_gallery_img" alt="item1" src="img/gallery-image1.png" /></a>
                    <a class="main__slide2_gallery_item" rel="item" href="img/gallery-image2.png"><img class="main__slide2_gallery_img" alt="item1" src="img/gallery-image2.png" /></a>
                    <a class="main__slide2_gallery_item" rel="item" href="img/gallery-image3.png"><img class="main__slide2_gallery_img" alt="item1" src="img/gallery-image3.png" /></a>
                    <a class="main__slide2_gallery_item" rel="item" href="img/gallery-image4.png"><img class="main__slide2_gallery_img" alt="item1" src="img/gallery-image4.png" /></a>
                    <a class="main__slide2_gallery_item" rel="item" href="img/gallery-image1.png"><img class="main__slide2_gallery_img" alt="item1" src="img/gallery-image1.png" /></a>
                </div>
            </div>
            <div class="header__bottom">
                <div class="main__slide2_bottom">
                    <p class="main__slide2_bottom_top">
                        ХОТИТЕ ТАК ЖЕ И СО СКИДКОЙ?
                    </p>
                    <p class="main__slide2_bottom_down">
                        Заказывайте расчёт стоимости прямо сейчас!
                    </p>
                </div>
                <a href="#" class="button main__slide2_button">
                    ЗАКАЗАТЬ РАСЧЕТ
                </a>
            </div>
        </div>
        <div class="main__slide3">
            <p class="main__slide3_title">
                ВСЕГО 7 ШАГОВ И ВАША ПРОБЛЕМА-РЕШЕНА!
            </p>
            <img class="main__split" src="img/split.png" alt="">
            <div class="main__slide3_container">
                <div class="main__slide3_item"></div>
                <div class="main__slide3_item line-down-right">
                    <img src="img/slide3-img1.png" alt="" class="main__slide3_img" num="1">
                    <p class="main__slide3_text">
                        Вы размещаете заявку через нашу форму, заказав обратный звонок или направив вопрос по электронной почте
                    </p>
                </div>
                <div class="main__slide3_item"></div>
                <div class="main__slide3_item"></div>

                <div class="main__slide3_item line-down-left">
                    <img src="img/slide3-img2.png" alt="" class="main__slide3_img" num="2">
                    <p class="main__slide3_text">
                        Наш специалист связывается с вами для согласоваия деталей
                    </p>
                </div>
                <div class="main__slide3_item main__slide3_item_4"></div>
                <div class="main__slide3_item line-down-left">
                    <img src="img/slide3-img4.png" alt="" class="main__slide3_img" num="4">
                    <p class="main__slide3_text">
                        Заключается договор 
                    </p>
                </div>
                <div class="main__slide3_item"></div>

                <div class="main__slide3_item"></div>
                <div class="main__slide3_item main__slide3_item_3 line-up-right">
                    <img src="img/slide3-img3.png" alt="" class="main__slide3_img" num="3">
                    <p class="main__slide3_text">
                        В течение нескольких дней рассчитывается стоимость работи формируется окончательное коммерческое предложение
                    </p>
                </div>
                <div class="main__slide3_item main__slide3_item_5"></div>
                <div class="main__slide3_item line-down-right">
                    <img src="img/slide3-img5.png" alt="" class="main__slide3_img" num="5">
                    <p class="main__slide3_text">
                        Разрабатывается проектная документация
                    </p>
                </div>
                
                <div class="main__slide3_item"></div>
                <div class="main__slide3_item"></div>
                <div class="main__slide3_item line-down-right">
                    <img src="img/slide3-img6.png" alt="" class="main__slide3_img" num="6">
                    <p class="main__slide3_text">
                        Изготавливается объект
                    </p>
                </div>
                <div class="main__slide3_item"></div>

                
                <div class="main__slide3_item"></div>
                <div class="main__slide3_item">
                    <img src="img/slide3-img7.png" alt="" class="main__slide3_img" num="7">
                    <p class="main__slide3_text">
                        Вы принимаете готовый объект и остаетесь довольны нашей работой
                    </p>
                </div>
                <div class="main__slide3_item"></div>
                <div class="main__slide3_item"></div>
                
                
            </div>
        </div>
        <div class="main__slide4">
            <p class="main__slide4_title">
                КОНТАКТЫ
            </p>
            <img class="main__split" src="img/split.png" alt="">
            <div class="main__slide4_container">
                <div class="main__slide4_item">
                    <img src="img/slide4_adress.png" alt="" class="main__slide4_item_img">
                    <img src="img/line-green.png" alt="" class="main__slide4_item_split">
                    <p class="main__slide4_item_title">
                        Приходите
                    </p>
                    <p class="main__slide4_item_text">
                        Павловский р-н, Сибириские огни, ул. Новая д.2а 
                    </p>
                </div>
                <div class="main__slide4_item">
                    <img src="img/slide4_phone.png" alt="" class="main__slide4_item_img">
                    <img src="img/line-green.png" alt="" class="main__slide4_item_split">
                    <p class="main__slide4_item_title">
                        Звоните
                    </p>
                    <p class="main__slide4_item_text main__slide4_item_phone">
                        +7 (963) 641-99-00 573-003
                    </p>
                </div>
                <div class="main__slide4_item">
                    <img src="img/slide4_email.png" alt="" class="main__slide4_item_img">
                    <img src="img/line-green.png" alt="" class="main__slide4_item_split">
                    <p class="main__slide4_item_title">
                        Пишите
                    </p>
                    <p class="main__slide4_item_text">
                        info@zlmk22.ru 
                    </p>
                </div>
            </div>
            <div class="main__slide4_map">
                <iframe class="main__slide4_map" src="https://yandex.ru/map-widget/v1/?um=constructor%3A249dbe83cd5bde572ddb4439cfb2a0168687257d1e4944a92dbbe823f30223ce&amp;source=constructor" width="822" height="523" frameborder="0"></iframe>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer__top">
            <div class="footer__top_logo">
                <img src="img/logo.png" alt="ЗЛМК" class="footer__top_logo">
                <p class="footer__top_logo_text">
                    завод легких металлокострукций
                </p>
            </div>
            <div class="footer__top_contact">
                <div>
                    <p class="footer__top_contact_text">Остались вопросы?</p>
                    <p class="footer__top_contact_text">Позвоните прямо сейчас!</p>
                </div>
                <a class="button footer__button modal_button">
                    ЗАКАЗАТЬ ЗВОНОК
                </a>
            </div>
            <div class="footer__top_phone">
                <a href="tel:79236419900" class="footer__top_phone_number">+7 (923) 641-9900</a>
                <a href="tel:573-003" class="footer__top_phone_number footer__top_phone_number_bottom">573-003</a>
            </div>
        </div>
        <div class="footer__bottom">
            <img src="img/methrics.png" alt="" class="footer__methrics">
            <img src="img/createby.png" alt="" class="footer__createby">
        </div>
    </footer>
    <script src="js/script.js"></script>
</body>

</html>