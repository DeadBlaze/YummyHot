/*
    Авторизация
 */

$('.login-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        pass = $('input[name="pass"]').val();

    $.ajax({
        url: '/auth_or_reg/vendor/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            pass: pass
        },

        
        success (data) {

            if (data.status) {
                document.location.href = '/';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);
            }

        }
    });
});



/*
    Регистрация
 */

$('.register-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        pass = $('input[name="pass"]').val(),
        name = $('input[name="name"]').val(),
        email = $('input[name="email"]').val(),
        pass_confirm = $('input[name="pass_confirm"]').val();

    let formData = new FormData();
    formData.append('login', login);
    formData.append('pass', pass);
    formData.append('pass_confirm', pass_confirm);
    formData.append('name', name);
    formData.append('email', email);


    $.ajax({
        url: '/auth_or_reg/vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = '/auth_or_reg/index.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);

            }

        }
    });

});
