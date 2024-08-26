<?= $this->extend('template')?>

<?=$this->section('content');?>
<h1 class="mb-4">Editar Departamento</h1>

        <form action="" method="post" id="form_update_departamentos">
            <div class="mb-3">
                <label for="nombre_depto" class="form-label">Nombre del Departamento</label>
                <input type="text" class="form-control" id="nombre_depto" name="nombre_depto" value="<?= esc($departamento['nombre_depto']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="cod_region" class="form-label">Región</label>
                <select class="form-control" id="cod_region" name="cod_region" required>
                    <?php foreach ($regiones as $region): ?>
                        <option value="<?= esc($region['cod_region']) ?>" <?= $region['cod_region'] == $departamento['cod_region'] ? 'selected' : '' ?>>
                            <?= esc($region['nombre']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="<?= base_url('/departamentos') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
<?= $this->endSection()?>

<?=$this->section('script');?>

<script>
    document.getElementById('form_update_departamentos').addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        
        axios.post("<?= base_url('/departamentos/update/' . $departamento['cod_depto']) ?>", formData)
            .then(function (response) {
                if(!response.data.error){
                    Swal.fire({
                    title: "Campos Guardados!",
                    text: "Se a actualizado la información del departamento correctamente!",
                    icon: "success",
                    willClose: () => {
                        window.location.href = "<?= base_url('/departamentos')?>";
                    }
                    });
                }else{
                    Swal.fire({
                    title: "Opss!",
                    text: "No fue posible guardar los datos!",
                    icon: "error"
                    });
                }
            })
            .catch(function (error) {
                console.error('Error!', error);
            });
    });

</script>

<?= $this->endSection()?>