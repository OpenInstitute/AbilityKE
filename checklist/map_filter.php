
<?php
//unset($_SESSION); exit;
//$sq_qry = "SELECT * FROM `questionnaire_filters` where `que_section` = 'indoor' ORDER BY `que_section` ASC, `que_category` ASC , `record_id` ASC ";
$sq_qry = "SELECT * FROM `questionnaire_filters` where `que_section` <> '' and `published` = '1' ORDER BY `que_section` ASC, `que_category` ASC , `record_id` ASC ";

$rs_qry = $cndb->dbQuery($sq_qry);

$k 		= null;

$filta_tots = array(); 


$filta_form = array(); 
$filta_cols = array(); 
$filta_cols_dat = array(); 

if($cndb->recordCount($rs_qry) > 0) {
$i = 0;
while($cn_qry_a = $cndb->fetchRow($rs_qry)){
	
	$cn_qry  	= array_map("clean_output", $cn_qry_a);	
	
	$que_section	= $cn_qry['que_section'];
	$que_category	= $cn_qry['que_category'];
	$que_label		= $cn_qry['que_label'];
	$que_column		= $cn_qry['que_column_name'];
	$que_vals_small	= strtolower($cn_qry['que_column_vals']);
	$que_vals		= ($cn_qry['que_column_vals'] !== '') ? explode('|', $cn_qry['que_column_vals']) : [];
	
	
	if($cn_qry['que_column_vals'] !== '')  
	  {
		$filta_tots[$que_section][$que_column] = (strpos($que_vals_small, 'yes') !== false) ? 'yes' : strtolower($que_vals[0]);
	  }
	
	$gg_checks = ($que_section === 'indoor') ? 'gg_checks' : 'out_checks';
	//displayArray($que_vals);
	$frm_category 	= generate_seo_title(strtolower($que_category),'_');
	
	$item_check_vals = array();
	if(count($que_vals) > 0){
		foreach($que_vals as $q_val){
			$item_check_vals[] = '<label class="col-md-4 nopadd"> <input type="checkbox" class="'.$gg_checks.'" name="bw_['.$que_column.'][]" value="'.$q_val.'"> '.$q_val.' </label> '; /*bw_'.$frm_category.'*/
		}
	}
	
	//$item_check		= '<label> <input type="checkbox" class="gg_checks" name="bw_'.$frm_category.'[]" value="'.$que_column.'"> '.$que_label.' </label>';
	$item_check		= '<div class="row"><p class="bold">  '.$que_label.' </p>'.implode('', $item_check_vals) .'</div>';
	
	//$filta_cols[$que_column] = $que_column;
	$filta_cols[$que_section][$frm_category][$que_column] = $que_label;
	$filta_form[$que_section][$frm_category][$que_column] = $item_check;
			
			
		$i++;
	}

}
$_SESSION['_ablt_']['indoor_fields'] = $filta_cols;
$_SESSION['_ablt_']['indoor_checks'] = $filta_tots;



/*displayArray($_SESSION['_ablt_']['indoor_checks']);*/
//displayArray($filta_cols['outdoor']);

/*$sq_qry_v = array();

foreach($filta_cols['outdoor'] as $fk){
	$sq_qry_d = "SELECT GROUP_CONCAT(DISTINCT  `".$fk."`  ORDER BY `".$fk."`  ASC SEPARATOR '|')  AS `".$fk."`  FROM  `questionnaire`  WHERE  `".$fk."` IS NOT NULL AND `".$fk."` <> ''; "; //`entity_code` IS NOT NULL AND
	//echobr($sq_qry_d);
	$a = array();
	$a = current($cndb->dbQueryFetch($sq_qry_d));
	$filta_cols_dat[$fk] = $a[$fk]; //current($cndb->dbQueryFetch($sq_qry_d));
	//array_push($filta_cols_dat, current($cndb->dbQueryFetch($sq_qry_d)));
	
	$sq_qry_v[] = "UPDATE `questionnaire_filters` SET `que_column_vals` = ".q_si($a[$fk])." where `que_column_name` = ".q_si($fk)." and `que_section` = 'indoor'; ";
}
displayArray($filta_cols_dat);
displayArray($sq_qry_v); exit;
//$cndb->dbQueryMulti($sq_qry_v); */
//echobr( '`'.implode('`, `', $filta_cols).'`' );

//displayArray($filta_form);
?>
<form id="frm_search" name="frm_search">
			<input type="hidden" class="gg_checks" name="data_form" value="indoor" />
			
			
<div class="col-md-12" style="position:relative">	
	<div class="card mt-3 tab-card">
		<div class="card-header tab-card-header">
		  <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
			<li class="nav-item active">
				<a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">INDOOR CHECKS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">OUTDOOR CHECKS</a>
			</li>
			  
		  </ul>
		</div>

		<div class="tab-content" id="myTabContent">
	  
	  		
			
			<div class="tab-pane fade p-3  active in" id="one" role="tabpanel" aria-labelledby="one-tab">
			<div class="row search-panels">
			<!--<h4>INDOOR ACCESSIBILITY</h4>--><br>
			<?php
			$f_out = array();
			foreach($filta_form['indoor'] as $cat_form => $val_form){
				
				$p_title = clean_title($cat_form);
				$p_fields = implode(' ', $val_form);
				
				$f_out[] = '<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">'.$p_title.'</h3>
							<span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-minus"></i></span>
						</div>
						<div class="panel-body search-ops">				
							<div>
							'.$p_fields.'
							</div>				
						</div>
					</div>';
			}
			
			echo implode(' ', $f_out);
			
			?>
			</div>
			</div>
			
			 <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
			 
			 <div class="row search-panels">
			<?php
			
			//echo '<h4>OUTDOOR ACCESSIBILITY</h4>';
				 echo '<br>';
			
			$f_out = array();
			foreach($filta_form['outdoor'] as $cat_form => $val_form){
				
				$p_title = clean_title($cat_form);
				$p_fields = implode(' ', $val_form);
				
				$f_out[] = '<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">'.$p_title.'</h3>
							<span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-minus"></i></span>
						</div>
						<div class="panel-body search-ops">				
							<div>
							'.$p_fields.'
							</div>				
						</div>
					</div>';
			}
			
			echo implode(' ', $f_out);
			
			?>
			</div>
			
			</div>
			
		
		
		</div>
	  </div>
</div>
      	
      		
</form>      				
      		