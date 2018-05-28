$(document).ready(function() {

var mydata = '';


    $.ajax({
        type:'GET',
        url: 'asset/js/script.php',
        dataType: 'JSON',
        success: function(data){
            //console.log(data);
            mydata = data;
        },
        error: function(err){
            console.log(err);
        }
    });

    $('#pseudo').focusout(function(){
        var user = $('#pseudo').val();
        var result = user.replace(/[0-9`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi,'');
        console.log(result);
        for (var i = 0; i < mydata.length; i++){
            if(result === mydata[i].author & user.length > 1){
                $('#pseudo').css('border', '2px solid red');
                break;
            } else {
                $('#pseudo').css('border', '2px solid green');
            }
        }
    });

    $('#submitS').on('click', function(){
        $('.info').remove();
        var user = $('#pseudo').val();
        var pass = $('#password').val();
        var verif = $('#passverif').val();
        $.ajax({
            url: '?controller=ajax&action=create',
            type: 'POST',
            data: {pseudo: user, password: pass, verifpass: verif},
            success: function(data){
                if(data === 'true'){
                    $('#monform').append('<p class=info>');
                    $('#3').after($('.info'));
                    $('.info').html('Successful registered').css('color', 'green').delay(1400).slideUp(300);
                    setTimeout(function () {
                        window.location.replace("?controller=Connected&action=login");
                    }, 1500);
                } else {
                    $('#monform').append('<p class=info>');
                    $('#3').after($('.info'));
                    $('.info').html(data).css('color', 'red').delay(1400).slideUp(300);
                }
                console.log(data);
            },
            error: function(err){
                console.log(err);
                console.log('bye bye');
            }
        });
    });

    $('#addannonce').on('click', function(){
        $('#jqform').fadeIn('slow');
    });

    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#imgAd' + id).attr('src', e.target.result);
            }
        reader.readAsDataURL(input.files[0]);
        }
    }

    $('#img_1').on('change', function(){
        readURL(this, 1);
    });

    $('#img_2').on('change', function(){
        readURL(this, 2);
    });

    $('#img_3').on('change', function(){
        readURL(this, 3);
    });

    $('.favoriteP').on('click', function(){
        var id_post = $(this).data('post');
        $(this).effect('bounce');
        var select = $(this);
        $.ajax({
            url:'?controller=ajax&action=favoritePost',
            type:'POST',
            data:{id : id_post},
            success: function(data){
                if(data === 'true'){
                    console.log(data);
                    M.toast({html: 'Ajouter au favoris', displayLength: 1000})
                    select.text('favorite');
                } else {
                    console.log(data);
                    M.toast({html: 'Supprimer des favoris', displayLength: 1000});
                    select.text('favorite_border');
                }
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    $('.favoriteA').on('click', function(){
        var id_post = $(this).data('post');
        $(this).effect('bounce');
        var select = $(this);
        $.ajax({
            url:'?controller=ajax&action=favoriteAnnonce',
            type:'POST',
            data:{id : id_post},
            success: function(data){
                if(data === 'true'){
                    console.log(data);
                    M.toast({html: 'Ajouter au favoris', displayLength: 1000})
                    select.text('favorite');
                } else {
                    console.log(data);
                    M.toast({html: 'Supprimer des favoris', displayLength: 1000});
                    select.text('favorite_border');
                }
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    $('.logout').on('click', function(){
        $.ajax({
            url:'?controller=ajax&action=logout',
            type :'GET',
            success: function(data){
                M.toast({html: 'Deconnecté', displayLength: 1000});
                setTimeout(function(){
                    window.location.replace("/Php_MVC/Blog_test/");
                }, 1000); 
            }, 
            error: function(err){
                console.log(err);
            }
        })
    });

    $('#loginbutton').on('click', function(){
        var user = $('#usernamelogin').val();
        var pass = $('#passwordlogin').val();
        $.ajax({
            url:'?controller=ajax&action=login',
            type:'POST',
            data:{pseudo: user, password: pass},
            success: function(data){
                switch(data){
                    case '3':
                    $('.statusform').remove();
                    $('.formlogin').append('<div class=statusform>Vous êtes connecté</div>');
                    $('.statusform').css('color', 'green').effect('slide', 500);
                    setTimeout(function(){
                        window.location.replace("/Php_MVC/Blog_test/");
                    }, 1000); 
                    break;
                    case '1':
                    $('.statusform').remove();
                    $('.formlogin').append('<div class=statusform>Mauvais Login ou Mot de passe</div>');
                    $('.statusform').effect('slide', 500);
                    break;
                    case '2':
                    $('.statusform').remove();
                    $('.formlogin').append('<div class=statusform>Veuillez remplir le formulaire</div>');
                    $('.statusform').effect('slide', 500);
                    break;
                }
            },
            error: function(err){
                console.log(err);
            }
        })
    });

    $('.mail').hover(function(){
        $(this).animate({
            width: '200px',
            heigth: '64px'
        }, 'fast', function(){
            $(this).find('span').show('fade');
        });
        }, function(){
            $(this).animate({
                width: '69px'
            }, 'slow', function(){
                $(this).find('span').hide('fade');
            });
    });
});