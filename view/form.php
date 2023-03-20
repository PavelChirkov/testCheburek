<h2>Вход на сайт</h2>
<?php
if(isset($error) and $error == 1){
    ?><h3 class="error">Проверьте Ваши данные</h3><?
}
?>
<form action="/admin.php" method="POST">
    <input type="hidden" name="pvalue" value="<?print $psession; ?>">
    <input type="text" name="name" value="">
    <input type="password" name="password" value="">
    <input type="submit" value="Вход" >
</form>