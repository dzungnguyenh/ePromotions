/**
 * Accept delete a point
 * @param  Object objButton []
 * @return boolean
 */
$(".btn-delete").on('click', function(event){
    event.preventDefault();
    var confirmMsg = $(this).attr('alt');
    if (confirm(confirmMsg)){
        document.getElementById('form-delete-point').submit();
    }else{
        return false;
    }
})

/**
 * Logout
 * @return void
 */
$(".btn-logout").on('click', function(event){
    event.preventDefault();
    document.getElementById('logout-form').submit();
})
