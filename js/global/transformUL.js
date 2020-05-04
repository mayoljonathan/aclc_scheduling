$(document).ready(function(){
    $(".letter-only").keypress(function(e) {
        if((e.which < 97 || e.which > 122 ) && (e.which < 65 || e.which > 90)) {
            e.preventDefault();
        }
    });
});

function ucwords (str) {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
    });
}

function strtoupper (str) {
    return (str+'').toUpperCase();
}

function strtolower (str) {
    return (str+'').toLowerCase();
}


