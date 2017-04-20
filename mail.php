<?php
require_once('config.php');

function render($file, $scope_data){
    ob_start();
    extract($scope_data);
    require($file);
    return ob_get_clean();
}

$sd['order_data'] = $_POST;
// than validate

mail($to, $subject, render('email.blade.php', $sd), $headers);

header('Location: /');