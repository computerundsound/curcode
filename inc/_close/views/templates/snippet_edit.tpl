<div class="modal fade" id="cuAddNewMask" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add new Snippet</h4>
			</div>
			<div class="modal-body">
				{* Content START *}

				{*{debug}*}

				<div class="row">

					<div class="col-md-12">
						<!--suppress HtmlUnknownTarget -->
						<form class="form-horizontal"
							  name="formSnippetAdd"
							  enctype="application/x-www-form-urlencoded"
							  method="post">


							{include file="mask.tpl" cuEditorId='cuEditorAdd'}

							<input type="hidden" name="snippetdata[insert]" value="true" />

						</form>

					</div>

					<br style="clear: both;">

				</div>

				{* Content END *}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary saveSnippet" data-action="add">Save</button>
			</div>
			<input type="hidden" value="" name="" />
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="cuEditMask" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add new Snippet</h4>
			</div>
			<div class="modal-body">
				{* Content START *}

				{*{debug}*}

				<div class="row">

					<div class="col-md-12">
						<!--suppress HtmlUnknownTarget -->
						<form class="form-horizontal"
							  name="formSnippetEdit"
							  enctype="application/x-www-form-urlencoded"
							  method="post">

							{include file="mask.tpl" cuEditorId='cuEditorEdit'}

							<input type="hidden" name="snippetdata[update]" value="true" />
							<input type="hidden" name="snippetdata[snippet_id]" value="" />

						</form>

					</div>

					<br style="clear: both;">

				</div>

				{* Content END *}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary saveSnippet" data-action="edit">Update</button>
			</div>
			<input type="hidden" value="" name="" />
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div><!-- /.modal -->
