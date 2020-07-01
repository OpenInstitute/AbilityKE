<?php

class data_oc extends master
{

/* ============================================================================== 
/*	@BUILD: INDICATOR DROP-DOWNS
/* ------------------------------------------------------------------------------ */	
	
	function get_indi_source($psource = '')
	{
		$result 	= array();		
		$result[] 	= '<option value="">- Select Source -</option>';		
		
		$sq_qry = "SELECT `source` FROM `oc_county_sector_cards_new` GROUP BY `source`;";			
		$rs_qry = $this->dbQuery($sq_qry);		
		
		if($this->recordCount($rs_qry) > 0)
		{
			while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
			{
				$cn_qry  		= array_map("clean_output", $cn_qry_a);
				
				$title 			= $cn_qry['source'];
				$active			='';
				
				if($psource == $title) { $active=' selected '; } 
				
				$result[] = '<option value="'.$title.'"'.$active.'>'.$title.'</option>';				
			}			
		}
					
		return $result;
	}	

	
	
	function get_indi_sector($psource, $psector = '')
	{
		$result 	= array();		
		$result[] 	= '<option value="">- Select Sector -</option>';		
		
		$sq_qry = "SELECT `sector` , `source` FROM `oc_county_sector_cards_new` WHERE (`source` = ".$this->quote_si($psource).") GROUP BY `sector`;";		
		//echobr($sq_qry);
		$rs_qry = $this->dbQuery($sq_qry);		
		
		if($this->recordCount($rs_qry) > 0)
		{
			while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
			{
				$cn_qry  		= array_map("clean_output", $cn_qry_a);
				
				$title 			= $cn_qry['sector'];
				$active			= '';
				
				if($psector == $title) { $active=' selected '; } 
				
				$result[] = '<option value="'.$title.'"'.$active.'>'.$title.'</option>';				
			}			
		}
					
		return $result;
	}	
	
	
		
	function get_indi_cator($psource, $psector = '', $pindicator = '')
	{
		$result 	= array();		
		$selops 	= array();		
		$result[] 	= '<option value="">- Select Indicator -</option>';		
		
		$crit 		= '';
		if($psector <> '') { $crit 	= " AND `sector` like ".$this->quote_si($psector, 1)." "; }
		
		$sq_qry = "SELECT `sector` , `source` , `indicator` , `period`, `source_sub` FROM `oc_county_sector_cards_new` WHERE (`source` = ".$this->quote_si($psource)." ".$crit.") GROUP BY `sector`, `indicator`, `period`, `source_sub` ORDER BY `source`, `source_sub`,`indicator` ASC, `period` ASC;";		
		//echo $sq_qry;
		$rs_qry = $this->dbQuery($sq_qry);		
		
		if($this->recordCount($rs_qry) > 0)
		{
			while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
			{
				$cn_qry  		= array_map("clean_output", $cn_qry_a);
				
				$source 		= $cn_qry['source'];
				$source_sub		= ($cn_qry['source_sub'] <> '') ? $cn_qry['source_sub'] : ''; //$source;
				
				$period			= $cn_qry['period'];
				$indicator		= $cn_qry['indicator'];
				$title 			= $indicator .' - '. $period;
				
				$active			= '';
				
				$selops[$source_sub][$indicator] = $period;
				
				if($pindicator == $indicator) { $active=' selected '; } 
				
				//$result[] = '<option value="'.$indicator.'"  data-period="'.$period.'" '.$active.'>'.$title.'</option>';				
			}	
						
			foreach($selops as $sub_key => $sub_arr) 
			{				
				$source_label = ($sub_key <> '') ? 'Source: '.strtoupper($sub_key).'' : '';
				$result[] = '<optgroup label="'.$source_label.'">';

				foreach($sub_arr as $ikey => $iperiod){
					$result[] = '<option value="'.$ikey.'"  data-period="'.$iperiod.'">'.$ikey .' - '. $iperiod.'</option>';
				}
				$result[] = '</optgroup>';
			}
		}
					
		return $result;
	}	
	
		
	function get_indi_cator_original($psource, $psector = '', $pindicator = '')
	{
		$result 	= array();		
		$result[] 	= '<option value="">- Select Indicator -</option>';		
		
		$crit 		= '';
		if($psector <> '') { $crit 	= " AND `sector` like ".$this->quote_si($psector, 1)." "; }
		
		$sq_qry = "SELECT `sector` , `source` , `indicator` , `period` FROM `oc_county_sector_cards_new` WHERE (`source` = ".$this->quote_si($psource)." ".$crit.") GROUP BY `sector`, `indicator`, `period` ORDER BY `indicator` ASC, `period` ASC;";		
		//echo $sq_qry;
		$rs_qry = $this->dbQuery($sq_qry);		
		
		if($this->recordCount($rs_qry) > 0)
		{
			while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
			{
				$cn_qry  		= array_map("clean_output", $cn_qry_a);
				
				$period			= $cn_qry['period'];
				$indicator		= $cn_qry['indicator'];
				$title 			= $indicator .' - '. $period;
				
				$active			= '';
				
				if($pindicator == $indicator) { $active=' selected '; } 
				
				$result[] = '<option value="'.$indicator.'"  data-period="'.$period.'" '.$active.'>'.$title.'</option>';				
			}			
		}
					
		return $result;
	}	
	
	
	
	function get_indi_county($psource, $pindicator, $pperiod = '', $pcounty = '')
	{
		$result 	= array();		
		$result[] 	= '<option value="">- Select County -</option>';		
		
		$crit 		= "";
		//if($psector <> '') { $crit 	= " AND `sector` = ".$this->quote_si($psector)." "; }
		
		$sq_qry = "SELECT `county` FROM `oc_county_sector_cards_new` WHERE (`source` = ".$this->quote_si($psource)." AND `indicator` = ".$this->quote_si($pindicator).") GROUP BY `source`, `indicator`, `period`, `county` ORDER BY `county` ASC;";		
		
		$rs_qry = $this->dbQuery($sq_qry);		
		
		if($this->recordCount($rs_qry) > 0)
		{
			while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
			{
				$cn_qry  		= array_map("clean_output", $cn_qry_a);				
				$county			= $cn_qry['county'];				
				$active			= '';				
				if($pcounty == $county) { $active=' selected '; } 				
				$result[] 		= '<option value="'.$county.'"'.$active.'>'.$county.'</option>';				
			}			
		}
					
		return $result;
	}	
	
	
	
	
	function get_api_allsector($psource='', $psector = '')
	{
		$result 	= array();		
		//$result[] 	= '<option value="">- Select Sector -</option>';		
		
		$sq_qry = "SELECT `sector` FROM `oc_county_sector_cards_new` GROUP BY `sector`;";			
		$rs_qry = $this->dbQuery($sq_qry);		
		
		if($this->recordCount($rs_qry) > 0)
		{
			while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
			{
				$cn_qry  		= array_map("clean_output", $cn_qry_a);
				
				$title 			= $cn_qry['sector'];
				$opt_value		= generate_seo_title($title,'', false);
				$active			= '';
				
				if($psector == $title) { $active=' selected '; } 
				
				$result[] = '<option value="'.$opt_value.'" data-cat="api_sector" '.$active.'>'.$title.'</option>';				
			}			
		}
					
		return $result;
	}	
	
	
	
	function get_api_allcounty($pcounty = '')
	{
		$result 	= array();		
		$result[] 	= '<option value="">- Select County -</option>';		
		
		$crit 		= "";
		//if($psector <> '') { $crit 	= " AND `sector` = ".$this->quote_si($psector)." "; }
		
		$sq_qry = "SELECT `county` FROM `oc_county` GROUP BY `county` ORDER BY `county` ASC;";		
		
		$rs_qry = $this->dbQuery($sq_qry);		
		
		if($this->recordCount($rs_qry) > 0)
		{
			while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
			{
				$cn_qry  		= array_map("clean_output", $cn_qry_a);				
				$county			= $cn_qry['county'];				
				$active			= '';				
				if($pcounty == $county) { $active=' selected '; } 				
				$result[] 		= '<option value="'.$county.'"'.$active.'>'.$county.'</option>';				
			}			
		}
					
		return $result;
	}	
	
	
	

	function get_source_indicators($psource='')
	{
		$result 	= array();		
		
		$sq_qry = "SELECT `source`, `indicator`, `period`, `source_sub` FROM `oc_county_sector_cards_new` GROUP BY `source`, `indicator`, `period`, `source_sub` ORDER BY `source`, `source_sub`,`indicator` ASC, `period` ASC;";			
		$rs_qry = $this->dbQuery($sq_qry);		
		
		if($this->recordCount($rs_qry) > 0)
		{
			$grp_recs 	= 0;
			$grp_source = '';
			
			while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
			{
				$cn_qry  		= array_map("clean_output", $cn_qry_a);
				
				$source 		= $cn_qry['source'];
				$source_sub		= ($cn_qry['source_sub'] <> '') ? $cn_qry['source_sub'] : $source;
				//if($grp_source <> $source) { $grp_source = $source;  $grp_recs = 1; }
				
				$source_seo 	= generate_seo_title(strtolower($source),'');
				$period			= $cn_qry['period'];
				
				$indicator 		= $cn_qry['indicator'] .' - '. $period;				
				$source_logo	= $source_seo.'-logo.png';
				
				$result[$source_seo]['title'] = $source;
				$result[$source_seo]['logo'] = $source_logo;
				$result[$source_seo]['link'] = $source_seo;	
				//$result[$source_seo]['indicators'][$indicator] = $indicator .' - '. $period;
				$result[$source_seo]['subs'][$source_sub][$indicator] = $period;
				$result[$source_seo]['indicators'][$indicator] = $period;
					
				//$result[$source_seo]['indicators_num'] = $grp_recs;		
				$grp_recs += 1;
				
			}		
			
			foreach($result as $src => $indics){
				$result[$src]['indicators_num'] = count($indics['indicators']);
			}
		}
					
		return $result;
	}


/* 
============================================================================== 
============================================================================== 
============================================================================== 
*/
	
	
	
	
	
	
	
	
	
	
	
/* ============================================================================== 
/*	@BUILD: KDHS - COMPARISON DATA
/* ------------------------------------------------------------------------------ */	
	
