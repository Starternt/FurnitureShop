<!DOCTYPE html>
<html>
<head>
    <title>Furniture Shop</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <script src="/template/js/jquery.js"></script>
    <link href="/template/css/style.css" rel="stylesheet">
</head>
<body>
<div id="header">
    <div id="header_inside">
        <img src="/template/css/images/header.jpg" alt="setalpm" width="999" height="222" border="0"
             usemap="#Map"/><br/>
        <ul id="menu">
            <li><a href="/"
                   class="<?php if (isset($active) && $active == 1) echo "but" . $active . "_active"; else echo "but1"; ?>">Главная</a>
            </li>
            <li><a href="/"
                   class="<?php if (isset($active) && $active == 2) echo "but" . $active . "_active"; else echo "but2"; ?>">Категории</a>
            </li>
            <li><a href="/cabinet"
                   class="<?php if (isset($active) && $active == 3) echo "but" . $active . "_active"; else echo "but3"; ?>">Личный
                    кабинет</a></li>
            <li><a href="/about"
                   class="<?php if (isset($active) && $active == 4) echo "but" . $active . "_active"; else echo "but4"; ?>">О
                    нас</a></li>
        </ul>
    </div>
</div>