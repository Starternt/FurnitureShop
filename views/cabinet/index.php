<?php $active = 5; ?>
<?php include ROOT.'/views/layouts/header.php'; ?>
    <div id="wrapper">
        <div id="content_inside">
            <div id="main_block">
                <div><h2>
                    Добро пожаловать, <?php echo $userName."!"; ?>
                    </h2>
                    <p style="font-size: 16px">Доступны следующие функции:</p><br>
                    <a href="/cabinet/edit" style="font-size: 20px;"><p><pre>    - Изменить пароль</pre></p></a>
                    <a href="/logout" style="font-size: 20px;"><p><pre>    - Выйти из аккаунта</pre></p></a>
                    <?php if(User::isAdmin()){
                         echo '<a href="/admin" style="font-size: 20px;"><p><pre>    - Админка</pre></p></a>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php include_once ROOT.'/views/layouts/footer.php';?>