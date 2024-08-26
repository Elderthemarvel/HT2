<?= $this->extend('template')?>

<?=$this->section('content');?>
<h1 class="mb-4">Editar Municipio</h1>

        <form action="" method="post" id="form_update_municipio">
            <div class="mb-3">
                <label for="nombre_municipio" class="form-label">Nombre del Municipio</label>
                <input type="text" class="form-control" id="nombre_municipio" name="nombre_municipio" value="<?= esc($municipio['nombre_municipio']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="cod_depto" class="form-label">Departamento</label>
                <select class="form-control" id="cod_depto" name="cod_depto" required>
                    <?php foreach ($departamentos as $departamento): ?>
                        <option value="<?= esc($departamento['cod_depto']) ?>" <?= $departamento['cod_depto'] == $municipio['cod_depto'] ? 'selected' : '' ?>>
                            <?= esc($departamento['nombre_depto']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="<?= base_url('/municipios/index') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
<?= $this->endSection()?>

<?=$this->section('script');?>

<script>
    document.getElementById('form_update_municipio').addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        
        axios.post("<?= base_url('/municipios/update/' . $municipio['cod_muni']) ?>", formData)
            .then(function (response) {
                if(!response.data.error){
                    Swal.fire({
                    title: "Campos Guardados!",
                    text: "Se a actualizado la información del municipio correctamente!",
                    icon: "success",
                    willClose: () => {
                        window.location.href = "<?= base_url('/municipios')?>";
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