<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>
            <h4>Редактировать товар #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="" method="post" enctype="multipart/form-data">
                        <p>Название товара</p>
                        <input type="text" name="name" placeholder="Наименование"
                               value="<?php echo $product['name']; ?>">
                        <p>Артикул</p>
                        <input type="text" name="code" placeholder="Артикул" value="<?php echo $product['code']; ?>">
                        <p>Стоимость $</p>
                        <input type="text" name="price" placeholder="Стоимость"
                               value="<?php echo $product['price']; ?>">
                        <p>Категория</p>
                        <select name="category">
                            <?php if (is_array($categories)): ?>
                                <?php foreach ($categories as $category): ?>
                                    <option
                                            value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br><br>
                        <p>Производитель</p>
                        <input type="text" name="brand" placeholder="Производитель"
                               value="<?php echo $product['brand']; ?>">
                        <p>Изображение товара</p>
                        <img src="<?php echo Product::getImage($product['id']); ?>" width="200" alt="">
                        <input type="file" name="image" placeholder="Изображение товара" value="">
                        <p>Детальное описание</p>
                        <textarea name="description"><?php echo $product['description']; ?></textarea><br><br>
                        <p>Наличие товара</p>
                        <select name="availability">
                            <option value="0" <?php if ($product['availability'] == 0) echo 'selected="selected"'; ?>>
                                Нет
                            </option>
                            <option value="1" <?php if ($product['availability'] == 1) echo 'selected="selected"'; ?>>
                                Да
                            </option>
                        </select><br><br>
                        <p>Статус</p>
                        <select name="status">
                            <option value="0" <?php if ($product['status'] == 0) echo 'selected="selected"'; ?>>Скрыт
                            </option>
                            <option value="1" <?php if ($product['status'] == 1) echo 'selected="selected"'; ?>>
                                Отображается
                            </option>
                        </select>
                        <br><br><br>
                        <input type="submit" class="btn btn-default" name="submit" value="Сохранить">
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>