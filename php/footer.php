<!-- Footer section. -->
<footer class="z-depth-5">
	<div class="title-block">
		<h2 id="contact-us" class="grey darken-2 white-text center">CONTACT & LINKS</h2>
	</div>

	<!-- Layout. -->
	<div id="footer-content">
		<div class="row">
			<div class="container">
				<div class="col l5 s12">
					<h3>Contact Us</h3>
					<p>If you wish to leave us a message, use the contact form by clicking on the button below :</p>
					<a href="#modal-contact-us" class="btn waves-effect waves-light modal-trigger red darken-2">Open contact form</a>
				</div>
				<div class="col l5 offset-l2 s12">
					<h3>Links</h3>
					<div class="row">
						<div class="col s4 m6 l4">
							<p>Ethan :</p>
							<ul>
								<li><a href="https://www.linkedin.com/in/ethan-joachim-gabin-a32199226/" target="blank" rel="nofollow"><i class="fa fa-linkedin"></i> My LinkedIn</a></li>
								<li><a href="https://github.com/joachim-gabin" target="blank" rel="nofollow"><i class="fa fa-github"></i> My GitHub</a></li>
							</ul>
						</div>
						<div class="col s4 m6 l4">
							<p>Noah :</p>
							<ul>
								<li><a href="https://www.linkedin.com/in/noah-wiart-182a6a221/" target="blank" rel="nofollow"><i class="fa fa-linkedin"></i> My LinkedIn</a></li>
								<li><a href="https://github.com/nwiart" target="blank" rel="nofollow"><i class="fa fa-github"></i> My GitHub</a></li>
							</ul>
						</div>
						<div class="col s4 m12 l4">
							<p>Gaming Campus :</p>
							<a href="https://gamingcampus.fr/" target="blank" rel="nofollow">Official Website</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-copyright grey lighten-2">
		<div class="container">
			© 2021 Noah WIART & Ethan JOACHIM-GABIN
		</div>
	</div>
</footer>

<!-- "Contact us" modal. -->
<div id="modal-contact-us" class="modal">
	<div class="modal-content">
		<h3>Contact Us</h3>
		<p>
			Please fill in the form below if you wish to send us a message. <br />
			Note : Be on the lookout for any strange detail on the main page. If you find it, be sure to come back here!
		</p>

		<!-- Contact form. -->
		<form class="col s12">
			<div class="row" id="contact-block">
				
				<!-- Form layout. A certain number of columns are taken on either side depending on the screen width. -->
				<div class="col l2 m1 hide-on-small-only"></div>
				<div class="col s12 m10 l8">
					<div class="row">
						<div class="col s12 m6 l6 input-field">
							<i class="material-icons prefix red-text text-darken-2">account_circle</i>
							<input id="first-name" type="text" class="validate" />
							<label for="first-name">First name (optional)</label>
						</div>
						<div class="col s12 m6 l6 input-field">
							<i class="material-icons prefix red-text text-darken-2">account_circle</i>
							<input id="last-name" type="text" class="validate" />
							<label for="last-name">Last name (optional)</label>
						</div>
					</div>

					<div class="input-field">
						<i class="material-icons prefix red-text text-darken-2">alternate_email</i>
						<input id="email" type="email" required="" aria-required="true" />
						<label for="email">Email</label>
						<span class="helper-text" data-error="wrong" data-success="right"></span>
					</div>

					<div class="input-field" id="phone-number-field">
						<i class="material-icons prefix red-text text-darken-2">phone</i>
						<input id="phone-number" type="text" />
						<label for="phone-number">Phone number or Easter Egg (optional)</label>

						<button onclick="sendbtn()" class="btn waves-effect waves-light red darken-2"><i class="material-icons left">phone</i>Call</button>
					</div>

					<div class="input-field">
						<i class="material-icons prefix red-text text-darken-2">chat</i>
						<textarea id="message" class="materialize-textarea" data-length="450" required="" aria-required="true"></textarea>
						<label for="message">Message</label>
					</div>

					<div class="center">
						<button type="submit" class="btn waves-effect waves-light red darken-2"><i class="material-icons left">send</i>Send</button>
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