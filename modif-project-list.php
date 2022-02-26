<?php
	require "php/functions.php";

	$projectId = $_GET["pr"];
	$prjDesc = getProjectParagraphs($projectId);



	function paragraphImage($para) {
		echo "<div class=\"col s4 m4 l3\">"; ?>
			<img   id="img-<?php echo $para["id"]; ?>" src="<?php echo $para["square_image"]; ?>" class="left responsive-img paragraph-image" />
			<input id="input-img-<?php echo $para["id"]; ?>" type="file" accept="image/png, image/jpeg" style="display: none;" />
		<?php
		echo "</div>";
	}

	for ($i = 0; $i < sizeof($prjDesc); ++$i)
	{
		$para = $prjDesc[$i];
		$b = $i % 2 == 0;
		?>

		<div class="flex white z-depth-5">
			<div class="col s10">
				<div class="section row valign-wrapper">
					<?php if ($b) paragraphImage($para); ?>

					<div class="col s8 m8 l9">
						<input type="text" value="<?php echo $para["title"]; ?>" />
						<textarea type="text" class="materialize-textarea"><?php echo $para["content"]; ?></textarea>
					</div>

					<?php if (!$b) paragraphImage($para); ?>
				</div>
			</div>
			<div class="col s2">
				<div class="flex">
					<div class="col s6">
						<div class="up-down-buttons">
							<button class="btn <?php if ($i == 0) echo "disabled"; ?>"><i class="material-icons">arrow_upward</i></button>
							<button class="btn <?php if ($i == sizeof($prjDesc) - 1) echo "disabled"; ?>"><i class="material-icons">arrow_downward</i></button>
						</div>
					</div>
					<div class="col s6">
						<button onclick="deleteProject(<?php echo $para["id"]; ?>)" class="btn red darken-2"><i class="material-icons">delete</i></button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Dirty way of spacing paragraphs. -->
		<br/>
	<?php
	}
?>