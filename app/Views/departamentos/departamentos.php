<?= $this->extend('template')?>

<?=$this->section('content');?>
<h1 class="mb-4">Departamentos</h1> 
<!-- Button trigger modal -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Nuevo Departamento
    </button>
</div>

<div class="table-container mt-3">

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Región</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($departamentos) && is_array($departamentos)): ?>
            <?php foreach ($departamentos as $departamento): ?>
                <tr>
                    <td><?= esc($departamento['cod_depto']) ?></td>
                    <td><?= esc($departamento['nombre_depto']) ?></td>
                    <td><?= esc($departamento['cod_region']) ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="<?= base_url('/departamentos/edit/' . $departamento['cod_depto']) ?>" type="button"  class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                            <button type="button" onclick="eliminar(<?= $departamento['cod_depto']?>)" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">No hay departamentos registrados.</td>
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
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Departamento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  class="row g-3" action="" method="post" id="form_departamentos">
            <div class="mb-3">
                <label for="nombre_depto" class="form-label">Nombre del Departamento</label>
                <input type="text" class="form-control" id="nombre_depto" name="nombre_depto" required>
            </div>
            <div class="mb-3">
                <label for="cod_region" class="form-label">Región</label>
                <select class="form-control" id="cod_region" name="cod_region" required>
                    <?php foreach ($regiones as $region): ?>
                        <option value="<?= esc($region['cod_region']) ?>"><?= esc($region['nombre']) ?></option>
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
    document.getElementById('form_departamentos').addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        
        axios.post("<?= base_url('departamentos/save')?>", formData)
            .then(function (response) {
                if(!response.data.error){
                    Swal.fire({
                    title: "Campos Guardados!",
                    text: "Se a guardado el departamento correctamente!",
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
        text: "Esta a punto de eliminar definitivamente un ciudadano!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, Eliminar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {

            axios.get("<?= base_url('/departamentos/delete/')?>"+id)
            .then(response => {
                console.log('Respuesta del servidor:', response.data);
                if(!response.data.error){
                    swalWithBootstrapButtons.fire({
                    title: "Eliminado!",
                    text: "El registro ha sido eliminado.",
                    icon: "success",
                    willClose: () => {
                        window.location.href = "<?= base_url('/departamentos')?>";
                    }
                });
                }else{
                    swalWithBootstrapButtons.fire({
                    title: "Opss!",
                    text: "El registro NO ha sido eliminado.",
                    icon: "error"
                });
                }
                
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