	function get_DHS_comparisonIndicator($com, $ind = '')
	{
		$result = array();
		
		$sq_secta = "SELECT `indicator`, `period`, `source`, `sector`, `compare` FROM `oc_county_sector_cards_new` WHERE (`compare` =1) GROUP BY `indicator`, `period` HAVING (COUNT(`card_id`) >1);";	
		
		$rs_secta = $this->dbQuery($sq_secta);		
		
		if($this->recordCount($rs_secta) > 0)
		{
			$currTitle = '';
			$currPeriod = '';
			$currId = $ind;
			$letter = 'a';
			$row = 0;
			while($cn_secta_a = $this->fetchRow($rs_secta, 'assoc'))
			{
				$cn_secta  			= array_map("clean_output", $cn_secta_a);
				
				$indicator_title 	= $cn_secta['indicator'];
				$period 			= trim($cn_secta['period']);
				$indicator_clean    = clean_alphanum($indicator_title);
				
				$indicator_id 		= base64_encode($indicator_title);
				
				$active='';
				if($ind == $indicator_id) { $active=' active '; $currTitle = $indicator_title; $currPeriod = $period; } 
				elseif($ind == '' and $row == 0) { $active=' active '; $currTitle = $indicator_title; $currId = $indicator_id; $currPeriod = $period;  }
				
				
				$result['indi_title'][] = $indicator_title.' ('.$period.')';
					
				/*$result['indi_list'][] = '<tr>
				      <td class="level2 legend '.$letter.' '.$active.'" id="'.$indicator_clean.'"><a href="comparison.php?com='.$com.'&ind='.$indicator_id.'">'.$indicator_title.' ('.$period.')</a></td>
				    </tr>';*/
				
				
				$result['indi_list'][] = '<option value="'.$indicator_id.'" data-period="'.$period.'">'.$indicator_title.' ('.$period.')</option>';
				
				
				$letter++;
				$row++;
			}
			$result['indi_curr'] = $currTitle;
			$result['indi_curr_id'] = $currId;
			$result['indi_period'] = $currPeriod;
		}
					
		return $result;
	}
	

	
	function get_DHS_comparisonIndicatorData($ind, $iperiod)
	{
		$result 	= array();
		
		$ind_full 	= ($ind <> '') ? base64_decode($ind) : '';
		
		$sq_secta = "SELECT
    `County`, `Indicator`, `Period`, CONVERT(`Value`, DECIMAL(25,2)) AS `value`, `Value_Type`, `Source`, `Sector`, `Date`, `Initials`, `compare`
FROM
    `oc_county_sector_cards_new`
WHERE (`Indicator` = ".$this->quote_si($ind_full).") and (`Period` = ".$this->quote_si($iperiod).")
ORDER BY CONVERT(`Value`, DECIMAL(25,2))  DESC, `County` ;";		
		//echo $sq_secta;
		$rs_secta = $this->dbQuery($sq_secta);		
		
		if($this->recordCount($rs_secta) > 0)
		{
			$letter = 'a';
			$row = 0;
			while($cn_secta_a = $this->fetchRow($rs_secta, 'assoc'))
			{
				$cn_secta  		= array_map("clean_output", $cn_secta_a);
				$county 		= $cn_secta['County'];
				$value 			= (float) $cn_secta['value'];	
				$value_type 	= $cn_secta['Value_Type'];
				
				$data['county'][]	= ucwords($county); 
				$data['values'][] 	= $value;
				$data['value_tips'][] = $value_type;	
				
				$json['name']	= ucwords($county); 
				$json['value']	= $value;
				$json['tip'] = $value_type;	
				
				$data['rage'][]	= $json; 
			}
			$data['value_type'] = $value_type;
			$result = $data;
		}
					
		return $result;
	}
	
	
	
	function get_DHS_comparisonCountyData($county_id)
	{
		$result = array();
		$data_val = array();
		$data_perc = array();
		
		
		$sq_county  = "SELECT `county` FROM `oc_county`  WHERE (`county_id` = ".$this->quote_si($county_id)."); ";		
		$rs_county 	= current($this->dbQueryFetch($sq_county));	
		$county_name   = trim($rs_county['county']);
		
		
		//, SUM(CONVERT(`Value`, DECIMAL(25,2))) OVER(ORDER BY `value`) AS `cumulative_sum`
		$sq_secta = "SELECT
    `County`, `Indicator`, `Period`, CONVERT(`Value`, DECIMAL(25,2)) AS `value`, `Value_Type`, `Source`, `Sector`, `Date`, `Initials`, `compare`
FROM
    `oc_county_sector_cards_new`
WHERE (`County` = ".$this->quote_si($county_name)." and `compare` = '1')
ORDER BY CONVERT(`Value`, DECIMAL(25,2))  DESC limit 0, 25;";	//limit 0, 25
		
		//echobr($sq_secta);
		$rs_secta = $this->dbQuery($sq_secta);		
		
		if($this->recordCount($rs_secta) > 0)
		{
			$letter = 'a';
			$row = 0;
			while($cn_secta_a = $this->fetchRow($rs_secta, 'assoc'))
			{
				$cn_secta  		= array_map("clean_output", $cn_secta_a);
				/*$county_id 		= $cn_secta['county_id'];*/
				$county  		= $cn_secta['County'];
				$indicator_title = $cn_secta['Indicator'];
				$value 			= (float) $cn_secta['value'];
				//$value 			= log10($value);
				
				$data_val[] = $value;
				
			}
			//displayArray($data_val);
			$data_total = array_sum($data_val);
			//echobr($data_total);
			
			foreach($data_val as $kk => $vv){
				$data_perc[$kk] = (float) ($vv / $data_total) * 100;
			}
			
			$result['county'] = $county;
			$result['data'] = $data_perc;
			
		}
					
		return $result;
	}
	
	
	
	
	
	
/* ============================================================================== 
/*	@BUILD: COMPARISON DATA
/* ------------------------------------------------------------------------------ */	
	
	function get_comparisonIndicator($com, $ind = '')
	{
		$result = array();
		
		$sq_secta = "SELECT
    `oc_county_indicator`.`indicator_id`
    , `oc_conf_indicators`.`indicator_title`
    , `oc_county_indicator`.`period`
FROM
    `oc_county_indicator`
    INNER JOIN `oc_conf_indicators` 
        ON (`oc_county_indicator`.`indicator_id` = `oc_conf_indicators`.`indicator_id`)
WHERE (`oc_conf_indicators`.`published` =1)
GROUP BY `oc_conf_indicators`.`indicator_title`, `oc_county_indicator`.`period`;";		
		$rs_secta = $this->dbQuery($sq_secta);		
		
		if($this->recordCount($rs_secta) > 0)
		{
			$currTitle = '';
			$currId = $ind;
			$letter = 'a';
			$row = 0;
			while($cn_secta_a = $this->fetchRow($rs_secta, 'assoc'))
			{
				$cn_secta  		= array_map("clean_output", $cn_secta_a);
				$indicator_id 	= $cn_secta['indicator_id'];
				$indicator_title 	= $cn_secta['indicator_title'];
				$period 	= $cn_secta['period'];
				$indicator_clean    = clean_alphanum($indicator_title);
				
				$active='';
				if($ind == $indicator_id) { $active=' active '; $currTitle = $indicator_title;  } 
				elseif($ind == '' and $row == 0) { $active=' active '; $currTitle = $indicator_title; $currId = $indicator_id; }
				
				
				$result['indi_title'][] = $indicator_title.' ('.$period.')';
					
				$result['indi_list'][] = '<tr>
				      <td class="level2 legend '.$letter.' '.$active.'" id="'.$indicator_clean.'"><a href="comparison.php?com='.$com.'&ind='.$indicator_id.'">'.$indicator_title.' ('.$period.')</a></td>
				    </tr>';
				
				$letter++;
				$row++;
			}
			$result['indi_curr'] = $currTitle;
			$result['indi_curr_id'] = $currId;
		}
					
		return $result;
	}
	
	
	
	
	function get_comparisonIndicatorData($ind)
	{
		$result = array();
		
		$sq_secta = "SELECT
    `oc_county_indicator`.`indicator_id`
    , `oc_county_indicator`.`period`
    , `oc_county`.`county`
    , CONVERT(`oc_county_indicator`.`value`, DECIMAL(25,2)) AS `value`
FROM
    `oc_county_indicator`
    INNER JOIN `oc_conf_indicators` 
        ON (`oc_county_indicator`.`indicator_id` = `oc_conf_indicators`.`indicator_id`)
    INNER JOIN `oc_county` 
        ON (`oc_county_indicator`.`county_id` = `oc_county`.`county_id`)
WHERE (`oc_county_indicator`.`indicator_id` = ".$this->quote_si($ind).")
ORDER BY CONVERT(`oc_county_indicator`.`value`, DECIMAL(25,2))  DESC;";		
		
		$rs_secta = $this->dbQuery($sq_secta);		
		
		if($this->recordCount($rs_secta) > 0)
		{
			$letter = 'a';
			$row = 0;
			while($cn_secta_a = $this->fetchRow($rs_secta, 'assoc'))
			{
				$cn_secta  		= array_map("clean_output", $cn_secta_a);
				$county 		= $cn_secta['county'];
				$value 			= (float) $cn_secta['value'];
				
				
				$data['county'][]	= ucwords($county); 
				$data['values'][] 	= $value;


				//$datab['allocated'][] = array('name'=>''.$department.'', 'y'=> $val_allocated, 'drilldown' => $department_seo.'a'); 
				//$datab['expenditure'][] = array('name'=>''.$department.'', 'y'=> $val_expensed, 'drilldown' => $department_seo.'e'); 
				
				
				
				
			}
			$result = $data;
		}
					
		return $result;
	}
	
	
	
