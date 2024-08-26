<?= $this->extend('template')?>

<?=$this->section('content');?>
<h1 class="mb-4">Niveles Académicos</h1> 
<!-- Button trigger modal -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Nuevo Nivel Académico
    </button>
</div>

<div class="table-container mt-3">

    <table class="table table-striped table-hover">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
        </thead>
        <tbody>
                <?php if (!empty($niveles) && is_array($niveles)): ?>
                    <?php foreach ($niveles as $nivel): ?>
                        <tr>
                            <td><?= esc($nivel['cod_nivel_acad']) ?></td>
                            <td><?= esc($nivel['nombre']) ?></td>
                            <td><?= esc($nivel['descripcion']) ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="<?= base_url('niveles/edit/').$nivel['cod_nivel_acad']?>" type="button"  class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    <button type="button" onclick="eliminar(<?= $nivel['cod_nivel_acad']?>)" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay niveles académicos registrados.</td>
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
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Nivel Académico</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  class="row g-3" action="" method="post" id="form_nivel">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Nivel Académico</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
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
    document.getElementById('form_nivel').addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        
        axios.post("<?= base_url('niveles/save')?>", formData)
            .then(function (response) {
                if(!response.data.error){
                    Swal.fire({
                    title: "Campos Guardados!",
                    text: "Se a guardado el nivel correctamente!",
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
        text: "Esta a punto de eliminar definitivamente un nivel academico!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, Eliminar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {

            axios.get("<?= base_url('/niveles/delete/')?>"+id)
            .then(response => {
                console.log('Respuesta del servidor:', response.data);
                swalWithBootstrapButtons.fire({
                    title: "Eliminado!",
                    text: "El registro ha sido eliminado.",
                    icon: "success",
                    willClose: () => {
                        window.location.href = "<?= base_url('/niveles')?>";
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