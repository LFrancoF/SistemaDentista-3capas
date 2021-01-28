<!-- Begin Page Content -->
<div class="container-fluid">
    <h4 id="venta-id-edit">ID:<?= isset($venta) && is_object($venta) ? "<b>".$venta->id."</b>" : '' ?></h4>
    <div class="row">
        <div class="col-lg-12">
            
                <div class="form-group">
                    <h4 class="text-center">Paciente</h4>
                </div>
                <div class="card venta">
                    <div class="card-body">
                        <form class="form-inline">
                            <input type="hidden" name="id-paciente" id="id-paciente">
                            <div class="form-group">
                                <label for="ci">CI:</label>
                                <select class="custom-select" name="ci-paciente" id="ci-paciente">
                                    <option selected disabled>Seleccione un paciente</option>
                                    <?php while($paciente = $pacientes->fetch((PDO::FETCH_OBJ))): ?>
                                        <option value="<?= $paciente->id?>" <?=isset($paciente_edit) && is_object($paciente_edit) && $paciente->id == $paciente_edit->id ? 'selected' : '';?>><?= $paciente->ci ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" id ="nombre-paciente" value="<?= isset($paciente_edit) && is_object($paciente_edit) ? $paciente_edit->nombre : '' ?>"  disabled>
                            </div>
                            <div class="form-group">
                                <label for="edad" class="col-form-label">Edad:</label>
                                <input type="number" class="form-control" name="edad" id ="edad-paciente" value="<?= isset($paciente_edit) && is_object($paciente_edit) ? $paciente_edit->edad : '' ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-form-label">Telefono:</label>
                                <input type="text" class="form-control" name="telefono" id ="telefono-paciente" value="<?= isset($paciente_edit) && is_object($paciente_edit) ? $paciente_edit->telefono : '' ?>" disabled>
                            </div>
                        </form>
                    </div>
                </div>

                </br>

                <div class="form-group">
                    <h4 class="text-center">Especialista</h4>
                </div>
                <div class="card venta">
                    <div class="card-body">
                        <form class="form-inline">
                            <input type="hidden" name="id-especialista" id="id-especialista">
                            <div class="form-group">
                                <label for="ci">CI:</label>
                                <select class="custom-select" name="ci-especialista" id="ci-especialista">
                                    <option selected disabled>Seleccione un especialista</option>
                                    <?php while($esp = $especialistas->fetch((PDO::FETCH_OBJ))): ?>
                                        <option value="<?= $esp->id?>" <?=isset($especialista_edit) && is_object($especialista_edit) && $esp->id == $especialista_edit->id ? 'selected' : '';?>><?= $esp->ci ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" id="nombre-especialista" value="<?= isset($especialista_edit) && is_object($especialista_edit) ? $especialista_edit->nombre : '' ?>"  disabled>
                            </div>
                            <div class="form-group">
                                <label for="cargo" class="col-form-label">Cargo:</label>
                                <input type="text" class="form-control" name="cargo" id="cargo-especialista" value="<?= isset($especialista_edit) && is_object($especialista_edit) ? $especialista_edit->cargo : '' ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="edad" class="col-form-label">Edad:</label>
                                <input type="number" class="form-control" name="edad" id="edad-especialista" value="<?= isset($especialista_edit) && is_object($especialista_edit) ? $especialista_edit->edad : '' ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-form-label">Telefono:</label>
                                <input type="text" class="form-control" name="telefono" id="telefono-especialista" value="<?= isset($especialista_edit) && is_object($especialista_edit) ? $especialista_edit->telefono : '' ?>" disabled>
                            </div>
                        </form>
                    </div>
                </div>
                
                </br>

                <div class="form-group">
                    <div class="form-group">
                        <label for="observacion" class="col-form-label">Observacion:</label>
                        <textarea name="observacion" id="observacion" cols="40"><?= isset($venta) && is_object($venta) ? $venta->observacion : '' ?></textarea>
                    </div>
                </div>

                <h4 class="text-center">Detalle Venta</h4>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th min-width="200px">Producto</th>
                                <th class="textright">Id</th>
                                <th class="textright">Cantidad</th>
                                <th class="textright">Precio(Bs)</th>
                                <th>l--------------l</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <select class="custom-select" name="nombre" id="nombre-producto">
                                    <option selected disabled>Seleccione un producto</option>
                                    <?php while($prod = $productos->fetch((PDO::FETCH_OBJ))): ?>
                                        <option value="<?= $prod->id?> "><?= $prod->nombre ?></option>
                                    <?php endwhile; ?>
                                </select>
                                </td>
                                <td>
                                    <input type="number" name="" id="id-producto" disabled>
                                </td>
                                <td>
                                    <input type="number" name="" id="cantidad-producto" required>
                                </td>
                                <td>
                                    <input type="number" step="any" name="" id="precio-producto" required>
                                </td>
                                <td>
                                    <button type="button" id="add-producto" class="btn btn-info" style="display: none">Agregar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover" id="tabla-detalle">
                        <thead class="thead-dark">
                            <tr>
                                <th min-width="200px">Productos</th>
                                <th>Id</th>
                                <th>Cantidades</th>
                                <th>Precio(Bs)</th>
                                <th>l------l</th>
                            </tr>
                        </thead>
                        <tbody id="detalle-venta">
                            <!--AJAX productos agregados-->
                        </tbody>

                        <tfoot id="detalle-total">
                            <!-- AJAX total -->
                        </tfoot>
                    </table>
                </div>
                </br>
                <div class="row">
                    <div class="col-lg-6">
                        <div id="acciones_venta" class="form-group">
                            <?php if(isset($venta) && is_object($venta)): ?>
                                <button class="btn btn-primary" id="btn-edit-venta" style="float:right;"><i class="fas fa-save"></i> Edit Venta</button>
                            <?php else: ?>
                                <button class="btn btn-primary" id="btn-generar-venta" style="float:right; display:none"><i class="fas fa-save"></i> Generar Venta</button>
                            <?php endif; ?>
                            <a href="<?=ROOT?>nota_venta/index" class="btn btn-danger" id="btn_anular_venta" style="float:right">Anular</a>
                        </div>
                    </div>
                </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->