	function get_comparisonCountyData($county_id)
	{
		$result = array();
		
		/* $sq_secta = "SELECT
    `oc_county_indicator`.`indicator_id`
    , `oc_county_indicator`.`period`
    , `oc_county`.`county`
    , CONVERT(`oc_county_indicator`.`value`, DECIMAL(25,2)) AS `value`
FROM
    `oc_county_indicator`
    INNER JOIN `oc_conf_indicators` 
        ON (`oc_county_indicator`.`indicator_id` = `oc_conf_indicators`.`indicator_id`)
    INNER JOIN `oc_county` 
        ON (`oc_county_indicator`.`county_id` = `oc_county`.`county_id`)
WHERE (`oc_county_indicator`.`indicator_id` = ".$this->quote_si($ind).")
ORDER BY CONVERT(`oc_county_indicator`.`value`, DECIMAL(25,2))  DESC;";	*/	
		
		$sq_secta = "SELECT
    `oc_county_indicator`.`indicator_id`
    , `oc_county_indicator`.`period`
    , `oc_county`.`county`
    , CONVERT(`oc_county_indicator`.`value`, DECIMAL(25,2))  AS `value`
    , `oc_county_indicator`.`county_id`
    , `oc_conf_indicators`.`indicator_title`
FROM
    `oc_county_indicator`
    INNER JOIN `oc_conf_indicators` 
        ON (`oc_county_indicator`.`indicator_id` = `oc_conf_indicators`.`indicator_id`)
    INNER JOIN `oc_county` 
        ON (`oc_county_indicator`.`county_id` = `oc_county`.`county_id`)
WHERE (`oc_county_indicator`.`county_id` = ".$this->quote_si($county_id).")
ORDER BY `oc_conf_indicators`.`indicator_title` ASC;";		
		
		$rs_secta = $this->dbQuery($sq_secta);		
		
		if($this->recordCount($rs_secta) > 0)
		{
			$letter = 'a';
			$row = 0;
			while($cn_secta_a = $this->fetchRow($rs_secta, 'assoc'))
			{
				$cn_secta  		= array_map("clean_output", $cn_secta_a);
				$county_id 		= $cn_secta['county_id'];
				$county  		= $cn_secta['county'];
				$indicator_title = $cn_secta['indicator_title'];
				$value 			= (float) $cn_secta['value'];
				$value 			= log10($value);
				
				
				//$data['county'][]	= ucwords($county); 
				//$data['values'][] 	= $value;

				//[$county_id]
				//$data[] = array('name'=>''.$indicator_title.'', 'y'=> $value); 
				$data[] = $value;
				
			}
			$result['county'] = $county;
			$result['data'] = $data;
		}
					
		return $result;
	}
	
	
	
	
	
	
	
	
	
	
	
	
/* ============================================================================== 
/*	@BUILD: COUNTY BUDGET
/* ------------------------------------------------------------------------------ */		

    
	function get_countyBudgetPeriod($id, $period = '', $latest='')
	{
		$result = array();
		$limit = "";
		
		if($latest == 1) { $limit = " LIMIT 1"; }
		if($id) 
		{
			$cCounty_clean_arr	= $this->get_countyProfile($id);
			$cCounty_clean		= clean_title($cCounty_clean_arr['county']);
			
			$sq_qry = "SELECT TRIM(period) AS `period` , TRIM(county) AS `county` FROM `oc_cob_budgets` WHERE (TRIM(county) LIKE ".$this->quote_si($cCounty_clean,1).") GROUP BY `period` ORDER BY `period` ASC ".$limit.";";
			//echo $sq_qry; exit;
			if($latest == 1) {
				$rs_qry = current($this->dbQueryFetch($sq_qry));
				$result = $rs_qry['period']; 
			}
			else 
			{
				$rs_qry     = $this->dbQuery($sq_qry);		
                $rec_total  = $this->recordCount($rs_qry);   
				$rec = 0;
				if($this->recordCount($rs_qry) > 0)
				{
					while($cn_qry = $this->fetchRow($rs_qry, 'assoc'))
					{
                        $selected = "";
                        
						$period_val_short = substr($cn_qry['period'], 0,5);
						
						if($period <> '') { 
                            if($cn_qry['period'] == $period) { $result['curr'] =  $cn_qry['period']; $selected=" selected "; } 
                        } else {
                            if($rec == ($rec_total-1)) { $result['curr'] =  $cn_qry['period']; $selected=" selected "; }
                        }
                        
                        $result['yrs'][] = $cn_qry['period'];
                            
						$result['ops'][] = '<option '.$selected.' data-id="'.$rec.'">'.$cn_qry['period'] .'</option>'; /* value="'.$period_val_short.'"*/
						$rec += 1;
					}
				}
			}
		}
		return $result;
	}
	
	
	
	function get_countyBudgetPeriodIndicators_New($county, $period = '')
	{
		$result = array();
		
		if($county <> '') 
		{  
			$sq_qry = "SELECT `Year` as `period`, `Class`, `Adm1`, `Adm2`, `Adm3` as `department`, SUM(`Final Budget (Approved Estimate)`) AS `allocated`, SUM(`Final Expenditure (Total Payment Comm)`) AS `expensed` FROM `BoostCODEDdata_v2` WHERE (`Year` ='2015-16' AND `Class` LIKE '%expe%'AND `Adm2` LIKE ".$this->quote_si($county, 1).") GROUP BY `Adm2`, `Adm3`;";
			
			$result = $this->dbQueryFetch($sq_qry);		
		}
		return $result;
	}
	
	
	function get_countyBudgetPeriodIndicators($county_id, $period = '')
	{
		$result = array();
		
		if($county_id) 
		{  
			$sq_qry = "SELECT
    `oc_county_budget`.`county_id`
    , `oc_county_budget`.`period`
    , SUM(`oc_county_budget`.`allocated`) AS `allocated`
    , SUM(`oc_county_budget`.`expensed`) AS `expensed`
    , `oc_county_budget`.`department`
    , COUNT(`oc_county_budget`.`project`) AS `num_projects`
    , `oc_conf_sources`.`source`
FROM
    `oc_county_budget`
    LEFT JOIN `oc_conf_sources` 
        ON (`oc_county_budget`.`source_id` = `oc_conf_sources`.`source_id`)
WHERE (`oc_county_budget`.`county_id` = ".$this->quote_si($county_id)." AND `oc_county_budget`.`period` = ".$this->quote_si($period).")
GROUP BY `oc_county_budget`.`period`, `oc_county_budget`.`department`
ORDER BY `oc_county_budget`.`period` DESC, `allocated` DESC LIMIT 8;";
			//echobr($sq_qry);	
			$result = $this->dbQueryFetch($sq_qry);		
		}
		return $result;
	}
	
	
	
	function get_countyBudgetPeriodTotal($county_id, $period = '')
	{
		$result = array();
		
		if($county_id) 
		{  
			$sq_qry = "SELECT `county_id` , `period` , SUM(`allocated`) AS `allocated` , SUM(`expensed`) AS `expensed` FROM `oc_county_budget` WHERE (`county_id` = ".$this->quote_si($county_id)."  AND `period` = ".$this->quote_si($period).") GROUP BY `period` limit 1;";
				
			$rs_qry   = current($this->dbQueryFetch($sq_qry));		
			
			$val_allocated	= intval($rs_qry['allocated']); 
			$val_expensed	= intval($rs_qry['expensed']); 
			
			$result[] = array('name'=>'Allocated', 'y'=> $val_allocated ); 
			$result[] = array('name'=>'Expenditure', 'y'=> $val_expensed); 
			
			
		}
		return $result;
	}
	
	
	
	
	
	
	function get_countyBudgetHome($id, $period = '', $cdept = '')
	{
		$result = array();
		$data	= array();
		$sums 	= array();
		
		if($id) 
		{
			$sq_qry = "SELECT
    `county_id`
    , `period`
    , SUM(`allocated`) AS `allocated`
    , SUM(`expensed`) AS `expensed`
    , `department`
	, `department_code`
FROM
    `oc_county_budget`
WHERE (`county_id` = ".$this->quote_si($id)."  AND `period` = ".$this->quote_si($period).")
GROUP BY `period`, `department`;";
			
			$sq_dept = "";
			
			if($cdept <> '')
			{
				$sq_dept = " AND trim(`department_code`) = ".$this->quote_si($cdept)." ";
				
				$sq_qry = "SELECT
				`county_id`
				, `period`
				, SUM(`allocated`) AS `allocated`
				, SUM(`expensed`) AS `expensed`
				, `department_b` as `department`, `department_b_code` as `department_code`, `project`
				FROM
				`oc_county_budget`
				WHERE (`county_id` = ".$this->quote_si($id)."  AND `period` = ".$this->quote_si($period)."  ".$sq_dept.")
				GROUP BY `period`, `department`, `department_b`;";
			}
			
			//echobr($sq_qry);	
			$rs_qry = $this->dbQuery($sq_qry);		
			
			$rec = 0;
			if($this->recordCount($rs_qry) > 0)
			{
				while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
				{
					$cn_qry  		= array_map("clean_output", $cn_qry_a);
					
					$department 		= ucwords(clean_alphaonly($cn_qry['department'])); 
					$department_seo		= clean_alphanum($cn_qry['department']).'-';
					$department_code	= $cn_qry['department_code'];
					$period				= $cn_qry['period'];
					
					/*if($cdept <> '')
					{
						$department 	= ucwords(clean_alphaonly($cn_qry['project'])); 
						$department_seo	= clean_alphanum($cn_qry['project']).'-';
					}*/
					
					//$project 		= $cn_qry['project']; 
					$val_allocated	= intval($cn_qry['allocated']); 
					$val_expensed	= intval($cn_qry['expensed']); 
					
					$data['category'][]		= ucwords($department); 
					$data['allocated'][] 	= $val_allocated;
					$data['expensed'][] 	= $val_expensed;
					$data['category_code'][] 	= $department_code;
					
					
					$datab['allocated'][] = array('name'=>''.$department.'', 'y'=> $val_allocated, 'drilldown' => $department_seo.'a'); 
					$datab['expenditure'][] = array('name'=>''.$department.'', 'y'=> $val_expensed, 'drilldown' => $department_seo.'e'); 
					
					/* oi_edit_log:: Murage: Add category code */
					$result['pie_alloc'][] = array('name'=>''.$department.'', 'y'=> $val_allocated, 'drilldown' => $department_seo.'a', 'name_code' => $department_code, 'period' => $period); 
					$result['pie_expense'][] = array('name'=>''.$department.'', 'y'=> $val_expensed, 'drilldown' => $department_seo.'e', 'name_code' => $department_code, 'period' => $period); 
					
				}
				$result['bar'] = $data;
				$result['drill'] = $datab;
			}
		}
		return $result;
	}
	
	
	
