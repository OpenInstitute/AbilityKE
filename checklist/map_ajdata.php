<?php
require_once 'classes/cls.constants.php'; 

$sel_ops 	= array_map("clean_request", $_POST);

/*displayArray($sel_ops);*/

$ccrit = array();

if(is_array($sel_ops['bw_'])){
	
	foreach($sel_ops['bw_'] as $kcol => $vvals){
		
		$ccrit[] = " `questionnaire`.`".$kcol."` IN (". implode(',', q_in($vvals)) .") ";	
		
	}
}
/*displayArray($ccrit);*/

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
WHERE `questionnaire`.`entity_code` is not null ".$sq_crit."
;";
echobr($qry);
$res = $cndb->dbQuery($qry);



?>