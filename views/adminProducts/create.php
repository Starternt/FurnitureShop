<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/product">Управление товарами</a></li>
                        <li class="active">Создать товар</li>
                    </ol>
                </div>


                <br/>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="" method="post" enctype="multipart/form-data">
                            <p>Название товара</p>
                            <input type="text" name="name" placeholder="Наименование" value="" required>
                            <p>Артикул</p>
                            <input type="text" name="code" placeholder="Артикул" value="" required>
                            <p>Стоимость $</p>
                            <input type="text" name="price" placeholder="Стоимость" value="">
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
                            <input type="text" name="brand" placeholder="Производитель" value="">
                            <p>Изображение товара</p>
                            <img src="" width="200" alt="">
                            <input type="file" name="image" placeholder="Изображение товара" value="">
                            <p>Детальное описание</p>
                            <textarea name="description"></textarea><br><br>
                            <p>Наличие товара</p>
                            <select name="availability">
                                <option value="0">Нет</option>
                                <option value="1" selected="selected">Да</option>
                            </select><br><br>
                            <p>Статус</p>
                            <select name="status">
                                <option value="0">Скрыт</option>
                                <option value="1" selected="selected">Отображается</option>
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