	/*
	function get_countyBudgetHomeDrill($id, $period = '')
	{
		$result = array();
		$data	= array();
		$sums 	= array();
		
		if($id) 
		{
			$sq_qryXX = "SELECT
    `county_id`
    , `period`
    , SUM(`allocated`) AS `allocated`
    , SUM(`expensed`) AS `expensed`
    , `department`, `project`
FROM
    `oc_county_budget`
WHERE (`county_id` = ".$this->quote_si($id)."  AND `period` = ".$this->quote_si($period).")
GROUP BY `period`, `department`, `project`;";
			
			$sq_qry = "SELECT
    `county_id`
    , `period`
    , SUM(`allocated`) AS `allocated`
    , SUM(`expensed`) AS `expensed`
    , `department`, `department_b`
FROM
    `oc_county_budget`
WHERE (`county_id` = ".$this->quote_si($id)."  AND `period` = ".$this->quote_si($period).")
GROUP BY `period`, `department`, `department_b`;";
				
			$rs_qry = $this->dbQuery($sq_qry);		
			
			$rec = 0;
			if($this->recordCount($rs_qry) > 0)
			{
				while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
				{
					$cn_qry  		= array_map("clean_output", $cn_qry_a);
					
					$department 	= $cn_qry['department']; 
					$department_seo	= clean_alphanum($department).'-';
					
					$project 		= $cn_qry['department_b']; 
					$val_allocated	= intval($cn_qry['allocated']); 
					$val_expensed	= intval($cn_qry['expensed']); 
					
					//$datab[$department_seo.'a'][$project] = $val_allocated; // array(''.$project.''=> $val_allocated); 
					//$datab[$department_seo.'e'][$project] = $val_expensed; //array(''.$project.''=> $val_expensed); 		
					
					$data[$department_seo.'a'][] = [''.$project.'', $val_allocated];
					$data[$department_seo.'e'][] = [''.$project.'', $val_expensed];
					
					
					
					
					//$data[$department_seo.'e'][] = array('id'=>$department_seo.'e', 'data' => $datab[$department_seo.'e']);
					//$data[$department_seo.'e'][] = array('id'=> ''.$department_seo.'e', 'data' => $datab[$department_seo.'e']);
					
					//$data[$department_seo.'a']['id'] = $department_seo.'a';
					//$data[$department_seo.'a']['data'][$project] = $val_allocated;
					//$data[$department_seo.'e']['data'][$project] = $val_expensed;
					
					//$data['allocated'][$department_seo.'a'][] = array('name'=>''.$project.'', 'y'=> $val_allocated); 
					//$data['expenditure'][$department_seo.'e'][] = array('name'=>''.$project.'', 'y'=> $val_expensed); 
				}
				$result = $data;
				//$result['drill'] = $datab;
			}
		}
		//echo (json_encode($data)); exit;
		return $result;
	}
	*/
	

	/*
	function get_countyBudgetHomeDrill_L3($id, $period = '')
	{
		$result = array();
		$data	= array();
		$sums 	= array();
		
		if($id) 
		{
			
			$sq_qry = "SELECT
    `county_id`
    , `period`
    , SUM(`allocated`) AS `allocated`
    , SUM(`expensed`) AS `expensed`
    , `department_b`, `project`
FROM
    `oc_county_budget`
WHERE (`county_id` = ".$this->quote_si($id)."  AND `period` = ".$this->quote_si($period).")
GROUP BY `period`, `department`, `department_b`;";
				
			$rs_qry = $this->dbQuery($sq_qry);		
			
			$rec = 0;
			if($this->recordCount($rs_qry) > 0)
			{
				while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
				{
					$cn_qry  		= array_map("clean_output", $cn_qry_a);
					
					$department 	= $cn_qry['department']; 
					$department_seo	= clean_alphanum($department).'-';
					
					$project 		= $cn_qry['department_b']; 
					$val_allocated	= intval($cn_qry['allocated']); 
					$val_expensed	= intval($cn_qry['expensed']); 
					
					//$datab[$department_seo.'a'][$project] = $val_allocated; // array(''.$project.''=> $val_allocated); 
					//$datab[$department_seo.'e'][$project] = $val_expensed; //array(''.$project.''=> $val_expensed); 		
					
					$data[$department_seo.'a'][] = [''.$project.'', $val_allocated];
					$data[$department_seo.'e'][] = [''.$project.'', $val_expensed];
					//$data[$department_seo.'e'][] = array('id'=>$department_seo.'e', 'data' => $datab[$department_seo.'e']);
					//$data[$department_seo.'e'][] = array('id'=> ''.$department_seo.'e', 'data' => $datab[$department_seo.'e']);
					
					//$data[$department_seo.'a']['id'] = $department_seo.'a';
					//$data[$department_seo.'a']['data'][$project] = $val_allocated;
					//$data[$department_seo.'e']['data'][$project] = $val_expensed;
					
					//$data['allocated'][$department_seo.'a'][] = array('name'=>''.$project.'', 'y'=> $val_allocated); 
					//$data['expenditure'][$department_seo.'e'][] = array('name'=>''.$project.'', 'y'=> $val_expensed); 
				}
				$result = $data;
				//$result['drill'] = $datab;
			}
		}
		//echo (json_encode($data)); exit;
		return $result;
	}
	*/

	
	
/* ============================================================================== 
/*	@BUILD: DEVHUB COUNTY FILES
/* ------------------------------------------------------------------------------ */		
	
function get_countyResources($county_id)
{
	$url  		= DOMAIN_DEVHUB.'api/_api.php?c='.$county_id;
	$json 		= file_get_contents($url);	
	$dataFiles  = json_decode($json, true);
	
	$_SESSION['sess_oc_resources'][$county_id] = $dataFiles['resources'];
	master::$listResources = $_SESSION['sess_oc_resources'];
	
	return true;
}	
    
    
    
/* ============================================================================== 
/*	@BUILD: DEVHUB RECENT FILES
/* ------------------------------------------------------------------------------ */		
	
function get_devhubRecent()
{
    $res_recent = array();
    
    if (empty($_SESSION['sess_oc_resources_recent'])) 
    {
        $url  		= DOMAIN_DEVHUB.'api/_apirecent.php';
        $json 		= file_get_contents($url);	
        $dataFiles  = json_decode($json, true);

        $_SESSION['sess_oc_resources_recent'] = $dataFiles;
        $res_recent  = $dataFiles;
    } else {
        $res_recent  = $_SESSION['sess_oc_resources_recent'];
    }
    
    return $res_recent;
}    
    
    
    
    
	
/* ============================================================================== 
/*	@BUILD: DEVHUB STATS
/* ------------------------------------------------------------------------------ */		
	
function get_devhubStats()
{
    $res_stats = array();
    
    if (empty($_SESSION['sess_oc_resources_stats'])) 
    {
        $url  		= DOMAIN_DEVHUB.'api/_apistats.php';
        $json 		= file_get_contents($url);	
        $dataStats  = json_decode($json, true);

        $latest     = $dataStats['latest'];
        $_SESSION['sess_oc_resources_stats'] = $dataStats;
        $res_stats  = $dataStats;
    } else {
        $res_stats  = $_SESSION['sess_oc_resources_stats'];
    }
	
	return $res_stats;
}		    
	
	
	
/* ============================================================================== 
/*	@BUILD: COUNTY 
/* ------------------------------------------------------------------------------ */		

	function get_countyFromName($county)
	{
		$result = array();
		
		if($county <> '') 
		{
			$sq_qry = "SELECT * FROM `oc_county`  WHERE (`county` = ".q_si($county)."); ";		
			$rs_qry = $this->dbQueryFetch($sq_qry);	
			
			if( count($rs_qry) ){
				$result 		= current($rs_qry);
				$county_name   	= trim($result['county']);
				$county_banner 	= 'images/background/'.$county_name.'_Gen.jpg';
				$county_map 	= 'images/maps/'.$county_name.'_Map.jpg';
				$county_web   	= ($result['website'] == '') ? 'http://'.clean_alphanum($county_name).'.go.ke' : $result['website'];


				$result['banner'] = $county_banner;
				$result['map'] = $county_map;
				$result['website'] = $county_web;
			}			
		}
		return $result;
	}
	
	
	
