<html>
<head>
    <link href="../../main.css?v=2023-06-12" rel="stylesheet">
    <div  class="windowForm">
        <form method="post">
            <label>Id-магазина</label><br>
            <input type="text" name="shop_id"><br>
            <label>Название магазина</label><br>
            <input type="text" name="shop_title"><br>
            <input style="width: 100%" class="classicButtons" type="submit" value="Отправить">
        </form>
        <a href="../../exit.php"><input style="width: 49%;" class="classicButtons" type="submit" value="Выйти"></a>
        <a href="getAllShops.php"><input style="width: 49%;" class="classicButtons" type="submit" value="Назад"></a>
    </div>
<?php
    if (isset($_POST['shop_id']) and isset($_POST['shop_title'])) {
        $data = array(
            'id' => $_POST['shop_id'],
            'title' => $_POST['shop_title']
        );
        session_start();
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Authorization: Bearer '.$_SESSION['token'],
                'content' => json_encode($data)
            )
        );
        $context = stream_context_create($options);
        file_get_contents('http://localhost:8000/api/admin/shops/', false, $context);
        header('Location: getAllShops.php');
    }

?>
</head>
</html>
