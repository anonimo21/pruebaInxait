/*!
* Start Bootstrap - Agency v6.0.5 (https://startbootstrap.com/theme/agency)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
*/
(function ($) {
    "use strict"; // Start of use strict

    // Smooth scrolling using anime.js
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').on('click', function () {
        if (
            location.pathname.replace(/^\//, "") ==
            this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            var target = $(this.hash);
            target = target.length ?
                target :
                $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                anime({
                    targets: 'html, body',
                    scrollTop: target.offset().top - 72,
                    duration: 1000,
                    easing: 'easeInOutExpo'
                });
                return false;
            }
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $(".js-scroll-trigger").on('click', function () {
        $(".navbar-collapse").collapse("hide");
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $("body").scrollspy({
        target: "#mainNav",
        offset: 74,
    });

    // Collapse Navbar
    var navbarCollapse = function () {
        if ($("#mainNav").offset().top > 100) {
            $("#mainNav").addClass("navbar-shrink");
        } else {
            $("#mainNav").removeClass("navbar-shrink");
        }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).on('scroll', navbarCollapse);

})(jQuery); // End of use strict

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