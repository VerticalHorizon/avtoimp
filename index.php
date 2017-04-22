<?php
require('config.php');

$flash = null;

if( isset($_SESSION['flash_data']) && count($_SESSION['flash_data']) ) {
    $flash = $_SESSION['flash_data'];
    unset($_SESSION['flash_data']);
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Denis Bozhenkov">
    
    <title><?php echo $app_name; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/fa-viber/fa-viber.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/style.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-custom">
      <div class="container">
        <div class="row">
          <div class="navbar-header col-sm-4">
            <a class="navbar-brand" href="/">
              <img src="/img/logo.png" alt="Автодискаунтер">
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="contacts col-sm-8">
            <div class="row">
              <div class="col-sm-4">
                <div class="glyphicon-set">
                  <i class="fa fa-viber"></i>
                  <i class="fa fa-whatsapp"></i>
                  <i class="fa fa-telegram"></i>
                </div> Звоните
                <br><span class="dd">+79260790621</span>
              </div>
              <div class="col-sm-4">
                <i class="glyphicon glyphicon-envelope"></i> Пишите
                <br><a href="maitlo:0790621@mail.ru" class="dd">0790621@mail.ru</a>
              </div>
              <div class="col-sm-4">
                <button class="btn btn-warning">Перезвонить</button>
              </div>
            </div>
          </div>
          <!-- /.navbar-collapse -->
        </div>
      </div>
    </nav>
    <header class="intro">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="slogan">Продажа автозапчастей с доставкой по Москве. НОВЫЕ запчасти - в наличии. Б/У запчасти - в наличии и под заказ.</h1>

                <?php if($flash): ?>
                <div class="alert alert-<?php echo $flash['type']; ?> alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $flash['message']; ?>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-8">
                        <form method="post" action="mail.php">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                  <h4>Отправьте запрос и получите ответ</h4>
                                </div>
                                <div class="panel-body">

                                    <div class="row">
                                      <div class="col-md-6">

                                        <div class="form-group">
                                          <input type="text" class="form-control" name="car_brand" id="car_brand" placeholder="Марка автомобиля" autofocus maxlength="100">
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <input type="text" class="form-control" name="car_model" id="car_model" placeholder="Модель" maxlength="100">
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                              <input type="number" class="form-control" name="car_year" id="car_year" placeholder="Год выпуска" min="1940">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <input type="text" class="form-control" name="car_vin" id="car_vin" placeholder="VIN" maxlength="17">
                                        </div>

                                        <div class="form-group">
                                          <textarea class="form-control" name="description" id="description" rows="6" placeholder="Какие запчасти Вам нужны?" maxlength="511"></textarea>
                                        </div>

                                      </div>
                                      <div class="col-md-6">

                                        <div class="form-group">
                                          <input type="text" class="form-control" name="name" id="name" placeholder="Ваше имя"  maxlength="100">
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">+7</div>
                                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Ваш номер телефона" required maxlength="12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <input type="email" class="form-control" name="email" id="email" placeholder="Ваш E-mail">
                                        </div>

                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="new" value="1"> Новые з/ч
                                          </label>
                                        </div>
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="old" value="1"> БУ з/ч
                                          </label>
                                        </div>
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="participant" value="1"> участник группы VK (скидка 10%)
                                          </label>
                                        </div>

                                      </div>
                                    </div>

                                </div>
                                <div class="panel-footer">
                                  <button type="submit" class="btn btn-warning pull-right">Отправить запрос</button>
                                  <div class="clearfix"></div>
                                </div>
                            </div> <!-- /panel-warning -->
                        </form>
                    </div>
                    <div class="col-md-4">
                      <p>Получи постоянную эксклюзивную скидку 10% на ВСЕ, просто став участником нашей группы вк и сообщив об этом в форме заказа.</p>
                      <div id="vk_group"></div>
                      <script src="https://vk.com/js/api/openapi.js?143" type="text/javascript"></script>
                      <script type="text/javascript">
                      VK.Widgets.Group("vk_group", {mode: 0, width: "auto", height: "auto"}, 42436383);
                      </script>
                    </div>
              </div>

            </div> 
          </div>
        </div>
      </div>
    </header>

    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="text-muted">
              ООО "АТЛАНТА"<br>ИНН 7702406815</div>
          </div>
          <div class="col-sm-3">
            <div class="text-muted">Адрес:<br>Москва, Пресненская набережная 16А</div>
          </div>
          <div class="col-sm-6">
            <a href="http://karellens.com" class="pull-right dev"><i class="glyphicon glyphicon-wrench"></i> Karellens</a>
          </div>
        </div>
      </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>