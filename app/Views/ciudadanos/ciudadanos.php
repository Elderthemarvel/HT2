<?= $this->extend('template')?>

<?=$this->section('content');?>
<h1 class="mb-4">Ciudadanos</h1> 
<!-- Button trigger modal -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Nuevo Ciudadano
    </button>
</div>

<div class="table-container mt-3">
    <table class="table table-striped table-hover">
        </thead>
            <tr>
                <th>DPI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th>Tel. Casa</th>
                <th>Tel. Móvil</th>
                <th>Email</th>
                <th>Fecha Nac.</th>
                <th>Nivel Académico</th>
                <th>Municipio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($ciudadanos) && is_array($ciudadanos)): ?>
        <?php foreach ($ciudadanos as $ciudadano): ?>
            <tr>
                <td><?= esc($ciudadano['dpi']) ?></td>
                <td><?= esc($ciudadano['nombre']) ?></td>
                <td><?= esc($ciudadano['apellido']) ?></td>
                <td><?= esc($ciudadano['direccion']) ?></td>
                <td><?= esc($ciudadano['tel_casa']) ?></td>
                <td><?= esc($ciudadano['tel_movil']) ?></td>
                <td><?= esc($ciudadano['email']) ?></td>
                <td><?= esc($ciudadano['fechanac']) ?></td>
                <td><?= esc($ciudadano['cod_nivel_acad']) ?></td>
                <td><?= esc($ciudadano['cod_muni']) ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="<?= base_url('ciudadanos/edit/').$ciudadano['dpi'] ?>" type="button"  class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                        <button type="button" onclick="eliminar(<?= $ciudadano['dpi']?>)" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="11" class="text-center">No hay ciudadanos registrados.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Ciudadano</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  class="row g-3" action="" method="post" id="form_ciudadano">
            <div class="col-2">
                <label for="dpi" class="form-label">DPI</label>
                <input type="text" class="form-control" id="dpi" name="dpi" required>
            </div>
            <div class="col-5">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="col-5">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="col-12">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="col-4">
                <label for="tel_casa" class="form-label">Teléfono de Casa</label>
                <input type="text" class="form-control" id="tel_casa" name="tel_casa">
            </div>
            <div class="col-4">
                <label for="tel_movil" class="form-label">Teléfono Móvil</label>
                <input type="text" class="form-control" id="tel_movil" name="tel_movil" required>
            </div>
            <div class="col-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="col-4">
                <label for="fechanac" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fechanac" name="fechanac" required>
            </div>
            <div class="col-4">
                <label for="cod_nivel_acad" class="form-label">Nivel Académico</label>
                <select class="form-control" id="cod_nivel_acad" name="cod_nivel_acad" required>
                    <?php foreach ($niveles_academicos as $nivel): ?>
                        <option value="<?= esc($nivel['cod_nivel_acad']) ?>"><?= esc($nivel['nombre']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-4">
                <label for="cod_muni" class="form-label">Municipio</label>
                <select class="form-control" id="cod_muni" name="cod_muni" required>
                    <?php foreach ($municipios as $municipio): ?>
                        <option value="<?= esc($municipio['cod_muni']) ?>"><?= esc($municipio['nombre_municipio']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-4">
                <label for="contra" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contra" name="contra" required>
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
    document.getElementById('form_ciudadano').addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        
        axios.post("<?= base_url('ciudadanos/save')?>", formData)
            .then(function (response) {
                if(!response.data.error){
                    Swal.fire({
                    title: "Campos Guardados!",
                    text: "Se a guardado el ciudadano correctamente!",
                    icon: "success",
                    willClose: () => {
                        window.location.href = "<?= base_url('/ciudadanos')?>";
                    }
                    });
                }else{
                    Swal.fire({
                    title: "Opss!",
                    text: "No fue posible guardar los datos!",
                    icon: "error"
                    });
                }
                document.getElementById('responseText').innerHTML = response.data;
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

            axios.get("<?= base_url('/ciudadanos/delete/')?>"+id)
            .then(response => {
                console.log('Respuesta del servidor:', response.data);
                swalWithBootstrapButtons.fire({
                    title: "Eliminado!",
                    text: "El registro ha sido eliminado.",
                    icon: "success",
                    willClose: () => {
                        window.location.href = "<?= base_url('/ciudadanos')?>";
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