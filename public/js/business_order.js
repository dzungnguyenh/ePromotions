$('.btn-delete-order-business').on('click', function(event){
    event.preventDefault();
    var msg = $(this).attr('alt');
    if(confirm(msg)){
        $(this).parent('.form-delete-order-business').submit();
    }
    else{
        return false;
    }
});
