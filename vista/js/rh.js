$(document).ready(function() {

    cargarRh();

    function limpiarModalRegistro() {
        $("#txtRhS").val(" ");
    }

    function limpiarModalModificar() {

        $("#txtModR").val(" ")

    }


    $("#btnCrearRh").click(function() {

        var rh = $("#txtRhS").val();

        var objData = new FormData();

        objData.append("rh", rh);


        $.ajax({
            url: "control/controlRh.php",
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
                    cargarRh();
                    limpiarModalRegistro();
                } else {

                    alert(respuesta);

                }



            }




        })

    })

    function cargarRh() {

        var mensaje = "ok";

        var objData = new FormData();
        objData.append("cargarRh", mensaje);

        $.ajax({
            url: "control/controlRh.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                var concantenar = "";

                console.log(respuesta);
                respuesta.forEach(cargarRh);

                function cargarRh(item, index) {

                    concantenar += '<tr>';
                    concantenar += '<td>' + item.rh + '</td>';
                    concantenar += '<td><div class="btn-group">';
                    concantenar += '<button id="modrh" type="button" class="btn btn-success" idRh="' + item.idRh + '" rh="' + item.rh + '" data-toggle="modal" data-target="#modalMrh" ><span class="glyphicon glyphicon-pencil"></span></button>';
                    concantenar += '<button id="eliminarRh" type="button" class="btn btn-danger" idRh="' + item.idRh + '"><span class="glyphicon glyphicon-minus"></span></button>';
                    concantenar += '</td>';

                    concantenar += '</tr>';




                }

                $("#tablaRh").html(concantenar);








            }




        })


    }
    var id = "";

    $("#tablaRhP").on("click", "#modrh", function() {

        id = $(this).attr("idRh");
        var rh = $(this).attr("rh");

        $("#txtModR").val(rh);





    })

    $("#tablaRhP").on("click", "#eliminarRh", function() {

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
                idEliminar = $(this).attr("idRh");

                var objData = new FormData();
                objData.append("idEliminar", idEliminar);

                $.ajax({
                    url: "control/controlRh.php",
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

                            cargarRh();


                        } else {
                            alert(respuesta);
                        }
                    }




                })







            }
        })




    })

    $("#btnModificarRh").click(function() {

        var modRh = $("#txtModR").val();

        var objData = new FormData();
        objData.append("idMod", id);
        objData.append("rhMod", modRh);

        $.ajax({
            url: "control/controlRh.php",
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
                    cargarRh();
                    limpiarModalModificar();


                } else {
                    alert(respuesta);
                }
            }




        })



    })





})