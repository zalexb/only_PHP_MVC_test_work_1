<!DOCTYPE>
<html>
<head>
    <title>My Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/web/static/css/style.css">

    <!-- jQuery library -->
    <script src="/web/static/js/jquery-3.3.1.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--header-->
    <div class="header">
        <div class="container">
            <nav class="nav_bar">
                <div class="nav_bar_header">
                    <h1 class="nav_brand">
                       Мой блог
                    </h1>
                </div>
                <div class="collapse navbar-collapse">
                    <ul style="margin-top: 2em" class="nav navbar-nav">
                        <li><a href="/">Главная</a></li>
                        <li><a href="/posts">Список последних записей</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div id="content">
        <?include './web/application/views/'.$content_view;?>
    </div>
</body>
</html>