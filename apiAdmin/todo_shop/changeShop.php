<html>
<body>
<link href="../../main.css?v=2023-06-12" rel="stylesheet">
<?php
if (isset($_GET['shop_id']) and isset($_GET['old_title'])) {
?>

<div class="windowForm">
    <form method="post">
        <label>Новое название</label><br>
        <input type="text" name="title" value="<?php echo $_GET['old_title'] ?>"><br>
        <input class="classicButtons" type="submit" value="Отправить">
        <a href="getAllShops.php"><input style="width: 100%;" class="classicButtons" type="submit" value="Назад"></a>
    </form>
</div>
<?php
    if(isset($_POST['title'])) {
        $shopId = $_GET['shop_id'];
        session_start();
        $data = array(
            'title' => $_POST['title']
        );
        $options = array(
            'http' => array(
                'method' => 'PUT',
                'header' => 'Authorization: Bearer ' . $_SESSION['token'],
                'content' => json_encode($data)
            )
        );
        $context = stream_context_create($options);
        file_get_contents('http://localhost:8000/api/admin/shops/'.$shopId, false, $context);
        header('Location: getAllShops.php');
    }
}
?>
</body>
</html>