<?php
require_once('../classes/cls.constants.php'); 

$sel_ops 	= array_map("clean_request", $_REQUEST);

$ccrit 		= array();

if(!empty($sel_ops['bw_'])){	
	foreach($sel_ops['bw_'] as $kcol => $vvals){		
		$ccrit[] = " `questionnaire`.`".$kcol."` IN (". implode(',', q_in($vvals)) .") ";			
	}
}
if(!empty($sel_ops['dbg'])){
	displayArray($sel_ops);
	displayArray($ccrit);
	displayArray($_SESSION['_ablt_']['indoor_checks']);
}


$checks_indoor 		= $_SESSION['_ablt_']['indoor_checks'];
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

$res = $cndb->dbQuery($qry);

$k = null;
$map_data = array();
$markers = array();
//$markers_b = array();



$i = 0;
while($row_a = $cndb->fetchRow($res)){
	$row  	= array_map("clean_output", $row_a);	
	
	$coords = explode(',', $row['LatLong']);
	
	
	if(!empty($coords[1])){
		$coords[0] = floatval($coords[0]);
		$coords[1] = floatval($coords[1]);
		
		$sub_building = ($row['sub_building'] <> '') ? $row['sub_building'].', ' : '';
		$street		= substr($row['entity_code'], 0, 8);
		
		$markers[] = array(
			'id' 	=> $row['id'],
			'name' 	=> $row['entity_code'],
			'building' 	=> ''.$sub_building . $row['building_name'] .', '. $row['area'] .'',
			'type' 	=> $row['building_type'],
			'comments' 	=> $row['comments'],
			'rating' 	=> ''.$row['Rating'].'/5',
			'url' 	=> $row['entity_code'],
			'photo' => $row['Photo'],
			'lat' 	=> $coords[0],
			'lng' 	=> $coords[1]
		);
		
		
		$map_data[$i]['type'] = 'Feature';
		$map_data[$i]['id'] = $row['id'];
		
		$map_data[$i]['properties'] = array(
			'id' 	=> intval($row['id']),
			'name' 	=> $row['building_name'],
			'building' 	=> ''.$sub_building . $row['building_name'] .'- '. $row['area'] .'',
			'type' 	=> $row['building_type'],
			'comments' 	=> $row['comments'],
			'rating' 	=> ''.$row['Rating'].'/5',
			'url' 	=> $row['building_name'],
			'photo' => $row['Photo'],
			'lat' 	=> $coords[0],
			'lng' 	=> $coords[1]
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
		
		/*$map_data['type']*/
			
		$i++;
	}

}
/*$markers_b["type"] = "FeatureCollection";
$markers_b["features"] = $map_data;*/

$markers_b = array("type" => "FeatureCollection", "features" => $map_data);

echo json_encode($markers_b);
?>