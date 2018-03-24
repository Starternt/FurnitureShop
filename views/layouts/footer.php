<div id="footer">
    <div id="footer_inside">
        <ul class="footer_menu">
            <li><a href="/">Главная</a>|</li>
            <li><a href="registration">Регистрация</a>|</li>
            <li><a href="login">Личный кабинет</a>|</li>
            <li><a href="about">О нас</a></li>
        </ul>
        <br/><br/>
        <p>Права на макет принадлежат &copy;<a href="http://www.bestfreetemplates.info" target="_blank"
                                                               title="Best Free Templates">BFT</a>

        </p>
    </div>
</div>
<map name="Map">
    <area shape="rect" coords="78,45,312,119" href="/">
    <area shape="poly" coords="670,87,719,78,727,123,677,130" href="/">
    <area shape="poly" coords="776,124,818,152,793,189,751,160" href="/login">
    <area shape="poly" coords="834,52,885,61,878,105,828,96" href="/cart">
</map>
<script>
    $(document).ready(function () {
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/" + id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
</body>
</html>