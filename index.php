<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API tester</title>
    <script>
        async function buscar(){
            var codigo=document.getElementById("codigo").value;
            const url="http://localhost/apis/productos.php?codigo="+codigo;
            alert(url);
            await fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la petición');
                }
                return response.json();
            })
            .then(data => {
                agregarProducto(codigo, data.nombre_producto, data.precio);
            })
            .catch(error => {
                alert('Error 100: ' + error);
            }); 
        }

    </script>
</head>
<body>
    Código del Producto:
    <input type="text" id="codigo" value="P001">
    <input type="button" value="buscar" onclick="buscar()">
    <p id="salida"></p>
</body>
</html>