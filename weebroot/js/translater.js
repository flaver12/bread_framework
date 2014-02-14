/**
 * @author Flavio Kleiber <flavio@swagpeople.ch>
 * @copyright Flavio Kleiber, swagpeople.ch (c) 2014
 *
 * Translate a T-Tag
 **/
function translate() {
        //Ajax request
        $.ajax({
            type: "POST",
            url: "core/translate.class.php",
            data: {call:"echoText"},
            success: function(msg) {

            }
        });
}
controlling();

    /*
    $("body").find("t").html("Doof");*/
