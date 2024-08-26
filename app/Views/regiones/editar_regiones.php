<?= $this->extend('template')?>

<?=$this->section('content');?>
<h1 class="mb-4">Editar Región</h1>

    <form action="" method="post" id="form_update_region">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Región</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($region['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"><?= esc($region['descripcion']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?= base_url('/regiones/index') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
<?= $this->endSection()?>

<?=$this->section('script');?>

<script>
    document.getElementById('form_update_region').addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        
        axios.post("<?= base_url('/regiones/update/' . $region['cod_region']) ?>", formData)
            .then(function (response) {
                if(!response.data.error){
                    Swal.fire({
                    title: "Campos Guardados!",
                    text: "Se a actualizado la información de la región correctamente!",
                    icon: "success",
                    willClose: () => {
                        window.location.href = "<?= base_url('/regiones')?>";
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