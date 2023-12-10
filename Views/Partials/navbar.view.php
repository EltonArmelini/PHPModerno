<nav>
    <a href="/">Inicio</a>      
    <a href="contact">Contacto</a>
    <a href="about">Nosotros</a>
    <a href="services">Servicios</a>
    <?php if(Auth::check()): ?>
    <span> <strong><?= $_SESSION['name']; ?></strong></span>
    <form action="/logout" method="POST" >
        <button type="submit"  > SALIR</button>
    </form>
    <?php endif ?>
</nav>