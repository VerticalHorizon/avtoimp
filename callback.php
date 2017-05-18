<?php
require_once('config.php');
require ('Validator.php');

$publickey = "6Lebxx8UAAAAAHQr2BJQNE0LdkEfJyO2ZsNeqbxx";
$privatekey = "6Lebxx8UAAAAAGB9eB9Uq88SG7vloNg3J8Pg6krY";

function render($file, $scope_data){
    ob_start();
    extract($scope_data);
    require($file);
    return ob_get_clean();
}

if ($_POST) {
    $sd['order_data'] = $_POST;
    $validator = new Validator($fields);
    $res = $validator->validate($sd['order_data']);

    if($res) {      // if validation errors
        $_SESSION['flash_data'] = [
            'type'      => 'danger',
            'message'   => $res,
        ];
    } else {
        $sended = mail($to, $subject2, render('callback.template.php', $sd), $headers);

        if($sended) {   // if succesful sended
            $_SESSION['flash_data'] = [
                'type'      => 'success',
                'message'   => 'Ваш запрос успешно отправлен!',
            ];
        } else {
            $_SESSION['flash_data'] = [
                'type'      => 'danger',
                'message'   => 'При отправке произошла ошибка!',
            ];
        }
    }
}
header('Location: /');


