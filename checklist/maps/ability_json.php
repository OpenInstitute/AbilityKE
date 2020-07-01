<?php
require_once('../classes/cls.constants.php'); 

$sel_ops 	= array_map("clean_request", $_REQUEST);
$sel_cat	= (!empty($sel_ops['c'])) ? $sel_ops['c'] : 'bldg';

$ccrit 		= array();

if(!empty($sel_ops['dbg'])){
	displayArray($sel_ops);
	displayArray($ccrit);
	displayArray($_SESSION['_ablt_']['indoor_checks']);
}


switch ($sel_cat)
{
	case "strt":
		
		/* ============================================================================= */
		
		//$qry = "SELECT `id`, `street_code`, `zone`, `road` as `streetname`, `LatLong` as `coords` FROM `streets` WHERE `published` = 1;";
		

		if(!empty($sel_ops['bw_'])){	
			foreach($sel_ops['bw_'] as $kcol => $vvals){		
				$ccrit[] = " `questionnaire`.`".$kcol."` IN (". implode(',', q_in($vvals)) .") ";			
			}
		}


		$checks_outdoor 		= $_SESSION['_ablt_']['indoor_checks']['outdoor'];
		$checks_outdoor_num = count($checks_outdoor);
		
		

		$sq_crit = (count($ccrit) > 0) ? ' and '. implode(' and ', $ccrit) : '';

		/*$qry = "SELECT
			`questionnaire`.`id`
			, `questionnaire`.`type`
			, `questionnaire`.`entity_code`
			, `buildings`.`area`
			, `buildings`.`building_name`
			, `buildings`.`sub_building`
			, `streets`.`road`
			, `questionnaire`.`building_type`
			, `questionnaire`.*
		FROM
			`questionnaire`
			LEFT JOIN `buildings` ON (`questionnaire`.`entity_code` = `buildings`.`entity_code`)
			LEFT JOIN `streets` ON (`questionnaire`.`street` = `streets`.`street_code`)
		WHERE `questionnaire`.`entity_code` is not null    ".$sq_crit."
		;";*/
		
		$qry = "SELECT
    `questionnaire`.`id`
    , `questionnaire`.`type`
    , `questionnaire`.`entity_code`
    , `questionnaire`.`street`
    , `streets`.`zone`
    , `streets`.`road`
    , `streets`.`LatLong` AS `LatLong_road`
    , `questionnaire`.*
FROM
    `questionnaire`
    RIGHT JOIN `streets` 
        ON (`questionnaire`.`street` = `streets`.`street_code`)
WHERE `questionnaire`.`street` IS NOT NULL  ".$sq_crit." ;";

		if(!empty($sel_ops['dbg'])){
			echobr($qry);
		}

		$res 		= $cndb->dbQuery($qry);

		$k 			= null;
		$map_data 	= array();
		
		$i = 0;
		while($row_a = $cndb->fetchRow($res)){
			
			$row  	= array_map("clean_output", $row_a);
			//$coords = explode(',', $row['LatLong']);
			
			$coords_a = explode('|', $row['LatLong_road']);
			$coords_b = array();			
			
			foreach($coords_a as $aa){
				$vals = explode(',', $aa);	
				if(is_array($vals) and floatval($vals[0]) <> 0){
					$coords_b[] = array(floatval($vals[0]), floatval($vals[1]));
				}
			}
			
			//if(count($coords_b) > 0){
				
				$coords[0]  = floatval($coords_b[0][0]);
				$coords[1]  = floatval($coords_b[0][1]);

				//$sub_building 	= ($row['sub_building'] <> '') ? $row['sub_building'].', ' : '';
				//$street_code	= substr($row['entity_code'], 0, 8);

				$street_code	= $row['street'];
			
			
				$map_data[$i]['type'] = 'Feature';
				$map_data[$i]['id'] = $row['id'];

				$map_data[$i]['properties'] = array(
					'id' 		=> intval($row['id']),
					'name' 		=> $row['road'],
					//'building' 	=> ''.$sub_building . $row['building_name'] .'- '. $row['area'] .'',
					'type' 		=> $row['type'],
					'comments' 	=> $row['comments'],
					'rating' 	=> ''.$row['Rating'].'/5',
					'url' 		=> $row['road'],
					'photo' 	=> $row['Photo'],
					'entity_code'  => $row['entity_code'],
					'street' 	=> ''.$street_code.'',
					'lat' 		=> $coords[0],
					'lng' 		=> $coords[1]
				);

				$item_check_vals = array();
				foreach($checks_outdoor as $qque => $qval){
					
					$item_check_vals[$qque] = ( strtolower($row[$qque]) == $qval ) ? 1 : 0 ;			
				}
				/*displayArray(array_sum($item_check_vals));*/

				$map_data[$i]['properties']['perc_access'] = intval((array_sum($item_check_vals) / $checks_outdoor_num) * 100);


				$map_data[$i]['geometry']  = array(
					'type' 	=> 'LineString',
					'coordinates' 	=> $coords_b
				);


				$i++;
			//}

		}

		$markers_b = array("type" => "FeatureCollection", "features" => $map_data);

		echo json_encode($markers_b);
		
		/* ============================================================================= */
		
		
	break;
		
		
		
	case "strt_nometa":
		
		/* ============================================================================= */
		
		//$qry = "SELECT `id`, `streetname` , `coords` FROM `street_names_cords`;";
		$qry = "SELECT `id`, `street_code`, `zone`, `road` as `streetname`, `LatLong` as `coords` FROM `streets` WHERE `published` = 1;";

		if(!empty($sel_ops['dbg'])){
			echobr($qry);
		}

		$res 		= $cndb->dbQuery($qry);

		$k 			= null;
		$map_data 	= array();
		
		$i = 0;
		while($row_a = $cndb->fetchRow($res)){
			$row  	= array_map("clean_output", $row_a);	

			$coords_a = explode('|', $row['coords']);
			//$coords_b = array_map('floatval', $coords_a);
			$coords_b = array();
			
			
			foreach($coords_a as $aa){
				$vals = explode(',', $aa);	
				if(is_array($vals) and floatval($vals[0]) <> 0){
					$coords_b[] = array(floatval($vals[0]), floatval($vals[1]));
				}
			}
			
			$map_data[$i]['name'] = $row['streetname'];
			$map_data[$i]['coordinates'] = $coords_b;
			
			$i++;
		}

		$markers_b = array("type" => "FeatureCollection", "features" => $map_data);

		echo json_encode($markers_b);
		
		/* ============================================================================= */
		
		
	break;
		
		
		
		
		
	case "bldg":
		
		/* ========================================================================= */
		if(!empty($sel_ops['bw_'])){	
			foreach($sel_ops['bw_'] as $kcol => $vvals){		
				$ccrit[] = " `questionnaire`.`".$kcol."` IN (". implode(',', q_in($vvals)) .") ";			
			}
		}


		$checks_indoor 		= $_SESSION['_ablt_']['indoor_checks']['indoor'];
		$checks_indoor_num = count($checks_indoor);


		$sq_crit = (count($ccrit) > 0) ? ' and '. implode(' and ', $ccrit) : '';

		$qry = "SELECT
			`questionnaire`.`id`
			, `questionnaire`.`type`
			, `questionnaire`.`entity_code`
			, `buildings`.`area`
			, `buildings`.`building_name`
			, `buildings`.`sub_building`
			, `streets`.`road`
			, `questionnaire`.`building_type`
			, `questionnaire`.*
		FROM
			`questionnaire`
			LEFT JOIN `buildings` ON (`questionnaire`.`entity_code` = `buildings`.`entity_code`)
			LEFT JOIN `streets` ON (`questionnaire`.`street` = `streets`.`street_code`)
		WHERE `questionnaire`.`entity_code` is not null    ".$sq_crit."
		;";

		if(!empty($sel_ops['dbg'])){
			echobr($qry);
		}

		$res 		= $cndb->dbQuery($qry);

		$k 			= null;
		$map_data 	= array();
		/*$markers 	= array();*/


		$i = 0;
		while($row_a = $cndb->fetchRow($res)){
			$row  	= array_map("clean_output", $row_a);	

			$coords = explode(',', $row['LatLong']);


			if(!empty($coords[1])){
				$coords[0] = floatval($coords[0]);
				$coords[1] = floatval($coords[1]);

				$sub_building 	= ($row['sub_building'] <> '') ? $row['sub_building'].', ' : '';
				$street_code	= substr($row['entity_code'], 0, 8);


				$map_data[$i]['type'] = 'Feature';
				$map_data[$i]['id'] = $row['id'];

				$map_data[$i]['properties'] = array(
					'id' 		=> intval($row['id']),
					'name' 		=> $row['building_name'],
					'building' 	=> ''.$sub_building . $row['building_name'] .'- '. $row['area'] .'',
					'type' 		=> $row['building_type'],
					'comments' 	=> $row['comments'],
					'rating' 	=> ''.$row['Rating'].'/5',
					'url' 		=> $row['building_name'],
					'photo' 	=> $row['Photo'],
					'entity_code' 		=> $row['entity_code'],
					'street' 	=> ''.$street_code.'',
					'lat' 		=> $coords[0],
					'lng' 		=> $coords[1]
				);

				$item_check_vals = array();
				foreach($checks_indoor as $qque => $qval){
					$item_check_vals[$qque] = ( strtolower($row[$qque]) == $qval ) ? 1 : 0 ;			
				}
				/*displayArray(array_sum($item_check_vals));*/

				$map_data[$i]['properties']['perc_access'] = intval((array_sum($item_check_vals) / $checks_indoor_num) * 100);


				$map_data[$i]['geometry']  = array(
					'type' 	=> 'Point',
					'coordinates' 	=> $coords
				);


				$i++;
			}

		}

		$markers_b = array("type" => "FeatureCollection", "features" => $map_data);

		echo json_encode($markers_b);
		/* ========================================================================= */
		
	break;
}

		
?>