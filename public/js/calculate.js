$( "#calculate-form" ).submit(function( event ) {
 
    // Stop form from submitting normally
    event.preventDefault();

    $.ajax({
        type: "POST",
        url: '/calculate',
        data: $('#calculate-form').serialize(),
        success: function(data)
        {
            $('#resultContainer').addClass('displayed');
            //data - response from server
            $('#resultValue').html(data.price.toLocaleString());
        },
        dataType: 'json'
      });
   
  });