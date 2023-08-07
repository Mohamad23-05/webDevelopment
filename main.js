// jQuery(document).ready(function($){

//     $('form.ajax').on('submit', function(e){
//        e.preventDefault();
//        var that = $(this),
//            url = that.attr('action'),
//            type = that.attr('method');
//        var gitarre = $('.gitarre').val();
//        var floete = $('.floete').val();
//        var geige = $('.geige').val();
//        $.ajax({
//           url: url, // Use the URL from the form action
//           type: "POST",
//           data: {
//              action: 'set_form',
//              gitarre: gitarre,
//              floete: floete,
//              geige: geige,
//         },
//         success: function(response){
//             $(".success_msg").css("display", "block");
//             $('.ajax')[0].reset(); // Reset the form after success
//         },
//         error: function(data){
//             $(".error_msg").css("display", "block");
//             $('.ajax')[0].reset(); // Reset the form after error
//         }
//        });
//     });
// });

jQuery(document).ready(function($){
    // Check if there is a stored choice in localStorage on page load
    var storedChoice = localStorage.getItem('Instrument');
    if (storedChoice) {
        // Select the radio button corresponding to the stored choice
        $('input[type=radio][value="' + storedChoice + '"]').prop('checked', true);
    }

    $('form.ajax').on('submit', function(e){
        e.preventDefault();
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method');
        var chosenInstrument = $('input[type=radio]:checked').val();
        
        console.log("Chosen Instrument:", chosenInstrument);

        // Store the chosen choice in localStorage
        localStorage.setItem('Instrument', chosenInstrument);

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


