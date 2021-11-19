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

// Pong screenshot descriptions.
pong_desc = [
	"Pong window",
	"Pong on launch (scores are initialized at 0)",
	"Score display can hold 2 digits"
];

let revealSound = new Audio("sound/20.wav");

$(document).ready(function() {

	// Hide easter egg.
	let phoneNum = document.getElementById("phone-number-field");
	if (phoneNum != undefined)
		phoneNum.style.display = "none";

	$('.sidenav').sidenav();
	$('.parallax').parallax();
	$('#message').characterCounter();
	$('.carousel').carousel({
		dist: 0,
		padding: 0,
		fullWidth: true,
		indicators: true,
		onCycleTo: function(data) {
			$('#rbdesc').html(rb_desc[$(data).index() - 1]);
			$('#eddesc').html(ed_desc[$(data).index() - 1]);
			$('#pongdesc').html(pong_desc[$(data).index() - 1]);
		}
	});

	// Carousel left & right arrows.
	$('.carousel-move-prev').click(function() {
		$('.carousel').carousel('prev');
	});
	$('.carousel-move-next').click(function() {
		$('.carousel').carousel('next');
	});
});

// Easter egg stuff.
function reveal() {
    document.getElementById("phone-number-field").style.display = "block";
}

function sendbtn() {

    let phone = document.getElementById("phone-number").value;
    if (phone == "173")
        window.location.href = "zbie.html";

    else if (phone == "666")
        window.location.href = "https://thesatanictemple.com/"

    else if (phone == "118 218")
        window.location.href = "https://www.118218.fr/"

    else if (phone == "1789")
        window.location.href = "https://fr.memedroid.com/memes/tag/bastille"

    else if (phone == "3630")
        window.location.href = "https://www.youtube.com/embed/7G6xeJqh_fI?autoplay=1"

    else if (phone == "3640")
        window.location.href = "https://www.youtube.com/embed/R9AOOcJ8vh4?autoplay=1"

    else if (phone == "1917")
        window.location.href = "https://www.youtube.com/embed/Rm6q_3WGy9M?autoplay=1"

    else if (phone == "0")
        window.location.href = "https://ahseeit.com/french/?qa=381/jesus-quand-respawn-jours-qpres-mort-quil-juda-lavait-balance"

    else if (phone == "7")
        window.location.href = "https://fr.wikipedia.org/wiki/Les_Sept_P%C3%A9ch%C3%A9s_capitaux_et_les_Quatre_Derni%C3%A8res_%C3%89tapes_humaines"

    else if (phone == "420")
        window.location.href = "https://www.youtube.com/watch?v=cccxMrZtYoo&autoplay=1"
}
