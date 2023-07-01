<html>
<body>
<head>
    <link href="main.css?v=2023-06-12" rel="stylesheet">
</head>
<?php
var_dump($_SESSION);
if (isset($_POST['login']) and isset($_POST['password'])) {
    $data = array(
        'login' => $_POST['login'],
        'password' => $_POST['password']
    );

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/json',
            'content' => json_encode($data)
        )
    );

    $context = stream_context_create($options);
    $json = file_get_contents('http://localhost:8000/auth/sign-in', false, $context);

    $result = json_decode($json, true);

    $token = $result['token'];
    session_start();
    $_SESSION['token'] = $token;
    if ($result['token'] == null) {
        echo "<p style='color: red;'>Ошибка авторизации</p>";
    } else if ($result['isAdmin']) {
        $_SESSION['isAdmin'] = true;
        header('Location: apiAdmin/apiAdmin.php');
    } else {
        $_SESSION['isAdmin'] = false;
        header('Location: apiAgent/apiAgent.php');
    }
}
?>
<div class="windowForm">
<form method="post">
        <h1 style="color: #3c26ff; text-align: center">Вход в систему</h1>
        <label>Логин</label><br>
        <input style="width: 100%" type="text" name="login"><br>
        <label>Пароль</label><br>
        <input style="width: 100%" type="password" name="password"><br>
        <input style="width: 100%" class="classicButtons" type="submit" value="Авторизация">

</form></div>
</body>
</html>

