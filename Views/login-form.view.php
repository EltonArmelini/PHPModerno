<?php
require 'Partials/head.view.php';
require 'Partials/navbar.view.php';
?>
<h1>Iniciar Sesion</h1>

<form action="/login" method="POST">
    <div>
        <input type="text" name="email" placeholder="Ingrese el nombre de usuario">
    </div>
    <div>
        <input type="password" name="password" placeholder="Ingrese la contraseña">
    </div>
    <div>
        <button type="submit">Enviar</button>
    </div>

</form>

<?php require 'Partials/footer.view.php' ?>