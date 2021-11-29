<?php if (!isset($_SESSION)) session_start(); ?>

<!-- Navbar and mobile sidenav. -->
<nav>
	<div class="nav-wrapper black">
		<a href="index.php" class="brand-logo center" rel="nofollow">Portfolio Ethan & Noah</a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

		<ul class="right hide-on-med-and-down">
			<li><a href="#dropdown-projects" class="btn waves-effect waves-light red darken-2 dropdown-trigger"><i class="material-icons right">expand_more</i>Projects</a></li>
			<li><a href="#dropdown-users"    class="btn waves-effect waves-light dropdown-trigger"><i class="material-icons right">expand_more</i>User <?php if (isset($_SESSION["user"])) echo "(".$_SESSION["user"]["name"].")"; ?></a></li>
		</ul>
	</div>
</nav>

<!-- Mobile menu. -->
<ul class="sidenav grey darken-3" id="mobile-demo">

	<li><a href="#dropdown-projects-mobile" class="white-text red darken-2 dropdown-trigger">
		Projects<i class="material-icons right white-text">chevron_right</i>
	</a></li>

	<li><a href="#dropdown-users-mobile" class="white-text teal lighten-2 dropdown-trigger">
		User<i class="material-icons right white-text">chevron_right</i>
	</a></li>
</ul>


<?php
	function createDropdown($mobile)
	{
?>
	<!-- Projects dropdown menu. -->
	<ul id="dropdown-projects<?php if($mobile) echo "-mobile"; ?>" class="dropdown-projects dropdown-content">
	<?php
		require_once "php/functions.php";
		$projects = getProjects();

		foreach ($projects as $prj) {
	?>
			<li><a href="project.php?pr=<?php echo $prj["id"]; ?>" class="red-text text-darken-2 valign-wrapper">
				<img src="img/<?php echo $prj["id"] ?>/icon.png" alt="Icon" class="left" width="32" height="32" />
				<?php echo $prj["name"]; ?>
			</a></li>
	<?php
		}
	?>
	</ul>

	<!-- User dropdown menu. -->
	<ul id="dropdown-users<?php if($mobile) echo "-mobile"; ?>" class="dropdown-content">
		<?php
			if (isset($_SESSION["user"]))
			{?>
				<li><a href="disconnect.php" class="teal-text">Disconnect</a></li>
		<?php
			}
			else
			{?>
				<li><a href="#modal-signin" class="modal-trigger teal-text">Login</a></li>
				<li><a href="#modal-signup" class="modal-trigger teal-text">Register</a></li>
		<?php
			}
		?>
	</ul>

<?php
	}

	createDropdown(false);
	createDropdown(true);
?>



<!-- Sign In form. -->
<div id="modal-signin" class="modal">
	<div class="modal-content">
		<h3>Log in</h3>
		<p>
			Sign in to your account on our website.
		</p>

		<!-- Contact form. -->
		<form method="post" action="signin.php" class="col s12">
			<div class="container" id="contact-block">

				<!-- Login. -->
				<div class="input-field">
					<i class="material-icons prefix red-text text-darken-2">account_circle</i>
					<input name="login" id="login" type="text" required="" aria-required="true" onkeypress="return loginKeypressHandler(event)" />
					<label for="login">Login</label>
				</div>

				<!-- Password. -->
				<div class="input-field">
					<i class="material-icons prefix red-text text-darken-2">lock</i>
					<input name="password" id="password" type="password" required="" aria-required="true" />
					<label for="password">Password</label>
				</div>

				<div class="center">
					<button type="submit" class="btn waves-effect waves-light red darken-2"><i class="material-icons prefix left">login</i>Login</button>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-close btn waves-effect waves-green red darken-2">Cancel</a>
	</div>
</div>

<!-- Sign Up form. -->
<div id="modal-signup" class="modal">
	<div class="modal-content">
		<h3>Register</h3>
		<p>
			All fields below must be filled. Login can only contain lowercase letters, numbers and underscores.
		</p>

		<form method="post" action="signup.php" class="col s12">
			<div class="container" id="contact-block">

				<!-- Login. -->
				<div class="input-field">
					<i class="material-icons prefix red-text text-darken-2">account_circle</i>
					<input name="login" id="login_up" type="text" required="" aria-required="true" onkeypress="return loginKeypressHandler(event)" />
					<label for="login_up">Login</label>
				</div>

				<!-- Email address. -->
				<div class="input-field">
					<i class="material-icons prefix red-text text-darken-2">alternate_email</i>
					<input name="email" id="email_up" type="email" required="" aria-required="true" />
					<label for="email_up">Email</label>
				</div>

				<!-- Password. -->
				<div class="input-field">
					<i class="material-icons prefix red-text text-darken-2">lock</i>
					<input name="password" id="password_up" type="password" required="" aria-required="true" />
					<label for="password_up">Password</label>
				</div>

				<div class="center">
					<button type="submit" class="btn waves-effect waves-light red darken-2"><i class="material-icons prefix left">login</i>Register</button>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-close btn waves-effect waves-green red darken-2">Cancel</a>
	</div>
</div>