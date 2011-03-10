$(document).ready(function() {
     $('.epastebin_return').hide();
});
function flashMessage(data) {
    var response = $.parseJSON(data);
    if(response.success) {
        var bck = '#66E066';
        var brd = '#52B352';
    } else {
        var bck = '#FF4D4D';
        var brd = '#FF0000';
    }
    $('.epastebin_return').css({
        backgroundColor: bck,
        border: brd
    }).html(response.message).slideToggle('slow');
}
