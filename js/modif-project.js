$(document).ready(function() {

	$(".paragraph-image").hover(
		function() {
			$(this).css("transition", "0.3s");
			$(this).css("opacity", 0.5);
		},

		function() {
			$(this).css("opacity", 1.0);
		}
	);

	$(".paragraph-image").click(function() {
		let id = $(this).attr("id");
		$("#input-" + id).trigger("click");
	});

	$("#add-paragraph").click(function() {
		let req = new XMLHttpRequest();
		req.open("GET", "action-project-paragraph.php?action=new&pr=" + project);
		req.send();
		reload();
	});



	let grid = $(".grid");
	grid.children().css("margin", grid.attr("grid-s"));
});



function deleteProject(id)
{
	if (!confirm("Do you want to delete this paragraph?\nThis cannot be undone!"))
		return;

	let req = new XMLHttpRequest();
	req.open("GET", "action-project-paragraph.php?action=delete&id=" + id);
	req.send();
	reload();
}

function reload()
{
	let block = $(".project-presentation");

	let req = new XMLHttpRequest();
	req.addEventListener("load", function() {
		block.empty();
		block.append(this.responseText);
	});
	req.open("GET", "modif-project-list.php?pr=" + project);
	req.send();
}