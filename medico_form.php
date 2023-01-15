<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='UTF-8'>
    <meta name='author' content='Martín Antonio Córdoba Getar'>
    <meta name='description' content='Práctica de Desarrollo de Interfaces 2ºDAM EFA El Campico'>
    <meta name='keywords' content='MVC, DAM, Ejercicios Desarrollo de Interfaces'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Práctica 2.1 Desarrollo de Interfaces</title>
    <script src="vendor/jquery-3.6.1.min.js"></script>
    <script src="controllers/medico.js"></script>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <fieldset>
        <legend>Formulario Médicos</legend>
        <label for="numero_colegiado">Nº Colegiado: </label><input type="number" name="numero_colegiado" id="numero_colegiado" placeholder="146502" title="Escribe un número de colegiado">
        <label for='dni'>DNI:</label><input type='text' name='dni' id='dni' placeholder='01234567A' title='Escribe un DNI'>
        <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" placeholder="Juan Antonio" title="Escribe un nombre"><br><br>
        <label for="apellido1">Apellido 1: </label><input type="text" name="apellido1" id="apellido1" placeholder="García" title="Escribe el primer apellido">
        <label for="apellido2">Apellido 2: </label><input type="text" name="apellido2" id="apellido2" placeholder="López" title="Escribe el segundo apellido">
        <label for="telefono">Teléfono: </label><input type="tel" name="telefono" id="telefono" placeholder="(+34)966670113" title="Escribe un número de teléfono"><br><br>
        <label for="especialidad_id">ID Especialidad: </label><input type="number" name="especialidad_id" id="especialidad_id" placeholder="1" title="Escribe el ID de la especialidad">
        <label for="horario_id">ID Horario: </label><input type="number" name="horario_id" id="horario_id" placeholder="2" title="Escribe el ID del turno"><br><br>
        <button type='submit' name="submit" id="submit_new" class="btn btn-secondary">Enviar</button>
        <button type='reset' name='reset' id='reset' class="btn btn-secondary">Cancelar</button>
        <button type="button" name="return" id="return" class="btn btn-secondary" onclick="location.href='index.html'">Volver</button>
    </fieldset>
    <div id="response"></div>
</body>
</html>