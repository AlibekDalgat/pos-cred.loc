<?php
if (isset($_GET['mp_id'])) {
    $mpId = $_GET['mp_id'];
    session_start();
    $options = array(
        'http' => array(
            'method' => 'DELETE',
            'header' => 'Authorization: Bearer '.$_SESSION['token']
        )
    );
    $context = stream_context_create($options);
    file_get_contents('http://localhost:8000/api/admin/market_places/'.$mpId, false, $context);
    header('Location: getAllMP.php');
}
?>

