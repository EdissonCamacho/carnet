$(document).ready(function() {

    cargarDependencia();


    function limpiarModalRegistro() {
        $("#txtNombreDependencia").val(" ");

    }

    function limpiarModalModificar() {
        $("#txtModificarNombreDependencia").val(" ");

    }

    $("#btnCrearDependencia").click(function() {

        var dependencia = $("#txtNombreDependencia").val();

        var objData = new FormData();
        objData.append("dependencia", dependencia);

        $.ajax({
            url: "control/controlDependencia.php",
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
                    cargarDependencia();
                    limpiarModalRegistro();


                } else {

                    alert(respuesta);

                }






            }




        })




    })

    function cargarDependencia() {

        var mensaje = "cargarDependencias";

        var objData = new FormData();
        objData.append("cargarDependencias", mensaje);

        $.ajax({
            url: "control/controlDependencia.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                var concantenar = "";

                console.log(respuesta);

                respuesta.forEach(cargarDepen);

                function cargarDepen(item, index) {

                    concantenar += '<tr>';
                    concantenar += '<td>' + item.nombreDependencia + '</td>';
                    concantenar += '<td><div class="btn-group">';
                    concantenar += '<button id="btnDependendiaMod" type="button" class="btn btn-success" idDependencia="' + item.idDependencia + '" nombreDependencia="' + item.nombreDependencia + '" data-toggle="modal" data-target="#modDependencia" ><span class="glyphicon glyphicon-pencil"></span></button>';
                    concantenar += '<button id="eliminarDependencia" type="button" class="btn btn-danger" idDependencia="' + item.idDependencia + '"><span class="glyphicon glyphicon-minus"></span></button>';
                    concantenar += '</td>';

                    concantenar += '</tr>';











                }

                //  alert(concantenar);

                $("#contenidoDependencia").html(concantenar);





            }

        })



    }


    $("#tablaDependencia").on("click", "#eliminarDependencia", function() {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                var idEliminar = $(this).attr("idDependencia");

                var objData = new FormData();

                objData.append("idEliminar", idEliminar);

                $.ajax({
                    url: "control/controlDependencia.php",
                    type: "post",
                    dataType: "json",
                    data: objData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(respuesta) {

                        if (respuesta == "ok") {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            cargarDependencia();


                        } else {
                            alert(respuesta);
                        }



                    }




                })





            }
        })




    })

    var idDependencia = "";
    $("#tablaDependencia").on("click", "#btnDependendiaMod", function() {

        var nombreDependencia = $(this).attr("nombreDependencia");
        idDependencia = $(this).attr("idDependencia");
        $("#txtModificarNombreDependencia").val(nombreDependencia);
        //alert(nombreDependencia + " " + idDependencia);





    })

    $("#btnModDependencia").click(function() {

        var nombreDependencia = $("#txtModificarNombreDependencia").val();

        var objData = new FormData();

        objData.append("idMod", idDependencia);
        objData.append("nameMod", nombreDependencia);

        $.ajax({
            url: "control/controlDependencia.php",
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

                    cargarDependencia();
                    limpiarModalModificar();


                } else {

                    alert(respuesta);

                }





            }




        })





    })

})