<div class="container title">
    <h2>
        <span>TIPOS DE SERVICIO</span>
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
                            <th>Cod. Tipo Servicio</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="list-data">
                        <?php while($tipo = $tipos->fetch((PDO::FETCH_OBJ))):?>
                        <tr>
                            <td><?= $tipo->id ?></td>
                            <td><?= $tipo->nombre ?></td>
                            <td><?= $tipo->descripcion ?></td>
                            <td>
                                <div class='text-center'>    
                                    <div class='btn-group'>
                                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalEdit' id='btnEdit-tipo_servicio'>Editar</button>
                                        <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#modalDelete' id='btnDelete-tipo_servicio'>Eliminar</button>
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
            <h5 class="modal-title" id="modalCreateLabel">Tipo de Servicio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?=ROOT?>tipo_servicio/create" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-form-label">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion">
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
            <h5 class="modal-title" id="modalEditLabel">Tipo de Servicio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?=ROOT?>tipo_servicio/edit" method="POST">
            <div class="modal-body">
                <input type="hidden" name="id" id="edit-id">
                <div class="form-group">
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="edit-nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-form-label">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" id="edit-descripcion">
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
            <h5 class="modal-title" id="modalDeleteLabel">Eliminar Tipo de Servicio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?=ROOT?>tipo_servicio/delete" method="POST">
            <div class="modal-body">
                <input type="hidden" name="id" id="delete-id">
                <h4>¿Esta seguro que desea eliminar este tipo de servicio?</h4>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="confirm-button">Si</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="refuse-button">No</button>
            </div>
        </form>
        </div>
    </div>
</div>