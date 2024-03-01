$( "#calculate-form" ).submit(function( event ) {
 
    // Stop form from submitting normally
    event.preventDefault();

    $.ajax({
        type: "POST",
        url: '/calculate',
        data: $('#calculate-form').serialize(),
        success: function(data)
        {
            //data - response from server
            $('#result').html("Total Price = " + data.price);
        },
        dataType: 'json'
      });
   
  });