	function get_countyProfile($id)
	{
		$result = array();
		
		if($id) 
		{
			$sq_qry = "SELECT * FROM `oc_county`  WHERE (`county_id` = ".$this->quote_si($id)."); ";		
			$result = current($this->dbQueryFetch($sq_qry));		
			
			$county_name   	= trim($result['county']);
			$county_banner 	= 'images/background/'.$county_name.'_Gen.jpg';
			$county_map 	= 'images/maps/'.$county_name.'_Map.jpg';
			$county_web   	= ($result['website'] == '') ? 'http://'.clean_alphanum($county_name).'.go.ke' : $result['website'];
			
			
			$result['banner'] = $county_banner;
			$result['map'] = $county_map;
			$result['website'] = $county_web;
		}
		return $result;
	}
	
	
	
/* ============================================================================== 
/*	@BUILD: OC_CONF_TYPES DROPPER SELECT
/* ------------------------------------------------------------------------------ */	
	
	function get_ConfTypes($category, $crit = "", $ret_val = 'id')
	{ 
		$out = "<option value=''>- Select -</option>";
		$crit = ($crit <> "") ? strtolower($crit) : $crit;
		
		$sq = "SELECT * FROM `oc_conf_types` WHERE (`type_category` = ".$this->quote_si($category).") ;";
		
		$result = $this->dbQuery($sq);
			
			while($qry_data = $this->fetchRow($result))
			{
				$selected="";
				if(is_array($crit)){
					if(in_array($qry_data['type_id'], $crit) or in_array($qry_data['type_title'], $crit)) { $selected = " selected";} 						
				}
				elseif($crit <> "") { 
					if($qry_data['type_id'] == $crit or $qry_data['type_title'] == $crit) { $selected=" selected "; }
				} 
				
				$value = ($ret_val == 'id') ? $qry_data['type_id'] : $qry_data['type_title'];
				$out .= "<option value='".$value."' ".$selected.">".$qry_data['type_title'] ."</option>";
			}
			
			return $out;
	}

	
	
	
/* ============================================================================== 
/*	@BUILD: COUNTY LEADERS
/* ------------------------------------------------------------------------------ */		

	function get_countyLeaders($county_id, $type_id = '')
	{
		$result = array();
		$arrConstituency = array();
		$arrWard = array();
		
		$sq_crit = "";
		$sq_limit = "";
		
		
		if($county_id) 
		{
		
			if($type_id <> ''){
				//$sq_crit = "   AND  `oc_county_profiles`.`leader_type_id` = ".$this->quote_si($type_id)." ";
				
				/* Working */
				$sq_crit = "   AND  `oc_county_profiles_log`.`leader_type_id` = ".$this->quote_si($type_id)." ";
				
				
				/*brute*/
				//$sq_crit = "   AND  `oc_county_profiles`.`leader_type_id` = ".$this->quote_si($type_id)." ";
				
				//$sq_limit = " Limit 0, 1 ";
			}
			
			/*$sq_qry = "SELECT `oc_county_profiles`.*, `oc_conf_types`.`type_category`, `oc_conf_types`.`type_title`, `oc_conf_types`.`type_code` FROM `oc_county_profiles` INNER JOIN `oc_conf_types`  ON (`oc_county_profiles`.`leader_type_id` = `oc_conf_types`.`type_id`) WHERE (`oc_county_profiles`.`county_id` = ".$this->quote_si($county_id)." ".$sq_crit.") ORDER BY `oc_conf_types`.`seq`; ";	*/
			
			
			/*
			@@ PROPER WORKING QUERY
			*/
			
			$sq_qry = "SELECT `oc_county_profiles_log`.*, `oc_county_profiles`.`leader_name`, `oc_county_profiles`.`leader_seo`, `oc_conf_types`.`type_title`, `oc_conf_types`.`type_code`, `oc_county_profiles`.`avatar` FROM     `oc_county_profiles_log`
    INNER JOIN `oc_county_profiles` 
        ON (`oc_county_profiles_log`.`leader_id` = `oc_county_profiles`.`leader_id`)
    INNER JOIN `oc_conf_types` 
        ON (`oc_conf_types`.`type_id` = `oc_county_profiles_log`.`leader_type_id`) WHERE (`oc_county_profiles_log`.`county_id` = ".$this->quote_si($county_id)." AND `oc_county_profiles_log`.`status_active` =13 ".$sq_crit.") ORDER BY `oc_county_profiles_log`.`leader_type_id` ASC, `oc_county_profiles_log`.`date_start` DESC; ";	//echo $sq_qry;
			
			//
			
			/*
			@@ BRUTE FORCE QUERY FOR PRESENTATION
			*/
			
			$sq_qryX = "SELECT
    `oc_county_profiles`.`leader_id`
    , `oc_county_profiles`.`leader_type_id`
    , `oc_conf_types`.`type_title`
	, `oc_conf_types`.`type_code`
    , `oc_county_profiles`.`county_id`
    , `oc_county_profiles`.`leader_name`
    , `oc_county_profiles`.`leader_seo`
    , `oc_county_profiles`.`leader_blurb`
    , `oc_county_profiles`.`party`
    , `oc_county_profiles`.`avatar`
FROM
    `oc_county_profiles`
    INNER JOIN `oc_conf_types` 
        ON (`oc_county_profiles`.`leader_type_id` = `oc_conf_types`.`type_id`)
WHERE (`oc_county_profiles`.`county_id` = ".$this->quote_si($county_id)."    ".$sq_crit." )
ORDER BY `oc_county_profiles`.`leader_type_id` ASC, `oc_county_profiles`.`leader_id` DESC  ".$sq_limit." ; ";	
			/*and `oc_county_profiles`.`published` =1 */
			
			//echobr($sq_qry);
		//$result = $this->dbQueryFetch($sq_qry);	
			$rs_qry = $this->dbQuery($sq_qry);			
			$rs_count =  $this->recordCount($rs_qry);

			if($rs_count > 0)
			{
				$l_type = 0;
				$l_type1 = 0;
				while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
				{
					$genout 			= "true";
					$cn_qry 			= array_map("clean_output", $cn_qry_a);
					$type_code 			= $cn_qry['type_code'];					
					
					$county_name 		= ''; //trim($cn_qry['county']);
					//$avatar 			= ($cn_qry['avatar']<>'') ? $cn_qry['avatar'] : $county_name.$type_code.'.jpg';					
					//$cn_qry['avatar'] 	= $avatar;
					
					$constituency 		= ucwords(strtolower($cn_qry['constituency']));
					//$ward 				= ucwords(strtolower($cn_qry['ward']));
					
					
					if($type_code == '_Sen' or $type_code == '_Gov' or $type_code == '_DepGov' or $type_code == '_WoRep'){
						if($cn_qry['leader_type_id'] == $l_type){
							$genout = "false";
						}
					}
					
					
					if($genout == "true")
					{ 	//echobr($l_type);
						$result[$type_code][] = $cn_qry; 
					
						if($type_code == '_Mca'){
							if($constituency <> '' and !array_key_exists($constituency, $arrConstituency))
							{ $arrConstituency[$constituency] = $constituency; }
						}

						//if($ward <> '' and !array_key_exists($ward, $arrWard))
						//{ $arrWard[$ward] = $ward; }
						
					}
					
					
					$l_type = $cn_qry['leader_type_id'];
					
				}
				
				asort($arrConstituency); 
				$result['constituency'] = $arrConstituency;
				//asort($arrWard); $result['ward'] = $arrWard;
			}
		
		}
		return $result;
	}


	
	function get_countyLeadersLog($leader_id)
	{
		$result = '';
		$sq_qry = "SELECT * FROM `oc_county_profiles_log` WHERE (`leader_id` = ".$this->quote_si($leader_id).") ORDER BY `leader_id` DESC limit 0, 1; ";
		
		$rs_qry = $this->dbQueryFetch($sq_qry);	
		$result = (count($rs_qry) > 0) ? current($rs_qry) : '';
		
		return $result;
	}
	
/* ============================================================================== 
/*	@BUILD: COUNTY CONSTITUENCIES
/* ------------------------------------------------------------------------------ */		

function get_countyConstituency($county_id)
{
	$result = array();

	$sq_secta = "SELECT `sector_id`, `sector_name`, `heading`, `fa_class` FROM `oc_conf_sectors` where `devolved`='1' ORDER BY `seq` ASC limit 0, 6; ";		
	$rs_secta = $this->dbQuery($sq_secta);		

	if($this->recordCount($rs_secta) > 0)
	{
		while($cn_secta_a = $this->fetchRow($rs_secta, 'assoc'))
		{
			$cn_secta  = array_map("clean_output", $cn_secta_a);
			$sector_id = $cn_secta['sector_id'];

			$card_data = $this->get_countyDataCards($county_id, $sector_id);

			$sector = '<div class="col-md-2 padd0_3"><div class="sector clearfix">
				  <div class="heading '.$cn_secta['heading'] .'">
				  <i class="fa '. $cn_secta['fa_class'] .'"></i>
				  <a href="#"><h3>'. $cn_secta['sector_name'] .'</h3></a>
				  </div>'.implode('', $card_data).'</div></div>';
			//$sector .= implode('', $card_data);
			$result[] = $sector;
		}
	}

	return $result;
}
	
	
	
/* ============================================================================== 
/*	@BUILD: COUNTY CARDS
/* ------------------------------------------------------------------------------ */		

