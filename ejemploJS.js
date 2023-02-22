
    $(document).ready(function() {
        $('#numero4').keyup(function() {
            data = 'numadd=' + $('#numero1').val() + '-' + $('#numero2').val() + '-' + $('#numero3').val() + '-' + $('#numero4').val();

            $.post('val_cont.php', data, function(respuesta) {
                if (respuesta >= 1) {
                    $('#info_num').hide().html('Contrato existente!').fadeIn(100);
                } else {
                    $('#info_num').hide();
                }
            });
        });

        $('#codigo').mousemove(function() {
            if ($(this).val().length > 0) {
                data = 'codigo=' + $(this).val();

                $.post('val_cont.php', data, function(respuesta) {
                    if (respuesta == '0') {
                        $('#indicador').hide().html('Error en código!').fadeIn(100);
                        $('#enviar').prop('disabled', true);
                    } else {
                        $('#indicador').hide();
                        $('#suggestions').hide();
                        $('#enviar').prop('disabled', false);
                    }
                });
            }
        });

        $('#codigo2').mousemove(function() {
            if ($(this).val().length > 0) {
                data = 'codigo=' + $(this).val();

                $.post('val_cont.php', data, function(respuesta) {
                    if (respuesta == '0') {
                        $('#indicador2').hide().html('Error en código!').fadeIn(100);
                        $('#enviar').prop('disabled', true);
                    } else {
                        $('#indicador2').hide();
                        $('#suggestions2').hide();
                        $('#enviar').prop('disabled', false);
                    }
                });
            }
        });

        $('#codigo3').mousemove(function() {
            if ($(this).val().length > 0) {
                data = 'codigo=' + $(this).val();

                $.post('val_cont.php', data, function(respuesta) {
                    if (respuesta == '0') {
                        $('#indicador3').hide().html('Error en código!').fadeIn(100);
                        $('#enviar').prop('disabled', true);
                    } else {
                        $('#indicador3').hide();
                        $('#suggestions3').hide();
                        $('#enviar').prop('disabled', false);
                    }
                });
            }
        });

        $('#enviar').click(function() {
            data = 'numadd=' + $('#numero1').val() + '-' + $('#numero2').val() + '-' + $('#numero3').val() + '-' + $('#numero4').val();

            $.post('val_cont.php', data, function(respuesta) {
                if (respuesta == '1') {
                    $('#info_num').hide().html('Contrato existente!').fadeIn(100);
                    $('#enviar').prop('disabled', true);
                } else {
                    $('#info_num').hide();
                    $('#enviar').prop('disabled', false);
                }
            });
        });
    });


    /* $(document).ready(function() {
        $(function() {
            // Initialize form validation on the registration form.
            // It has the name attribute "registration"
            $("#formulario").validate({
                // Specify validation rules
                rules: {
                    codigo: {
                        required: true,
                        remote: {
                            url: "validar_codigo.php",
                            type: "post",
                            data: {
                                username: function() {
                                    return $("#codigo").val();
                                }
                            }
                        }
                    }
                },
                messages: {
                    // Specify validation error messages
                    codigo: "Codigo Inválido o Vacío, por favor verificar"
                    // Make sure the form is submitted to the destination defined
                    // in the "action" attribute of the form when valid
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    });*/

    $(document).ready(function() {
        $('#codigo').on('keyup', function() {
            var key = $(this).val();
            var dataString = 'codigo=' + key;
            $.ajax({
                type: "POST",
                url: "busqueda_codigo.php",
                data: dataString,
                success: function(data) {
                    //Escribimos las sugerencias que nos manda la consulta
                    $('#suggestions').fadeIn(1000).html(data);
                    console.log(data);
                    //Al hacer click en alguna de las sugerencias
                    $('.suggest-element').on('click', function() {
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#codigo').val($('#' + id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(1000);
                        alert('Has seleccionado el Codigo ' + $('#' + id).attr('data'));
                        return false;
                    });

                }
            });
        });

        $('#codigo').on('keyup', function() {
            //e.preventDefault();
            var codigo_validar = $("#codigo").val();
            $.ajax({
                type: "POST",
                url: "validar_codigo.php",
                data: "codigo=" + codigo_validar,
                success: function(data) {
                    //$("#enviar").prop('disabled',true);
                    console.log("recibido -> " + data)
                    if (data) {
                        $("#enviar").prop('disabled', false);
                    } else {
                        $("#enviar").prop('disabled', true);
                    }

                }
            });


        });






    });

    $(document).ready(function() {
        $('#codigo2').on('keyup', function() {
            var key = $(this).val();
            var dataString = 'codigo=' + key;
            $.ajax({
                type: "POST",
                url: "busqueda_codigo.php",
                data: dataString,
                success: function(data) {
                    //Escribimos las sugerencias que nos manda la consulta
                    $('#suggestions2').fadeIn(1000).html(data);
                    console.log(data);
                    //Al hacer click en alguna de las sugerencias
                    $('.suggest-element').on('click', function() {
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#codigo2').val($('#' + id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions2').fadeOut(1000);
                        alert('Has seleccionado el Codigo ' + $('#' + id).attr('data'));
                        return false;
                    });
                }
            });
        });
    });

    $(document).ready(function() {
        $('#codigo3').on('keyup', function() {
            var key = $(this).val();
            var dataString = 'codigo=' + key;
            $.ajax({
                type: "POST",
                url: "busqueda_codigo.php",
                data: dataString,
                success: function(data) {
                    //Escribimos las sugerencias que nos manda la consulta
                    $('#suggestions3').fadeIn(1000).html(data);
                    console.log(data);
                    //Al hacer click en alguna de las sugerencias
                    $('.suggest-element').on('click', function() {
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#codigo3').val($('#' + id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions3').fadeOut(1000);
                        alert('Has seleccionado el Codigo ' + $('#' + id).attr('data'));
                        return false;
                    });
                }
            });
        });
    });
