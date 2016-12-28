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

$(document).ready(function(){
    $('.accept-order').click(function(){
        var url = "/business/accept-order/";
        var orderId = $(this).val();
        url += orderId;
        var get = "GET";
        $.ajax({
            type: get,
            url: url,
            dataType: 'json',
            success: function(data) {
                $('#accept-order' + orderId).html(data);
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
        $(this).prop('disabled', true);
    });
});
