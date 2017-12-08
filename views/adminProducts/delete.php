<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/products">Управление товарами</a></li>
                        <li class="active">Удалить товар</li>
                    </ol>
                </div>
                <h4>Вы действительно хотите удалить товар с id #<?php echo $id; ?>?</h4>
                <form action="" method="post">
                    <input type="submit" name="submit" value="Подтвердить">
                </form>

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>