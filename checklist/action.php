<?php require_once 'classes/cls.constants.php'; ?>
<!-- Fields -->
<?php

// fn is form name in the hidden input types
$fn = false;
if(isset($_POST['form'])){
$fn = $_POST['form'];
}

// Declare the variables

$zone = $type = $form = $stat = "";

if(isset($_REQUEST['zone'])){
    $zone = $_REQUEST['zone'];
}

if(isset($_REQUEST['type'])){
    $type = $_REQUEST['type'];
}

if(isset($_REQUEST['form'])){
    $form = $_REQUEST['form'];
}

if(isset($_REQUEST['stat'])){
    $stat = $_REQUEST['stat'];
}

if(isset($_REQUEST['department_faculty'])){
    $department_faculty = $_REQUEST['department_faculty'];
}

// Declare the variables to avoid system panic

// Indoors


// Outdoors

// End: Declare the variables to avoid system panic

// For indoor questionnaire
if($fn == 'indoor'){
   if(isset($_POST['submit']) && isset($_POST['Posted_By'])){

        $entity_code = $_POST['entity_code']; //entity_code
        $building_type = $_POST['building_type']; //building_type
        $There_Clear_Signage_Building_Names = $_POST['There_Clear_Signage_Building_Names']; //There_Clear_Signage_Building_Names
        $Clear_Signage_Business_Signs_Sign_Boards = $_POST['Clear_Signage_Business_Signs_Sign_Boards']; //Clear_Signage_Business_Signs_Sign_Boards
        $Are_There_Ramps = $_POST['Are_There_Ramps']; //Are_There_Ramps
        $Are_The_Ramps_Negotiable = $_POST['Are_The_Ramps_Negotiable']; //Are_The_Ramps_Negotiabl
        $Are_There_Escalators = $_POST['Are_There_Escalators']; //Are_There_Escalators
        $Are_There_Lifts = $_POST['Are_There_Lifts']; //Are_There_Lifts
        $Lift_Or_Escalators_Are_There_Visual_Indicators = $_POST['Lift_Or_Escalators_Are_There_Visual_Indicators']; //Lift_Or_Escalators_Are_There_Visual_Indicators
        $Lift_Or_Escalators_Are_There_Auditory_Indicators = $_POST['Lift_Or_Escalators_Are_There_Auditory_Indicators']; //Lift_Or_Escalators_Are_There_Auditory_Indicators
        $Lift_Or_Escalators_There_Braille_Buttons = $_POST['Lift_Or_Escalators_There_Braille_Buttons']; //Lift_Or_Escalators_There_Braille_Buttons
        $Are_Doors_More_Than_Meter_Wide = $_POST['Are_Doors_More_Than_Meter_Wide']; //Are_Doors_More_Than_Meter_Wide
        $Are_There_Clear_Floor_Areas = $_POST['Are_There_Clear_Floor_Areas']; //Are_There_Clear_Floor_Areas
        $Floor_Area_Clear_Are_Objects_Attached_Or_Detached = $_POST['Floor_Area_Clear_Are_Objects_Attached_Or_Detached']; //Floor_Area_Clear_Are_Objects_Attached_Or_Detached
        $Are_Doors_Manual_Or_Automatic = $_POST['Are_Doors_Manual_Or_Automatic']; //Are_Doors_Manual_Or_Automatic
        $Manual_Are_Doors_Push_Or_Pull = $_POST['Manual_Are_Doors_Push_Or_Pull']; //Manual_Are_Doors_Push_Or_Pull
        $Are_Handles_Doors_Knobs_Or_Locks = $_POST['Are_Handles_Doors_Knobs_Or_Locks']; //Are_Handles_Doors_Knobs_Or_Locks
        $Clear_Signages_Eg_Room_Numbers_Fire_Exits = $_POST['Clear_Signages_Eg_Room_Numbers_Fire_Exits']; //Clear_Signages_Eg_Room_Numbers_Fire_Exits
        $Handles_In_Seats_That_Accommodate_Disabled_Old = $_POST['Handles_In_Seats_That_Accommodate_Disabled_Old']; //Handles_In_Seats_That_Accommodate_Disabled_Old
        $Do_Chairs_Or_Benches_Have_Back_Rest = $_POST['Do_Chairs_Or_Benches_Have_Back_Rest']; //Do_Chairs_Or_Benches_Have_Back_Rest
        $Are_Seats_Accommodative_For_All = $_POST['Are_Seats_Accommodative_For_All']; //Are_Seats_Accommodative_For_All
        $Are_Floors_Flat = $_POST['Are_Floors_Flat']; //Are_Floors_Flat
        $Are_Floors_Slip_Resistant = $_POST['Are_Floors_Slip_Resistant']; //Are_Floors_Slip_Resistant
        $Are_There_Stairwells = $_POST['Are_There_Stairwells']; //Are_There_Stairwells
        $Are_Stairwell_Meter_Wide = $_POST['Are_Stairwell_Meter_Wide']; //Are_Stairwell_Meter_Wide
        $Do_Stairwells_Have_Sturdy_Railings = $_POST['Do_Stairwells_Have_Sturdy_Railings']; //Do_Stairwells_Have_Sturdy_Railings
        $Do_Stairwells_Have_Lighting = $_POST['Do_Stairwells_Have_Lighting']; //Do_Stairwells_Have_Lighting
        $Are_Fittings_Meter_High = $_POST['Are_Fittings_Meter_High']; //Are_Fittings_Meter_High
        $Photo = $_FILES['Photo']; //Photo
        $LatLong = $_POST['LatLong']; //LatLong
        $Rating = $_POST['Rating']; //Rating
        if(isset($_POST['comments'])){
            $comments = $_POST['comments']; //comments
            $comments =  $cndb->quote_si($comments);
        }
        if(isset($_POST['Posted_By'])){
            $Posted_By = $_POST['Posted_By']; //Posted_By
            $Posted_By =  $cndb->quote_si($Posted_By);
        }
        if(isset($_POST['Posted_By_Email'])){
            $Posted_By_Email = $_POST['Posted_By_Email']; //Posted_By
            $Posted_By_Email =  $cndb->quote_si($Posted_By_Email);
        }

        // Validate first: Temporarily removed to cater for uni challenge
    //     $qry = 'SELECT * FROM `questionnaire` WHERE `entity_code` = "$entity_code"';
    //     $res = $cndb->dbQuery($qry);

    //     $rec = $cndb->recordCount($res);

    //    if($rec < 1){
           
            // Validate Photo
            $photo_name = $Photo['name']; //This will go to db
            $upload_dir =  getcwd().DIRECTORY_SEPARATOR.('files/indoor/'.$photo_name);
            // echo $upload_dir;
            $photoski = $Photo['tmp_name']; //This goes to upload dir
            // Our SQL query
            $insert = "INSERT INTO 
                    `questionnaire`( 
                    `type`, 
                    `entity_code`, 
                    `department_faculty`, 
                    `building_type`,  
                    `There_Clear_Signage_Building_Names`, 
                    `Clear_Signage_Business_Signs_Sign_Boards`, 
                    `Are_There_Ramps`, 
                    `Are_The_Ramps_Negotiable`, 
                    `Are_There_Escalators`, 
                    `Are_There_Lifts`, 
                    `Lift_Or_Escalators_Are_There_Visual_Indicators`, 
                    `Lift_Or_Escalators_Are_There_Auditory_Indicators`, 
                    `Lift_Or_Escalators_There_Braille_Buttons`, 
                    `Are_Doors_More_Than_Meter_Wide`, 
                    `Are_There_Clear_Floor_Areas`, 
                    `Floor_Area_Clear_Are_Objects_Attached_Or_Detached`, 
                    `Are_Doors_Manual_Or_Automatic`, 
                    `Manual_Are_Doors_Push_Or_Pull`, 
                    `Are_Handles_Doors_Knobs_Or_Locks`, 
                    `Clear_Signages_Eg_Room_Numbers_Fire_Exits`, 
                    `Handles_In_Seats_That_Accommodate_Disabled_Old`, 
                    `Do_Chairs_Or_Benches_Have_Back_Rest`, 
                    `Are_Seats_Accommodative_For_All`, 
                    `Are_Floors_Flat`, 
                    `Are_Floors_Slip_Resistant`, 
                    `Are_There_Stairwells`, 
                    `Are_Stairwell_Meter_Wide`, 
                    `Do_Stairwells_Have_Sturdy_Railings`, 
                    `Do_Stairwells_Have_Lighting`, 
                    `Are_Fittings_Meter_High`, 
                    `Photo`, 
                    `LatLong`, 
                    `Rating`,
                    `comments`,
                    `Posted_By`,
                    `Posted_By_Email`
                    ) VALUES (
                         ".q_si($fn).",
                         ".q_si($entity_code).",
                         ".q_si($department_faculty).",
                         ".q_si($building_type).",
                         ".q_si($There_Clear_Signage_Building_Names).",
                         ".q_si($Clear_Signage_Business_Signs_Sign_Boards).",
                         ".q_si($Are_There_Ramps).",
                         ".q_si($Are_The_Ramps_Negotiable).",
                         ".q_si($Are_There_Escalators).",
                         ".q_si($Are_There_Lifts).",
                         ".q_si($Lift_Or_Escalators_Are_There_Visual_Indicators).",
                         ".q_si($Lift_Or_Escalators_Are_There_Auditory_Indicators).",
                         ".q_si($Lift_Or_Escalators_There_Braille_Buttons).",
                         ".q_si($Are_Doors_More_Than_Meter_Wide).",
                         ".q_si($Are_There_Clear_Floor_Areas).",
                         ".q_si($Floor_Area_Clear_Are_Objects_Attached_Or_Detached).",
                         ".q_si($Are_Doors_Manual_Or_Automatic).",
                         ".q_si($Manual_Are_Doors_Push_Or_Pull).",
                         ".q_si($Are_Handles_Doors_Knobs_Or_Locks).",
                         ".q_si($Clear_Signages_Eg_Room_Numbers_Fire_Exits).",
                         ".q_si($Handles_In_Seats_That_Accommodate_Disabled_Old).",
                         ".q_si($Do_Chairs_Or_Benches_Have_Back_Rest).",
                         ".q_si($Are_Seats_Accommodative_For_All).",
                         ".q_si($Are_Floors_Flat).",
                         ".q_si($Are_Floors_Slip_Resistant).",
                         ".q_si($Are_There_Stairwells).",
                         ".q_si($Are_Stairwell_Meter_Wide).",
                         ".q_si($Do_Stairwells_Have_Sturdy_Railings).",
                         ".q_si($Do_Stairwells_Have_Lighting).",
                         ".q_si($Are_Fittings_Meter_High).",
                         ".q_si($photo_name).",
                         ".q_si($LatLong).",
                         ".q_si($Rating).",
                         ".$comments.",
                         ".$Posted_By.",
                         ".$Posted_By_Email."
                        )";

                        // echo  $insert; exit;
                        $res = $cndb->dbQuery($insert);
                        if($res){
                            echo "success";
                            if(move_uploaded_file($photoski, $upload_dir)){
                                echo 'Upload Successful';
                                // echo '<script type="text/javascript"> window.location.href = "index.php?type='.$fn.'";</script>';
                                echo '<script type="text/javascript"> window.location.href = "index.php?type=indoor-manual";</script>';
                            }else{
                                // echo 'Image upload unsuccessful, check permissions';
                                echo '<script type="text/javascript"> window.location.href = "index.php?type=indoor-manual";</script>';
                            }
                        }
                    } else{
                        echo "A record with this entity code already exists! Go back and choose another entity";
                    }



   }
