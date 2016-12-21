
$(document).ready(function(){

   $('#quantity').bind('keyup mouseup', function () {
		// Get the quantity value
		var quantity = $("#quantity").val();
		// Check if equal 0 of not
		if(quantity == 0 ){
			// Change value total to 0
			$('#price').val(0);
			// Change content span error
			$('#error-quantity').html(error_quantity);
            alert(error_quantity);
		}else{
			// Get the price value
            var unit_price = $("#unit_price").val();
            // Get the total value
            var price = unit_price*quantity;
            // Change content span error to empty
            $('#error-quantity').html('');
            // Change value total
            $('#price').val(price);
        }       
    });
    $('#form-booking').submit(function () {
    // Get the quantity value and
    var quantity = $("#quantity").val();
    // Check if empty of not
    if (quantity  == 0) {
        alert(error_quantity);
        return false;
        }
    });

});
   

