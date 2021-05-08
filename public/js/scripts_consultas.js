$(document).ready(function () {
    //$("#nombres").focus();

    $("#departamento_id").change(function (e) {
        let iddep = $("#departamento_id").find(':selected').val();
        $.get(`ciudades/${iddep}`, function (data) {
            $("#ciudad_id").empty();
            $.each(data, function (id, value) {
                $("#ciudad_id").append('<option value="' + id + '">' + value + '</option>');
            });
        });
    });

    $("#form").on('submit', function (e) {
        console.log('enviando');
        e.preventDefault();

        let datos = $("#form").serialize();
        // console.log(datos);
        $.ajax({
            beforeSend: function () {
                $("#spinner").css('display', 'block');
                $("#error-nombre").html('');
                $("#error-apellidos").html('');
                $("#error-cedula").html('');
                $("#error-departamento").html('');
                $("#error-ciudad").html('');
                $("#error-celular").html('');
                $("#error-correo").html('');
                $("#error-terminos").html('');
            },
            type: "POST",
            url: "clientes",
            data: datos,
            success: function (msj) {
                $("#spinner").css('display', 'none');
                $("#alerta").css('display', 'block');
                $("#form").trigger("reset");
            },
            error: function (msj) {
                //alert("Error al guardar los datos!");
                $("#spinner").css('display', 'none');
                $("#error-nombre").html(msj.responseJSON.errors.nombres);
                $("#error-apellidos").html(msj.responseJSON.errors.apellidos);
                $("#error-cedula").html(msj.responseJSON.errors.cedula);
                $("#error-departamento").html(msj.responseJSON.errors.departamento);
                $("#error-ciudad").html(msj.responseJSON.errors.ciudad);
                $("#error-celular").html(msj.responseJSON.errors.celular);
                $("#error-correo").html(msj.responseJSON.errors.correo);
                $("#error-terminos").html(msj.responseJSON.errors.terminos);
            }
        });
    });
});