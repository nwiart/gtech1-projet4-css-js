// Roll-A-Ball screenshot descriptions for carousel.
rb_desc = [
    "Splashscreen",
    "The game's main menu",
    "Level select menu, with a simplified 3D representation of the selected level.",
    "The floating island level",
    "Speed display turning red and field of view increasing at high speeds."
];

$(document).ready(function() {
    $('.sidenav').sidenav();
    $('#message').characterCounter();
    $('.carousel').carousel({
        dist: 0,
        padding: 0,
        fullWidth: true,
        indicators: true,
        onCycleTo: function(data) {
            $('.rbdesc').html(rb_desc[$(data).index()]);
        }
    });
});