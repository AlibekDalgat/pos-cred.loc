<?php
    if (isset($_GET['shop_id'])) {
        $shopId = $_GET['shop_id'];
        session_start();
        $options = array(
            'http' => array(
                'method' => 'DELETE',
                'header' => 'Authorization: Bearer '.$_SESSION['token']
            )
        );
        $context = stream_context_create($options);
        file_get_contents('http://localhost:8000/api/admin/shops/'.$shopId, false, $context);
        header('Location: getAllShops.php');
    }
?>

