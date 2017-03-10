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


$(document).ready(function(){

    document.getElementById('icon').addEventListener('click', navClick);
    /*
     Modal Login Box
     */
// Get the modal
    var modal = document.getElementById('myModal');

// Get the button that opens the modal
    var btn = document.getElementById("loginBtn");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
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
    var x = document.getElementById("navbar");
    var main = document.getElementsByTagName("main")[0];

    if (x.className === "top-navbar" || x.className === "fixed-navbar") {
        x.className += " responsive";
        main.style.marginTop = "0";
    } else {
        x.className = "top-navbar";
        main.style.marginTop = "3em";

    }
}