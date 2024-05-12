<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $num3 = $_POST["num3"];
    $operation2 = $_POST["operation2"];

    switch ($operation2) {
        case 'sin':
            $angle_in_radians = deg2rad($num3);
            echo "Wynik: " . sin($angle_in_radians);
            break;
        case 'cos':
            $angle_in_radians = deg2rad($num3);
            echo "Wynik: " . cos($angle_in_radians);
            break;
        case 'tg':
            $angle_in_radians = deg2rad($num3);
            echo "Wynik: " . tan($angle_in_radians);
            break;
        case 'ctg':
            $angle_in_radians = deg2rad($num3);
            echo "Wynik: " . 1 / tan($angle_in_radians);
            break;
        case 'B_to_D':
            $result = bindec($num3);
            echo "Wynik: " . $result;
            break;
        case 'D_to_B':
            $result = decbin($num3);
            echo "Wynik: " . $result;
            break;
        case 'D_to_S':
            $result = dechex($num3);
            echo "Wynik: " . $result;
            break;
        case 'S_to_D':
            $result = hexdec($num3);
            echo "Wynik: " . $result;
            break;
        default:
            echo "Błąd.";
    }
}

?>