	function get_countySectorCardsPDF($county, $selperiod = '')
	{
		$result = array();
		
		$sq_period = "";
		if($selperiod <> '') { $sq_period = " and `Period`  LIKE ".$this->quote_si($selperiod, 1)." "; }
		
		$sq_secta = "SELECT
    `County`
    , `Indicator`
    , `Period`
    , `Value`
    , `Value_Type`
    , `Source`
    , `Sector`
FROM
    `oc_county_sector_cards_new`
WHERE (`County` LIKE ".$this->quote_si($county, 1).")  and `Period`  LIKE '%2012%' or `County` LIKE ".$this->quote_si($county, 1)."  and `Period`  LIKE '%2011%' or `County` LIKE ".$this->quote_si($county, 1)."  and `Period`  LIKE '%2010%'  or `County` LIKE ".$this->quote_si($county, 1)."  and `Period`  LIKE '%2009%'
ORDER BY `Sector` ASC, `Period` DESC; ";	
		//echobr($sq_secta);
		$rs_secta = $this->dbQuery($sq_secta);		
		
		if($this->recordCount($rs_secta) > 0)
		{
			while($cn_secta_a = $this->fetchRow($rs_secta, 'assoc'))
			{
				$cn_secta  = array_map("clean_output", $cn_secta_a);
				
				$Sector = $cn_secta['Sector'];
				$Indicator = $cn_secta['Indicator'];
				$Period = $cn_secta['Period'];
				//$Period = $cn_secta['Period'];
				
				$result[$Sector][$Indicator][$Period] = array(
					'period' => ''.$Period.'',	
					'value' => ''.$cn_secta['Value'] .'',
					'value_type' => ''.$cn_secta['Value_Type'] .'',
					'source' => ''.$cn_secta['Source'] .'',
							);
				
				/*if(count($card_data) > 0)
				{
					$sector = '<li><div class="padd0_3"><div class="sector clearfix">
						  <div class="heading '.$cn_secta['heading'] .'">
						  <i class="fa '. $cn_secta['fa_class'] .'"></i>
						  <a href="#"><h3>'. $cn_secta['sector_name'] .'</h3></a>
						  </div>'.implode('', $card_data).'</div></div></li>';
					$result[] = $sector;
				}*/
			}
		}
					
		return $result;
	}
	
	
	function get_countySectorCardsNew($county, $selperiod = '', $pdf = '')
	{
		$result = array();
		
		$county		= clean_title($county);
		
		$county		= generate_seo_title($county,'');
			
		
		
		
		
		$sq_period = "";
		if($selperiod <> '') { $sq_period = " and `Period`  LIKE ".$this->quote_si($selperiod, 1)." "; }
		
		$sq_pdf = "";
		if($pdf == 'y') { 
			$sq_pdf = " OR alphanum(`county`) LIKE ".$this->quote_si($county, 1)."  and `period`  LIKE '%2012%' or alphanum(`county`) LIKE ".$this->quote_si($county, 1)."  and `period`  LIKE '%2011%' or alphanum(`county`) LIKE ".$this->quote_si($county, 1)."  and `period`  LIKE '%2010%'  or alphanum(`county`) LIKE ".$this->quote_si($county, 1)."  and `period`  LIKE '%2009%' "; 
		}
		
		
		/*$sq_secta = "SELECT `county`, `indicator`, `period`, `value`, `value_type`, `source`, `sector` FROM `oc_county_sector_cards_new` WHERE (`county` LIKE ".$this->quote_si($county, 1).") ". $sq_period ." ". $sq_pdf ." ORDER BY `sector` ASC, `period` asc; ";*/	
		
		$sq_secta = "SELECT `county`, `indicator`, `period`, SUM(`value`) AS `value`, COUNT(`card_id`) AS `card_records`, MAX(`value`) AS `value_max`, `value_type`, `sub_county`, `description`, `source`, `sector` FROM `oc_county_sector_cards_new` WHERE (alphanum(`county`) LIKE ".$this->quote_si($county, 1)." ) ". $sq_period ." ". $sq_pdf ." GROUP BY `county`, `indicator`, `period` ORDER BY `sector` ASC, `period` DESC;";	/*ASC*/
		
		/*echobr($sq_secta); //exit;*/
		$rs_secta = $this->dbQuery($sq_secta);		
		
		if($this->recordCount($rs_secta) > 0)
		{
			while($cn_secta_a = $this->fetchRow($rs_secta, 'assoc'))
			{
				$cn_secta  = array_map("clean_output", $cn_secta_a);
				
				$card_recs 		= $cn_secta['card_records'];
				$card_value 	= ($card_recs > 1 ) ? $cn_secta['value'] :  $cn_secta['value_max'];
				$Sector 		= $cn_secta['sector'];
				$Indicator 		= $cn_secta['indicator'];
				$Period 		= $cn_secta['period'];
				//$Period = $cn_secta['Period'];
				
				$result[$Sector][$Indicator][$Period] = array(
					'period' => ''.$Period.'',	
					'value' => ''.$card_value.'',
					'value_type' => ''.$cn_secta['value_type'] .'',
					'source' => ''.$cn_secta['source'] .'',
					'card_recs' => ''.$card_recs.'',
							);
				
				/*if(count($card_data) > 0)
				{
					$sector = '<li><div class="padd0_3"><div class="sector clearfix">
						  <div class="heading '.$cn_secta['heading'] .'">
						  <i class="fa '. $cn_secta['fa_class'] .'"></i>
						  <a href="#"><h3>'. $cn_secta['sector_name'] .'</h3></a>
						  </div>'.implode('', $card_data).'</div></div></li>';
					$result[] = $sector;
				}*/
			}
		}
					
		return $result;
	}
	
	
	function get_countySectorCards($county_id)
	{
		$result = array();
		
		$sq_secta = "SELECT `sector_id`, `sector_name`, `heading`, `fa_class` FROM `oc_conf_sectors` where `devolved`='1' ORDER BY `seq` ASC limit 0, 6; ";		
		$rs_secta = $this->dbQuery($sq_secta);		
		
		if($this->recordCount($rs_secta) > 0)
		{
			while($cn_secta_a = $this->fetchRow($rs_secta, 'assoc'))
			{
				$cn_secta  = array_map("clean_output", $cn_secta_a);
				$sector_id = $cn_secta['sector_id'];
				
				$card_data = $this->get_countyDataCards($county_id, $sector_id);
				if(count($card_data) > 0)
				{
					$sector = '<li><div class="padd0_3"><div class="sector clearfix">
						  <div class="heading '.$cn_secta['heading'] .'">
						  <i class="fa '. $cn_secta['fa_class'] .'"></i>
						  <a href="#"><h3>'. $cn_secta['sector_name'] .'</h3></a>
						  </div>'.implode('', $card_data).'</div></div></li>';
					//$sector .= implode('', $card_data);
					$result[] = $sector;
				}
			}
		}
					
		return $result;
	}
	
	
	function get_countyDataCards($county_id, $sector_id)
	{
		$card = array();
		
		$sq_qry = "SELECT
    `oc_county_sector_cards`.`id`
    , `oc_conf_sources`.`source`
    , `oc_county_sector_cards`.`indicator`
    , `oc_county_sector_cards`.`value`
    , `oc_county_sector_cards`.`dated` AS `period`
    , `oc_county_sector_cards`.`county_id`
    , `oc_county_sector_cards`.`sector_id`
FROM
    `oc_county_sector_cards`
    LEFT JOIN `oc_conf_sources` 
        ON (`oc_county_sector_cards`.`source_id` = `oc_conf_sources`.`source_id`)
WHERE (`oc_county_sector_cards`.`county_id` = ".$this->quote_si($county_id)."
    AND `oc_county_sector_cards`.`sector_id` = ".$this->quote_si($sector_id)."
	AND `oc_county_sector_cards`.`published` = '1')
ORDER BY `oc_county_sector_cards`.`inputdate` DESC LIMIT 2;";		// 
		
		$rs_qry = $this->dbQuery($sq_qry);		
		
		if($this->recordCount($rs_qry) > 0)
		{
			$c=1;
			while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
			{
				$cn_qry  = array_map("clean_output", $cn_qry_a);
				
				$card[] = '<div class="col-md-12 no'. $c .'">
							  <h5>'.$cn_qry['source'] .'</h5>
							  <h4>'.$cn_qry['value'] .'</h4> 
							  <h6>'.$cn_qry['indicator'] .'</h6>
							  <h5 class="date">As of '.$cn_qry['period'] .'</h5>
                          </div>';
				$c++;	
			}
		}
		else 
		{
			//$card[] = '<div class="col-md-12 no-1"><p class="no-data"><i class="fa fa-exclamation-triangle"></i> No data available</p></div>';
		}
					
					
		return $card;
	}
	
	
	
	
	
/* ============================================================================== 
/*	@BUILD: FACTSHEETS
/* ------------------------------------------------------------------------------ */		
	
	
	function get_factsheetSectorCards($county_id)
	{
		$result = array();
		
		$sq_secta = "SELECT `sector_id`, `sector_name`, `heading`, `fa_class` FROM `oc_conf_sectors` where `devolved`='1' ORDER BY `seq` ASC limit 0, 6; ";		
		$rs_secta = $this->dbQuery($sq_secta);		
		
		if($this->recordCount($rs_secta) > 0)
		{
			while($cn_secta_a = $this->fetchRow($rs_secta, 'assoc'))
			{
				$cn_secta  = array_map("clean_output", $cn_secta_a);
				$sector_id = $cn_secta['sector_id'];
				
				$card_data = $this->get_factsheetDataCards($county_id, $sector_id);
				
				$result[$sector_id] = $cn_secta;
				$result[$sector_id]['data'] = $card_data;
			}
		}
					
		return $result;
	}
	
	
	function get_factsheetDataCards($county_id, $sector_id)
	{
		$card = array();
		
		$sq_qry = "SELECT
    `oc_county_sector_cards`.`id`
    , `oc_conf_sources`.`source`
    , `oc_county_sector_cards`.`indicator`
    , `oc_county_sector_cards`.`value`
    , `oc_county_sector_cards`.`dated` AS `period`
    , `oc_county_sector_cards`.`county_id`
    , `oc_county_sector_cards`.`sector_id`
FROM
    `oc_county_sector_cards`
    LEFT JOIN `oc_conf_sources` 
        ON (`oc_county_sector_cards`.`source_id` = `oc_conf_sources`.`source_id`)
WHERE (`oc_county_sector_cards`.`county_id` = ".$this->quote_si($county_id)."
    AND `oc_county_sector_cards`.`sector_id` = ".$this->quote_si($sector_id).")
ORDER BY `oc_county_sector_cards`.`inputdate` DESC LIMIT 3 ;";		//LIMIT 2 
		$rs_qry = $this->dbQuery($sq_qry);		
		
		if($this->recordCount($rs_qry) > 0)
		{
			while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
			{
				$cn_qry  = array_map("clean_output", $cn_qry_a);
				
				$card[] = $cn_qry;				
			}
		}
		return $card;
	}
	
	
	
	
	function get_factsheetBudget($id, $period = '', $cdept = '')
	{
		$result = array();
		$data	= array();
		$sums 	= array();
		
		if($id) 
		{
			$selcounty		= clean_title($id);
			$selcounty		= generate_seo_title($selcounty,'');
			
			$sq_qry = "SELECT
        `county`
    , `period`
    , `department`
    , `budget_allocation`
    , `expenditure`
FROM
    `oc_cob_budgets_expenditure`
WHERE (alphanum(`county`) LIKE ".$this->quote_si($selcounty, 1)."  AND `period` = ".$this->quote_si($period).")
ORDER BY `department` ASC;";
			
			$sq_dept = "";
			
			/*echobr($sq_qry);	*/
			$rs_qry = $this->dbQuery($sq_qry);		
			
			$rec = 0;
			if($this->recordCount($rs_qry) > 0)
			{
				while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
				{
					$cn_qry  		= array_map("clean_output", $cn_qry_a);
					
					$department 	= ucwords(clean_alphaonly($cn_qry['department'])); 
					$data['category'] = $department;
					$data['allocated'] = intval($cn_qry['budget_allocation']); 
					$data['expensed'] = intval($cn_qry['expenditure']); 
					
					
					$result[]	= $data;
				}
				
			}
		}
		return $result;
	}
	
	
	
	
	function get_factsheetBudget_original($id, $period = '', $cdept = '')
	{
		$result = array();
		$data	= array();
		$sums 	= array();
		
		if($id) 
		{
			$sq_qry = "SELECT
    `county_id`
    , `period`
    , SUM(`allocated`) AS `allocated`
    , SUM(`expensed`) AS `expensed`
    , `department`
FROM
    `oc_county_budget`
WHERE (`county_id` = ".$this->quote_si($id)."  AND `period` = ".$this->quote_si($period).")
GROUP BY `period`, `department`;";
			
			$sq_dept = "";
			
			//echobr($sq_qry);	
			$rs_qry = $this->dbQuery($sq_qry);		
			
			$rec = 0;
			if($this->recordCount($rs_qry) > 0)
			{
				while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
				{
					$cn_qry  		= array_map("clean_output", $cn_qry_a);
					
					$department 	= ucwords(clean_alphaonly($cn_qry['department'])); 
					$data['category'] = $department;
					$data['allocated'] = intval($cn_qry['allocated']); 
					$data['expensed'] = intval($cn_qry['expensed']); 
					
					
					$result[]	= $data;
					
					//$project 		= $cn_qry['project']; 
					/*$val_allocated	= intval($cn_qry['allocated']); 
					$val_expensed	= intval($cn_qry['expensed']); 
					
					$data['category'][]		= ucwords($department); 
					$data['allocated'][] 	= $val_allocated;
					$data['expensed'][] 	= $val_expensed;*/
					
					
					/*$datab['allocated'][] = array('name'=>''.$department.'', 'y'=> $val_allocated, 'drilldown' => $department_seo.'a'); 
					$datab['expenditure'][] = array('name'=>''.$department.'', 'y'=> $val_expensed, 'drilldown' => $department_seo.'e'); 
					
					$result['pie_alloc'][] = array('name'=>''.$department.'', 'y'=> $val_allocated, 'drilldown' => $department_seo.'a'); 
					$result['pie_expense'][] = array('name'=>''.$department.'', 'y'=> $val_expensed, 'drilldown' => $department_seo.'e');*/ 
					
				}
				//$result = $data;
				//$result['drill'] = $datab;
			}
		}
		return $result;
	}
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	

/* ============================================================================== 
/*	MEMBER EXIST
/* ------------------------------------------------------------------------------ */	
	
