<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation1 = $_POST["operation1"];

    switch ($operation1) {
        case "add":
            $result1 = $num1 + $num2;
            break;
            case "subtract":
                $result1 = $num1 - $num2;
                break;
                case "multiply":
                    $result1 = $num1 * $num2;
                    break;
                    case "divide":
                        if ($num2 != 0) {
                            $result1 = $num1 / $num2;
                        } else {
                            $result1 = "Nie można dzielić przez 0.";
                        }
                        break;
        default:
            $result1 = "Błąd: Nieprawidlowa operacja.";
    }
}

echo "Wynik: " . $result1;

?>