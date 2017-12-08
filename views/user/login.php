<?php include ROOT.'/views/layouts/header.php'; ?>
    <div id="wrapper">
        <div id="content_inside">
            <div id="main_block">
                <div class ="signup-form">
<?php //$t = $_SESSION['products']; print_r($t); ?>
                    <h2 style="display: block; position: relative; left: 50%; padding-left: 120px">Вход</h2>
                    <ul style="display:block; position: relative; left:50%; list-style-type: none">
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <?php foreach ($errors as $error) {
                                echo '- '.$error;
                                echo "<br>";
                            } ?>
                        <?php endif; ?>
                    </ul>
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="email:" value="<?php echo $email; ?>" />
                        <input type="password" name="password" placeholder="Пароль:" value="<?php echo $password; ?>"/>
                        <input style="width: 310px; cursor:pointer" type="submit" name="submit" value="Войти">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include_once ROOT.'/views/layouts/footer.php';?>