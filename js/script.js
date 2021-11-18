// Roll-A-Ball screenshot descriptions for carousel.
rb_desc = [
    "Splashscreen",
    "The game's main menu",
    "Level select menu, with a simplified 3D representation of the selected level",
    "The floating island level",
    "The fire-themed level, with flying enemies",
    "Speed display turning red and field of view increasing at high speeds"
];

// UGE Editor screenshot descriptions.
ed_desc = [
    "The main window with the level editor",
    "Open project dialog",
    "About window featuring a banner showing a scene from Roll-A-Ball"
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
            $('#rbdesc').html(rb_desc[$(data).index()]);
            $('#eddesc').html(ed_desc[$(data).index()]);
        }
    });
});