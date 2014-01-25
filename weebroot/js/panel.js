/**
 * @author Flavio Keiber, flavio@swagpeople.ch
 * @copyright swagpeople 2014(c)
 *
 * Opens a Panel for a interaktion
 */
$(document).ready(function() {
    $(".topMenuAction").click( function() {
        if ($("#openCloseIdentifier").is(":hidden")) {
            $("#slider").animate({
                marginTop: "-141px"
                }, 500 );
            $("#topMenuImage").html('Open');
            $("#openCloseIdentifier").show();
        } else {
            $("#slider").animate({
                marginTop: "0px"
                }, 500 );
            $("#topMenuImage").html('Close');
            $("#openCloseIdentifier").hide();
        }
    }); 
});

