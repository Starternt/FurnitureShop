<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Furniture Shop</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <script src="/template/js/jquery.js"></script>
    <link href="/template/css/style.css" rel="stylesheet">
</head>
<body>
<div id="header">
    <div class="inner_copy"><a href="https://ecommercebuilders.blogspot.com/">best website builders for ecommerce
            store</a></div>
    <div id="header_inside">
        <img src="/template/css/images/header.jpg" alt="setalpm" width="999" height="222" border="0"
             usemap="#Map"/><br/>
        <ul id="menu">
            <li><a href="/" class="<?php if (isset($active) && $active == 1) echo "but" . $active . "_active"; else echo "but1"; ?>">Главная</a>
            </li>
            <li><a href="/" class="<?php if (isset($active) && $active == 2) echo "but" . $active . "_active"; else echo "but2"; ?>">Категории</a>
            </li>
            <li><a href="/cabinet"
                   class="<?php if (isset($active) && $active == 3) echo "but" . $active . "_active"; else echo "but3"; ?>">Личный
                    кабинет</a></li>
            <li><a href="/about" class="<?php if (isset($active) && $active == 4) echo "but" . $active . "_active"; else echo "but4"; ?>">О
                    нас</a></li>
        </ul>
    </div>
</div>