// } where the if validator command exists

//  For outdoor questionnaire
if($fn == 'outdoor'){
    if(isset($_POST['submit']) && isset($_POST['Posted_By'])){

        $street = $_POST['street']; //street
        $Are_There_Ramps_In_Pavements = $_POST['Are_There_Ramps_In_Pavements']; //Are_There_Ramps_In_Pavements
        $Yes_Are_Ramps_Negotiable_For_Wheelchair_Users = $_POST['Yes_Are_Ramps_Negotiable_For_Wheelchair_Users']; //Yes_Are_Ramps_Negotiable_For_Wheelchair_Users
        $Pavements_Clear_Obstacles = $_POST['Pavements_Clear_Obstacles']; //Pavements_Clear_Obstacles
        $Pavements_Wide_Enough = $_POST['Pavements_Wide_Enough']; //Pavements_Wide_Enough
        $Do_Pavements_Have_Raised_Bumps = $_POST['Do_Pavements_Have_Raised_Bumps']; //building_type
        $Contrast_In_Colour_Between_Pavements = $_POST['Contrast_In_Colour_Between_Pavements']; //Contrast_In_Colour_Between_Pavements
        $Parking_Slot_For_Disabled_Each_Block = $_POST['Parking_Slot_For_Disabled_Each_Block']; //Parking_Slot_For_Disabled_Each_Block
        $Are_Parking_Lots_Wide_Enough = $_POST['Are_Parking_Lots_Wide_Enough']; //Are_Parking_Lots_Wide_Enough
        $Are_Slots_Clearly_Marked = $_POST['Are_Slots_Clearly_Marked']; //Are_Slots_Clearly_Marked
        $How_Many_Slots_Are_There_Per_Block = $_POST['How_Many_Slots_Are_There_Per_Block']; //How_Many_Slots_Are_There_Per_Block
        $Are_Parking_Being_Used_Correctly = $_POST['Are_Parking_Being_Used_Correctly']; //Are_Parking_Being_Used_Correctly
        $Are_There_Sonic_Traffic_Lights = $_POST['Are_There_Sonic_Traffic_Lights']; //Are_There_Sonic_Traffic_Lights
        $Sonic_Lights_if_Available_Functioning = $_POST['Sonic_Lights_if_Available_Functioning']; //Sonic_Lights_if_Available_Functioning
        $Are_There_Pedestrian_Crossing = $_POST['Are_There_Pedestrian_Crossing']; //Are_There_Pedestrian_Crossing
        $Enough_Time_Allocated_By_Traffic_Lights = $_POST['Enough_Time_Allocated_By_Traffic_Lights']; //Enough_Time_Allocated_By_Traffic_Lights
        $Benches_That_Accommodate_Disabled = $_POST['Benches_That_Accommodate_Disabled']; //Benches_That_Accommodate_Disabled
        $Do_Benches_Have_Back_Rest = $_POST['Do_Benches_Have_Back_Rest']; //Do_Benches_Have_Back_Rest
        $There_Clear_Signage_Road_Street_Names = $_POST['There_Clear_Signage_Road_Street_Names']; //There_Clear_Signage_Road_Street_Names
        $There_Clear_Signage_Building_Names = $_POST['There_Clear_Signage_Building_Names']; //There_Clear_Signage_Building_Names
        $There_Clear_Signage_Traffic_Signs = $_POST['There_Clear_Signage_Traffic_Signs']; //There_Clear_Signage_Traffic_Signs
        $Where_There_Are_Construction_Activities_Clear_Warning_Signs = $_POST['Where_There_Are_Construction_Activities_Clear_Warning_Signs']; //Where_There_Are_Construction_Activities_Clear_Warning_Signs
        $Clear_Signage_Business_Signs_Sign_Boards = $_POST['Clear_Signage_Business_Signs_Sign_Boards']; //Clear_Signage_Business_Signs_Sign_Boards
        $Are_There_Overgrown_Hedges_Streets = $_POST['Are_There_Overgrown_Hedges_Streets']; //Are_There_Overgrown_Hedges_Streets
        $Ramps_Or_Drop_Curbs_For_Wheelchairs_Road_Islands = $_POST['Ramps_Or_Drop_Curbs_For_Wheelchairs_Road_Islands']; //Ramps_Or_Drop_Curbs_For_Wheelchairs_Road_Islands
        $Are_There_Bus_Shelters = $_POST['Are_There_Bus_Shelters']; //Are_There_Bus_Shelters
        $Do_Shelters_Accommodate_All_People_Sizes = $_POST['Do_Shelters_Accommodate_All_People_Sizes']; //Do_Shelters_Accommodate_All_People_Sizes
        $Bus_Shelters_Raised_Accommodate_Faster_Entrance = $_POST['Bus_Shelters_Raised_Accommodate_Faster_Entrance']; //Bus_Shelters_Raised_Accommodate_Faster_Entrance
        $Are_Shelters_Well_Lit = $_POST['Are_Shelters_Well_Lit']; //Are_Shelters_Well_Lit
        $Regular_Resting_Points = $_POST['Regular_Resting_Points']; //Regular_Resting_Points
        $Photo = $_FILES['Photo']; //Photo
        $LatLong = $_POST['LatLong']; //LatLong
        $Rating = $_POST['Rating']; //Rating
        if(isset($_POST['comments'])){
            $comments = $_POST['comments']; //comments
            $comments =  $cndb->quote_si($comments);
        }
        if(isset($_POST['Posted_By'])){
            $Posted_By = $_POST['Posted_By']; //Posted_By
            $Posted_By =  $cndb->quote_si($Posted_By);
        }
        if(isset($_POST['Posted_By_Email'])){
            $Posted_By_Email = $_POST['Posted_By_Email']; //Posted_By_Email
            $Posted_By_Email =  $cndb->quote_si($Posted_By_Email);
        }
       
    }

     // Validate first : Temporarily removed to cater for  uni mapping challe
    //  $qry = "SELECT * FROM `questionnaire` WHERE `street` = '$street'";
    // //  echo $qry; 
    //  $res = $cndb->dbQuery($qry);

    //  $rec = $cndb->recordCount($res);

    // //  echo $rec; exit;

    // if($rec < 1){

         // Validate Photo
         $photo_name = $Photo['name']; //This will go to db
         $upload_dir =  getcwd().DIRECTORY_SEPARATOR.('files/outdoor/'.$photo_name);
         // echo $upload_dir;
         $photoski = $Photo['tmp_name']; //This goes to upload dir
         // Our SQL query
         $insert = "INSERT INTO `questionnaire`( 
         `type`, 
         `street`,
         `department_faculty`,
         `Are_There_Ramps_In_Pavements`, 
         `Yes_Are_Ramps_Negotiable_For_Wheelchair_Users`, 
         `Pavements_Clear_Obstacles`, 
         `Pavements_Wide_Enough`, 
         `Do_Pavements_Have_Raised_Bumps`, 
         `Contrast_In_Colour_Between_Pavements`, 
         `Parking_Slot_For_Disabled_Each_Block`, 
         `Are_Parking_Lots_Wide_Enough`, 
         `Are_Slots_Clearly_Marked`, 
         `How_Many_Slots_Are_There_Per_Block`, 
         `Are_Parking_Being_Used_Correctly`, 
         `Are_There_Sonic_Traffic_Lights`, 
         `Sonic_Lights_if_Available_Functioning`, 
         `Are_There_Pedestrian_Crossing`, 
         `Enough_Time_Allocated_By_Traffic_Lights`, 
         `Benches_That_Accommodate_Disabled`, 
         `Do_Benches_Have_Back_Rest`, 
         `There_Clear_Signage_Road_Street_Names`, 
         `There_Clear_Signage_Building_Names`, 
         `There_Clear_Signage_Traffic_Signs`, 
         `Where_There_Are_Construction_Activities_Clear_Warning_Signs`, 
         `Clear_Signage_Business_Signs_Sign_Boards`, 
         `Are_There_Overgrown_Hedges_Streets`, 
         `Ramps_Or_Drop_Curbs_For_Wheelchairs_Road_Islands`, 
         `Are_There_Bus_Shelters`, 
         `Do_Shelters_Accommodate_All_People_Sizes`, 
         `Bus_Shelters_Raised_Accommodate_Faster_Entrance`, 
         `Are_Shelters_Well_Lit`, 
         `Regular_Resting_Points`, 
         `Photo`, 
         `LatLong`, 
         `Rating`, 
         `comments`, 
         `Posted_By`,
         `Posted_By_Email`
         ) VALUES (
         ".q_si($fn).", 
         ".q_si($street).", 
         ".q_si($department_faculty).", 
         ".q_si($Are_There_Ramps_In_Pavements).", 
         ".q_si($Yes_Are_Ramps_Negotiable_For_Wheelchair_Users).", 
         ".q_si($Pavements_Clear_Obstacles).", 
         ".q_si($Pavements_Wide_Enough).", 
         ".q_si($Do_Pavements_Have_Raised_Bumps).", 
         ".q_si($Contrast_In_Colour_Between_Pavements).", 
         ".q_si($Parking_Slot_For_Disabled_Each_Block).", 
         ".q_si($Are_Parking_Lots_Wide_Enough).", 
         ".q_si($Are_Slots_Clearly_Marked).", 
         ".q_si($How_Many_Slots_Are_There_Per_Block).", 
         ".q_si($Are_Parking_Being_Used_Correctly).", 
         ".q_si($Are_There_Sonic_Traffic_Lights).", 
         ".q_si($Sonic_Lights_if_Available_Functioning).", 
         ".q_si($Are_There_Pedestrian_Crossing).", 
         ".q_si($Enough_Time_Allocated_By_Traffic_Lights).", 
         ".q_si($Benches_That_Accommodate_Disabled).", 
         ".q_si($Do_Benches_Have_Back_Rest).", 
         ".q_si($There_Clear_Signage_Road_Street_Names).", 
         ".q_si($There_Clear_Signage_Building_Names).", 
         ".q_si($There_Clear_Signage_Traffic_Signs).", 
         ".q_si($Where_There_Are_Construction_Activities_Clear_Warning_Signs).", 
         ".q_si($Clear_Signage_Business_Signs_Sign_Boards).", 
         ".q_si($Are_There_Overgrown_Hedges_Streets).", 
         ".q_si($Ramps_Or_Drop_Curbs_For_Wheelchairs_Road_Islands).", 
         ".q_si($Are_There_Bus_Shelters).", 
         ".q_si($Do_Shelters_Accommodate_All_People_Sizes).", 
         ".q_si($Bus_Shelters_Raised_Accommodate_Faster_Entrance).", 
         ".q_si($Are_Shelters_Well_Lit).", 
         ".q_si($Regular_Resting_Points).", 
         ".q_si($photo_name).", 
         ".q_si($LatLong).", 
         ".q_si($Rating).", 
         ".$comments.", 
         ".$Posted_By.",   
         ".$Posted_By_Email."   
         )";


        //  echo  $insert; exit;
        $res = $cndb->dbQuery($insert);
        if($res){
            echo "success";
            if(move_uploaded_file($photoski, $upload_dir)){
                echo 'Uploaded Successful';
                // echo '<script type="text/javascript"> window.location.href = "index.php?type='.$fn.'";</script>';
                echo '<script type="text/javascript"> window.location.href = "index.php?type=outdoor-manual";</script>';
            }else{
                // echo 'failed, check permissions';
                echo '<script type="text/javascript"> window.location.href = "index.php?type=outdoor-manual";</script>';
            }
        }
    } else {
        echo "A record with this code exists! Go back and choose another entity";
    }