	function account_checkExist($account_email)
	{
		$result = 0;
		$sq_check = "SELECT * FROM `olnt_reg_account` WHERE (`email` = ".$this->quote_si($account_email).")";
		$rs_check = $this->dbQuery($sq_check);
	
		if($this->recordCount($rs_check)>=1) { 
			$result = 1;
		}
		return $result;
	}

/* ============================================================================== 
/*	MEMBER LEVELS
/* ------------------------------------------------------------------------------ */	
	
	function account_saveLevel($account_id, $levels)
	{
		$sq_qry = array();
		$sq_del = "delete from `pom_reg_accounts_to_levels` WHERE `account_id`= ".$this->quote_si($account_id)." ; ";
		$this->dbQuery($sq_del);
		
		foreach($levels as $level_id)
		{
			$sq_qry[] = "INSERT INTO `pom_reg_accounts_to_levels` (`level_id`, `account_id`) values (".$this->quote_si($level_id).", ".$this->quote_si($account_id)."); ";	
		}
		//displayArray($sq_qry); exit;
		if(count($sq_qry)) { $this->dbQueryMulti($sq_qry); }
	}


/* ============================================================================== 
/*	@BUILD: BREADCRUMBS
/* ------------------------------------------------------------------------------ */	

	function get_breadcrumb($cat, $cat_id = '')
	{
		$parent = '';
		$parent_ref = '#';
		$current_ref = '';
		
		$refs['pet_list'] = array('lbl' => 'petitions', 'ref' => 'index.php?tab=petitions', 'pgt' => 'petition details');
		$refs['members'] = array('lbl' => 'member accounts', 'ref' => 'index.php?tab='.$cat.'', 'pgt' => 'account details');
		$refs['profile'] = array('lbl' => 'member accounts', 'ref' => 'index.php?tab='.$cat.'', 'pgt' => 'account details');
		$refs['courts'] = array('lbl' => 'court list', 'ref' => 'index.php?tab='.$cat.'', 'pgt' => 'court details');
		$refs['prisons'] = array('lbl' => 'prisons list', 'ref' => 'index.php?tab='.$cat.'', 'pgt' => 'prison details');
		
		$refs['tasks'] = array('lbl' => 'pending tasks', 'ref' => 'index.php?tab='.$cat.'', 'pgt' => '');
		$refs['notifications'] = array('lbl' => 'notification list', 'ref' => 'index.php?tab='.$cat.'', 'pgt' => '');
		
		switch($cat)
		{ 
			case "petitions":
			case "viewpetition":
			case "comments":
			$parent 	 = $refs['pet_list']['lbl'];
			$parent_ref = $refs['pet_list']['ref'];
			if($cat_id <> ''){
				$current_ref = $refs['pet_list']['pgt'] . '&nbsp; <b>&rsaquo;</b>';
			}
			break;
			
			case "members":
			case "courts":
			case "prisons":
			case "tasks":
			case "notifications":
			$parent 	 = $refs[$cat]['lbl'];
			$parent_ref = $refs[$cat]['ref'];
			if($cat_id <> ''){
				$current_ref = '<b>&rsaquo;</b> &nbsp;'. $refs[$cat]['pgt'] . '&nbsp; <b>&rsaquo;</b>';
			}
			break;
		}
		
		
		echo '<!-- @beg:: bcrumbs -->
<div class="breadcrumbs">
	<div class="subcolumnsX breadcrumbpadd"><a href="./">dashboard</a>&nbsp; <b>&rsaquo;</b> &nbsp;
		<a href="'.$parent_ref.'">'.$parent.'</a>&nbsp; 
		'.$current_ref.' 	
	</div>
</div>
<!-- @end:: bcrumbs -->	
';
	}
		
		
/* ============================================================================== 
/*	@BUILD: STATS
/* ------------------------------------------------------------------------------ */		

