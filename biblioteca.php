<?php
$libros = [  
    "libro1" => [  
        "titulo" => "PHP para Principiantes",  
        "autor" => "Carlos Ruiz",  
        "precio" => 19.99,  
        "categoria" => "Desarrollo web"  
    ],  
    "libro2" => [  
        "titulo" => "JavaScript Avanzado",  
        "autor" => "Laura García",  
        "precio" => 25.99,  
        "categoria" => "Desarrollo web"  
    ],  
    "libro3" => [  
        "titulo" => "Algoritmos en Python",  
        "autor" => "Miguel Fernández",  
        "precio" => 29.99,  
        "categoria" => "Algoritmos"  
    ]  
];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Libros</title>
</head>
<body>

<!-- Imprimimos la información de todos los libros dentro de una tabla que recorremos con un foreach-->
<h2>Información de todos los libros</h2>
<table border="2px" style="border-collapse: collapse;">
    <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Precio</th>
        <th>Categoría</th>
    </tr>
    <?php foreach ($libros as $libro) : ?>
        <tr>
            <td><?php echo $libro['titulo']; ?></td>
            <td><?php echo $libro['autor']; ?></td>
            <td><?php echo $libro['precio']; ?></td>
            <td><?php echo $libro['categoria']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Imprimimos la información de todos los libros dentro de una tabla que recorremos con un foreach pero en este caso solo si 
 pertenecen a Desarrollo Web con un if-->
<h2>Libros de la categoría Desarrollo Web</h2>
<ol>
    <?php foreach ($libros as $libro) : ?>
        <?php if ($libro['categoria'] === 'Desarrollo web') : ?>
            <li><?php echo $libro['titulo']; ?></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ol>

</body>
</html>
