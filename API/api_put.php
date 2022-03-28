<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
$.ajax({
        url: 'https://franciscoweb.com.mx/API/post.php',
        type: 'POST',
        dataType: "json",
        crossDomain: true,
        headers: {
            "Accept": "application/json",
        },
        data: {
            "categoriaid" : 2,
            "codigo" : "SKU-28",
            "nombre" : "Isra gay",
            "descripcion" : "Envio desde localhost a hosting remoto",
            "precio" : "8000.00",
            "stock" : "1",
            "imagen" : "",
            "datecreated" : "2022-03-28",
            "ruta" : "envio-api",
            "status" : 1
        },
        success: function (data){
            console.log(data);
        }
    });
</script>
