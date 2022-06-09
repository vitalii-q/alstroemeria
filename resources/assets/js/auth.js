var auth = {
    ajaxMethod: 'POST',

    registration: function() {
        var formData = new FormData();

        formData.append('email', $('#email').val());
        formData.append('password', $('#password').val());

        $.ajax({
            url: '/registration/reg',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result) {
                //console.log(result);
                //window.location = '/panel/pages/edit/' + result; // редирект
            }
        });
    },

    login: function() {
        var formData = new FormData();

        formData.append('email', $('#email').val());
        formData.append('password', $('#password').val());

        $.ajax({
            url: '/login/in',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {

            },
            success: function (result) {
                //console.log(result);

                if (result == true) {
                    window.location = '/'; // редирект
                }
            }
        });
    }
};
