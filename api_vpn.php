<?php

	include("includes/connection.php");
	include("includes/function.php");
	include("language/app_language.php");
	include("smtp_email.php");

	function get_page_category_name($page_category_id)
	{
		global $mysqli;

		$user_qry="SELECT * FROM tbl_page_category where id='".$page_category_id."'";
		$user_result=mysqli_query($mysqli,$user_qry);
		$user_row=mysqli_fetch_assoc($user_result);

		return $user_row['page_name'];
	}

	function get_page_category_color($page_category_id)
	{
		global $mysqli;

		$user_qry="SELECT * FROM tbl_page_category where id='".$page_category_id."'";
		$user_result=mysqli_query($mysqli,$user_qry);
		$user_row=mysqli_fetch_assoc($user_result);

		return $user_row['page_color'];
	}

	function get_vpn_key($vpn_id)
	{
		global $mysqli;

		$user_qry="SELECT * FROM tbl_vpn_key where id='".$vpn_id."'";
		$user_result=mysqli_query($mysqli,$user_qry);
		$user_row=mysqli_fetch_assoc($user_result);

		return $user_row['vpn_key'];
	}

	function get_vpn_url($vpn_id)
	{
		global $mysqli;

		$user_qry="SELECT * FROM tbl_vpn_key where id='".$vpn_id."'";
		$user_result=mysqli_query($mysqli,$user_qry);
		$user_row=mysqli_fetch_assoc($user_result);

		return $user_row['vpn_url'];
	}

	

	function get_vpn_country_name($vpn_country_id)
	{
		global $mysqli;

		$user_qry="SELECT * FROM tbl_country where id='".$vpn_country_id."'";
		$user_result=mysqli_query($mysqli,$user_qry);
		$user_row=mysqli_fetch_assoc($user_result);

		return $user_row['country_name'];
	}

	
	$get_method = checkSignSalt($_POST['data']);

	if($get_method['method_name']=="vpn_api")
	{
		$jsonObj= array();	
		
		$country=$get_method['country'];
        $device_id=$get_method['device_id'];
		$country_code=$get_method['country_code'];
		$region_name=$get_method['region_name'];
		$city=$get_method['city'];
		$zip=$get_method['zip'];
		$lat=$get_method['lat'];
		$lon=$get_method['lon'];
		$timezone=$get_method['timezone'];
		$isp=$get_method['isp'];
		$org=$get_method['org'];
		$as_=$get_method['as_'];
		$query=$get_method['query'];
		$package=$get_method['package'];


		$data = array(
            'device_id'  =>  $device_id,
            'country'  =>  $country,
            'country_code'  =>  $country_code,
            'region_name'  =>  $region_name,
            'city'  =>  $city,
            'zip'  =>  $zip,
            'lat'  =>  $lat,
            'lon'  =>  $lon,
            'timezone'  =>  $timezone,
            'isp'  =>  $isp,
            'org'  =>  $org,
            'as_'  =>  $as_,
            'query'  =>  $query,
            'package'  =>  $package,
            'registered_on'  =>  strtotime(date('d-m-Y h:i:s A')),
            'register_date'  =>  date('Y-m-d'),
        );

            $qry_user_count = "SELECT COUNT(*) as num FROM tbl_users WHERE device_id = '$device_id' AND package = '$package'";
            $total_user = mysqli_fetch_array(mysqli_query($mysqli, $qry_user_count));
            $total_user = $total_user['num'];

            if($total_user < 1)
            {
            $qry = Insert('tbl_users',$data);
            }

            $qry_block_user_count = "SELECT COUNT(*) as num FROM tbl_block_users WHERE device_ids like '%$device_id%' AND package_ids like '%$package%'";
            $total_block_user = mysqli_fetch_array(mysqli_query($mysqli, $qry_block_user_count));
            $total_block_user = $total_block_user['num'];


		$jsonObj3 = array();

		$query3 = "SELECT * FROM tbl_apps WHERE `package_name` = '$package' ORDER BY tbl_apps.`id` DESC";
		$sql3 = mysqli_query($mysqli, $query3);

		while ($data3 = mysqli_fetch_assoc($sql3)) 
		{
			$row3['id'] = $data3['id'];
			$row3['app_name'] = $data3['app_name'];
			$row3['package_name'] = $data3['package_name'];

			// $row3['page_category_id'] = $data3['page_category_id'];

			$row3['page_category_name'] = get_page_category_name($data3['page_category_id']);
			$row3['page_category_color'] = get_page_category_color($data3['page_category_id']);

			// $row3['page_status'] = $data3['page_status'];
			
			$page_status = $data3['page_status'];

			$page_ids = trim($data3['page_category_id']);
			
            $query01 = "SELECT * FROM tbl_pages WHERE tbl_pages.`pc_id` IN ($page_ids) ";
			$sql01 = mysqli_query($mysqli, $query01);

			// $row3['total_pages'] = mysqli_num_rows($sql01);
           
            if($page_status == 'true')
            {
            	if (mysqli_num_rows($sql01) > 0)
				{
					while ($data0123 = mysqli_fetch_assoc($sql01)) 
					{
						$total_songs++;
						$row0123['id'] = $data0123['id'];
						$row0123['page_text'] = $data0123['page_text'];
	        		
						$row3['page_list'][] = $row0123;
					}
				} 
				else 
				{
					$row3['page_list'] = array();
				}
            }
            else
            {
            	$row3['page_list'] = array();
            }
			

			$row3['privacy_policy'] = $data3['privacy_policy'];

			$row3['qureka_link'] = $data3['qureka_link'];
			$row3['qureka_status'] = $data3['qureka_status'];


			$ads_1_status = $data3['ads_1_status'];

            if($ads_1_status == 'true')
            {
                $ads_type_1 = $data3['ads_type_1'];
            }
            else
            {
                $ads_type_1 = "";
            }

            if($ads_1_status == 'true')
            {
                $banner_1 = $data3['banner_1'];
            }
            else
            {
                $banner_1 = "";
            }

            if($ads_1_status == 'true')
            {
                $inter_id_1 = $data3['inter_id_1'];
            }
            else
            {
                $inter_id_1 = "";
            }

            if($ads_1_status == 'true')
            {
                $native_1 = $data3['native_1'];
            }
            else
            {
                $native_1 = "";
            }

            if($ads_1_status == 'true')
            {
                $full_native_1 = $data3['full_native_1'];
            }
            else
            {
                $full_native_1 = "";
            }

            if($ads_1_status == 'true')
            {
                $open_ads_1 = $data3['open_ads_1'];
            }
            else
            {
                $open_ads_1 = "";
            }

            if($ads_1_status == 'true')
            {
                $back_inter_1 = $data3['back_inter_1'];
            }
            else
            {
                $back_inter_1 = "";
            }


            $ads_2_status = $data3['ads_2_status'];

            if($ads_2_status == 'true')
            {
                $ads_type_2 = $data3['ads_type_2'];
            }
            else
            {
                $ads_type_2 = "";
            }

            if($ads_2_status == 'true')
            {
                $banner_2 = $data3['banner_2'];
            }
            else
            {
                $banner_2 = "";
            }

            if($ads_2_status == 'true')
            {
                $inter_id_2 = $data3['inter_id_2'];
            }
            else
            {
                $inter_id_2 = "";
            }

            if($ads_2_status == 'true')
            {
                $native_2 = $data3['native_2'];
            }
            else
            {
                $native_2 = "";
            }

            if($ads_2_status == 'true')
            {
                $full_native_2 = $data3['full_native_2'];
            }
            else
            {
                $full_native_2 = "";
            }

            if($ads_2_status == 'true')
            {
                $open_ads_2 = $data3['open_ads_2'];
            }
            else
            {
                $open_ads_2 = "";
            }

            if($ads_2_status == 'true')
            {
                $back_inter_2 = $data3['back_inter_2'];
            }
            else
            {
                $back_inter_2 = "";
            }



			$ads_3_status = $data3['ads_3_status'];

            if($ads_3_status == 'true')
            {
                $ads_type_3 = $data3['ads_type_3'];
            }
            else
            {
                $ads_type_3 = "";
            }

            if($ads_3_status == 'true')
            {
                $banner_3 = $data3['banner_3'];
            }
            else
            {
                $banner_3 = "";
            }

            if($ads_3_status == 'true')
            {
                $inter_id_3 = $data3['inter_id_3'];
            }
            else
            {
                $inter_id_3 = "";
            }

            if($ads_3_status == 'true')
            {
                $native_3 = $data3['native_3'];
            }
            else
            {
                $native_3 = "";
            }

            if($ads_3_status == 'true')
            {
                $full_native_3 = $data3['full_native_3'];
            }
            else
            {
                $full_native_3 = "";
            }

            if($ads_3_status == 'true')
            {
                $open_ads_3 = $data3['open_ads_3'];
            }
            else
            {
                $open_ads_3 = "";
            }

            if($ads_3_status == 'true')
            {
                $back_inter_3 = $data3['back_inter_3'];
            }
            else
            {
                $back_inter_3 = "";
            }

			// $row3['random_ads_status'] = $data3['random_ads_status'];

			$random_ads_status = $data3['random_ads_status'];
            
            if($random_ads_status == 'true')
            {
            	$filter_field = array();
				$original_items = array(
				    array(1,$ads_type_1, $banner_1, $inter_id_1, $native_1, $full_native_1, $open_ads_1,$back_inter_1,$ads_1_status), 
				    array(2,$ads_type_2, $banner_2, $inter_id_2, $native_2, $full_native_2, $open_ads_2,$back_inter_2,$ads_2_status), 
				    array(3,$ads_type_3, $banner_3, $inter_id_3, $native_3, $full_native_3, $open_ads_3,$back_inter_3,$ads_3_status) 
				);


				for ($x = 0; $x < sizeof($original_items); $x++) 
				{ 
				   array_push($filter_field, $original_items[$x][0]);
				} 

				shuffle($filter_field);

				$first = $filter_field[0];
				$second = $filter_field[1];
				$third = $filter_field[2];

				$first = $first-1;
				$second = $second-1;
				$third = $third-1;
                
                $row3['ads_1_status'] = $original_items[$first][8];
				$row3['ads_type_1'] = $original_items[$first][1];
				$row3['banner_1'] = $original_items[$first][2];
				$row3['inter_id_1'] = $original_items[$first][3];
				$row3['native_1'] = $original_items[$first][4];
				$row3['full_native_1'] = $original_items[$first][5];
				$row3['open_ads_1'] = $original_items[$first][6];
				$row3['back_inter_1'] = $original_items[$first][7];
                
                $row3['ads_2_status'] = $original_items[$second][8];
				$row3['ads_type_2'] = $original_items[$second][1];
				$row3['banner_2'] = $original_items[$second][2];
				$row3['inter_id_2'] = $original_items[$second][3];
				$row3['native_2'] = $original_items[$second][4];
				$row3['full_native_2'] = $original_items[$second][5];
				$row3['open_ads_2'] = $original_items[$second][6];
				$row3['back_inter_2'] = $original_items[$second][7];
	            
	            $row3['ads_3_status'] = $original_items[$third][8];
				$row3['ads_type_3'] = $original_items[$third][1];
				$row3['banner_3'] = $original_items[$third][2];
				$row3['inter_id_3'] = $original_items[$third][3];
				$row3['native_3'] = $original_items[$third][4];
				$row3['full_native_3'] = $original_items[$third][5];
				$row3['open_ads_3'] = $original_items[$third][6];
				$row3['back_inter_3'] = $original_items[$third][7];

            }
            else
            {
            	$row3['ads_1_status'] = $ads_1_status;
            	$row3['ads_type_1'] = $ads_type_1;
				$row3['banner_1'] = $banner_1;
				$row3['inter_id_1'] = $inter_id_1;
				$row3['native_1'] = $native_1;
				$row3['full_native_1'] = $full_native_1;
				$row3['open_ads_1'] = $open_ads_1;
				$row3['back_inter_1'] = $back_inter_1;


				$row3['ads_2_status'] = $ads_2_status;
				$row3['ads_type_2'] = $ads_type_2;
				$row3['banner_2'] = $banner_2;
				$row3['inter_id_2'] = $inter_id_2;
				$row3['native_2'] = $native_2;
				$row3['full_native_2'] = $full_native_2;
				$row3['open_ads_2'] = $open_ads_2;
				$row3['back_inter_2'] = $back_inter_2;
	            
	            $row3['ads_3_status'] = $ads_3_status;
				$row3['ads_type_3'] = $ads_type_3;
				$row3['banner_3'] = $banner_3;
				$row3['inter_id_3'] = $inter_id_3;
				$row3['native_3'] = $native_3;
				$row3['full_native_3'] = $full_native_3;
				$row3['open_ads_3'] = $open_ads_3;
				$row3['back_inter_3'] = $back_inter_3;
            }

			$row3['in_ads_status'] = $data3['in_ads_status'];
			$row3['back_ads_status'] = $data3['back_ads_status'];

			$row3['in_min'] = $data3['in_min'];
			$row3['in_max'] = $data3['in_max'];

			$row3['back_min'] = $data3['back_min'];
			$row3['back_max'] = $data3['back_max'];

			// $row3['location_status'] = $data3['location_status'];
			// $row3['location'] = $data3['location'];

			// $row3['time_status'] = $data3['time_status'];
			$time_status = $data3['time_status'];

			// $row3['start_time'] = $data3['start_time'];
			$start_time = $data3['start_time'];

			$start_time_2 = $data3['start_time_2'];
			$start_time_3 = $data3['start_time_3'];
			$start_time_4 = $data3['start_time_4'];
			$start_time_5 = $data3['start_time_5'];
			// $row3['end_time'] = $data3['end_time'];
			$end_time = $data3['end_time'];

			$end_time_2 = $data3['end_time_2'];
			$end_time_3 = $data3['end_time_3'];
			$end_time_4 = $data3['end_time_4'];
			$end_time_5 = $data3['end_time_5'];


			date_default_timezone_set('Asia/Kolkata');
            // $row3['current_time'] = date('H:i');
            $current_time = date('H:i');

			$user_array =array($country,$country_code,$region_name,$city,$zip,$lat,$lon,$timezone,$isp,$org,$as_,$query,$package);

			$location = $data3['location'];
			$location_arr = explode(",",$location);


			$result = array_intersect($user_array,$location_arr);

			$final_count = count($result);

			$row3['open_ads_status'] = $data3['open_ads_status'];

			$vpn_status = $data3['vpn_status'];

            if($vpn_status == 'true')
            {
            	if($total_block_user >= 1)
				{
					$vpn_status = 'false';
				}
				else
				{				
		        	if($data3['location_status'] == 'true')
					{
						if($final_count >= 1)
						{
							if($time_status == 'true')
							{
								if ($current_time == $start_time && $current_time < $end_time)
								{
								   $vpn_status = 'true';
								}
								elseif ($current_time == $start_time_2 && $current_time < $end_time_2)
								{
								   $vpn_status = 'true';
								}
								elseif ($current_time == $start_time_3 && $current_time < $end_time_3)
								{
								   $vpn_status = 'true';
								}
								elseif ($current_time == $start_time_4 && $current_time < $end_time_4)
								{
								   $vpn_status = 'true';
								}
								elseif ($current_time == $start_time_5 && $current_time < $end_time_5)
								{
								   $vpn_status = 'true';
								}
								else
								{
								    $vpn_status = 'false';
								}	
							}
							else
							{
								$vpn_status = 'true';
							}  
						}
						else
						{
		                   $vpn_status = 'false';
						}
		               
					}
					else if($data3['location_status'] == 'false')
					{
		                if($final_count >= 1)
						{
		                   $vpn_status = 'false';
						}
						else
						{
		                    if($time_status == 'true')
							{
								if ($current_time > $start_time && $current_time < $end_time)
								{
								   $vpn_status = 'true';
								}
								else
								{
								    $vpn_status = 'false';
								}
							}
							else
							{
								$vpn_status = 'true';
							}
						}
					}
				}
            }
			else
			{
                $vpn_status = $data3['vpn_status'];
			}

			$row3['vpn_status'] = $vpn_status;

			// $row3['vpn_country_id'] = $data3['vpn_country'];

			$vpn_country_ids = $data3['vpn_country'];
			$country_ids_arr = explode(",",$vpn_country_ids);
			$key = array_rand($country_ids_arr);
			$random_country_id = $country_ids_arr[$key];

			$row3['vpn_country_name'] = get_vpn_country_name($random_country_id);

			// $row3['vpn_key_id'] = $data3['vpn_country_key'];

			$row3['vpn_key'] = get_vpn_key($data3['vpn_country_key']);
			$row3['vpn_url'] = get_vpn_url($data3['vpn_country_key']);

			array_push($jsonObj3, $row3);
			unset($row123['page_list']);	
		}

		$set['VPN'] = $jsonObj3;	
		
		header( 'Content-Type: application/json; charset=utf-8' );
		$json = json_encode($set);
		echo $json;
		exit;
	}

?>