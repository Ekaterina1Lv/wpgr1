<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Licznik Odwiedzin Witryny</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        .counter {
            font-size: 24px;
            margin-bottom: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Licznik odwiedzin witryny</h1>

    <?php
    // Sprawdź, czy plik licznik.txt istnieje
    if (file_exists("licznik.txt")) {
        // Odczytaj liczbę odwiedzin z pliku
        $licznik = file_get_contents("licznik.txt");
    } else {
        // Utwórz nowy plik i ustaw licznik na 0
        $licznik = 0;
        file_put_contents("licznik.txt", $licznik);
    }

    // Zwiększ licznik o 1
    $licznik++;

    // Zapisz zaktualizowany licznik do pliku
    file_put_contents("licznik.txt", $licznik);

    // Wyświetl licznik
    echo "<div class='counter'>Odwiedzin: " . $licznik . "</div>";
    ?>

    <button onclick="location.href='?reset=true'">Resetuj licznik</button>

    <?php
    // Sprawdź, czy użytkownik kliknął przycisk resetowania
    if (isset($_GET['reset'])) {
        // Zresetuj licznik do 0
        file_put_contents("licznik.txt", 0);

        // Przeładuj stronę
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    ?>
</div>

</body>
</html>