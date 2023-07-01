<html>
<body>
<head>
    <link href="../main.css?v=2023-06-12" rel="stylesheet">
    <style>
        .push {
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .push input {
            font-size: 18px;
            border-radius: 10px;
            border: none;
            background-color: #ffffff;
            color: #D29D25;
            padding: 7px;
        }
        .push input:hover {
            background-color: #a2a2a2;
            color: white;
        }

    </style>
</head>
<?php
    session_start();
    if ($_SESSION['isAdmin'] == false) {
        header('Location: index.php');
    }
?>
<div class="windowForm">
    <ul class="push">
        <li><a href="todo_shop/getAllShops.php"><input type="submit" value="Все магазины"></a></li>
        <li><a href="todo_market_place/getAllMP.php"><input type="submit" value="Все торговые точка"></a></li>
    </ul>
    <a href="../exit.php"><input class="classicButtons" type="submit" value="Выйти"></a>
</div>
</body>
</html>