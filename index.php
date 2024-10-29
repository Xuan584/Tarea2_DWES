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
            <li><?php echo "Nombre: ". $profesor->getNombre() . " " . $profesor->getApellidos() .", Email: ". $profesor->getEmail(); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Asignaturas</h2>
    <ul>
        <?php foreach ($asignaturas as $asignatura): ?>
            <li><?php echo "Nombre: ". $asignatura->getNombre(). ", Créditos: ". $asignatura->getCreditos();?></li>
        <?php endforeach; ?>
    </ul>

    <?php
        $alumnosJovenes = array_filter($alumnos, function($alumno) {
            return $alumno->getEdad() <= 23;
        });
    ?>

    <h2>Alumnos <= 23</h2>
    <ul>
        <?php foreach ($alumnosJovenes as $alumno): ?>
            <li><?php echo "Nombre: ". $alumno->getNombre() . ' ' . $alumno->getApellidos(). ", Email: ". $alumno->getEmail(); ?></li>
        <?php endforeach; ?>
    </ul>

    <?php
    // Filtro para obtener alumnos con al menos dos asignaturas
    $alumnosVariasAsignaturas = array_filter($alumnos, function($alumno) {
        return count($alumno->getAsignaturas()) >= 2;
    });
    ?>

    <h2>Alumnos con al menos dos asignaturas:</h2>
    <ul>
        <?php foreach ($alumnosVariasAsignaturas as $alumno): ?>
            <li><?php echo "Nombre: " . $alumno->getNombre() . ' ' . $alumno->getApellidos() . ", Email: " . $alumno->getEmail(); ?></li>
        <?php endforeach; ?>
    </ul>


    <?php
    // Filtra asignaturas con al menos un alumno matriculado
    $asignaturaCursada = array_filter($asignaturas, function($asignatura) use ($alumnos) {
        foreach ($alumnos as $alumno) {
            if (in_array($asignatura, $alumno->getAsignaturas())) {
                return true;
            }
        }
        return false;
    });
    ?>

    <h2>Asignaturas con algún alumno matriculado: </h2>
    <ul>
        <?php foreach ($asignaturaCursada as $asignatura): ?>
            <li><?php echo "Asignatura: " . $asignatura->getNombre() . ", Créditos: " . $asignatura->getCreditos(); ?></li>
        <?php endforeach; ?>
    </ul>


</body>
</html>
