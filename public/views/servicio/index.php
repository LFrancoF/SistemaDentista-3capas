<div class="container title">
    <h2>
        <span>SERVICIOS</span>
    </h2>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCreate">Nuevo</button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="tablaDatos" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Cod. Servicio</th>
                            <th>Nombre</th>
                            <th>Tipo de Servicio</th>
                            <th>Precio(Bs)</th>
                            <th>Duracion(horas)</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        <?php while($servicio = $servicios->fetch((PDO::FETCH_OBJ))):?>
                        <tr>
                            <td><?= $servicio->id ?></td>
                            <td><?= $servicio->nombre ?></td>
                            <td><?= $servicio->tipo ?></td>
                            <td><?= $servicio->precio ?></td>
                            <td><?= $servicio->duracion ?></td>
                            <td>
                                <div class='text-center'>    
                                    <div class='btn-group'>
                                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalEdit' id='btnEdit-servicio'>Editar</button>
                                        <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalDelete' id='btnDelete-servicio'>Eliminar</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Modal Create-->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalCreateLabel">Servicio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?=ROOT?>servicio/create" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label for="tipo_servicio">Tipo de Servicio</label>
                    <select class="custom-select" name="tipo_servicio">
                        <option selected disabled>Seleccione un tipo</option>
                        <?php while($tipo = $tipos->fetch((PDO::FETCH_OBJ))): ?>
                            <option value="<?= $tipo->id?> "><?= $tipo->nombre ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="precio" class="col-form-label">Precio (Bs):</label>
                    <input type="number" step="any" class="form-control" name="precio">
                </div>
                <div class="form-group">
                    <label for="duracion" class="col-form-label">Duracion (horas):</label>
                    <input type="number" step="any" class="form-control" name="duracion">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!--Modal Edit-->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalEditLabel">Servicio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?=ROOT?>servicio/edit" method="POST">
            <div class="modal-body">
                <input type="hidden" name="id" id="edit-id">
                <div class="form-group">
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="edit-nombre">
                </div>
                <div class="form-group">
                    <label for="tipo_servicio">Tipo de Servicio</label>
                    <select class="custom-select" name="tipo_servicio">
                        <?php $tipos = $this->NTipo_servicio->index();
                            while($tipo = $tipos->fetch((PDO::FETCH_OBJ))): ?>
                            <option value="<?= $tipo->id?>"><?= $tipo->nombre ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="precio" class="col-form-label">Precio (Bs):</label>
                    <input type="number" step="any" class="form-control" name="precio" id="edit-precio">
                </div>
                <div class="form-group">
                    <label for="duracion" class="col-form-label">Duracion (horas):</label>
                    <input type="number" step="any" class="form-control" name="duracion" id="edit-duracion">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!--Modal Delete-->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalDeleteLabel">Eliminar Servicio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?=ROOT?>servicio/delete" method="POST">
            <div class="modal-body">
                <input type="hidden" name="id" id="delete-id">
                <h4>¿Esta seguro que desea eliminar este servicio?</h4>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="confirm-button">Si</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="refuse-button">No</button>
            </div>
        </form>
        </div>
    </div>
</div>