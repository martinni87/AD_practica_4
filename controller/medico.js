$(document).ready(function(){
    $("#search_button").click(function(){
        $.ajax({
            method: "GET",
            url:"ws_index.php",
            // data:{},
            dataType: "json",
        })
        .done(function(response){
            // console.log(response);
            printTableStruct()
            Object.keys(response).forEach((element) => {
            // console.log(element + " -> " + response[element]["nombre"])
            printResponse(element,response)
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
                        <!-- Aquí se pintarán los resultados de la consulta -->
                    </tbody>
                    </table>`;
    $("#ajax_response").html(estructura);
}

function printResponse(index,response){
    // console.log(response[index])
    let fila =  `<tr>
                    <td id='index_` + index `>` + response[index]["numero_colegiado"] + `</td>
                    <td id='index_` + index `>` + response[index]["dni"] + `</td>
                    <td id='index_` + index `>` + response[index]["nombre"] + `</td>
                    <td id='index_` + index `>` + response[index]["apellido1"] + `</td>
                    <td id='index_` + index `>` + response[index]["apellido2"] + `</td>
                    <td id='index_` + index `>` + response[index]["telefono"] + `</td>
                    <td id='index_` + index `>` + response[index]["especialidad"] + `</td>
                    <td id='index_` + index `>` + response[index]["horario"] + `</td>
                    <td id='index_` + index `><button id="delete_button`+index+`" name="`+index+`" class="btn btn-danger" >-</button></td>
                    <td id='index_` + index `><button id="edit_button`+index+`" name="`+index+`" class="btn btn-warning">Editar</button></td>
                </tr>`;
    $("#ajax_response").append(fila);
}