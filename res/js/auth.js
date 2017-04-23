$('.message a').click(function() {
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

$('.form').on('click', '.register-button', function(event) {
    event.preventDefault();
    $('.error').remove();
    name = $.trim($('.name-input').val());
    email = $('.email-input').val();
    password = $.trim($('.password-input').val());
    repassword = $.trim($('.repassword-input').val());
    if (name.length > 3 && isEmail(email) && password.length > 7 && password == repassword) {
        $('.register-form').submit();
    } else {
        if (name.length <= 3) {
            $('.name-input').after('<li class="error">Name need more than 3 character.</li>');
        }
        if (!isEmail(email)) {
            $('.email-input').after('<li class="error">This value should be a valid email.</li>')
        }
        if (password.length <= 7) {
            $('.password-input').after('<li class="error">Password need more than 7 character.</li>')
        }
        if (password != repassword) {
            $('.repassword-input').after('<li class="error">Password and repassword are different.</li>')
        }
    }
});

$('.form').on('click', '.login-button', function(event) {
    event.preventDefault();
    $('.error').remove();
    email = $('.login-email-input').val();
    password = $.trim($('.login-password-input').val());
    if (isEmail(email) && password.length > 7) {
        $('.login-form').submit(); 
    } else {
        if (!isEmail(email)) {
            $('.login-email-input').after('<li class="error">This value should be a valid email.</li>')
        }
        if (password.length <= 7) {
            $('.login-password-input').after('<li class="error">Password need more than 7 character.</li>')
        }
    }
});

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
