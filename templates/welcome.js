$(document).ready(function() {
    var yetVisited = localStorage['visited'];
    if (!yetVisited) {
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 5000
            };
            toastr.success('SY Code: '+$('#sy_code').val(), 'Welcome '+ ucwords($('#user_fullname').val()));

        }, 1300);
        localStorage['visited'] = "yes";
    }
});
