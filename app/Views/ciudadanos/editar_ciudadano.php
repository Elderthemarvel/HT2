<?= $this->extend('template')?>

<?=$this->section('content');?>
<h1 class="mb-4">Editar Ciudadano</h1>

        <form class="row g-3" action="" method="post" id="form_update_ciudadano">
            <div class="col-4">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?= esc($ciudadano['apellido']) ?>" required>
            </div>
            <div class="col-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($ciudadano['nombre']) ?>" required>
            </div>
            <div class="col-4">
                <label for="direccion" class="form-label">Dirección</label>
                <textarea class="form-control" id="direccion" name="direccion" required><?= esc($ciudadano['direccion']) ?></textarea>
            </div>
            <div class="col-4">
                <label for="tel_casa" class="form-label">Teléfono de Casa</label>
                <input type="text" class="form-control" id="tel_casa" name="tel_casa" value="<?= esc($ciudadano['tel_casa']) ?>">
            </div>
            <div class="col-4">
                <label for="tel_movil" class="form-label">Teléfono Móvil</label>
                <input type="text" class="form-control" id="tel_movil" name="tel_movil" value="<?= esc($ciudadano['tel_movil']) ?>" required>
            </div>
            <div class="col-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= esc($ciudadano['email']) ?>">
            </div>
            <div class="col-4">
                <label for="fechanac" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fechanac" name="fechanac" value="<?= esc($ciudadano['fechanac']) ?>" required>
            </div>
            <div class="col-4">
                <label for="cod_nivel_acad" class="form-label">Nivel Académico</label>
                <select class="form-control" id="cod_nivel_acad" name="cod_nivel_acad" required>
                    <?php foreach ($niveles_academicos as $nivel): ?>
                        <option value="<?= esc($nivel['cod_nivel_acad']) ?>" <?= $nivel['cod_nivel_acad'] == $ciudadano['cod_nivel_acad'] ? 'selected' : '' ?>>
                            <?= esc($nivel['nombre']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-4">
                <label for="cod_muni" class="form-label">Municipio</label>
                <select class="form-control" id="cod_muni" name="cod_muni" required>
                    <?php foreach ($municipios as $municipio): ?>
                        <option value="<?= esc($municipio['cod_muni']) ?>" <?= $municipio['cod_muni'] == $ciudadano['cod_muni'] ? 'selected' : '' ?>>
                            <?= esc($municipio['nombre_municipio']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-4">
                <label for="contra" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contra" name="contra" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="<?= base_url('/ciudadanos') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
<?= $this->endSection()?>

<?=$this->section('script');?>

<script>
    document.getElementById('form_update_ciudadano').addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        
        axios.post("<?= base_url('/ciudadanos/update/' . $ciudadano['dpi']) ?>", formData)
            .then(function (response) {
                if(!response.data.error){
                    Swal.fire({
                    title: "Campos Guardados!",
                    text: "Se a actualizado la información del ciudadano correctamente!",
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

</script>

<?= $this->endSection()?>