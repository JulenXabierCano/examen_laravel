<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:black;
            color:white;
        }
        hr{
            color:white;
        }

        a{
            color:white;
        }
    </style>
</head>
<body>
        @foreach ($manzanas as $manzana)
            ID Manzana: {{ $manzana->id }}
            <br>
            Tipo Manzana: {{ $manzana->tipoManzana }}
            <br>
            Precio Manzana: {{ $manzana->precioKilo }}
            <br>
            <a href="/eliminarManzana/{{$manzana->id}}">Eliminar</a>
            <a href="/actualizarManzana/{{$manzana->id}}">Actualizar fijo</a>
            <hr>
        @endforeach
        <form action="crearManzana" method="GET">
            <input type="text" placeholder="Tipo de manzana" required name="tipoManzana">
            <input type="text" placeholder="Precio por kilo" required name="precioKilo">
            <input type="submit" value="Crear Manzana">
        </form>
</body>
</html>