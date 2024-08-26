<?= $this->extend('template')?>

<?=$this->section('content');?>
    <h1 class="mb-4">Editar Nivel Académico</h1>

        <form action="" method="post" id="form_update_nivel">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Nivel Académico</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($nivel['nombre']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion"><?= esc($nivel['descripcion']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="<?= base_url('/niveles') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
<?= $this->endSection()?>

<?=$this->section('script');?>

<script>
    document.getElementById('form_update_nivel').addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        
        axios.post("<?= base_url('/niveles/update/' . $nivel['cod_nivel_acad']) ?>", formData)
            .then(function (response) {
                if(!response.data.error){
                    Swal.fire({
                    title: "Campos Guardados!",
                    text: "Se a actualizado la información del nivel correctamente!",
                    icon: "success",
                    willClose: () => {
                        window.location.href = "<?= base_url('/niveles')?>";
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