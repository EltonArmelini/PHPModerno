
    <?php 
    require 'Partials/head.view.php';
    require 'Partials/navbar.view.php'; 
    ?>
    <h1>Tareas</h1>
    <?php foreach ($tasks as $task): //RECOREEMOS LAS TAREAS RECUPERDAS PARA PINTARLAS ?>
        <ul>
        
        <li  style="color:<?=$task->color ?>"> 
            <?= $task->title ?> 
            <strong><?= $task->getStringCompleted()?></strong>
            <form style="display:inline" method="post" action="tasks/edit">
                <input type="hidden" name="completed" value="<?= $task->completed?>">
                <input type="hidden" name="id" value="<?= $task->id?>">
                <button type="submit">Cambiar estado</button>
            </form>
            <form onsubmit="return confirm('Seguro que desea elimiar esta tarea?')" style="display:inline" method="post" action="tasks/delete">
                <input type="hidden" name="id" value="<?= $task->id?>">
                <button type="submit">Eliminar</button>
            </form>
        </li>
        </ul>

    <?php endforeach ?>

    <h3>Agregar nuevas Tareas</h3>
    <form action="tasks/create" method="post">
        <input type="text" name="title">
        <input type="color" name="color">
        <button>Añadir</button>
    </form>

<?php require 'Partials/footer.view.php' ?>
