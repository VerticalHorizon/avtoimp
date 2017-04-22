<?php
require_once('config.php');
require ('Validator.php');

function render($file, $scope_data){
    ob_start();
    extract($scope_data);
    require($file);
    return ob_get_clean();
}

if($_POST) {
    $sd['order_data'] = $_POST;
    $validator = new Validator($fields);
    $res = $validator->validate($sd['order_data']);

    if($res) {      // if validation errors
        $_SESSION['flash_data'] = [
            'type'      => 'danger',
            'message'   => $res,
        ];
    } else {
        $sended = mail($to, $subject, render('email.blade.php', $sd), $headers);

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


