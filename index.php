<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WordPress Switcher</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.rawgit.com/biohzrdmx/jQuery.Alert/8d672bbd/jquery.alert.css">
	<style>
		body {
			font-family: 'Roboto', sans-serif;
			background: #FAFAFA;
			color: #232323;
			font-size: 14px;
			display: flex;
			min-height: 100vh;
			flex-direction: column;
		}
		h1, h2, h3, h4 {
			font-weight: 300;
			margin-bottom: 15px;
		}
		h1 { font-size: 2.441em; }
		h2 { font-size: 1.953em; }
		h3 { font-size: 1.563em; }
		h4 { font-size: 1.25em;  }
		p {
			margin-bottom: 15px;
			line-height: 1.5;
		}
		small {
			font-size: 0.85em;
		}
		hr {
			padding: 0;
			margin: 30px 0;
			border: none;
			border-bottom: 1px solid #E5E5E5;
		}
		code {
			font-family: monospace;
			background: #F1F1F1;
			padding: 2px 5px;
			border-radius: 3px;
		}
		.boxfix-vert {
			padding: 1px 0;
		}
		.margins {
			margin: 15px;
		}
		.title-section {
			margin-bottom: 30px;
			font-size: 3em;
		}
		.title-section.has-tagline {
			margin-bottom: 5px;
		}
		.tagline-section {
			font-size: 1.5em;
			margin-bottom: 30px;
		}
		.item-list {
			border: 1px solid #DDDDDD;
			position: relative;
			margin-bottom: 15px;
		}
		.item-list .item {
			padding: 15px 20px;
			position: relative;
		}
		.item-list .item:not(:last-child) {
			border-bottom: 1px solid #EEEEEE;
		}
		.item-list .item .item-name {
			font-size: 1.15em;
			margin-bottom: 4px;
		}
		.item-list .item .item-details {
			color: #777777;
		}
		.item-list .item .item-actions {
			position: absolute;
			top: 50%;
			right: 15px;
			margin-top: -16px;
		}
		.button {
			background: none;
			border: 1px solid #DDDDDD;
			color: #565656;
			padding: 8px 15px;
			text-decoration: none;
			/* inline-block */
			display: inline-block;
			*display: inline;
			*zoom: 1;
			/* transition */
			-webkit-transition: all 350ms;
			-o-transition: all 350ms;
			transition: all 350ms;
		}
		.button:hover {
			background: #C4C4C4;
			border: 1px solid #C4C4C4;
			color: #FFFFFF;
		}
		.button.button-primary {
			background: #03A9F4;
			border: 1px solid #03A9F4;
			color: #FFFFFF;
		}
		.button.button-primary:hover {
			background: #0397DB;
			border: 1px solid #0397DB;
			color: #FFFFFF;
		}
		.button.disabled {
			/* opacity */
			-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=65)";
			filter: alpha(opacity=65);
			opacity: 0.65;
		}
		.text-box {
			display: block;
			margin-bottom: 10px;
			padding: 8px 10px;
			border: 1px solid #DDDDDD;
			min-width: 240px;
			font-family: inherit;
			font-size: inherit;
			/* transition */
			-webkit-transition: all 350ms;
			-o-transition: all 350ms;
			transition: all 350ms;
		}
		.text-box:focus {
			border-color: #CCCCCC;
		}
		.input-group {
			position: relative;
			margin-bottom: 15px;
			/* inline-block */
			display: inline-block;
			*display: inline;
			*zoom: 1;
		}
		.input-group .text-box {
			margin-bottom: 0;
			min-width: 180px
			padding-right: 60px;
		}
		.input-group .button {
			position: absolute;
			right: 2px;
			top: 2px;
			bottom: 2px;
		}
		.alert-overlay .alert {
			border-radius: 0;
		}
		.alert-overlay .alert .alert-message {
			border-radius: 0;
		}
		.alert-overlay .alert .alert-buttons {
			border-radius: 0;
			background: #FFFFFF;
		}
		.content-box {
			padding: 20px 30px;
			background: #FFFFFF;
			-webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.10);
			box-shadow: 0 3px 8px rgba(0, 0, 0, 0.10);
		}
		.section-container {
			flex: 1;
		}
		.app-footer .copyright {
			text-align: center;
			color: #999999;
		}
		.app-footer .copyright a {
			font-weight: 700;
			color: inherit;
			text-decoration: none;
		}
		.app-footer .copyright a:hover {
			color: #777777;
			text-decoration: none;
		}
		.text-muted {
			color: #777777;
		}
		@media (min-width: 1000px) {
			.inner {
				width: 1000px;
				margin: 0 auto;
			}
		}
	</style>
