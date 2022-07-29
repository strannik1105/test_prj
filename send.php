<?php
	$config = parse_ini_file('menuconf.ini', true);
	$phone_pattern = '/^\s?(\+\s?7|8)([- ()]*\d){10}$/';
	if (!preg_match($phone_pattern, $_POST['phone']))
    {	
		include '403.php';
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
    <div class="header__top">
        <ul class="header__menu">
			<?php
					if(array_key_exists('home', $config))
					{
						echo('<li class="header__menu_item header__menu_logo">
                <a href="'.$config['home']['url'].'"><img src="img/home.png" alt="" class="header__menu_logo"></a>
            </li>');
						unset($config['home']);
					}
					else
					{
						http_response_code(404);
					}
					$count = 0;
					$dir = scandir($_SERVER['DOCUMENT_ROOT']);
					foreach($dir as $i)
					{
						if(is_dir($i))
						{
							echo('<li class="header__menu_item">
								<a class="header__menu_item_button" href="'.$i.'">'.$i.'</a>
							');
							echo('<ul class="header__menu_buildings" hidden="true" num='.$count.'>');							
							foreach(scandir($i) as $j)
							{
								if(is_dir($j))
								{
									echo('<li class="header__menu_building">
										<a href="#">'.$j.'</a>
									</li>');
								}
							}							
							echo('</ul></li>');
							$count++;
						}
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
            <a href="#" class="button header__button">
                ЗАКАЗАТЬ ЗВОНОК
            </a>
        </div>
    </header>
	<main class="main">
		<h1> Заявка отправлена </h1>
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
                <a href="#" class="button footer__button">
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