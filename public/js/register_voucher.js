/**
 * handle Register voucher
 *
 * @return json response
 */
$('.btn-register-voucher').on('click',function(event){
    event.preventDefault();
    var msg=$(this).attr('alt');
    var pointVoucher = parseInt($(this).attr('data-pointVoucher'));
    var pointUser = parseInt($('#point').html());
    if (pointUser >= pointVoucher) {
        if(confirm(msg)){
          var url = "/user/register-voucher/";
          var voucherId = $(this).val();
          var not_received = $(this).attr('data-not-received');
          url += voucherId;
          var get = "GET";
          $.ajax({
              type: get,
              url: url,
              dataType: 'json',
              success: function(data) {
                  $('#point').html(data.newPoint);
                  $('#item-none > .item-voucher-id').html(data.exchangeVoucher.id);
                  $('#item-none > .item-voucher-name').html(data.exchangeVoucher.name);
                  $('#item-none > .item-voucher-point').html(data.exchangeVoucher.point);
                  $('#item-none > .item-voucher-value').html(data.exchangeVoucher.value);
                  $('#item-none > .item-voucher-created').html(data.exchangeVoucher.created_at);
                  $('#item-none').clone().attr("id", "newId"+data.exchangeVoucher.id).appendTo(".add-voucher");
                  $('#newId'+data.exchangeVoucher.id).css('display', 'table-row');
              },
              error: function(data) {
                  console.log('Error:', data);
              }
          });
        }
        return false;
    } else {
      var infoPoint = $(this).attr('data-infoPoint');
      alert(infoPoint);
    }
});

/**
 * Delete voucher of user
 *
 * @return response
 */
$('.btn-delete-voucher-user').on('click',function(event){
    event.preventDefault();
    var msg=$(this).attr('alt');
    if(confirm(msg)){
        var urlDel = "/user/delete-voucher/";
        var exchangeVoucherId = $(this).val();
        urlDel += exchangeVoucherId;
        var get = "GET";
        $.ajax({
            type: get,
            url: urlDel,
            success: function(data) {
                $("#exchange-voucher-" + exchangeVoucherId).remove();
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    }
    return false;
});

/**
 * Accept voucher of user
 *
 * @return response
 */
$('.btn-accept-voucher').on('click',function(event){
    event.preventDefault();
    var msg=$(this).attr('alt');
    if(confirm(msg)){
        var urlAccept = "/admin/accept-voucher/";
        var exchangeVoucherId = $(this).val();
        urlAccept += exchangeVoucherId;
        var get = "GET";
        $.ajax({
            type: get,
            url: urlAccept,
            success: function(data) {
                $('.not-received-'+exchangeVoucherId).css('display', 'none');
                $('.status-received-'+exchangeVoucherId).css('display', 'inline');
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    }
    return false;
});
