<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zarządzanie Opiniami</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Zarządzanie Opiniami</h1>
    <form method="post" action="">
        <textarea name="opinion" placeholder="Wpisz swoją opinię" required></textarea>
        <button type="submit" name="addOpinion">Dodaj opinię</button>
    </form>

    <?php
    $file = 'opinions.txt';

    // Add new opinion
    if (isset($_POST['addOpinion'])) {
        $opinion = trim($_POST['opinion']);
        if (!empty($opinion)) {
            file_put_contents($file, $opinion . PHP_EOL, FILE_APPEND);
        }
    }

    // Delete an opinion
    if (isset($_POST['deleteOpinion'])) {
        $opinions = file($file, FILE_IGNORE_NEW_LINES);
        unset($opinions[$_POST['index']]);
        file_put_contents($file, implode(PHP_EOL, $opinions) . PHP_EOL);
    }

    // Reset all opinions
    if (isset($_POST['resetAll'])) {
        file_put_contents($file, '');
    }

    // Display opinions
    $opinions = file($file, FILE_IGNORE_NEW_LINES);
    if (!empty($opinions)) {
        echo '<div id="opinionsContainer">';
        echo '<h2>Opinie:</h2>';
        echo '<ul>';
        foreach ($opinions as $index => $opinion) {
            echo '<li>';
            echo '<span>' . htmlspecialchars($opinion) . '</span>';
            echo '<form method="post" action="" style="display:inline;">';
            echo '<input type="hidden" name="index" value="' . $index . '">';
            echo '<button type="submit" name="deleteOpinion">Usuń</button>';
            echo '</form>';
            echo '</li>';
        }
        echo '</ul>';
        echo '<form method="post" action="">';
        echo '<button type="submit" name="resetAll">Resetuj wszystko</button>';
        echo '</form>';
        echo '</div>';
    }
    ?>
</div>
</body>
</html>
