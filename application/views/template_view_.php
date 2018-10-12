<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>ПРАВДА ЖИЗНИ</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>
    <link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
    <script type="text/javascript">
        // return a random integer between 0 and number
        function random(number) {

            return Math.floor(Math.random() * (number + 1));
        }
        ;

        // show random quote
        $(document).ready(function () {

            var quotes = $('.quote');
            quotes.hide();

            var qlen = quotes.length; //document.write( random(qlen-1) );
            $('.quote:eq(' + random(qlen - 1) + ')').show(); //tag:eq(1)
        });
    </script>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="logo">
            <a href="/">ПРАВДА</span> <span class="cms">ЖИЗНИ</span></a>
        </div>
        <div id="menu">
            <ul>
                <li class="first active"><a href="/">Главная</a></li>
                <li><a href="/services">Услуги</a></li>
                <li><a href="/portfolio">Портфолио</a></li>
                <li class="last"><a href="/contacts">Контакты</a></li>
            </ul>
            <br class="clearfix"/>
        </div>
    </div>
    <div id="page">
        <div id="sidebar">
            <div class="side-box">
                <h3>Случайная цитата</h3>
                <p align="justify" class="quote">
                    «Сайт, как живой организм, изменяется и развивается.
                    Нельзя сразу написать идеальный вариант и на этом откланяться - это утопия»
                </p>
                <p align="justify" class="quote"><!-- &copy; Vitaly Swipe -->
                    «Все должно быть очень просто, как текстовый файл и при этом функционально
                    и тогда пользователи от нас уйдут»
                </p>
                <p align="justify" class="quote">
                    «Критика - это когда критик объясняет автору, как сделал бы он, если бы умел»
                </p>
                <p align="justify" class="quote"><!-- &copy; Vitaly Swipe -->
                    «Сумасшедшим становиться тот, кто попытался разобраться в этом сумасшедшем мире»
                </p>
                <p align="justify" class="quote">
                    «Опытный разработчик знает, какой выбор ведет к поставленной цели, в то время как
                    новичок каждый раз делает шаг в неизвестность»
                </p>
            </div>
            <div class="side-box">
                <h3>Основное меню</h3>
                <ul class="list">
                    <li class="first "><a href="/">Главная</a></li>
                    <li><a href="/services">Услуги</a></li>
                    <li><a href="/portfolio">Портфолио</a></li>
                    <li class="last"><a href="/contacts">Контакты</a></li>
                    <li class="last"><a href="/login">Войти</a></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div class="box">
                <?php include 'application/views/' . $content_view; ?>
                <!--
                <h2>Welcome to Accumen</h2>
                <img class="alignleft" src="images/pic01.jpg" width="200" height="180" alt="" />
                <p>
                    This is <strong>Accumen</strong>, a free, fully standards-compliant CSS template by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>. The images used in this template are from <a href="http://fotogrph.com/">Fotogrph</a>. This free template is released under a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attributions 3.0</a> license, so you are pretty much free to do whatever you want with it (even use it commercially) provided you keep the footer credits intact. Aside from that, have fun with it :)
                </p>
                -->
            </div>
            <br class="clearfix"/>
        </div>
        <br class="clearfix"/>
    </div>
    <div id="page-bottom">
        <div id="page-bottom-sidebar">
            <h3>Наши контакты</h3>
            <ul class="list">
                <li class="first">icq: xcgb</li>
                <li>skypeid: xcgb</li>
                <li class="last">email: xcgb@gmail.com</li>
            </ul>
        </div>
        <div id="page-bottom-content">
            <h3>О Компании</h3>
            <p>

            </p>
        </div>
        <br class="clearfix"/>
    </div>
</div>
<div id="footer">
    <a href="/">ПРАВДА ЖИЗНИ</a> &copy; 2018
</div>
</body>
</html>