/**
 * onclick disabled and hangling ajax button vote
 */
$(document).ready(function(){
    $('.vote').click(function(){
        var url = "/vote-product/";
        var dataLogin = $(this).attr('data-login');
        var productId = $(this).val();
        url += productId;
        if (!dataLogin) {
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
        } else {
            var pleaseLogin = $('#please-login').attr('data-please-login');
            alert(pleaseLogin);
        }
    });

    $('.share').click(function(){
        var urlShare = "/share-product/";
        var dataLogin = $(this).attr('data-login');
        var productId = $(this).val();
        urlShare += productId;
            var get = "GET";
            $.ajax({
                type: get,
                url: urlShare,
                dataType: 'json',
                success: function(data) {
                    if (!dataLogin) {
                        $('#pointOfUser').html(data);
                    }
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
    });
});