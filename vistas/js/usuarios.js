/*=============================================
   SUBIENDO FOTO DE USUARIO
=============================================*/
//console.log("Hola desde alert");

$(".nuevaFoto").change(function () {

    var imagen = this.files[0];
    console.log("imagen", imagen);

    /*=================================================
     VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPEG O PNG
    ==================================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaFoto").val("");

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El Archivo debe ser JPG o PNG',

        })
    } else if (imagen["size"] > 2097152) {

        $(".nuevaFoto").val("");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El tamaño del archivo excede a los 200MB',

        });

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load",function(event){
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src",rutaImagen);
        })
    } 
})

/*=============================================
                EDITAR USUARIO DE USUARIO
    =============================================*/

    $(".btnEditarUsuario").click(function(){

        var idUsuario = $(this).attr("idUsuario")  

        //console.log("idUsuario",idUsuario);

            var datos = new FormData();
            datos.append("idUsuario",idUsuario);

            $.ajax({
                url:"ajax/usuarios.ajax.php",
                method:"POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(respuesta){

                    //console.log("respuesta",respuesta);
                    $("#editarNombre").val(respuesta['nombre']);
                    $("#editarUsuario").val(respuesta['usuario']);                    
                    $("#editarPerfil").html(respuesta['perfil']);

                    if(respuesta['foto'] !=" "){

                        $(".previsualizar").attr("src",respuesta['foto']);

                    }

                    

                }
            });
    })