/**
 * onclick disabled and hangling ajax button vote
 */
$(document).ready(function(){
    var url = "/product";
    $('.vote').click(function(){
        var productId = $(this).val();
        url += '/' + productId;
        var get = "GET";
        $.ajax({
            type: get,
            url: url,
            dataType: 'json',
            success: function(data) {
                $('#ajaxVote' + productId).html(data);
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
        $(this).prop('disabled', true);
    });
});