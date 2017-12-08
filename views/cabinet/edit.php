<?php include ROOT . '/views/layouts/header.php'; ?>
    <div id="wrapper">
        <div id="content_inside">
            <div id="main_block">
                <h2 style="display: block; position: relative; left: 50%; padding-left: 80px"> Изменить пароль</h2><br>
                <p style="display: block; position: relative; left: 50%; padding-left: 80px; color: red;"><?php if(!$checkEqualPass){ echo "Неправильно введён пароль!";} ?></p>
                <p style="display: block; position: relative; left: 50%; padding-left: 80px; color: red;"><?php if(!$checkCorrectPass){ echo "Новый пароль равен старому!";} ?></p>
                <p style="display: block; position: relative; left: 50%; padding-left: 80px; color: red;"><?php if(!$fillFields){ echo "Поля не должны быть пустыми";} ?></p>
                <p style="display: block; position: relative; left: 50%; padding-left: 80px; color: green;"><?php if($success){ echo "Пароль успешно изменён";} ?></p>
                <br>
                <div class="signup-form">
                    <form action="#" method="post">
                        <input type="password" name="oldPass" placeholder="Введите старый пароль" value="">
                        <input type="password" name="newPass" placeholder="Введите новый пароль" value="">
                        <input style = "width: 310px" type="submit" name="submit" value="Изменить">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include_once ROOT . '/views/layouts/footer.php'; ?>