<!DOCTYPE html>
<html lang="en"  ng-app="app" ng-controller="mainCtrl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/images/favicon.ico">

    <title>Правда Жизни</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-theme.css" rel="stylesheet">

    <link rel="stylesheet" href="/bower_components/tablesorter/themes/blue/style.css">
    <link rel="stylesheet" href="/bower_components/tablesorter/addons/pager/jquery.tablesorter.pager.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="/css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="/js/toastr/angular-toastr.min.css">
    <!-- Custom styles for this template -->
    <link href="/css/jumbotron.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->



    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Правда Жизни</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Задачи <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/tasks">Добавить</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="/">Список задач</a></li>

                    </ul>
                </li>
                <li><a href="/portfolio">About</a></li>
                <li><a href="/contacts">Contact</a></li>
            </ul>
            <?php if( $_SESSION['admin']!=123){ ?>
            <form class="navbar-form navbar-right" method="post" action="/login">
                <div class="form-group">
                    <input type="text" placeholder="Login" name="login" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password"  name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>
            <?php } else{ ?>
                <form class="navbar-form navbar-right" method="post" action="/admin/logout">

                    <button type="submit" class="btn btn-success">Logout</button>
                </form>
            <?php }?>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<!--<div class="jumbotron">-->
<!--    <div class="container">-->
<!--        <h1>Hello, friend!</h1>-->
<!--        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>-->
<!--        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>-->
<!--    </div>-->
<!--</div>-->

<div class="container">


    <div class="row">
        <div class="box">
            <?php include 'application/views/' . $content_view; ?>

        </div>
        <hr>
    </div>

</div> <!-- /container -->

<footer class="footer">
    <div class="container">
        <p class="text-muted">&copy; 2018 Правда жизни, Inc.</p>
    </div>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="/js/jquery.min.js"><\/script>')</script>
<script src="/js/bootstrap.min.js"></script>
<script src="/bower_components/tablesorter/jquery-latest.js" ></script>
<script src="/bower_components/tablesorter/jquery.tablesorter.js" ></script>
<script src="/bower_components/tablesorter/addons/pager/jquery.tablesorter.pager.js" ></script>

<script src="/js/angular.min.js"></script>
<script src="/js/angular_my.js"></script>
<script src="/js/my_js.js" ></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
