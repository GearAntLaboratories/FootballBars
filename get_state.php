<?php
include 'database.php';
$pdo = Database::connect();
if (!empty($_POST["team_id"])) {
    $sql = "SELECT DISTINCT bar_STATE FROM Bars WHERE team_ID = '" . $_POST["team_id"] . "' ORDER BY bar_STATE";
    ?>

    <?php

    foreach ($pdo->query($sql) as $row) {
        echo '<li>';
        echo '<a href="#' . $row['bar_STATE'] . '">' .
            $row['state'] . " " . $row['bar_STATE'] . '</a>';

        echo '</li>';


    }
    Database::disconnect();
}
?>
    
