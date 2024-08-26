<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
    .table-container {
      height: 400px; 
      overflow-y: auto; 
      display: block; 
    }
    </style>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="bi bi-globe2"></i> Control de Personas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('/') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/ciudadanos') ?>">Ciudadanos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/departamentos') ?>">Departamentos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/municipios') ?>">Municipios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/niveles') ?>">Niveles Academicos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/regiones') ?>">Regiones</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
    <div class="container mt-5">
    <?= $this->renderSection("content"); ?>
    </div>
<footer class="bg-dark text-center text-white py-2 position-absolute bottom-0 start-0 end-0" >
    <div class="container">
        <span>© 2024 Todos los derechos reservados. | Desarrollado por Elder Gonzalez. | 201016328</span>
    </div>
</footer>
<?= $this->renderSection("script"); ?>
</body>
</html>