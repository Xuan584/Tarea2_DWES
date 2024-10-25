<?php
// Ponemos los require de las clases
require 'clases/Miembro.php';
require 'clases/Alumno.php';
require 'clases/Profesor.php';
require 'clases/Asignatura.php';

$alumnos = Alumno::crearAlumnosDeMuestra();
$profesores = Profesor::crearProfesoresDeMuestra();
$asignaturas = Asignatura::crearAsignaturasDeMuestra();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea Tema 2</title>
</head>
<body>

    <h2>Alumnos</h2>
    <ul>
        <?php foreach ($alumnos as $alumno): ?>
            <li><?php echo "Nombre: ". $alumno->getNombre() . ' ' . $alumno->getApellidos(). ", Email: ". $alumno->getEmail(); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Profesores</h2>
    <ul>
        <?php foreach ($profesores as $profesor): ?>
            <li><?php echo "Nombre: ". $profesor->getNombre() . ' ' . $profesor->getApellidos() .", Email: ". $profesor->getEmail(); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Asignaturas</h2>
    <ul>
        <?php foreach ($asignaturas as $asignatura): ?>
            <li><?php echo "Nombre: ". $asignatura->getNombre(). ", Créditos: ". $asignatura->getCreditos();?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>