<?php
require_once("DBController.php");
$db_handle = new DBController();

$action = $_POST["action"];
if(!empty($action)) {
	switch($action) {
		// add case
		case "add":
		    $query = "INSERT INTO comment(message) VALUES('".$_POST["txtmessage"]."')";
		    $insert_id = $db_handle->insert($query);
				///////////////////////////////////////////////////////////////////////////////////
				// jei prisijunges rodyti edite ir delete mygtukus
				if (isset($_SESSION['u_id'])) {
					echo '<div class="message-box"  id="message_' . $insert_id . '">
					 				<div>
					 					<button class="btnEditAction" name="edit" onClick="showEditBox(this,' . $insert_id . ')">Edit</button>
					 					<button class="btnDeleteAction" name="delete" onClick="callCrudAction(\'delete\',' . $insert_id . ')">Delete</button>
					 				</div>
								<div class="message-content">' . $_POST["txtmessage"] . '</div></div>';
				} else {
					echo '<div class="message-box"  id="message_' . $insert_id . '">
								<div class="message-content">' . $_POST["txtmessage"] . '</div></div>';
				}
				/////////////////////////////////////////////////////////////////////////////////////
				// 		    if($insert_id){
				// 				  echo '<div class="message-box"  id="message_' . $insert_id . '">
				// 						<div>
				// 						<button class="btnEditAction" name="edit" onClick="showEditBox(this,' . $insert_id . ')">Edit</button>
				// <button class="btnDeleteAction" name="delete" onClick="callCrudAction(\'delete\',' . $insert_id . ')">Delete</button>
				// 						</div>
				// 						<div class="message-content">' . $_POST["txtmessage"] . '</div></div>';
				// 			}
			break;
		// edit case
		case "edit":
		    $query = "UPDATE comment set message = '".$_POST["txtmessage"]."' WHERE  id=".$_POST["message_id"];
		    $result = $db_handle->execute($query);
			if($result){
				  echo $_POST["txtmessage"];
			}
			break;
		// delete case
		case "delete":
		    if(!empty($_POST["message_id"])) {
		        $query = "DELETE FROM comment WHERE id=".$_POST["message_id"];
		        $result = $db_handle->execute($query);
			}
			break;
	}
}
