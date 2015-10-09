<!DOCTYPE html>
<html lang="de">
	<head>
		<base href="{$standards.application_root_HTTP}" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<link rel="shortcut icon" href="/favicon.ico">

		<title>{$site_title}</title>

		<!-- Bootstrap-CSS -->
		<link href="/inc/bootstrap/css/main.css" rel="stylesheet">

		<script type="text/javascript" data-main="inc/js/{$js_files.js_entry_point}"
		src="/inc/js/require.js"></script>

	</head>

	<body>

		<div id="CuLoader">&nbsp;</div>

		<form action="" method="post" enctype="application/x-www-form-urlencoded" name="form_action">
			<input type="hidden" name="action" /> <input type="hidden" name="action_id" /> <input type="hidden"
																								  name="{$cu_reload_preventer.variname}"
																								  value="{$cu_reload_preventer.token}" />
		</form>

		{*<div class="bb-alert alert alert-info" style="display:none;">*}
		{*<span></span>*}
		{*</div>*}

		<div class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Navigation ein-/ausblenden</span> <span class="icon-bar"></span> <span
							class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">{$standards.project_name}</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">

					</ul>

				</div>
			</div>
		</div>


		<div class="container-fluid width95">

			{if $error_main_message !== null}
				<div class="row">
					<div class="col-sm-12">

						<div class="panel panel-danger">
							<!-- Default panel contents -->
							<div class="panel-heading">Error</div>
							<div class="panel-body">
								<p>
									{$error_main_message|escape}
								</p>
							</div>
						</div>

					</div>
				</div>
			{/if}

			<div class="row">
				<div class="col-sm-12">

					{$content}

				</div>
			</div>
		</div>
	</body>
</html>