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

                        <table class=" table-bordered table-striped table">
                            <tr>
                                <th>Product code</th>
                                <th>Name</th>
                                <th>Worth</th>
                                <th>Quantity</th>
                                <th>Delete</th>
                            </tr>
                            <?php foreach ($products as $i => $product): ?>
                                <tr>
                                    <td> <?php echo $product['code']; ?></td>
                                    <td> <?php echo $product['name']; ?></td>
                                    <td> <?php echo $product['price'] . '$'; ?></td>
                                    <td><?php echo $productsList[$product['id']]; ?></td>
                                    <td>
                                        <a href="/cart/delete/<?php echo $product['id']; ?>"><img
                                                    src="/template/images/DELETE.png" alt="" width="16" height="16"></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td> Total price:</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> <?php echo $totalPrice . "$"; ?></td>
                            </tr>
                        </table>
                        <a href="/cart/checkout" class="green">Купить без смс!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once ROOT . '/views/layouts/footer.php'; ?>