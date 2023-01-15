$(document).ready(function(){
    $("#search_button").click(function(){
        $.ajax({
            method: "GET",
            url:"ws_index.php",
            data:{
                nombre: $("#nombre").val(),
                apellido1: $("#apellido1").val(),
                numero_colegiado: $("#numero_colegiado").val(),
            },
            dataType: "json",
        })
        .done(function(response){
            // console.log(response);
            printTableStruct();
            Object.keys(response).forEach((element) => {
            // console.log(element + " -> " + response[element]["nombre"])
                printResponse(element,response);
            });
        })
        .fail(function(jqXHR,textStatus,error){
            console.log("Error en conexión ajax en método get");
        });
    });

    $("#submit_new").click(function(){
        $.ajax({
            method: "POST",
            url:"ws_index.php",
            data:{

            },
            dataType: "json",
        })
        .done(function(response){
            // console.log(response);
            // printTableStruct()
            Object.keys(response).forEach((element) => {
            // console.log(element + " -> " + response[element]["nombre"])
            // printResponse(element,response)
            });
        })
        .fail(function(jqXHR,textStatus,error){
            console.log("Error en conexión ajax");
        });
    });

    $("#submit_edit").click(function(){
        $.ajax({
            method: "PUT",
            url:"ws_index.php",
            data:{

            },
            dataType: "json",
        })
        .done(function(response){
            // console.log(response);
            // printTableStruct()
            Object.keys(response).forEach((element) => {
            // console.log(element + " -> " + response[element]["nombre"])
            // printResponse(element,response)
            });
        })
        .fail(function(jqXHR,textStatus,error){
            console.log("Error en conexión ajax");
        });
    });

    $("#delete_reg").click(function(){
        $.ajax({
            method: "DEL",
            url:"ws_index.php",
            data:{
                user_id:"",
            },
            dataType: "json",
        })
        .done(function(response){
            // console.log(response);
            // printTableStruct()
            Object.keys(response).forEach((element) => {
            // console.log(element + " -> " + response[element]["nombre"])
            // printResponse(element,response)
            });
        })
        .fail(function(jqXHR,textStatus,error){
            console.log("Error en conexión ajax");
        });
    });
});

function printTableStruct(){
    let estructura = `<table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="table-dark">Nº colegiado</th>
                            <th class="table-dark">DNI</th>
                            <th class="table-dark">Nombre</th>
                            <th class="table-dark">Apellido 1</th>
                            <th class="table-dark">Apellido 2</th>
                            <th class="table-dark">Teléfono</th>
                            <th class="table-dark">ID Especialidad</th>
                            <th class="table-dark">ID horario</th>
                            <th colspan="2" class="table-dark">Opciones</th>
                         </tr>
                    </thead>
                    <tbody id="myTableData">
                        <!-- Resultados de la consulta -->
                    </tbody>
                    </table>`;
    $("#ajax_response").html(estructura);
}

function printResponse(index,response){
    // console.log(response[index])
    let fila =  `<tr id='`+response[index]["user_id"]+`'>
                    <td name="numero_colegiado">` + response[index]["numero_colegiado"] + `</td>
                    <td name="dni">` + response[index]["dni"] + `</td>
                    <td name="nombre">` + response[index]["nombre"] + `</td>
                    <td name="apellido1">` + response[index]["apellido1"] + `</td>
                    <td name="apellido2">` + response[index]["apellido2"] + `</td>
                    <td name="telefono">` + response[index]["telefono"] + `</td>
                    <td name="especialidad">` + response[index]["especialidad"] + `</td>
                    <td name="horario">` + response[index]["horario"] + `</td>
                    <td name="delete_button"><button id="delete_reg`+index+`" name="`+index+`" class="btn btn-danger" >x</button></td>
                    <td name="edit_button"><button id="edit_reg`+index+`" name="`+index+`" class="btn btn-warning">Editar</button></td>
                </tr>`;
    $("#myTableData").append(fila);
}