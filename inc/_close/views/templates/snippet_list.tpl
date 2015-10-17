<div class="snippetOutputWrapper">

	<form class="form-inline"
		  method="get"
		  enctype="application/x-www-form-urlencoded"
		  name="formSearch"
		  id="formSearch">
		<div class="form-group">

			<label>Language: <select class="form-control" name="snippet_language">
					{html_options options=$allLanguagesOptionsArray selected=$snippetLanguage}
				</select> </label>

		</div>
		<div class="form-group">
			<label class="sr-only" for="inputSearchString">Show Snippets</label>

			<div class="input-group">
				<input type="text"
					   name="snippetSearchString"
					   class="form-control"
					   id="inputSearchString"
					   value="{$snippetSearchString}">
			</div>
		</div>
		<button type="submit" class="btn btn-info searchSnippetBtn">Search String</button>

		<button type="button" class="btn btn-primary addSnippetButton">Add New Snippet</button>
	</form>

	<br />

	{*{debug}*}

	<form action="codesnippet_edit.php" method="post" name="formAction" enctype="application/x-www-form-urlencoded">

		<input type="hidden" name="action" /> <input type="hidden" name="actionValue" />

	</form>

	{foreach $snippetListArray as $snippet}
		<div class="row">

			<div class="col-sm-4">{$snippet->getName()|escape:html}</div>
			<div class="col-sm-8">Language: <strong>{$languageArrayKeyAsId[$snippet->getLanguageId()]['name']}</strong></div>

		</div>
		<div class="row">
			<div class="col-sm-4">{$snippet->getInformation()|escape:html}</div>
			<div class="col-sm-8">

				<button type="button" class="btn btn-info copySnippetToClipboard">Mark</button>
				<button type="button" class="btn btn-info switchSnippetBlockWrapper">Show Snippet</button>
				<button type="button" class="btn btn-info editSnippet" data-fieldSetID="{$snippet->getSnippetId()}">
					Edit
				</button>
				<button type="button"
						class="btn btn-danger btnSnippetDelete"
						data-fieldSetID="{$snippet->getSnippetId()}">Delete
				</button>
				<pre class="snippetBlockWrapper"><code>{$snippet->getCode()|stripcslashes|escape:html}</code></pre>
				<input type="hidden" name="snippedCode" value="{$snippet->getCode()|stripcslashes|escape:html}" />

			</div>
			<div class="col-sm-12">
				<hr />
			</div>
		</div>
	{/foreach}


	<!-- Modal -->
	<div class="modal fade"
		 id="copyCodeModal"
		 tabindex="-1"
		 role="dialog"
		 aria-labelledby="myModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Press CTRL-C (STRG-C) to copy to clippboard.</h4>
				</div>
				<div class="modal-body">

					<!--suppress HtmlFormInputWithoutLabel -->
					<textarea cols="30" rows="10" class="form-control"></textarea>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</div>