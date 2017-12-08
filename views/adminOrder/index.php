<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление заказами</li>
                    </ol>
                </div>
                <h4>Список товаров</h4>
                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID Заказа</th>
                        <th>Имя клиента</th>
                        <th>Телефон клиента</th>
                        <th>Комментарий</th>
                        <th>Дата заказа</th>
                        <th>Статус</th>
                        <th>view</th>
                        <th>edit</th>
                        <th>del</th>
                    </tr>
                    <?php foreach ($orderList as $orderItem): ?>
                        <tr>
                            <td><?php echo $orderItem['id']; ?></td>
                            <td><?php echo $orderItem['user_name']; ?></td>
                            <td><?php echo $orderItem['user_phone']; ?></td>
                            <td><?php echo htmlspecialchars($orderItem['user_comment']); ?></td>
                            <td><?php echo $orderItem['date']; ?></td>
                            <td><?php echo Order::getStatusById($orderItem['status']); ?></td>
                            <td><a href="/admin/order/view/<?php echo $orderItem['id']; ?>" title="Смотреть"><i
                                            class="fa fa-eye"></i></a></td>
                            <td><a href="/admin/order/update/<?php echo $orderItem['id']; ?>" title="Редактировать"><i
                                            class="fa fa-pencil-square-o"></i></a></td>
                            <td><a href="/admin/order/delete/<?php echo $orderItem['id']; ?>" title="Удалить"><i
                                            class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>


                </table>


            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>