<html>
<body>
<head>
    <link href="../../main.css?v=2023-06-14" rel="stylesheet">
    <style>

    </style>
</head>

<h1>Торговые точки</h1>
<div>
    <a href="createMP.php"><input class="classicButtons" type="submit" value="Добавить торговую точку"></a><br>
    <a href="../apiAdmin.php"><input class="classicButtons" type="submit" value="Назад"></a>
    <a href="../../exit.php"><input class="classicButtons" type="submit" value="Выйти"></a>
</div>
<?php
session_start();
$options = array(
    'http' => array(
        'method' => 'GET',
        'header' => 'Authorization: Bearer '.$_SESSION['token'],
    )
);
$context = stream_context_create($options);
$json = file_get_contents('http://localhost:8000/api/admin/market_places/', false, $context);

$result = json_decode($json, true);
$arr = $result['data'];
?>
<table class="table1">
    <?php
    foreach ($arr as $marketPlace) {
        echo <<<HTML
    <tr>
        <td>$marketPlace[id]</td>    
        <td>$marketPlace[title]</td>
        <td>$marketPlace[shop_id]</td>
        <td class="actions" style="background: none">
            <form action="deleteMP.php" method="get">
                <input type="hidden" name="mp_id" value=$marketPlace[id]>
                <input class="buttonDelete" type="submit" value="Удалить">
            </form>
            <form action="changeMP.php" method="get">
                <input type="hidden" name="mp_id" value=$marketPlace[id]>
                <input type="hidden" name="old_title" value=$marketPlace[title]>
                <input type="hidden" name="shop_id" value=$marketPlace[shop_id]>
                <input class="buttonChange" type="submit" value="Редактировать">
            </form>
        </td>
    </tr>
HTML;
    }
    ?>
</table>
</body>
</html>
