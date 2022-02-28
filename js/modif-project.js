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
		// Ask PHP to add a new paragraph, then reload when done.
		serverAction("action-project-paragraph.php?action=new&pr=" + project, function() {
			reload();
		});
	});



	let grid = $(".grid");
	grid.children().css("margin", grid.attr("grid-s"));
});



function changeVisibility(id, visible)
{
	if (!confirm("Change the visibility to " + (visible ? "visible?" : "hidden?")))
		return;

	let v = visible ? 1 : 0;
	serverAction("action-project.php?action=visible&pr=" + id + "&v=" + v, function() {
		location.reload();
	});
}

function updateParagraph(id)
{
	let data = new FormData();
	data.append("title",   $("input#para_title_" + id).val());
	data.append("content", $("textarea#para_content_" + id).val());

	let req = new XMLHttpRequest();
	//req.addEventListener("load", callback);
	req.open("POST", "action-project-paragraph.php?action=update&id=" + id);
	req.send(data);

	// Hide the save button.
	$("button#para_save_" + id).css("display", "none");
}

function deleteParagraph(id)
{
	if (!confirm("Do you want to delete this paragraph?\nThis cannot be undone!"))
		return;

	serverAction("action-project-paragraph.php?action=delete&id=" + id, function() {
		reload();
	});
}

function reload()
{
	let block = $(".project-presentation");

	serverAction("modif-project-list.php?pr=" + project, function() {
		block.empty();
		block.append(this.responseText);

		// Make save button visible when editing a paragraph.
		const onChange = function() {
			let id = $(this).attr("para-id");
			$(".btn#para_save_" + id).css("display", "block");
		}
		$("input").change(onChange);
		$("textarea").change(onChange);
	});
}