</head>
<body>
	<section class="section section-container">
		<div class="inner boxfix-vert">
			<div class="margins">
				<div class="content-box">
					<h1 class="title-section has-tagline">WordPress Switcher</h1>
					<h2 class="tagline-section">Develop all your sites under a single WordPress instance</h2>
					<p>This tool allows you to use a single WordPress codebase with an unlimited ammount of sites, one at a time; you may even have a completely different set of plugins, themes and uploads for each site!</p>
					<p>How does it work? By overwriting the <code>wp-config.php</code> file based on a profile, which contains all the essential WordPress configuration and specifying a custom <code>wp-content</code> folder for each site.</p>
					<p>You may apply an existing profile or even generate a new one based on the current contents of the <code>wp-config.php</code> file.</p>
					<br>
					<h3>Apply profile</h3>
					<p>Please select a profile to apply</p>
					<div class="item-list list-profiles"></div>
					<p class="text-muted">Warning: Applying a profile will overwrite the <code>wp-config.php</code> file on your WordPress instance.</p>
					<script type="text/template" id="partial-item-profile">
						<div class="item item-profile">
							<div class="item-name"><%= profile.name %></div>
							<div class="item-details">Content folder: <%= profile.content %></div>
							<div class="item-actions">
								<a href="#" class="button button-primary js-apply-profile" title="Apply profile" data-profile="<%= profile.name %>"><i class="fa fa-fw fa-check"></i></a>
							</div>
						</div>
					</script>
					<hr>
					<h3>Generate profile</h3>
					<p>Alternatively, if you want to convert the current <code>wp_config.php</code> into a profile, set the profile name and click the button below.</p>
					<div class="input-group">
						<input type="text" name="profile" class="text-box" value="profile-name">
						<a href="#" class="button button-primary js-generate-profile" title="Generate profile"><i class="fa fa-fw fa-check"></i></a>
					</div>
					<div class="text-muted">Warning: This will overwrite any existing file with the same name on the <code>profiles</code> folder.</div>
				</div>
			</div>
		</div>
	</section>
	<footer class="app-footer">
		<div class="inner boxfix-vert">
			<div class="margins">
				<p class="copyright">
					<small>Copyright &copy; 2017 <a href="https://github.com/biohzrdmx" target="_blank">biohzrdmx</a>. All Rights Reserved.</small>
				</p>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
	<script type="text/javascript" src="https://cdn.rawgit.com/biohzrdmx/jQuery.Alert/8d672bbd/jquery.alert.min.js"></script>
	<script type="text/javascript">
		App = function() {
			var ret = {
				init: function() {
					var obj = this;
					jQuery(document).ready(function($) {
						$.extend(true, $.alert.defaults, {
							buttonMarkup: '<button class="button button-primary"></button>',
						});
						obj.onDomReady($);
					});
				},
				onDomReady: function($) {
					var obj = this;

					obj.updateProfiles();

					$('.list-profiles').on('click', '.js-apply-profile', function(e) {
						e.preventDefault();
						var el = $(this),
							profile = el.data('profile'),
							isBusy = el.data('busy');
						if (! isBusy ) {
							el.addClass('disabled');
							el.data('busy', true);
							el.find('.fa').attr('class', 'fa fa-fw fa-cog fa-spin');
							obj.applyProfile(profile, function() {
								el.removeClass('disabled');
								el.find('.fa').attr('class', 'fa fa-fw fa-check');
								el.data('busy', false);
								$.alert('The profile has been applied successfuly!');
							});
						}
					});

					$('.js-generate-profile').on('click', function(e) {
						e.preventDefault();
						var el = $(this),
							textbox = $('[name=profile]'),
							profile = textbox.val() || 'profile-name',
							isBusy = el.data('busy');
						if (! isBusy ) {
							el.addClass('disabled');
							textbox.prop('disabled', true);
							el.data('busy', true);
							el.find('.fa').attr('class', 'fa fa-fw fa-cog fa-spin');
							obj.generateProfile(profile, function() {
								el.removeClass('disabled');
								textbox.prop('disabled', false);
								el.find('.fa').attr('class', 'fa fa-fw fa-check');
								el.data('busy', false);
								$.alert('The profile has been generated successfuly!');
								obj.updateProfiles();
							});
						}
					});
				},
				compileTemplate: function(selector) {
					var ret = _.template( $(selector).html() || '<div>Template '+selector+' not found</div>' );
					return ret;
				},
				updateProfiles: function() {
					var obj = this;
					obj.listProfiles(function(profiles) {
						var tpl = obj.compileTemplate('#partial-item-profile'),
							list = $('.list-profiles');
						list.empty();
						if (profiles) {
							_.each(profiles, function(profile) {
								list.append( tpl({ profile: profile }) );
							});
						} else {
							list.append('<div class="item"><div class="text-muted">There are no profiles to show yet, but you can generate a new profile below.</div></div>');
						}
					});
				},
				listProfiles: function(callback) {
					var obj = this;
					$.ajax({
						url: 'wp-switch.php',
						type: 'get',
						data: {
							action: 'list_profiles'
						},
						dataType: 'json',
						success: function(response) {
							if (response && response.result == 'success') {
								callback.call(obj, response.data.profiles);
							} else {
								callback.call(obj, null);
							}
						}
					})
				},
				applyProfile: function(profile, callback) {
					var obj = this;
					$.ajax({
						url: 'wp-switch.php',
						type: 'get',
						data: {
							action: 'apply_profile',
							profile: profile
						},
						dataType: 'json',
						success: function(response) {
							if (response && response.result == 'success') {
								callback.call(obj);
							}
						}
					})
				},
				generateProfile: function(profile, callback) {
					var obj = this;
					$.ajax({
						url: 'wp-switch.php',
						type: 'get',
						data: {
							action: 'generate_profile',
							profile: profile
						},
						dataType: 'json',
						success: function(response) {
							if (response && response.result == 'success') {
								callback.call(obj);
							}
						}
					})
				}
			};
			ret.init();
			return ret;
		};
		var app = new App();
	</script>
</body>
</html>