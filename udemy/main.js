jQuery(document).ready(function($){
    // Check if there is a stored choice in localStorage on page load
    var storedChoice = localStorage.getItem('Instrument');
    if (storedChoice) {
        // Select the radio button corresponding to the stored choice
        $('input[type=radio][value="' + storedChoice + '"]').prop('checked', true);
    }

    $('form.schatzFrage').on('change', function(e){
        e.preventDefault();
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method');
        var formId = that.attr('id');
        var chosenInstrument = $('input[type=radio]:checked').val();
        
        console.log("Chosen Instrument:", chosenInstrument);

        // Store the chosen choice in localStorage
        localStorage.setItem('schatzfrage-'+formId, chosenInstrument);

        $.ajax({
            url: url,
            type: "POST",
            data: {
                action: 'set_form',
                Instrument: chosenInstrument, // Use 'Instrument' as the key
            },
            success: function(response){
                $(".success_msg").css("display", "block");
            },
            error: function(data){
                $(".error_msg").css("display", "block");
            }
        });
    });
});


