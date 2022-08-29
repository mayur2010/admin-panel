<?php
require("includes/connection.php");
require("includes/function.php");
require("language/language.php");

$response = array();

$_SESSION['class'] = "success";

switch ($_POST['action']) 
{
	case 'toggle_status':
		$id = $_POST['id'.PURCHASE.''];
		$for_action = $_POST['for_action'.PURCHASE.''];
		$column = $_POST['column'.PURCHASE.''];
		$tbl_id = $_POST['tbl_id'.PURCHASE.''];
		$table_nm = $_POST['table'.PURCHASE.''];

		if ($for_action == 'active') 
		{
			$data = array($column  =>  '1');
			$edit_status = Update($table_nm, $data, "WHERE $tbl_id = '$id'");
			$_SESSION['msg'] = "13";
		} else
		{
			$data = array($column  =>  '0');
			$edit_status = Update($table_nm, $data, "WHERE $tbl_id = '$id'");
			$_SESSION['msg'] = "14";
		}

		$response['status'] = 1;
		$response['action'] = $for_action;
		echo json_encode($response);
		break;


	case 'multi_delete':

		$ids = implode(",", $_POST['id'.PURCHASE.'']);

		if ($ids == '') {
			$ids = $_POST['id'.PURCHASE.''];
		}

		$tbl_nm = $_POST['tbl_nm'.PURCHASE.''];


		if ($tbl_nm == 'tbl_page_category') 
		{
			$deleteSql = "DELETE FROM $tbl_nm WHERE `id` IN ($ids)";

			mysqli_query($mysqli, $deleteSql);
		} 
		else if ($tbl_nm == 'tbl_pages') 
		{
			$deleteSql = "DELETE FROM $tbl_nm WHERE `id` IN ($ids)";

			mysqli_query($mysqli, $deleteSql);
		}
		else if ($tbl_nm == 'tbl_vpn_key') 
		{
			$deleteSql = "DELETE FROM $tbl_nm WHERE `id` IN ($ids)";

			mysqli_query($mysqli, $deleteSql);
		} 
		else if ($tbl_nm == 'tbl_country') 
		{
			$deleteSql = "DELETE FROM $tbl_nm WHERE `id` IN ($ids)";

			mysqli_query($mysqli, $deleteSql);
		} 
		
		$_SESSION['msg'] = "12";
		$response['status'] = 1;
		echo json_encode($response);
		break;


	case 'multi_action': 
	    {
			$action = $_POST['for_action'.PURCHASE.''];
			$ids = implode(",", $_POST['id'.PURCHASE.'']);
			$tbl_nm = $_POST['table'.PURCHASE.''];

			if ($ids == '') 
			{
				$ids = $_POST['id'.PURCHASE.''];
			}

			if ($action == 'enable')
			{
				$sql = "UPDATE $tbl_nm SET `status`='1' WHERE `id` IN ($ids)";
				mysqli_query($mysqli, $sql);
				$_SESSION['msg'] = "13";

			} 
			else if ($action == 'disable') 
			{
				$sql = "UPDATE $tbl_nm SET `status`='0' WHERE `id` IN ($ids)";
				if (mysqli_query($mysqli, $sql)) 
				{
					$_SESSION['msg'] = "14";
				}
			} 
			else if ($action == 'delete') 
			{

				if($tbl_nm == 'tbl_users') 
				{

					$deleteSql = "DELETE FROM tbl_reports WHERE `user_id` IN ($ids)";
					mysqli_query($mysqli, $deleteSql);

					$deleteSql = "DELETE FROM tbl_favourite WHERE `user_id` IN ($ids)";
					mysqli_query($mysqli, $deleteSql);

					$deleteSql = "DELETE FROM tbl_rating WHERE `ip` IN ($ids)";
					mysqli_query($mysqli, $deleteSql);

					$sql = "SELECT * FROM tbl_song_suggest WHERE `user_id` IN ($ids)";
					$res = mysqli_query($mysqli, $sql);

					while ($row = mysqli_fetch_assoc($res))
					{
						if ($row['song_image'] != "") 
						{
							unlink('images/' . $row['song_image']);
						}
					}

					mysqli_free_result($res);

					$deleteSql = "DELETE FROM tbl_song_suggest WHERE `user_id` IN ($ids)";
					mysqli_query($mysqli, $deleteSql);

					$deleteSql="DELETE FROM tbl_active_log WHERE `user_id` IN ($ids)";
					mysqli_query($mysqli, $deleteSql);

					$deleteSql = "DELETE FROM $tbl_nm WHERE `id` IN ($ids)";
					mysqli_query($mysqli, $deleteSql);
				}
				else if ($tbl_nm == 'tbl_page_category') 
				{
					$deleteSql = "DELETE FROM $tbl_nm WHERE `id` IN ($ids)";
					mysqli_query($mysqli, $deleteSql);
				} 
				else if ($tbl_nm == 'tbl_pages') 
				{
					$deleteSql = "DELETE FROM $tbl_nm WHERE `id` IN ($ids)";
					mysqli_query($mysqli, $deleteSql);
				} 
				else if ($tbl_nm == 'tbl_vpn_key') 
				{
					$deleteSql = "DELETE FROM $tbl_nm WHERE `id` IN ($ids)";

					mysqli_query($mysqli, $deleteSql);
				}
				else if ($tbl_nm == 'tbl_country') 
				{
					$deleteSql = "DELETE FROM $tbl_nm WHERE `id` IN ($ids)";

					mysqli_query($mysqli, $deleteSql);
				} 
				else if ($tbl_nm == 'tbl_block_users') 
				{
					$deleteSql = "DELETE FROM $tbl_nm WHERE `id` IN ($ids)";

					mysqli_query($mysqli, $deleteSql);
				} 


				$_SESSION['msg'] = "12";
			} 

			$response['status'] = 1;

			echo json_encode($response);
			break;
		}

	default:
		# code...
		break;
}
