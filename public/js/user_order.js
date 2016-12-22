$('.btn-delete-user-order').on('click',function(event){
    event.preventDefault();
    var msg = $(this).attr('alt');
    if(confirm(msg)){
        $(this).parent('.form-delete-user-order').submit();
    }
    return false;
});
