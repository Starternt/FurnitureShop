<?php include ROOT . '/views/layouts/header.php'; ?>

    <div id="wrapper">
        <div id="content_inside">
            <div id="sidebar">
                <img src="/template/css/images/title1.gif" alt="" width="174" height="30"/><br/>
                <ul id="list">
                    <?php foreach ($categories as $categoryItem): ?>
                        <li class="color"><a
                                    href="/category/<?php echo $categoryItem['id']; ?>"><?php if ($categoryItem['id'] % 2) {
                                    echo $categoryItem['name'];
                                } ?></a></li>
                        <li>
                            <a href="/category/<?php echo $categoryItem['id']; ?>"><?php if (!($categoryItem['id'] % 2)) {
                                    echo $categoryItem['name'];
                                } ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div id="main_block">
                <div class="about">
                    <img src="/template/css/images/title2.gif" alt="" width="191" height="30"/><br/>
                    <p>Illuloremm secundum exerci erat plaga illum, enim, venio. Tamen causa ut diam torqueo sagaciter
                        inhibeo si quae exerci lobortis. Appellatio vel hos autem, ludus luptatum mauris ratis jugis
                        interdico. Gilvus consequat abico demoveo lenis validus typicus ut commodo. Consequat, eu voco
                        cui eros, euismod quis illum, commodo. Nibh valde tincidunt ex quae ratis meus neo aliquam.
                        Appellatio vel hos autem, ludus luptatum mauris ratis jugis interdico. Gilvus consequat abico
                        demoveo lenis validus typicus ut commodo. Consequat, eu voco cui eros, euismod quis illum,
                        commodo. Nibh valde tincidunt ex quae ratis meus neo aliquam. </p>
                </div>
                <div class="news">
                    <img src="/template/css/images/title3.gif" alt="" width="69" height="30"/><br/>
                    <p> Мы принимаем все заказы – от самых маленьких и до самых больших.*

                        Складская программа и собственная филиальная сеть.

                        Также в нашем интернет-магазине действует следующая система скидок от розничных цен:

                        На продукцию BLUM скидки зависят от суммы заказа и рассчитываются автоматически.

                        На продукцию Vauth-Sagel скидки зависят от суммы заказа и рассчитываются автоматически</p>
                </div>
                <div id="items">
                    <?php foreach ($product as $productItem): ?>
                        <div class="item">
                            <img src="<?php echo $productItem['image'] ?>" alt="" width="202" height="173"/><br/>
                            <span><?php echo $productItem['price'] . '$' ?></span><a
                                    href="/product/<?php echo $productItem['id']; ?>" class="view">View</a><a href="#"
                                                                                                              class="buy add-to-cart"
                                                                                                              data-id="<?php echo $productItem['id']; ?>">Buy
                                this Product</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>