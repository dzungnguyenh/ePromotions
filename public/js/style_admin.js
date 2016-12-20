/**
 * Load avatar and display
 */
$('#load-avatar').change(function(){
    event.preventDefault();
    var output = $('#output')[0];
    output.src = URL.createObjectURL(event.target.files[0]);
})

/**
 * Change type password to type text                                                                       [description]
 */
$('#show-password').on('change', function(){
    $('#old-password').attr('type',$('#show-password').prop('checked') == true ? "text":"password");
    $('#reset-password').attr('type',$('#show-password').prop('checked') == true ? "text":"password");
});

$('.delete-product').on('click',function(event){
    event.preventDefault();
    var msg=$(this).attr('alt');
    if(confirm(msg)){
        $('.form-delete-product').submit();
    }
    return false;
});

/**
* Method to confirm before update product
*/
$('#btn-product-update').on('click',function(event){
    event.preventDefault();
    var msg=$(this).attr('alt');
    if(confirm(msg)){
        $('.product-update-form').submit();
    }
    return false;
});

/**
 * Accept delete a voucher
 * @param  Object objButton []
 * @return boolean
 */
$(".btn-delete-voucher").on('click', function(event){
    var confirmMsg = $(this).attr('alt');
    return confirm(confirmMsg);
})


/**
 * Accept delete a event
 *
 * @return bollean
 */
$(".btn-delete-events").on('click', function(event){
    event.preventDefault();
    var confirmMsg = $(this).attr('alt');
    if (confirm(confirmMsg)){
        $('#delete-event').submit();
    }else{
        return false;
    }
})

/**
 * Display category in select box.
 */
$('#mydropdownmenu > li').click(function(e){
    e.preventDefault();
    var selected = $(this).text();
    $('#mydropwodninput').val(selected);
    $('#mydropdowndisplay').text(selected);
})

/**
 * Show message into alert box
 */
$(document).ready(function(){
    function isEmpty( el ){
      return !$.trim(el.html())
  }
  if (!isEmpty($('#session-message'))) {
    var message = $("#session-message").text();
    return alert(message);
  }
})
