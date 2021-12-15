getGaleria()

/*
*
* GALERIA
*
*/

// Buscando as Imagens do imóvel
function getGaleria () {
    var galeria_id = $('#galeria_id').val()
    var url = $('#getGaleria').val()

    $.ajax({
        url: url,
        method: 'POST',
        data: {
            galeria_id: galeria_id
        },
        dataType: 'json',
        success: function (data) {
            $('#galeria').html(data)
        }
    })

    return false
}

// Upload Galeria
$(document).on('click', '#uploadGaleria', function () {
    if ($('#images').val() != '') {
        let formData = new FormData()

        let url = $('#urlUploadGaleria').val()

        let galeria_id = $('#galeria_id').val()
        let TotalFiles = $('#images')[0].files.length //Total files
        let files = $('#images')[0]

        for (let i = 0; i < TotalFiles; i++) {
            formData.append('images' + i, files.files[i])
        }

        formData.append('TotalFiles', TotalFiles)
        formData.append('galeria_id', galeria_id)

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function () {
                $('#galeria').html(
                    '<h5 class="text-center my-4 w-100">Carregando...</h5>'
                )
            },
            success: function (response) {
                getGaleria()

                setTimeout(function () {
                    $('.alert').html(response.success)
                    $('.alert')
                        .addClass('alert-success')
                        .fadeIn('slow')
                }, 200)

                setTimeout(function () {
                    $('.alert').hide(400)
                    $('.alert').removeClass('alert-success')
                }, 2000)
            },
            error: function (response) {
                setTimeout(function () {
                    $('.alert').html(response.erro)
                    $('.alert')
                        .addClass('alert-danger')
                        .fadeOut('slow')
                }, 200)

                setTimeout(function () {
                    $('.alert').hide(400)
                    $('.alert').removeClass('alert-danger')
                }, 2000)
            }
        })
    } else {
        $('.alert').html('Por favor, selecione uma imagem!')
        $('.alert')
            .addClass('alert-warning')
            .fadeIn('slow')

        setTimeout(function () {
            $('.alert').hide(400)
            $('.alert').removeClass('alert-warning')
        }, 2000)
    }
})

// Excluindo Imagens
$(document).on('click', '.delete_image', function () {
    var id = $(this).data('id')
    var url = $(this).data('url')

    $('.delete').attr('data-id', id)
    $('.delete').attr('data-url', url)

    $('.delete').addClass('deleteImage')
    $('.deleteImage').removeClass('delete')
})

$(document).on('click', '.deleteImage', function () {
    var id = $(this).data('id')
    var url = $(this).data('url')

    $.ajax({
        url: url,
        method: 'POST',
        data: {
            id: id
        },
        dataType: 'json',
        cache: false,
        success: function (response) {
            $('#modalDelete').modal('toggle')

            $('.deleteImage').addClass('delete')
            $('.deleteImage').removeData('id')
            $('.delete').removeClass('deleteImage')

            getGaleria()

            setTimeout(function () {
                $('.alert').html(response.success)
                $('.alert')
                    .addClass('alert-success')
                    .fadeIn('slow')
            }, 200)

            setTimeout(function () {
                $('.alert').hide(400)
                $('.alert').removeClass('alert-success')
            }, 2000)
        },
        error: function (response) {
            setTimeout(function () {
                $('.alert').html(response.erro)
                $('.alert')
                    .addClass('alert-danger')
                    .fadeOut('slow')
            }, 200)

            setTimeout(function () {
                $('.alert').hide(400)
                $('.alert').removeClass('alert-danger')
            }, 2000)
        }
    })
})

