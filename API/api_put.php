<?php

# Definimos los datos que vamos a enviar
$producto = [
    "categoriaid" => 2,
    "codigo" => "SKU-28",
    "nombre" => "ENVIO API",
    "descripcion" => "Envio desde localhost a hosting remoto",
    "precio" => "8000.00",
    "stock" => "1",
    "imagen" => "",
    "datecreated" => "2022-03-28",
    "ruta" => "envio-api",
    "status" => 1
];
// Los codificamos
$productoCodificado = json_encode($producto);

$url = "https://franciscoweb.com.mx/API/post.php";
$ch = curl_init($url);

curl_setopt_array($ch, array(
    CURLOPT_CUSTOMREQUEST => "POST",
    // Justo aquí ponemos los datos dentro del cuerpo
    CURLOPT_POSTFIELDS => $productoCodificado,
    // Encabezados
    //CURLOPT_HEADER => true,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($productoCodificado), // Abajo podríamos agregar más encabezados
        'Personalizado: ¡Hola mundo!', # Un encabezado personalizado
    ),
    # indicar que regrese los datos, no que los imprima directamente
    CURLOPT_RETURNTRANSFER => true,
));
# hace la petición
$resultado = curl_exec($ch);
# Vemos si el código es 200, es decir, HTTP_OK
$codigoRespuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($codigoRespuesta === 200){
    # Decodificar JSON porque esa es la respuesta
    $respuestaDecodificada = json_decode($resultado);
    # Simplemente los imprimimos
    echo "<strong>El servidor dice que la hora de petición fue: </strong>" . $respuestaDecodificada->fechaYHora;
    echo "<br><strong>El servidor dice que el primer lenguaje es: </strong>" . $respuestaDecodificada->primerLenguaje;
    echo "<br><strong>Los encabezados que el servidor recibió fueron: </strong><pre>" . var_export($respuestaDecodificada->encabezados, true) . "</pre>";
    echo "<br><strong>Los gustos musicales que el servidor recibió fueron: </strong><pre>" . var_export($respuestaDecodificada->gustosMusicales, true) . "</pre>";
    echo "<br><strong>Los libros que el servidor recibió fueron: </strong><pre>" . var_export($respuestaDecodificada->libros, true) . "</pre>";
    echo "<br><strong>Mensaje del servidor: </strong>" . $respuestaDecodificada->mensaje;
}else{
    # Error
    echo "Error consultando. Código de respuesta: $codigoRespuesta";
}
curl_close($ch);