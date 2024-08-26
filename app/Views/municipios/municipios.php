<?= $this->extend('template')?>

<?=$this->section('content');?>
<h1 class="mb-4">Municipios</h1> 
<!-- Button trigger modal -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Nuevo Municipio
    </button>
</div>

<div class="table-container mt-3">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($municipios) && is_array($municipios)): ?>
                <?php foreach ($municipios as $municipio): ?>
                    <tr>
                        <td><?= esc($municipio['cod_muni']) ?></td>
                        <td><?= esc($municipio['nombre_municipio']) ?></td>
                        <td><?= esc($municipio['cod_depto']) ?></td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="<?= base_url('/municipios/edit/' . $municipio['cod_muni']) ?>" type="button"  class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                            <button type="button" onclick="eliminar(<?= $municipio['cod_muni']?>)" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No hay municipios registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Municipio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  class="row g-3" action="" method="post" id="form_municipio">
            
            <div class="mb-3">
                <label for="nombre_municipio" class="form-label">Nombre del Municipio</label>
                <input type="text" class="form-control" id="nombre_municipio" name="nombre_municipio" required>
            </div>
            <div class="mb-3">
                <label for="cod_depto" class="form-label">Departamento</label>
                <select class="form-control" id="cod_depto" name="cod_depto" required>
                    <?php foreach ($departamentos as $departamento): ?>
                        <option value="<?= esc($departamento['cod_depto']) ?>"><?= esc($departamento['nombre_depto']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>



<?= $this->endSection()?>

<?=$this->section('script');?>

<script>
    document.getElementById('form_municipio').addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        
        axios.post("<?= base_url('municipios/save')?>", formData)
            .then(function (response) {
                if(!response.data.error){
                    Swal.fire({
                    title: "Campos Guardados!",
                    text: "Se a guardado el municipio correctamente!",
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

    function eliminar(id) {

        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
        title: "Esta seguro?",
        text: "Esta a punto de eliminar definitivamente un municipio!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, Eliminar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {

            axios.get("<?= base_url('/municipios/delete/')?>"+id)
            .then(response => {
                console.log('Respuesta del servidor:', response.data);
                swalWithBootstrapButtons.fire({
                    title: "Eliminado!",
                    text: "El registro ha sido eliminado.",
                    icon: "success",
                    willClose: () => {
                        window.location.href = "<?= base_url('/municipios')?>";
                    }
                });
            })
            .catch(error => {
                console.error('Error al enviar el DPI:', error);
            });


            
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire({
            title: "Cancelado",
            text: "Tu registro esta asalbo :)",
            icon: "error"
            });
        }
        });
        
    }
</script>

<?= $this->endSection()?>