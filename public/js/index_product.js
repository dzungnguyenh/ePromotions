$('.btn-detail-product').click(function(){
    $(this).parent('.item-product').children('.detail-product').slideToggle();
});

$(document).mouseup(function (e)
{
    var container = $('.detail-product');
    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
    }
});