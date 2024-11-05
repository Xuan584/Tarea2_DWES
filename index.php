<?php
// Ponemos los require de las clases
require 'clases/Miembro.php';
require 'clases/Alumno.php';
require 'clases/Profesor.php';
require 'clases/Asignatura.php';

// Creamos los alumnos, profesores y asignaturas
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
    <!-- Se imprime la lista de alumnos que tenemos -->
    <h2>Alumnos</h2>
    <ul>
        <?php foreach ($alumnos as $alumno): ?>
            <li><?php echo "Nombre: ". $alumno->getNombre() . ' ' . $alumno->getApellidos(). ", Email: ". $alumno->getEmail(); ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Se imprime la lista de profesores que tenemos -->
    <h2>Profesores</h2>
    <ul>
        <?php foreach ($profesores as $profesor): ?>
            <li><?php echo "Nombre: ". $profesor->getNombre() . " " . $profesor->getApellidos() .", Email: ". $profesor->getEmail(); ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Se imprime la lista de asignaturas que tenemos -->
    <h2>Asignaturas</h2>
    <ul>
        <?php foreach ($asignaturas as $asignatura): ?>
            <li><?php echo "Nombre: ". $asignatura->getNombre(). ", Créditos: ". $asignatura->getCreditos();?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Usamos un array_filter para filtrar dentro de alumnos obteniendo la edad y devolvemos los que tienen menos o 23 años -->
    <?php
        $alumnosJovenes = array_filter($alumnos, function($alumno) {
            return $alumno->getEdad() <= 23;
        });
    ?>

    <!-- Se imprime la lista de alumnos menores de 23 o con 23 años que tenemos -->
    <h2>Alumnos <= 23</h2>
    <ul>
        <?php foreach ($alumnosJovenes as $alumno): ?>
            <li><?php echo "Nombre: ". $alumno->getNombre() . ' ' . $alumno->getApellidos(). ", Email: ". $alumno->getEmail(); ?></li>
        <?php endforeach; ?>
    </ul>

        <!-- Matriculamos a los alumnos en las asignaturas que tienen cada uno -->
    <?php
        $alumnos[0]->matricularEnAsignatura($asignaturas[0]);  
        $alumnos[1]->matricularEnAsignatura($asignaturas[0]);  
        $alumnos[1]->matricularEnAsignatura($asignaturas[1]);  
        $alumnos[2]->matricularEnAsignatura($asignaturas[0]);  
        $alumnos[2]->matricularEnAsignatura($asignaturas[2]);  
        $alumnos[3]->matricularEnAsignatura($asignaturas[0]);  
        $alumnos[4]->matricularEnAsignatura($asignaturas[0]);  
        $alumnos[4]->matricularEnAsignatura($asignaturas[1]);  
        $alumnos[4]->matricularEnAsignatura($asignaturas[2]);  
        $alumnos[5]->matricularEnAsignatura($asignaturas[0]);  
        $alumnos[6]->matricularEnAsignatura($asignaturas[1]);  
        $alumnos[6]->matricularEnAsignatura($asignaturas[1]);  
        $alumnos[7]->matricularEnAsignatura($asignaturas[2]);  
        $alumnos[8]->matricularEnAsignatura($asignaturas[1]);  
        $alumnos[9]->matricularEnAsignatura($asignaturas[0]);
    ?>

    <!-- Usamos un array_filter para filtrar dentro de alumnos los que mediante el count del alumno->getAsignaturas obtenemos 
     el numero de asignaturas y devolvemos los que sean mayores que dos -->
    <?php
    $alumnosVariasAsignaturas = array_filter($alumnos, function($alumno) {
        return count($alumno->getAsignaturas()) >= 2;
    });
    ?>
    <!-- Se imprime la lista de alumnos con dos o más asignaturas que tenemos -->
    <h2>Alumnos con al menos dos asignaturas:</h2>
    <ul>
        <?php foreach ($alumnosVariasAsignaturas as $alumno): ?>
            <li><?php echo "Nombre: " . $alumno->getNombre() . ' ' . $alumno->getApellidos() . ", Email: " . $alumno->getEmail(); ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Usamos array_filter para obtener solo las asignaturas en las que hay al menos un alumno matriculado. Dentro del filtro, 
     recorremos todos los alumnos usando un foreach para ver si alguno de ellos está matriculado en la asignatura actual. 
     Si encontramos algun alumno inscrito en dicha asignaturadevuelve true mandarla. -->

    <?php
    $asignaturaCursada = array_filter($asignaturas, function($asignatura) use ($alumnos) {
        foreach ($alumnos as $alumno) {
            if (in_array($asignatura, $alumno->getAsignaturas())) {
                return true;
            }
        }
        return false;
    });
    ?>

    <!-- Se imprime la lista de asignaturas que tienen alumnos matriculados -->
    <h2>Asignaturas con algún alumno matriculado: </h2>
    <ul>
        <?php foreach ($asignaturaCursada as $asignatura): ?>
            <li><?php echo "Asignatura: " . $asignatura->getNombre() . ", Créditos: " . $asignatura->getCreditos(); ?></li>
        <?php endforeach; ?>
    </ul>


</body>
</html>
