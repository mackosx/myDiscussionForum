/**
 * Created by macke on 2017-03-08.
 */
var headerHeight = 210;
// fixed scroll bar once user scroll past header
$(window).bind('scroll', function () {
    if ($(window).scrollTop() > headerHeight) {
        $('#navbar').removeClass('top-navbar');
        $('#navbar').addClass('fixed-navbar');

    } else {
        $('#navbar').removeClass('fixed-navbar');
        $('#navbar').addClass('top-navbar');
    }
});


$(document).ready(function () {
    var forms = document.getElementsByTagName("form");
    for (var i = 0; i < forms.length; i++) {
        forms[i].addEventListener('submit', formValidation);
    }
    document.getElementById('icon').addEventListener('click', navClick);
    /*
     Modal Login Box
     */
// Get the modal
    var modal = document.getElementById('myModal');

// Get the button that opens the modal
    var btns = document.getElementsByClassName("loginBtn");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
    for(var i = 0; i < btns.length; i++){
        btns[i].onclick = function () {
            modal.style.display = "block";
        }
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
function navClick() {
    $('#navbar').toggleClass('responsive');
}
function formValidation(e) {
    var classes, bValid;
    var inputs = e.target.children[0].children;
    for (var i = 0; i < inputs.length; i++) {
        // Allow for multiple values being assigned to the class attribute
        classes = inputs[i].className.split(' ');

        for (var classCount = 0; classCount < classes.length; classCount++) {

            switch (classes[classCount]) {
                case 'username' :
                    bValid = isUsername(inputs[i].value);
                    break;
                case 'password' :
                    bValid = isPassword(inputs[i].value);
                    break;
                case 'email' :
                    bValid = isEmail(inputs[i].value);
                    break;
                default:
                    bValid = true;
            }
            if (bValid == false) {
                e.preventDefault();
                // If this field is invalid, leave the testing early,
                // and alert the user to this error
                alert('Please review the value you provided for ' + inputs[i].name);
                inputs[i].select();
                inputs[i].focus();
                return false;
            }
        }
    }

    function isUsername(strValue) {
        var regex = /^[a-z0-9_-]{3,15}$/;
        return (strValue != '' && regex.test(strValue));
    }

    function isPassword(strValue) {
        // matches at least one uppercase, one number, 4-10 characters
        var regex = /((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,10})/;
        return (regex.test(strValue) && strValue != '');
    }

    function isEmail(strValue) {
        // validates email
        var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return (strValue != '' && regex.test(strValue));
    }
}
