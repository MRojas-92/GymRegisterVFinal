<!--
<form method="post" action="">
    <input type="submit" name="salir" class="salir" value="Salir" style="float: : right; cursor: pointer;">
    <input type="button" onclick="history.back()" name="Cancelar" value="Cancelar">
</form> -->

<?php
    if(isset($_POST['salir'])){
        print("hola");
        session_destroy();
        header("Location: index.html");
    }     
?>