<html>
<head>
    <link href="../../main.css?v=2023-06-12" rel="stylesheet">
    <div  class="windowForm">
        <form method="post">
            <label>Id-торговой точки</label><br>
            <input type="text" name="mp_id"><br>
            <label>Название тороговой точки</label><br>
            <input type="text" name="mp_title"><br>
            <label>id-магазина</label><br>
            <input type="text" name="shop_id"><br>
            <input style="width: 100%" class="classicButtons" type="submit" value="Отправить">
        </form>
        <a href="../../exit.php"><input style="width: 49%;" class="classicButtons" type="submit" value="Выйти"></a>
        <a href="getAllMP.php"><input style="width: 49%;" class="classicButtons" type="submit" value="Назад"></a>
    </div>
    <?php
    if (isset($_POST['mp_id']) and isset($_POST['mp_title'])) {
        $data = array(
            'id' => $_POST['mp_id'],
            'title' => $_POST['mp_title'],
            'shop_id' => $_POST['shop_id']
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
        file_get_contents('http://localhost:8000/api/admin/market_places/', false, $context);
        header('Location: getAllMP.php');
    }

    ?>
</head>
</html>
