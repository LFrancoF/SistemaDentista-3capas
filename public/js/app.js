$(document).ready( function () {

    const ROOT = "https://localhost/ArquiSoftware/Dentista-3capas/";

    $('#tablaDatos').DataTable({
        "columnDefs":[{
            "targets":0,
            "width":"10%"
        }],
        "language":{
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sSearch":         "Buscar:",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        }
    });

    //Modales editar y eliminar pacientes
    var fila;
    $(document).on("click","#btnEdit-paciente",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#edit-id').val(data[0]);
        $('#edit-ci').val(data[1]);
        $('#edit-nombre').val(data[2]);
        $('#edit-edad').val(data[3]);
        $('#edit-telefono').val(data[4]);
    });

    $(document).on("click","#btnDelete-paciente",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#delete-id').val(data[0]);
    });

    //Modales editar y eliminar cargos
    $(document).on("click","#btnEdit-cargo",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#edit-id').val(data[0]);
        $('#edit-nombre').val(data[1]);
        $('#edit-descripcion').val(data[2]);
    });

    $(document).on("click","#btnDelete-cargo",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#delete-id').val(data[0]);
    });

    //Modales editar y eliminar especialistas
    $(document).on("click","#btnEdit-especialista",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#edit-id').val(data[0]);
        $('#edit-ci').val(data[1]);
        $('#edit-nombre').val(data[2]);
        $('#edit-edad').val(data[4]);
        $('#edit-telefono').val(data[5]);
    });

    $(document).on("click","#btnDelete-especialista",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#delete-id').val(data[0]);
    });

    //Modales editar y eliminar productos
    $(document).on("click","#btnEdit-producto",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#edit-id').val(data[0]);
        $('#edit-nombre').val(data[1]);
        $('#edit-precio').val(data[2]);
        $('#edit-marca').val(data[3]);
        $('#edit-descripcion').val(data[4]);
    });

    $(document).on("click","#btnDelete-producto",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#delete-id').val(data[0]);
    });

    //Modales editar y eliminar tipos de servicio
    $(document).on("click","#btnEdit-tipo_servicio",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#edit-id').val(data[0]);
        $('#edit-nombre').val(data[1]);
        $('#edit-descripcion').val(data[2]);
    });

    $(document).on("click","#btnDelete-tipo_servicio",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#delete-id').val(data[0]);
    });

    //Modales editar y eliminar servicios
    $(document).on("click","#btnEdit-servicio",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#edit-id').val(data[0]);
        $('#edit-nombre').val(data[1]);
        $('#edit-precio').val(data[3]);
        $('#edit-duracion').val(data[4]);
    });

    $(document).on("click","#btnDelete-servicio",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#delete-id').val(data[0]);
    });

    //------------------------------------VENTA-----------------------------
    var ci;
    //Autollenar los campos al seleccionar el Ci de un paciente en una venta
    $(document).on("change","#ci-paciente",function(){
        id = $("#ci-paciente option:selected").val();
        $.ajax({
            url: ROOT+'ajax.php',
            data: {id_paciente : id},
            type: 'POST',
            success: function(data){
                let paciente = JSON.parse(data);
                $('#id-paciente').val(paciente[0].id);
                $('#nombre-paciente').val(paciente[0].nombre);
                $('#edad-paciente').val(paciente[0].edad);
                $('#telefono-paciente').val(paciente[0].telefono);
            }
        })
    });

    //Autollenar los campos al seleccionar el Ci de un especialista en una venta
    $(document).on("change","#ci-especialista",function(){
        id = $("#ci-especialista option:selected").val();
        $.ajax({
            url: ROOT+'ajax.php',
            data: {id_especialista : id},
            type: 'POST',
            success: function(data){
                let especialista = JSON.parse(data);
                $('#id-especialista').val(especialista[0].id);
                $('#nombre-especialista').val(especialista[0].nombre);
                $('#cargo-especialista').val(especialista[0].edad);
                $('#edad-especialista').val(especialista[0].edad);
                $('#telefono-especialista').val(especialista[0].telefono);
            }
        })
    });

    //Autollenar los campos al seleccionar el producto para añadir al detalle de venta
    $(document).on("change","#nombre-producto",function(){
        prod = $("#nombre-producto option:selected").val();
        $.ajax({
            url: ROOT+'ajax.php',
            data: {id_prod : prod},
            type: 'POST',
            success: function(data){
                let producto = JSON.parse(data);
                $('#id-producto').val(producto[0].id);
                $('#cantidad-producto').val(1);
                $('#precio-producto').val(producto[0].precio);
                $('#add-producto').css('display','');
            }
        })
    });

    //agregar producto al detalle
    $(document).on("click","#add-producto",function(){
        fila = $(this).closest("tr");
        var nombre = fila.find("#nombre-producto option:selected").text();
        var id = fila.find("#id-producto").val();
        var cantidad = fila.find("#cantidad-producto").val();
        var precio = fila.find("#precio-producto").val();
        var precio_detalle = precio * cantidad;
        var template=`
            <tr>
                <td>${nombre}</td>
                <td class="id-detalle">${id}</td>
                <td class="cantidad-detalle">${cantidad}</td>
                <td class="precio-detalle">${precio_detalle}</td>
                <td> <button type="button" class="btn btn-danger" id="quitar-producto">Quitar</button> </td>
            </tr>
        `;
        $("#detalle-venta").append(template);
        template=`
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: right">TOTAL : </td>
                <td><b id="monto">${getPrecioTotal()}</b><b> Bs.</b></td>
                <td></td>
            </tr>
        `;
        $("#detalle-total").html(template);
        $("#btn-generar-venta").css('display','');
    });

    //quitar producto del detalle
    $(document).on("click","#quitar-producto",function(){
        fila = $(this).closest("tr");
        precio = fila.find(".precio-detalle").html();
        $(this).closest("tr").remove();
        template=`
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: right">TOTAL : </td>
                <td><b id="monto">${getPrecioTotal()}</b><b> Bs.</b></td>
                <td></td>
            </tr>
        `;
        $("#detalle-total").html(template);
        if(getPrecioTotal() == 0){
            $("#btn-generar-venta").css('display','none');
        }
    });

    //guardar cabecera de nota de venta y sus detalles
    $(document).on("click","#btn-generar-venta",function(){
        var id_paciente = $("#id-paciente").val();
        var id_especialista = $("#id-especialista").val();
        var observacion = $("#observacion").val();
        var monto = $("#monto").text();
        
        //recorremos la tabla de detalles y guardamos los datos en un array
        var productos = [];
        $("#tabla-detalle tbody tr").each(function(index){
            var fila_prod = [];
            var id = $(this).find(".id-detalle").html(); 
            fila_prod.push(id);
            var cant = $(this).find(".cantidad-detalle").html();
            fila_prod.push(cant);
            var precio = $(this).find(".precio-detalle").html();
            fila_prod.push(precio);
            productos.push(fila_prod);
        });

        $.ajax({
            url: ROOT+'ajax.php',
            data: {id_paciente:id_paciente, id_especialista:id_especialista, observacion:observacion, monto:monto, detalle:productos},
            type: 'POST',
            success: function(data){
                //llamamos al index de presentacion de esta forma para limpiar la URL
                location.href = ROOT+"nota_venta/index";
            }
        })
    });

    //Funcion para sumar los precios de la tabla de detalle
    function getPrecioTotal(){
        var precioTotal = 0;
        $("#tabla-detalle tbody tr").each(function(index){
            var precio = $(this).find(".precio-detalle").html();
            precioTotal += parseFloat(precio);
        });
        return precioTotal;
    }

    //cargamos los detalles de la nota de venta seleccionada
    loadDetalles();
    function loadDetalles(){
        var id_v = $("#venta-id-edit b").html();
        var ele = $("#venta-id-edit b");
        //si hay un ID arriba llamamos a los detalles de este id de venta
        if(ele.length > 0){
            $.ajax({
                url: ROOT+'ajax.php',
                data: {id_v:id_v},
                type: 'POST',
                success: function(data){
                    let productos = JSON.parse(data);
                    productos.forEach(prod => {
                        var template=`
                            <tr>
                                <td>${prod.nombre}</td>
                                <td class="id-detalle">${prod.id_producto}</td>
                                <td class="cantidad-detalle">${prod.cantidad}</td>
                                <td class="precio-detalle">${prod.precio}</td>
                                <td> <button type="button" class="btn btn-danger" id="quitar-producto">Quitar</button> </td>
                            </tr>
                        `;
                        $("#detalle-venta").append(template);
                    });
                    template=`
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align: right">TOTAL : </td>
                            <td><b id="monto">${getPrecioTotal()}</b><b> Bs.</b></td>
                            <td></td>
                        </tr>
                    `;
                    $("#detalle-total").html(template);
                    $("#btn-generar-venta").css('display','');
                }
            })
        }
    }

    //editar cabecera de nota de venta y sus detalles
    $(document).on("click","#btn-edit-venta",function(){
        var id_venta = $("#venta-id-edit b").html();
        var id_paciente = $("#ci-paciente option:selected").val();
        var id_especialista = $("#ci-especialista option:selected").val();
        var observacion = $("#observacion").val();
        var monto = $("#monto").text();
        
        //recorremos la tabla de detalles y guardamos los datos en un array
        var productos = [];
        $("#tabla-detalle tbody tr").each(function(index){
            var fila_prod = [];
            var id = $(this).find(".id-detalle").html(); 
            fila_prod.push(id);
            var cant = $(this).find(".cantidad-detalle").html();
            fila_prod.push(cant);
            var precio = $(this).find(".precio-detalle").html();
            fila_prod.push(precio);
            productos.push(fila_prod);
        });

        $.ajax({
            url: ROOT+'ajax.php',
            data: {id_venta:id_venta, id_paciente:id_paciente, id_especialista:id_especialista, observacion:observacion, monto:monto, detalle:productos},
            type: 'POST',
            success: function(data){
                //llamamos al index de presentacion de esta forma para limpiar la URL
                location.href = ROOT+"nota_venta/index";
            }
        })
    });

    //Eliminar nota de venta con Modal
    $(document).on("click","#btnDelete-venta",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#delete-id').val(data[0]);
    });

    //------------------------------------CONSULTA-----------------------------
    //Autollenar los campos al seleccionar el servicio para añadir al detalle de consulta
    $(document).on("change","#nombre-servicio",function(){
        serv = $("#nombre-servicio option:selected").val();
        $.ajax({
            url: ROOT+'ajax.php',
            data: {id_serv : serv},
            type: 'POST',
            success: function(data){
                let servicio = JSON.parse(data);
                $('#id-servicio').val(servicio[0].id);
                $('#cantidad-servicio').val(1);
                $('#precio-servicio').val(servicio[0].precio);
                $('#add-servicio').css('display','');
            }
        })
    });

    //agregar servicio al detalle
    $(document).on("click","#add-servicio",function(){
        fila = $(this).closest("tr");
        var nombre = fila.find("#nombre-servicio option:selected").text();
        var id = fila.find("#id-servicio").val();
        var cantidad = fila.find("#cantidad-servicio").val();
        var precio = fila.find("#precio-servicio").val();
        var precio_detalle = precio * cantidad;
        var template=`
            <tr>
                <td>${nombre}</td>
                <td class="id-detalle">${id}</td>
                <td class="cantidad-detalle">${cantidad}</td>
                <td class="precio-detalle">${precio_detalle}</td>
                <td> <button type="button" class="btn btn-danger" id="quitar-servicio">Quitar</button> </td>
            </tr>
        `;
        $("#detalle-consulta").append(template);
        template=`
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: right">TOTAL : </td>
                <td><b id="monto">${getPrecioTotal()}</b><b> Bs.</b></td>
                <td></td>
            </tr>
        `;
        $("#detalle-total").html(template);
        $("#btn-generar-consulta").css('display','');
    });

    //quitar servicio del detalle
    $(document).on("click","#quitar-servicio",function(){
        fila = $(this).closest("tr");
        precio = fila.find(".precio-detalle").html();
        $(this).closest("tr").remove();
        template=`
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: right">TOTAL : </td>
                <td><b id="monto">${getPrecioTotal()}</b><b> Bs.</b></td>
                <td></td>
            </tr>
        `;
        $("#detalle-total").html(template);
        if(getPrecioTotal() == 0){
            $("#btn-generar-consulta").css('display','none');
        }
    });

    //guardar cabecera de ficha consulta y sus detalles
    $(document).on("click","#btn-generar-consulta",function(){
        var id_paciente = $("#id-paciente").val();
        var id_especialista = $("#id-especialista").val();
        var estado = $("#estado").val();
        var monto = $("#monto").text();
        
        //recorremos la tabla de detalles y guardamos los datos en un array
        var servicios = [];
        $("#tabla-detalle tbody tr").each(function(index){
            var fila_serv = [];
            var id = $(this).find(".id-detalle").html(); 
            fila_serv.push(id);
            var cant = $(this).find(".cantidad-detalle").html();
            fila_serv.push(cant);
            var precio = $(this).find(".precio-detalle").html();
            fila_serv.push(precio);
            servicios.push(fila_serv);
        });

        $.ajax({
            url: ROOT+'ajax.php',
            data: {id_paciente:id_paciente, id_especialista:id_especialista, estado:estado, monto:monto, detalle:servicios},
            type: 'POST',
            success: function(data){
                //llamamos al index de presentacion de esta forma para limpiar la URL
                location.href = ROOT+"ficha_consulta/index";
            }
        })
    });

    //cargamos los detalles de la ficha consulta seleccionada
    loadDetallesConsulta();
    function loadDetallesConsulta(){
        var id_c = $("#consulta-id-edit b").html();
        var ele = $("#consulta-id-edit b");
        //si hay un ID arriba llamamos a los detalles de este id de consulta
        if(ele.length > 0){
            $.ajax({
                url: ROOT+'ajax.php',
                data: {id_c:id_c},
                type: 'POST',
                success: function(data){
                    let servicios = JSON.parse(data);
                    servicios.forEach(serv => {
                        var template=`
                            <tr>
                                <td>${serv.nombre}</td>
                                <td class="id-detalle">${serv.id_servicio}</td>
                                <td class="cantidad-detalle">${serv.cantidad}</td>
                                <td class="precio-detalle">${serv.precio}</td>
                                <td> <button type="button" class="btn btn-danger" id="quitar-servicio">Quitar</button> </td>
                            </tr>
                        `;
                        $("#detalle-consulta").append(template);
                    });
                    template=`
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align: right">TOTAL : </td>
                            <td><b id="monto">${getPrecioTotal()}</b><b> Bs.</b></td>
                            <td></td>
                        </tr>
                    `;
                    $("#detalle-total").html(template);
                    $("#btn-generar-consulta").css('display','');
                }
            })
        }
    }

    //editar cabecera de ficha consulta y sus detalles
    $(document).on("click","#btn-edit-consulta",function(){
        var id_consulta = $("#consulta-id-edit b").html();
        var id_paciente = $("#ci-paciente option:selected").val();
        var id_especialista = $("#ci-especialista option:selected").val();
        var estado = $("#estado").val();
        var monto = $("#monto").text();
        
        //recorremos la tabla de detalles y guardamos los datos en un array
        var servicios = [];
        $("#tabla-detalle tbody tr").each(function(index){
            var fila_serv = [];
            var id = $(this).find(".id-detalle").html(); 
            fila_serv.push(id);
            var cant = $(this).find(".cantidad-detalle").html();
            fila_serv.push(cant);
            var precio = $(this).find(".precio-detalle").html();
            fila_serv.push(precio);
            servicios.push(fila_serv);
        });

        $.ajax({
            url: ROOT+'ajax.php',
            data: {id_consulta:id_consulta, id_paciente:id_paciente, id_especialista:id_especialista, estado:estado, monto:monto, detalle:servicios},
            type: 'POST',
            success: function(data){
                //llamamos al index de presentacion de esta forma para limpiar la URL
                location.href = ROOT+"ficha_consulta/index";
            }
        })
    });

    //Eliminar consulta con Modal
    $(document).on("click","#btnDelete-consulta",function(){
        fila = $(this).closest("tr");
        var data = fila.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#delete-id').val(data[0]);
    });

} );