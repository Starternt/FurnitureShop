<?php include ROOT . '/views/layouts/header.php'; ?>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .cart {
            text-align: center;
            font-size: 32px;
        }

        .tes {
            display: block;
        }

        #content_insidecart {
            background-position: top left;
            background-repeat: no-repeat;
            width: 1000px;
            margin: 0 auto;
            overflow: visible;
        }
    </style>
    <div id="wrapper">
        <div id="content_insidecart">
            <div id="sidebar">
                <img src="/template/css/images/title1.gif" alt="" width="174" height="30"/><br/>
                <ul id="list">
                    <?php foreach ($categories as $categoryItem): ?>
                        <div class="test">
                        <li class="color"><a
                                    href="/category/<?php echo $categoryItem['id']; ?>"><?php if ($categoryItem['id'] % 2) {
                                    echo $categoryItem['name'];
                                } ?></a></li>
                        <li>
                            <a href="/category/<?php echo $categoryItem['id']; ?>"><?php if (!($categoryItem['id'] % 2)) {
                                    echo $categoryItem['name'];
                                } ?></a></li>
                        </div>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div id="main_block">
                <div class="about">
                    <div class="tes">
                        <p>
                        <h3>
                            <div class="cart">CART</div>
                        </h3>
                        </p><br><br>
                        <p style="font-size: 16px;">Выбрано товаров: <?php echo $goodsAmount; ?>, на
                            сумму: <?php echo $totalPrice; ?></p>
                        <br>
                        <p>Заполните форму для дальнейшего оформления заказа:</p><br>
                        <?php if (isset($errors) && is_array($errors)) {
                            foreach ($errors as $error) {
                                echo $error;
                            }
                        } ?>
                        <div class="signup-form-order">
                            <form action="" method="post">
                                <input type="text" name="name" placeholder="Имя:" required>
                                <input type="text" name="phone" placeholder="Телефон:" required>
                                <input type="text" name="comment" placeholder="Комментарий к заказу">
                                <input style="width: 250px;" type="submit" name="submit" value="Подтвердить заказ">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once ROOT . '/views/layouts/footer.php'; ?>