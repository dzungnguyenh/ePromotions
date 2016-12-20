$('.view-detail-cus').click(function(){
    var parent = $(this).parents("#mainn");
    parent.children('.detail-customer').slideToggle(500);
});
