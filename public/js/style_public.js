/**
 * onclick disabled and hangling ajax button vote
 */
$(document).ready(function(){
    var url = "/product";
    $('.vote').click(function(){
        var productId = $(this).val();
        $.get(url + '/' + productId, function (data) {
            //success data
            console.log(data);
            $('#ajaxVote' + productId).html(data);
        });
        $(this).prop('disabled', true);
    });
});