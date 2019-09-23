<?php
session_start();
 ?>
<style>
.message-box{margin-bottom:20px;border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.btnEditAction{background-color:#2FC332;border:0;padding:2px 10px;color:#FFF;}
.btnDeleteAction{background-color:#D60202;border:0;padding:2px 10px;color:#FFF;margin-bottom:15px;}
</style>
<?php
require_once("DBController.php");
$db_handle = new DBController();
$comments = $db_handle->runQuery("SELECT * FROM comment");
?>
<script>
// funkcija rodyti edit
function showEditBox(editobj,id) {
	$('#frmAdd').hide();
	$(editobj).prop('disabled','true');
	var currentMessage = $("#message_" + id + " .message-content").html();
	var editMarkUp = '<textarea rows="5" cols="80" id="txtmessage_'+id+'">'+currentMessage+'</textarea><button class="btn btn-success btn-sm" name="ok" onClick="callCrudAction(\'edit\','+id+')">issaugoti</button><button class="btn btn-danger btn-sm" name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+')">atsaukti</button>';
	$("#message_" + id + " .message-content").html(editMarkUp);
}
// funkcija cancel edit
function cancelEdit(message,id) {
	$("#message_" + id + " .message-content").html(message);
	$('#frmAdd').show();
}
//funkcija call action
function callCrudAction(action,id) {
	$("#loaderIcon").show();
	var queryString;
	switch(action) {
		case "add":
			queryString = 'action='+action+'&txtmessage='+ $("#txtmessage").val();
		break;
		case "edit":
			queryString = 'action='+action+'&message_id='+ id + '&txtmessage='+ $("#txtmessage_"+id).val();
		break;
		case "delete":
			queryString = 'action='+action+'&message_id='+ id;
		break;
	}
	jQuery.ajax({
	url: "crud_action.php",
	data:queryString,
	type: "POST",
	success:function(data){
		switch(action) {
			case "add":
				$("#comment-list-box").append(data);
			break;
			case "edit":
				$("#message_" + id + " .message-content").html(data);
				$('#frmAdd').show();
				$("#message_"+id+" .btnEditAction").prop('disabled','');
			break;
			case "delete":
				$('#message_'+id).fadeOut();
			break;
		}
		$("#txtmessage").val('');
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>
 <div class="container-fluid"> <!-- comment box div start -->
	 <div class="row">
		 <div class="col-md-4">

		 </div>
	 	<div class="col-md-4 align-self-center">
			<h3>galite palikti komentara!</h3>
			<div class="form_style">

				<div id="comment-list-box">
					<?php
					if(!empty($comments)) {
					foreach($comments as $k=>$v) {
					?>
					<div class="message-box" id="message_<?php echo $comments[$k]["id"];?>">
						<div>
							<button class="btnEditAction" name="edit" onClick="showEditBox(this,<?php echo $comments[$k]["id"]; ?>)">keisti</button>
							<button class="btnDeleteAction" name="delete" onClick="callCrudAction('delete',<?php echo $comments[$k]["id"]; ?>)">trinti</button>
						</div>
					<div class="message-content"><?php echo $comments[$k]["message"]; ?></div>
					</div>
				<?php
				}
				} ?>
				</div>

				<div id="frmAdd"><textarea name="txtmessage" id="txtmessage" cols="80" rows="5" placeholder="Jusu komentaras nuomone ar atsiliepimas"></textarea>
					<p><button class="btn btn-primary btn-lg" name="submit" onClick="callCrudAction('add','')">siusti komentara</button></p>
				</div>
				<img src="img/LoaderIcon.gif" id="loaderIcon" style="display:none" />
			</div>
		</div>
		<div class="col-md-4">

		</div>
	</div>
</div> <!-- comment box div end -->
