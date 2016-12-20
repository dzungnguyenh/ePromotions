$('.view-detail-cus').click(function(){
    var parent = $(this).parents("#mainn");
    parent.children('.detail-customer').slideToggle(500);
});

// Method accept order
$('.accept-book').on('click', function(event){
    //status=1(order was accept) status=0(order haven't accept yet);
    var status = $(this).attr('alt');
    if(status == 0){
        $(this).attr('alt', '1');
        // id: id of order_detail
        var id = $(this).attr('role');
        var span_name="span-status"+id;
        //set status =1(was accept)
        $("span[class="+span_name+"]").html("1");
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            }
        });
        var url = "/acceptbook/"+id;
        $.ajax({
            type: 'GET',
            url: url, 
            dataType:'text',
            success: function(data){
                //if accept order success then show notice success
                if(data=='true'){
                    $('.alert-accept').show();
                }
            },
            error: function(data){
                console.log('error' +data);
            }
        });
     }   
}); 
