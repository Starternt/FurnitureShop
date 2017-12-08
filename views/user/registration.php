<?php $active = 1; // определяет выделение меню в хедере?>
<?php include ROOT.'/views/layouts/header.php'; ?>
    <div id="wrapper">
        <div id="content_inside">
            <div id="main_block">
                <div class ="signup-form">
                    <?php if($result){ echo "Регистрация прошла успешно!" ;} ?>
                    <ul style="display:block; position: relative; left:50%; list-style-type: none">
                        <?php if(isset($errors) && is_array($errors)): ?>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
    <?php endif; ?>

                    </ul>
                    <br>

                    <?php if($result==true) echo "<!--"; ?>
                    <h2 style="display: block; position: relative; left: 50%; padding-left: 80px">Регистрация</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" placeholder="Имя:" value="<?php echo $name; ?>" />
                        <input type="password" name="password" id ="pass" placeholder="Пароль:" value="<?php echo $password; ?>"/>
                        <div style="display: block; position: relative; left: 50%; padding-left: 80px" id="errorBlock"></div>
                        <input type="password" name="checkPassword" id ="repPass" placeholder="Введите пароль ещё раз:"/>
                        <input type="email" name="email" placeholder="email" value="<?php echo $email; ?>" />
                        <input style="width: 310px; cursor:pointer" type="submit" name="submit" value="Регистрация">
                    </form>
                    <?php if($result==true) echo "-->"; ?>
                </div>
            </div>
        </div>
    </div>
    <script> //Нужно доработать
        $(document).ready(function() {
            $('#repPass').change(function() {
                var pass = $("#pass").val();
                var pass_rep = $("#repPass").val();

                if (pass != pass_rep) {
                    $("#repPass").css('border', 'red 1px solid');
                    $('#errorBlock').html('Пароли не совпадают');
                }
                else {
                    $("#repPass").css('border', 'green 1px solid');
                    $('#errorBlock').html('Пароли совпадают');
                }
            });
        });
    </script>

<?php include_once ROOT.'/views/layouts/footer.php';?>