	function stat_records($tb, $crit = '')
	{
		$us_id	 	= $_SESSION['sess_pom_member']['u_id'];
		$us_level_id  = $_SESSION['sess_pom_member']['u_level_id'];
		
		$user_crit 	= ($us_level_id <> 1 and $us_level_id <> 3) ? " and `account_id` = ".$this->quote_si($us_id)." " : "";
		 
		$result  = 0;
		$tb_name = '';
		
		if($tb == 'pet_new'){
			$sq_qry = "SELECT count(*) FROM `pom_petition_details` WHERE (`published` = 1) and (`status_id` = 1) $user_crit;";		
			$rs_qry = $this->dbQuery($sq_qry);	
			$cn_qry = $this->fetchRow($rs_qry);			
			$result = $cn_qry[0];		
		}
		elseif($tb == 'pet_open'){
			$sq_qry = "SELECT count(*) FROM `pom_petition_details` WHERE (`published` = 1) and (`admissible` = 1) $user_crit;";		
			$rs_qry = $this->dbQuery($sq_qry);	
			$cn_qry = $this->fetchRow($rs_qry);			
			$result = $cn_qry[0];		
		}
		elseif($tb == 'pet_approved'){
			$sq_qry = "SELECT count(*) FROM `pom_petition_details` WHERE (`published` = 1) and (`approved` = 1) $user_crit;";		
			$rs_qry = $this->dbQuery($sq_qry);	
			$cn_qry = $this->fetchRow($rs_qry);			
			$result = $cn_qry[0];		
		}
		elseif($tb == 'pet_recommendXXX'){
			$sq_qry = "SELECT count(*) FROM `pom_petition_details` WHERE (`published` = 1) and (`approved` = 1) $user_crit;";		
			$rs_qry = $this->dbQuery($sq_qry);	
			$cn_qry = $this->fetchRow($rs_qry);			
			$result = $cn_qry[0];		
		}
		
		elseif($tb == 'pet_comments'){
			$sq_qry = "SELECT count(*) FROM `pom_petition_comments` WHERE (`petition_id` = ".$this->quote_si($crit).")  and `parent_id` = 0 ;";		
			$rs_qry = $this->dbQuery($sq_qry);	
			$cn_qry = $this->fetchRow($rs_qry);			
			$result = $cn_qry[0];		
		}
		
		
		
		elseif($tb == 'pet_votes')
		{
			$out = array();
			
			/*$sq_votes = "SELECT count(*) FROM `pom_petition_committee` WHERE (`petition_id` =".$this->quote_si($crit).") ; ";		
			$rs_votes = $this->dbQuery($sq_votes);	
			$cn_votes = $this->fetchRow($rs_votes);			
			$out['sum'] = $cn_votes[0];	*/
			
			$sq_qry = "SELECT `petition_id` , `vote` , COUNT(`vote`) AS `vote_num` FROM `pom_petition_committee` WHERE (`petition_id` =".$this->quote_si($crit).") GROUP BY `petition_id`, `vote`; ";		
			$rs_qry = $this->dbQuery($sq_qry);	
			
			$vnum = 0;
			if($this->recordCount($rs_qry) > 0) 
			{
				while($cn_qry = $this->fetchRow($rs_qry, 'assoc')) {
					$vnum = $vnum + $cn_qry['vote_num'];
					$out[$cn_qry['vote']] = $cn_qry['vote_num'];
				}
			}
			$out['sum'] = $vnum;
			$result = $out;
					
		}
		
		
		
		elseif($tb == 'pet_votes_yes'){
			$sq_qry = "SELECT count(*) FROM `pom_petition_comments` WHERE (`petition_id` = ".$this->quote_si($crit).")  and `vote` = 1 ;";		
			$rs_qry = $this->dbQuery($sq_qry);	
			$cn_qry = $this->fetchRow($rs_qry);			
			$result = $cn_qry[0];		
		}
		elseif($tb == 'pet_votes_no'){
			$sq_qry = "SELECT count(*) FROM `pom_petition_comments` WHERE (`petition_id` = ".$this->quote_si($crit).")  and `vote` = 2 ;";		
			$rs_qry = $this->dbQuery($sq_qry);	
			$cn_qry = $this->fetchRow($rs_qry);			
			$result = $cn_qry[0];		
		}
		
		
		elseif($tb == 'pet_rating'){
			//$sq_qry = "SELECT AVG(`rating`) AS `rating`, `petition_id` FROM `pom_petition_comments` WHERE (`petition_id` =".$this->quote_si($crit)." AND `parent_id` =0 AND `published` =1) GROUP BY `petition_id`;";
			$sq_qry = "SELECT AVG(`rating`) AS `rating`, `petition_id` FROM `pom_petition_committee` WHERE (`petition_id` =".$this->quote_si($crit)."  and rating <> '0') GROUP BY `petition_id`;";		
			$rs_qry = $this->dbQuery($sq_qry);	
			$cn_qry = $this->fetchRow($rs_qry);			
			$result = floor($cn_qry[0]).'/10';		
		}
		else
		{
			$crit = "";
			if($tb == 'members') { $tb_name = '`casft_member`'; }
			if($tb == 'committees') { $tb_name = '`casft_committee`'; }
			if($tb == 'imprests') { $tb_name = '`casft_imprest`'; $crit = " and `approved` = 0 "; }// and `submit_status` = 0
			
			
			
			if($tb_name <> '') {
				$sq_qry = "SELECT count(*) FROM $tb_name WHERE (`published` = 1 $crit) ;";		
				$rs_qry = $this->dbQuery($sq_qry);	
				$cn_qry = $this->fetchRow($rs_qry);
				
				$result = $cn_qry[0];
			}
		}
		return $result;
	}

	
	
	
	
/* ============================================================================== 
/*	@BUILD: REGIONS BUILDER
/* ------------------------------------------------------------------------------ */	
	
	function get_Counties($psource = 0)
	{
		$result 	= array();		
		$result[] 	= '<option value="">- Select County -</option>';		
		
		$sq_qry = "SELECT `region_code`, `region_title`, `region_parent_code`, `region_type_id`   FROM  `oc_conf_region`   WHERE  (`region_type_id` = 1) ORDER BY `region_title` ";		
		$rs_qry = $this->dbQuery($sq_qry);		
		
		if($this->recordCount($rs_qry) > 0)
		{
			while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
			{
				$cn_qry  		= array_map("clean_output", $cn_qry_a);
				
				$region_code 	= intval($cn_qry['region_code']);
				$region_title 	= $cn_qry['region_title'];
				
				$active			= '';
				
				if(intval($psource) == $region_code) { $active=' selected '; } 
				
				$result[] = '<option value="'.$region_code.'"'.$active.'>'.$region_title.'</option>';				
			}			
		}
					
		return $result;
	}
	
	
	function get_Constituency($psource, $pconst = 0, $text_only=0, $res_type = 'select')
	{
		if($res_type == 'single')
		{ 
			$psource  = str_pad($psource, 3, "0", STR_PAD_LEFT);
			
			$sq_qry = "SELECT `region_code`, `region_title`, `region_parent_code`, `region_type_id`   FROM  `oc_conf_region`   WHERE  (`region_code` like ".q_si($psource, 1).") AND (`region_type_id` =2) limit 1; ";	
			
			$rs_qry = $this->dbQueryFetch($sq_qry);	
			
			$result	= '';
			if( count($rs_qry) > 0){
				$rs_qry_arr = current($rs_qry); $result = $rs_qry_arr['region_title'];
			}	
			/*$result = ( count($rs_qry) > 0) ? current($rs_qry) : '';*/
			
		}
		elseif($res_type == 'select') 
		{ 
			$result 	= array();		
			$result[] 	= '<option value="">- Select Constituency -</option>';		

			$sq_qry = "SELECT `region_code`, `region_title`, `region_parent_code`, `region_type_id`   FROM  `oc_conf_region`   WHERE  (`region_parent_code` LIKE ".q_si($psource, 1).") AND (`region_type_id` =2)  ORDER BY `region_title` ";	
			$rs_qry = $this->dbQuery($sq_qry);		

			if($this->recordCount($rs_qry) > 0)
			{
				while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
				{
					$cn_qry  		= array_map("clean_output", $cn_qry_a);

					$region_code 	= intval($cn_qry['region_code']);
					$region_title 	= trim($cn_qry['region_title']);

					$active			= '';

					if(intval($pconst) == $region_code or trim($pconst) == $region_title) { $active=' selected '; } 

					if($text_only == 1) { $region_code = $region_title; }

					$result[] = '<option value="'.$region_code.'"'.$active.'>'.$region_title.'</option>';				
				}			
			}
		}
		return $result;
	}	
	
	
	function get_Wards($psource, $pward = 0)
	{
		$result 	= array();		
		$result[] 	= '<option value="">- Select Ward -</option>';		
		
		$sq_qry = "SELECT `region_code`, `region_title`, `region_parent_code`, `region_type_id`   FROM  `oc_conf_region`   WHERE  (`region_parent_code` LIKE ".q_si($psource, 1).") AND (`region_type_id` = 3)  ORDER BY `region_title` ";	
		$rs_qry = $this->dbQuery($sq_qry);		
		
		if($this->recordCount($rs_qry) > 0)
		{
			while($cn_qry_a = $this->fetchRow($rs_qry, 'assoc'))
			{
				$cn_qry  		= array_map("clean_output", $cn_qry_a);
				
				$region_code 	= intval($cn_qry['region_code']);
				$region_title 	= $cn_qry['region_title'];
				
				$active			= '';
				
				if(intval($pward) == $region_code) { $active=' selected '; } 
				
				$result[] = '<option value="'.$region_code.'"'.$active.'>'.$region_title.'</option>';				
			}			
		}
					
		return $result;
	}	
	
	// Kevin Added a function to display county infogaphics

	function get_infographics(){
			
		$result = array();
		$info = array();

		$inf_qry = "SELECT * FROM `oc_content_infographics` WHERE published = 1";
		$inf_res = $this->dbQuery($inf_qry);
		
			if($this->recordCount($inf_res) > 0){
				while($viz = $this->fetchRow($inf_res, 'assoc')){
				$inf_viz = array_map("clean_output", $viz);
				
				$id 	= $inf_viz['id'];
				$county = $inf_viz['county'];
				$title 	= $inf_viz['content_title'];
				$dataHref = $inf_viz['content_data_href'];
				$img = $inf_viz['content_img'];
				$type = $inf_viz['content_type'];

				$info['id'] 	= $id;
				$info['county'] = $county;
				$info['title'] 	= $title;
				$info['dataHref'] = $dataHref;
				$info['img'] = $img;
				$info['type'] = $type;

				
				$result[] = $inf_viz;	
				// $result = $info;			
			}	
		}
		return $result;
	}
		
	
	

/*
* END CLASS
*/	
}


$dispOc = new data_oc;
//$dispCa->build_committees();
?>