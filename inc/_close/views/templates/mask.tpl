<div class="form-group">
	<label for="editMask_snippetName_{$cuEditorId}" class="col-sm-2 control-label">Name</label>

	<div class="col-sm-10">
		<input type="text"
			   class="form-control"
			   id="editMask_snippetName_{$cuEditorId}"
			   name="snippetdata[snippet_name]"
			   value=""
			   placeholder="Snippet Name">
	</div>
</div>
<div class="form-group">
	<label for="editMask_snippetInformation_{$cuEditorId}"
		   class="col-sm-2 control-label">Information</label>

	<div class="col-sm-10">
<textarea
	class="form-control"
	id="editMask_snippetInformation_{$cuEditorId}"
	name="snippetdata[snippet_information]"></textarea>
	</div>
</div>
<div class="form-group">
	<label for="editMask_snippetTags_{$cuEditorId}"
		   class="col-sm-2 control-label">Tags</label>

	<div class="col-sm-10">
<textarea
	class="form-control"
	id="editMask_snippetTags_{$cuEditorId}"
	name="snippetdata[snippet_tags]"></textarea>
	</div>
</div>
<div class="form-group">

	<label for="editMask_snippetLanguage_{$cuEditorId}" class="col-sm-2 control-label">Language</label>

	<div class="col-sm-10">
		<select name="snippetdata[snippet_language_id]" id="editMask_snippetLanguage_{$cuEditorId}">
			{html_options options=$allLanguagesOptionsArray}
		</select>
	</div>

</div>

<div class="form-group">
	<label for="{$cuEditorId}"
		   class="col-sm-2 control-label">Code</label>

	<div class="col-sm-10">
		<pre id="{$cuEditorId}" class="cueditorEdit"></pre>
	</div>
</div>

<input type="hidden" name="snippetdata[snippet_code]" class="snippetContentHiddenField" />