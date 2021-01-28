<div class="container title">
    <h2>
        <span>ESPECIALISTAS</span>
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
                            <th>Cod. Especialista</th>
                            <th>CI</th>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Edad</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        <?php while($esp = $especialistas->fetch((PDO::FETCH_OBJ))):?>
                        <tr>
                            <td><?= $esp->id ?></td>
                            <td><?= $esp->ci ?></td>
                            <td><?= $esp->nombre ?></td>
                            <td><?= $esp->cargo ?></td>
                            <td><?= $esp->edad ?></td>
                            <td><?= $esp->telefono ?></td>
                            <td>
                                <div class='text-center'>    
                                    <div class='btn-group'>
                                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalEdit' id='btnEdit-especialista'>Editar</button>
                                        <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalDelete' id='btnDelete-especialista'>Eliminar</button>
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
            <h5 class="modal-title" id="modalCreateLabel">Especialista</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?=ROOT?>especialista/create" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="ci" class="col-form-label">CI:</label>
                    <input type="text" class="form-control" name="ci">
                </div>
                <div class="form-group">
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label for="cargo">Cargo</label>
                    <select class="custom-select" name="cargo">
                        <option selected disabled>Seleccione un cargo</option>
                        <?php while($cargo = $cargos->fetch((PDO::FETCH_OBJ))): ?>
                            <option value="<?= $cargo->id?> "><?= $cargo->nombre ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edad" class="col-form-label">Edad:</label>
                    <input type="number" class="form-control" name="edad">
                </div>
                <div class="form-group">
                    <label for="telefono" class="col-form-label">Telefono:</label>
                    <input type="number" class="form-control" name="telefono">
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
            <h5 class="modal-title" id="modalEditLabel">Especialista</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?=ROOT?>especialista/edit" method="POST">
            <div class="modal-body">
                <input type="hidden" name="id" id="edit-id">
                <div class="form-group">
                    <label for="ci" class="col-form-label">CI:</label>
                    <input type="text" class="form-control" name="ci" id="edit-ci">
                </div>
                <div class="form-group">
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="edit-nombre">
                </div>
                <div class="form-group">
                    <label for="cargo">Cargo</label>
                    <select class="custom-select" name="cargo" required>
                        <?php 
                            $cargos = $this->NCargo->index();
                            while($cargo = $cargos->fetch((PDO::FETCH_OBJ))): ?>
                            <option value="<?= $cargo->id?>"><?= $cargo->nombre ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edad" class="col-form-label">Edad:</label>
                    <input type="number" class="form-control" name="edad" id="edit-edad">
                </div>
                <div class="form-group">
                    <label for="telefono" class="col-form-label">Telefono:</label>
                    <input type="number" class="form-control" name="telefono" id="edit-telefono">
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
            <h5 class="modal-title" id="modalDeleteLabel">Eliminar Especialista</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?=ROOT?>especialista/delete" method="POST">
            <div class="modal-body">
                <input type="hidden" name="id" id="delete-id">
                <h4>¿Esta seguro que desea eliminar este especialista?</h4>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="confirm-button">Si</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="refuse-button">No</button>
            </div>
        </form>
        </div>
    </div>
</div>