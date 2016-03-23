<?php
include 'database.php';
$pdo = Database::connect();

$data = json_decode(stripslashes($_POST['data']));
$data[1] = ltrim($data[1]);

if (!empty($data[0])) {


    $sql = 'SELECT * FROM Bars WHERE team_ID="' . $data[0] . '" AND bar_state = "' . $data[1] . '"  ORDER BY bar_city';
    echo $sql;

    foreach ($pdo->query($sql) as $row) {


        echo '
            <tr>';
        echo '<td data-toggle="collapse" data-target="#toggle' . $row['bar_ID'] . '" class="accordion-toggle more" ><a><i class="glyphicon glyphicon-plus"></i></a></td>';
        echo '
                <td>' . $row['bar_name'] . '</td>
                ';
        echo '
                <td>' . $row['bar_city'] . '</td>
                ';
        echo '
                <td><a href="http://www.' . $row['website'] . '"target="_blank">' . $row['website'] . '</a></td>
                ';

        echo '
            </tr>
            ';


        echo '<tr><td colspan="4" class="hiddenRow"><div class="accordian-body collapse" id="toggle' . $row['bar_ID'] . '"> ' . $row['website'] . ' </div> </td> </tr>';
        echo '<tr></tr>';

    }
    Database::disconnect();
}
?>