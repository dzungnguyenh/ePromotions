/**
 * Accept delete a point
 * @param  Object objButton []
 * @return boolean
 */
$(".btn-delete").on('click', function(event){
    event.preventDefault();
    var confirmMsg = $(this).attr('alt');
    if (confirm(confirmMsg)){
        $('#form-delete-point').submit();
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
    $('#logout-form').submit();
})

/**
 * Accept delete a business
 *
 * @return bollean
 */
$(".btn-delete-business").on('click', function(event){
    event.preventDefault();
    var id = $(this).attr('id');
    var confirmMsg = $(this).attr('name') + $(this).attr('alt');
    if (confirm(confirmMsg)){
        $('#form-delete-business-' + id).submit();
    }else{
        return false;
    }
})

/**
 * Accept delete a category
 *
 * @return bollean
 */
$(".btn-delete-category").on('click', function(event){
    event.preventDefault();
    var id = $(this).attr('id');
    var confirmMsg = $(this).attr('name') + $(this).attr('alt');
    if (confirm(confirmMsg)){
        $('#form-delete-category-' + id).submit();
    }else{
        return false;
    }
})

/**
 * Delete a user
 *
 * @return boolean
 */
$(".btn-delete-user").on('click', function(event){
    event.preventDefault();
    var id = $(this).attr('id');
    var confirmMsg = $(this).attr('name') + $(this).attr('alt');
    if (confirm(confirmMsg)){
        $('#form-delete-user-' + id).submit();
    }else{
        return false;
    }
})