<html>
<body>
<head>
    <link href="../../main.css?v=2023-06-14" rel="stylesheet">
</head>
<h1>Магазины</h1>
<div>
    <a href="createShop.php"><input class="classicButtons" type="submit" value="Добавить магазин"></a><br>
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
$json = file_get_contents('http://localhost:8000/api/admin/shops/', false, $context);

$result = json_decode($json, true);
$arr = $result['data'];
?>
<table class="table1">
<?php
foreach ($arr as $shop) {
echo <<<HTML
    <tr>
        <td>$shop[id]</td>    
        <td>$shop[title]</td>
        <td class="actions" style="background: none">
            <form action="deleteShop.php" method="get">
                <input type="hidden" name="shop_id" value=$shop[id]>
                <input class="buttonDelete" type="submit" value="Удалить">
            </form>
            <form action="changeShop.php" method="get">
                <input type="hidden" name="shop_id" value=$shop[id]>
                <input type="hidden" name="old_title" value=$shop[title]>
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
