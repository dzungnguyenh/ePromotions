$(document).ready(function(){
    var user_url = "/admin/users";
    $(".block-user").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault();
        var type = "PUT";
        var user_id = $(this).attr('value');
        var my_url = user_url;
        my_url += '/' + user_id;
        $.ajax({
            type: type,
            url: my_url,
            success: function (data) {
                console.log(data);
                $("#user-" + user_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    var business_url = "/admin/business";
    $(".block-business").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault();
        var type = "PUT";
        var business_id = $(this).attr('value');
        var my_url = business_url;
        my_url += '/' + business_id;
        $.ajax({
            type: type,
            url: my_url,
            success: function (data) {
                console.log(data);
                $("#business-" + business_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $(".unlock-user").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault();
        var type = "PUT";
        var user_id = $(this).attr('value');
        var my_url = user_url;
        my_url += '/' + user_id + '/unlock';
        $.ajax({
            type: type,
            url: my_url,
            success: function (data) {
                console.log(data);
                $("#user-block-" + user_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});