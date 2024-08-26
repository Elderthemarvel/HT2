<?= $this->extend('template')?>

<?=$this->section('content');?>

<div class="card position-absolute top-50 start-50 translate-middle">
    <div class="card-body">
        <h1 class="card-title text-center">Hoja de Trabajo 2</h1>
        <h4 class="card-subtitle mb-4 text-center text-muted">Control de ciudadanos</h4>
        <p class="card-text"><strong>Estudiante:</strong> Elder Alejandro Gonzalez Guzman</p>
        <p class="card-text"><strong>Número de carnet:</strong> 201016328</p>
        <p class="card-text">Se realizaron modificaciones a la base de datos para evitar errores en en las claves primarias a todas se les agrego autoincrement excepto a la de ciudadanos</p>
    </div>
</div>
<?= $this->endSection()?>