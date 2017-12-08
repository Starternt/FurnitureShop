<?php $active = 2; // определяет выделение меню в хедере?>
<?php include_once ROOT . "/views/layouts/header.php"; ?>
<link type="text/css" rel="stylesheet" href="/template/css/smslider.css"/>
<script type="text/javascript" src="/template/js/jquery.js"></script>
<script type="text/javascript" src="/template/js/jquery.smslider.min.js"></script>
<div id="wrapper">
    <div id="content_inside">
        <div id="sidebar"><img src="images/title1.gif" alt="" width="174" height="30"/><br/>
            <ul id="list"> <?php foreach ($categories as $categoryItem): ?>
                    <li class="color"><a
                                href="/category/<?php echo $categoryItem['id']; ?>"><?php if ($categoryItem['id'] % 2) {
                                echo $categoryItem['name'];
                            } ?></a></li>
                    <li>
                        <a href="/category/<?php echo $categoryItem['id']; ?>"><?php if (!($categoryItem['id'] % 2)) {
                                echo $categoryItem['name'];
                            } ?></a></li> <?php endforeach; ?> </ul>
        </div>
        <div id="main_block" class="style1">
            <div id="item"><h4><?php echo $product['name']; ?></h4><br/> <!-- <div class="big_view">-->
                <!-- <img src="/upload/images/products/-->
                <?php //echo $product['id'] . '.jpg'; ?><!--" alt="" width="311"--> <!-- height="319"/><br/><br/>-->
                <!-- <span>--><?php //echo $product['price'] . '$ '; ?><!--</span>--> <!-- </div>-->
                <div class="big_view" id="sm_slider">
                    <ul style="height: 319px"> <?php foreach ($images as $imageItem): ?>
                            <li><img style="cursor:pointer" src="<?php echo $imageItem; ?>" alt="" width=""
                                     height="319"/></li> <?php endforeach; ?> </ul>
                    <div style="margin-top: 22px;"><span><?php echo $product['price'] . '$ '; ?></span></div>
                </div>
                <div class="scroll">
                    <div id="sm_submenu" style="display: inline"> <?php foreach ($images as $i => $imageItem): ?>
                            <div class="sm_submenu-item" data-index="<?php echo $i; ?>" style="display: inline"><img
                                        style="cursor:pointer" src="<?php echo $imageItem; ?>" alt="" width="62"
                                        height="62"/></div> <?php endforeach; ?> </div>
                </div>

            </div>
            <div class="description" style="width: 60%;"><p>
                    <strong><?php echo $product['name']; ?> </strong><br/>
                    <div><?php echo $product['description']; ?></div>
                </p>
                <p><a href="#" class="view">View</a><a href="#" class="buy add-to-cart"
                                                       data-id="<?php echo $product['id']; ?>">Buy this Product</a>
                </p>
            </div>
        </div>
    </div>
</div>
<script> $(document).ready(function () {
        var $smSlider = $('#sm_slider');
        $smSlider.smSlider({pagination: false, subMenu: true, flexible: true})
    });
</script>
<?php include_once ROOT . "/views/layouts/footer.php" ?>