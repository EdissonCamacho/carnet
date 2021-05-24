$(document).ready(function() {

    cargarRh(1, "", "");
    cargarDependencias(1, "", "");
    cargarTablaP();
    var respuesta;



    function limpiarModalRegistro() {

        $("#txtDocumento").val(" ");
        $("#txtNombres").val(" ");
        $("#txtApellidos").val(" ");
        $("#txtDireccion").val(" ");
        $("#txtTelefono").val(" ");
        $("#txtUrl").val(" ");







    }

    $("#btn-CrearUsuario").click(function() {

        limpiarModalRegistro();



    })


    function limpiarModalModificar() {
        $("#txtDocumentoMod").val(" ");
        $("#txtNombresMod").val(" ");
        $("#txtApellidosMod").val(" ");
        $("#txtDireccionMod").val(" ");
        $("#txtTelefonoMod").val(" ");
        $("#txtUrlMod").val(" ");

    }


    function cargarRh(opcion, rh, principal) {

        var mensaje = "ok";

        var objData = new FormData();
        objData.append("cargarRh", mensaje);

        $.ajax({
            url: "control/controlUsuario.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (opcion == 1 && rh == "" && principal == "") {

                    var concantenar = "";




                    respuesta.forEach(cargarRh);







                    function cargarRh(item, index) {


                        concantenar += '<option value="' + item.idRh + '">' + item.rh + '</option>';








                    }
                    $("#sel1").html(concantenar);

                } else if (opcion == 2 && rh !== "" && principal !== "")

                {



                    var unir = "";

                    respuesta.forEach(cargarRh);









                    function cargarRh(item, index) {

                        if (item.rh == rh) {



                        } else {
                            unir += '<option value="' + item.idRh + '">' + item.rh + '</option>';
                        }









                    }


                    $("#rhMod").html(principal + unir);








                }











            }




        })


    }


    function cargarDependencias(opcion, dependencia, principal) {

        var mensaje = "cargarDependencias";


        var objData = new FormData();
        objData.append("cargarDependencias", mensaje);

        $.ajax({
            url: "control/controlUsuario.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (opcion == 1) {
                    var concantenar = "";

                    respuesta.forEach(cargarDepen);

                    function cargarDepen(item, index) {

                        concantenar += '<option value="' + item.idDependencia + '">' + item.nombreDependencia + '</option>';


                    }

                    $("#listD").html(concantenar);

                } else if (opcion == 2) {

                    var unir = "";

                    respuesta.forEach(fusionar)

                    function fusionar(item, index) {

                        if (item.nombreDependencia != dependencia) {
                            unir += '<option value="' + item.idDependencia + '">' + item.nombreDependencia + '</option>';

                        }





                    }


                    $("#selectModDependencia").html(principal + unir);

                }












            }

        })



    }



    $("#btnGuardar").click(function() {
        var idRh = document.getElementById("sel1").value; // seleccionar valores de un list
        var idDependencia = document.getElementById("listD").value;

        var documento = $("#txtDocumento").val();
        var nombre = $("#txtNombres").val();
        var apellido = $("#txtApellidos").val();
        var direccion = $("#txtDireccion").val();
        var telefono = $("#txtTelefono").val();
        var url = $("#txtUrl").val();


        var objData = new FormData();

        objData.append("documento", documento);
        objData.append("nombre", nombre);
        objData.append("apellido", apellido);
        objData.append("direccion", direccion);
        objData.append("telefono", telefono);
        objData.append("url", url);
        objData.append("idDependencia", idDependencia);
        objData.append("idRh", idRh);

        $.ajax({
            url: "control/controlUsuario.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {


                if (respuesta == "ok") {


                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Registrado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    cargarTablaP();
                    limpiarModalRegistro();

                } else {

                    alert(respuesta);


                }








            }

        })










    })


    function cargarTablaP() {

        var mensaje = "ok";
        var objData = new FormData();

        objData.append("cargarTabla", mensaje);


        $.ajax({
            url: "control/controlUsuario.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                var concatenar = "";

                respuesta.forEach(proceso);

                function proceso(item, index) {


                    concatenar += '<tr>';
                    concatenar += '<td>' + item.documento + '</td>';
                    concatenar += '<td>' + item.nombres + '</td>';
                    concatenar += '<td>' + item.apellidos + '</td>';
                    concatenar += '<td>' + item.direccion + '</td>';
                    concatenar += '<td>' + item.telefono + '</td>';
                    concatenar += ' <td>' + item.url + '</td>';
                    concatenar += '<td>' + item.nombreDependencia + '</td>';
                    concatenar += '<td>' + item.rh + '</td>';
                    concatenar += '<td>';
                    concatenar += '<td><div class="btn-group">';
                    concatenar += '<button id="modUsuario" type="button" class="btn btn-success" idUsuario="' + item.idUsuario + '" documento="' + item.documento + '" nombres="' + item.nombres + '" apellidos="' + item.apellidos + '" direccion="' + item.direccion + '" telefono="' + item.telefono + '" url="' + item.url + '" nombreDependencia="' + item.nombreDependencia + '" idDependencia="' + item.idDependencia + '" rh="' + item.rh + '" idRh="' + item.idRh + '" data-toggle="modal" data-target="#ModalModUsuarios" ><span class="glyphicon glyphicon-pencil"></span></button>';
                    concatenar += '<button id="eliminarUsuario" type="button" class="btn btn-danger" idUsuario="' + item.idUsuario + '"><span class="glyphicon glyphicon-minus"></span></button>';
                    concatenar += '<a href="#" class="btn btn-info">PDF</a>';

                    concatenar += '</td>';
                    concatenar += '</tr>';


                }

                $("#contenidoTablaUsuarios").html(concatenar);






            }

        })






    }


    var idModUsuario = "";

    $("#tablaPusuarios").on("click", "#modUsuario", function() {

        idModUsuario = $(this).attr("idUsuario");
        var documento = $(this).attr("documento");
        var nombre = $(this).attr("nombres");
        var apellido = $(this).attr("apellidos");
        var direccion = $(this).attr("direccion");
        var telefono = $(this).attr("telefono");
        var url = $(this).attr("url");
        var nombreDependencia = $(this).attr("nombreDependencia");
        var idDependencia = $(this).attr("idDependencia");
        var rh = $(this).attr("rh");
        var idRh = $(this).attr("idRh");

        $("#txtDocumentoMod").val(documento);
        $("#txtNombresMod").val(nombre);
        $("#txtApellidosMod").val(apellido);
        $("#txtDireccionMod").val(direccion);
        $("#txtTelefonoMod").val(telefono);
        $("#txtUrlMod").val(url);

        var cargarDependencia = '<option value="' + idDependencia + '">' + nombreDependencia + '</option>';
        var cargarRh1 = '<option value="' + idRh + '">' + rh + '</option>';

        // $("#selectModDependencia").html(cargarDependencia);
        //$("#rhMod").html(cargarRh1);
        cargarRh(2, rh, cargarRh1);
        cargarDependencias(2, nombreDependencia, cargarDependencia);






    })


    $("#btnModificarUsuario").click(function() {

        var documento = $("#txtDocumentoMod").val();
        var nombres = $("#txtNombresMod").val();
        var apellidos = $("#txtApellidosMod").val();
        var direccion = $("#txtDireccionMod").val();
        var telefono = $("#txtTelefonoMod").val();
        var url = $("#txtUrlMod").val();
        var idDependencia = document.getElementById("selectModDependencia").value;
        var idRh = document.getElementById("rhMod").value;

        var objData = new FormData();

        objData.append("idModUsuario", idModUsuario);
        objData.append("documentoMod", documento);
        objData.append("nombreMod", nombres);
        objData.append("apellidoMod", apellidos);
        objData.append("direccionMod", direccion);
        objData.append("telefonoMod", telefono);
        objData.append("urlMod", url);
        objData.append("idDependenciaMod", idDependencia);
        objData.append("idRhMod", idRh);

        $.ajax({
            url: "control/controlUsuario.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                if (respuesta == "ok") {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Se modifico el registro',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    cargarTablaP();
                    limpiarModalModificar();
                } else {

                    alert(respuesta);
                }






            }

        })









    })



    $("#tablaPusuarios").on("click", "#eliminarUsuario", function() {


        Swal.fire({
            title: '¿Esta Seguro?',
            text: "No se podra realizar cambios!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar Registro!'
        }).then((result) => {
            if (result.isConfirmed) {
                idEliminar = $(this).attr("idUsuario");

                var objData = new FormData();
                objData.append("idEliminar", idEliminar);

                $.ajax({
                    url: "control/controlUsuario.php",
                    type: "post",
                    dataType: "json",
                    data: objData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(respuesta) {

                        if (respuesta == "ok") {

                            Swal.fire(
                                'Eliminado!',
                                'El registro ha sido eliminado.',
                                'success'
                            )

                            cargarTablaP();


                        } else {
                            alert(respuesta);
                        }
                    }




                })







            }
        })






    })
















})