// } Where the if command ends
     // Our SQL query



// Login form
@$email = $_REQUEST['email'];

if($form == 'login'){
    $qry = "SELECT * FROM `volunteers` where email='$email'";
    $res= $cndb->dbQuery($qry);

    $recs = $cndb->recordCount($res);

    if($recs <= 0){
        echo 'Email does not exist';
    }else{

        while($qry_data = $cndb->fetchRow($res)){
            $name = $qry_data['name'];
            $_SESSION['name'] = $name;
            echo "success";          
        }
        
    }
}



// $ddSelect->abilityDrop($type, $zone); 
if($form == "indoor"){
    $ddSelect->abilityDrop($type, $zone);
}

if($form == "outdoorsi"){
    $ddSelect->abilityDrop($type, $zone);
}


if($form =="highcharts"){
    // All grouping for highcharts
    $sql = "SELECT ANY_VALUE(b.`entity_code`) as code, ANY_VALUE(b.`zone_no`)as zone_no, ANY_VALUE(b.`area`) as area, ANY_VALUE(b.`building_name`) as building, ANY_VALUE(q.`type`) as type_io , COUNT(q.`Posted_By`) as num_posted, ANY_VALUE(q.`Posted_By`) as posted_by , date(q.`timestamp`) FROM `questionnaire` as q inner join `buildings` as b on q.entity_code = b.entity_code group by q.`Posted_By`, date(q.`timestamp`) order by date(q.`timestamp`)";

    // Now we get the top 10 highest indoors
    function indoor($order){
        global $cndb;

        $qry = "SELECT ANY_VALUE(b.`entity_code`) as code, ANY_VALUE(b.`zone_no`)as zone_no, ANY_VALUE(b.`area`) as area, ANY_VALUE(b.`building_name`) as building, ANY_VALUE(q.`type`) as type_io , COUNT(q.`Posted_By`) as num_posted, ANY_VALUE(q.`Posted_By`) as posted_by FROM `questionnaire` as q inner join `buildings` as b on q.entity_code = b.entity_code group by q.`Posted_By` order by num_posted ".$order." limit 10";
        $res = $cndb->dbQuery($qry);

        $rows = $cndb->recordCount($res);
        // echo $rows;

    
        while($return = $cndb->fetchRow($res)){
            $posts = null;
            $numposts = $return['num_posted'];
           
            echo '<li><strong>'.$return['posted_by'].': </strong>  &nbsp; <span class="entries">'.$numposts.'</span> </li>';
        }
    }

    


    //Generate stats based on the type of stat
    if($stat == "topHin"){
        indoor('desc');
    }

    if($stat == "topLin"){
        indoor('asc');
    }

    if($stat == "topHout"){
        outdoor('desc');
    }

    if($stat == "topLout"){
        outdoor('asc');
    }
    
    

}

?>