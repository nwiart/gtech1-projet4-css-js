<!-- Navbar and mobile sidenav. -->
<nav>
	<div class="nav-wrapper black">
		<a href="index.php" class="brand-logo center" rel="nofollow">Portfolio Ethan & Noah</a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

		<ul class="right hide-on-med-and-down">
			<li><a href="pong.php" class="btn waves-effect waves-light red darken-2">Pong</a></li>
			<li><a href="ug-editor.php" class="btn waves-effect waves-light red darken-2">UGE Editor</a></li>
			<li><a href="rb.php" class="btn waves-effect waves-light red darken-2">Roll-A-Ball!</a></li>
		</ul>
		<ul class="left hide-on-med-and-down">
			<li><a href="rb.php" class="btn waves-effect waves-light">Sign Up</a></li>
			<li><a href="#modal-signin" class="btn waves-effect waves-light modal-trigger">Sign In</a></li>
		</ul>
	</div>
</nav>

<ul class="sidenav grey darken-3" id="mobile-demo">
	<li><a href="pong.php" class="btn red darken-2">Pong</a></li>
	<li><a href="ug-editor.php" class="btn red darken-2">UGE Editor</a></li>
	<li><a href="rb.php" class="btn red darken-2">Roll-A-Ball!</a></li>

	<li><a href="rb.php" class="btn waves-effect waves-light">Sign Up</a></li>
	<li><a href="rb.php" class="btn waves-effect waves-light">Sign In</a></li>
</ul>



<div id="modal-signin" class="modal">
    <div class="modal-content">
        <h3>Sign In</h3>
        <p>
            Please fill in the form below if you wish to send us a message. <br />
            Note : Be on the lookout for any strange detail on the main page. If you find it, be sure to come back here!
        </p>

        <!-- Contact form. -->
        <form method="post" action="signin.php" class="col s12">
            <div class="row" id="contact-block">
                
                <!-- Form layout. A certain number of columns are taken on either side depending on the screen width. -->
                <div class="col l2 m1 hide-on-small-only"></div>
                <div class="col s12 m10 l8">

					<!-- Login. -->
                    <div class="input-field">
                        <i class="material-icons prefix red-text text-darken-2">account_circle</i>
                        <input name="login" id="login" type="text" required="" aria-required="true" />
                        <label for="login">Login</label>
                        <span class="helper-text" data-error="wrong" data-success="right"></span>
                    </div>

					<!-- Password. -->
                    <div class="input-field">
                        <i class="material-icons prefix red-text text-darken-2">key</i>
                        <input name="password" id="password" type="password" required="" aria-required="true" />
                        <label for="password">Password</label>
                    </div>

                    <div class="center">
                        <button type="submit" class="btn waves-effect waves-light red darken-2">Sign In</button>
                    </div>
                </div>
                <div class="col l2 m1 hide-on-small-only"></div>

            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close btn waves-effect waves-green red darken-2">Close</a>
    </div>
</div>