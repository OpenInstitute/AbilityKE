<form class="rwdform" method="POST" enctype="multipart/form-data" name="questionnaire" id="outdoorForm" action="action.php">
    <input type="hidden" name="form" value="outdoor">

    <div class="form-group">
        <div class="input-group-prepend">
            <label class="input-group-text col-md-4" for="entity_code"> Zone Number </label>
        </div>
        <div class="col-md-8">
        <select class="custom-select" name="select" id="selOutdoor" required class="form-control">
        <option value="">Select Zone...</option>
        <?php $ddSelect->zoner(); ?>
        </select>
        </div>
    </div>

    <div class="form-group streets">
        <div class="input-group-prepend">
            <label class="input-group-text col-md-4" for="street"> Street Code </label>
        </div>
        <div class="col-md-8">
        <select class="custom-select" name="street" id="street" required class="form-control"> </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4" for="building_type">Department/Faculty/Street</label>
        <div class="col-md-8">
            <input type="text" name="department_faculty" id="department_faculty" required class=""> 
        </div> 
    </div>

   
    <div class="form-group">
        <label class="col-md-4" for="Are_There_Ramps_In_Pavements">Are There Ramps In Pavements</label>
        <div class="col-md-8">
       <label> <input type="radio" name="Are_There_Ramps_In_Pavements" id="Are_There_Ramps_In_Pavements" class="" value="Yes"> &nbsp; Yes</label>
        <input type="radio" name="Are_There_Ramps_In_Pavements" id="Are_There_Ramps_In_Pavements" class="" value="No"> &nbsp; No
        <input type="radio" name="Are_There_Ramps_In_Pavements" id="Are_There_Ramps_In_Pavements" class="" value="N/A"> &nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
    <label class="col-md-4" for="Yes_Are_Ramps_Negotiable_For_Wheelchair_Users">If the previous answer is Yes, Are the Ramps Negotiable For Wheelchair Users (60cm or less at the top)</label>
    <div class="col-md-8">
        <input type="radio" name="Yes_Are_Ramps_Negotiable_For_Wheelchair_Users" id="Yes_Are_Ramps_Negotiable_For_Wheelchair_Users" value="Yes" class=""> &nbsp; Yes
        <input type="radio" name="Yes_Are_Ramps_Negotiable_For_Wheelchair_Users" id="Yes_Are_Ramps_Negotiable_For_Wheelchair_Users" value="No" class=""> &nbsp; No
        <input type="radio" name="Yes_Are_Ramps_Negotiable_For_Wheelchair_Users" id="Yes_Are_Ramps_Negotiable_For_Wheelchair_Users" value="N/A"> &nbsp; N/A
    </div> 
    </div>

    <div class="form-group">
    <label class="col-md-4" for="Pavements_Clear_Obstacles">Are the pavements clear of obstacles?</label>
        <div class="col-md-8">
            <input type="radio" name="Pavements_Clear_Obstacles" id="Pavements_Clear_Obstacles" value="Yes" class="">&nbsp; Yes
            <input type="radio" name="Pavements_Clear_Obstacles" id="Pavements_Clear_Obstacles" value="No" class="">&nbsp; No
            <input type="radio" name="Pavements_Clear_Obstacles" id="Pavements_Clear_Obstacles" value="N/A"> &nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Pavements_Wide_Enough">Are the pavements Wide Enough? (2m wide)</label>
        <div class="col-md-8">
        <input type="radio" name="Pavements_Wide_Enough" id="Pavements_Wide_Enough" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Pavements_Wide_Enough" id="Pavements_Wide_Enough" value="No" class="">&nbsp; No
        <input type="radio" name="Pavements_Wide_Enough" id="Pavements_Wide_Enough" value="N/A"> &nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Do_Pavements_Have_Raised_Bumps">Do Pavements Have Raised Bumps (Do they have tactile paving?)</label>
        <div class="col-md-8">
        <input type="radio" name="Do_Pavements_Have_Raised_Bumps" id="Do_Pavements_Have_Raised_Bumps" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Do_Pavements_Have_Raised_Bumps" id="Do_Pavements_Have_Raised_Bumps" value="No" class="">&nbsp; No
        <input type="radio" name="Do_Pavements_Have_Raised_Bumps" id="Do_Pavements_Have_Raised_Bumps" value="N/A"> &nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Contrast_In_Colour_Between_Pavements">Are there contrasting colours on street signage? I.e. black font on white/yellow background or white font on black background</label>
        <div class="col-md-8">
        <input type="radio" name="Contrast_In_Colour_Between_Pavements" id="Contrast_In_Colour_Between_Pavements" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Contrast_In_Colour_Between_Pavements" id="Contrast_In_Colour_Between_Pavements" value="No" class="">&nbsp; No
        <input type="radio" name="Contrast_In_Colour_Between_Pavements" id="Contrast_In_Colour_Between_Pavements" value="N/A"> &nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Parking_Slot_For_Disabled_Each_Block">Are there parking slots for the disabled in this block?</label>
        <div class="col-md-8">
            <input type="radio" name="Parking_Slot_For_Disabled_Each_Block" id="Parking_Slot_For_Disabled_Each_Block" value="Yes" class="">&nbsp; Yes
            <input type="radio" name="Parking_Slot_For_Disabled_Each_Block" id="Parking_Slot_For_Disabled_Each_Block" value="No" class="">&nbsp; No
            <input type="radio" name="Parking_Slot_For_Disabled_Each_Block" id="Parking_Slot_For_Disabled_Each_Block" value="N/A"> &nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_Parking_Lots_Wide_Enough">Are Parking Lots Wide Enough? ( 4.8m x 2.8m )</label>
        <div class="col-md-8">
        <input type="radio" name="Are_Parking_Lots_Wide_Enough" id="Are_Parking_Lots_Wide_Enough" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_Parking_Lots_Wide_Enough" id="Are_Parking_Lots_Wide_Enough" value="No" class="">&nbsp; No
        <input type="radio" name="Are_Parking_Lots_Wide_Enough" id="Are_Parking_Lots_Wide_Enough" value="N/A"> &nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_Slots_Clearly_Marked">Are Slots Clearly Marked</label>
        <div class="col-md-8">
        <input type="radio" name="Are_Slots_Clearly_Marked" id="Are_Slots_Clearly_Marked" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_Slots_Clearly_Marked" id="Are_Slots_Clearly_Marked" value="No" class="">&nbsp; No
        <input type="radio" name="Are_Slots_Clearly_Marked" id="Are_Slots_Clearly_Marked" value="N/A"> &nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="How_Many_Slots_Are_There_Per_Block">How Many Slots Are There in total on this street?</label>
        <div class="col-md-8">
        <input type="number" name="How_Many_Slots_Are_There_Per_Block" id="How_Many_Slots_Are_There_Per_Block" size="10" maxlength="10" class="form-control">
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_Parking_Being_Used_Correctly">Are Parking Being Used Correctly? <br/> <em>Tip: check if the vehicle parked there has a disabled parking badge </em></label>
        <div class="col-md-8">
        <input type="radio" name="Are_Parking_Being_Used_Correctly" id="Are_Parking_Being_Used_Correctly" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_Parking_Being_Used_Correctly" id="Are_Parking_Being_Used_Correctly" value="No" class="">&nbsp; No
        <input type="radio" name="Are_Parking_Being_Used_Correctly" id="Are_Parking_Being_Used_Correctly" value="N/A"> &nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_There_Sonic_Traffic_Lights">Are There Sonic Traffic Lights?</label>
        <div class="col-md-8">
        <input type="radio" name="Are_There_Sonic_Traffic_Lights" id="Are_There_Sonic_Traffic_Lights" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_There_Sonic_Traffic_Lights" id="Are_There_Sonic_Traffic_Lights" value="No" class="">&nbsp; No
        <input type="radio" name="Are_There_Sonic_Traffic_Lights" id="Are_There_Sonic_Traffic_Lights" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Sonic_Lights_if_Available_Functioning">If available, are the sonic lights working?</label>
        <div class="col-md-8">
        <input type="radio" name="Sonic_Lights_if_Available_Functioning" id="Sonic_Lights_if_Available_Functioning" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Sonic_Lights_if_Available_Functioning" id="Sonic_Lights_if_Available_Functioning" value="No" class="">&nbsp; No
        <input type="radio" name="Sonic_Lights_if_Available_Functioning" id="Sonic_Lights_if_Available_Functioning" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_There_Pedestrian_Crossing">Are There Pedestrian Crossing spots?</label>
        <div class="col-md-8">
        <input type="radio" name="Are_There_Pedestrian_Crossing" id="Are_There_Pedestrian_Crossing" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_There_Pedestrian_Crossing" id="Are_There_Pedestrian_Crossing" value="No" class="">&nbsp; No
        <input type="radio" name="Are_There_Pedestrian_Crossing" id="Are_There_Pedestrian_Crossing" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Enough_Time_Allocated_By_Traffic_Lights">Do the traffic lights allocate enough time?</label>
        <div class="col-md-8">
        <input type="radio" name="Enough_Time_Allocated_By_Traffic_Lights" id="Enough_Time_Allocated_By_Traffic_Lights" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Enough_Time_Allocated_By_Traffic_Lights" id="Enough_Time_Allocated_By_Traffic_Lights" value="No" class="">&nbsp; No
        <input type="radio" name="Enough_Time_Allocated_By_Traffic_Lights" id="Enough_Time_Allocated_By_Traffic_Lights" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Benches_That_Accommodate_Disabled">Benches That Accommodate Disabled</label>
        <div class="col-md-8">
        <input type="radio" name="Benches_That_Accommodate_Disabled" id="Benches_That_Accommodate_Disabled" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Benches_That_Accommodate_Disabled" id="Benches_That_Accommodate_Disabled" value="No" class="">&nbsp; No
        <input type="radio" name="Benches_That_Accommodate_Disabled" id="Benches_That_Accommodate_Disabled" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Do_Benches_Have_Back_Rest">Do Benches Have Back Rest</label>
        <div class="col-md-8">
        <input type="radio" name="Do_Benches_Have_Back_Rest" id="Do_Benches_Have_Back_Rest" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Do_Benches_Have_Back_Rest" id="Do_Benches_Have_Back_Rest" value="No" class="">&nbsp; No
        <input type="radio" name="Do_Benches_Have_Back_Rest" id="Do_Benches_Have_Back_Rest" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="There_Clear_Signage_Road_Street_Names">Are There Clear Signage Road Street Names</label>
        <div class="col-md-8">
            <input type="radio" name="There_Clear_Signage_Road_Street_Names" id="There_Clear_Signage_Road_Street_Names" value="Yes" class="">&nbsp; Yes
            <input type="radio" name="There_Clear_Signage_Road_Street_Names" id="There_Clear_Signage_Road_Street_Names" value="No" class="">&nbsp; No
            <input type="radio" name="There_Clear_Signage_Road_Street_Names" id="There_Clear_Signage_Road_Street_Names" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="There_Clear_Signage_Building_Names">Is There Clear Signage on Building Names</label>
        <div class="col-md-8">
        <input type="radio" name="There_Clear_Signage_Building_Names" id="There_Clear_Signage_Building_Names" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="There_Clear_Signage_Building_Names" id="There_Clear_Signage_Building_Names" value="No" class="">&nbsp; No
        <input type="radio" name="There_Clear_Signage_Building_Names" id="There_Clear_Signage_Building_Names" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="There_Clear_Signage_Traffic_Signs">Is There Clear Signage Traffic Signs</label>
        <div class="col-md-8">
        <input type="radio" name="There_Clear_Signage_Traffic_Signs" id="There_Clear_Signage_Traffic_Signs" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="There_Clear_Signage_Traffic_Signs" id="There_Clear_Signage_Traffic_Signs" value="No" class="">&nbsp; No
        <input type="radio" name="There_Clear_Signage_Traffic_Signs" id="There_Clear_Signage_Traffic_Signs" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Where_There_Are_Construction_Activities_Clear_Warning_Signs">Where There Are Construction Activities, are there Clear Warning Signs?</label>
        <div class="col-md-8">
        <input type="radio" name="Where_There_Are_Construction_Activities_Clear_Warning_Signs" id="Where_There_Are_Construction_Activities_Clear_Warning_Signs" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Where_There_Are_Construction_Activities_Clear_Warning_Signs" id="Where_There_Are_Construction_Activities_Clear_Warning_Signs" value="No" class="">&nbsp; No
        <input type="radio" name="Where_There_Are_Construction_Activities_Clear_Warning_Signs" id="Where_There_Are_Construction_Activities_Clear_Warning_Signs" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Clear_Signage_Business_Signs_Sign_Boards">Clear Signage on Business Signs and Sign Boards</label>
        <div class="col-md-8">
        <input type="radio" name="Clear_Signage_Business_Signs_Sign_Boards" id="Clear_Signage_Business_Signs_Sign_Boards" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Clear_Signage_Business_Signs_Sign_Boards" id="Clear_Signage_Business_Signs_Sign_Boards" value="No" class="">&nbsp; No
        <input type="radio" name="Clear_Signage_Business_Signs_Sign_Boards" id="Clear_Signage_Business_Signs_Sign_Boards" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_There_Overgrown_Hedges_Streets">Are There Overgrown Hedges on Streets</label>
        <div class="col-md-8">
        <input type="radio" name="Are_There_Overgrown_Hedges_Streets" id="Are_There_Overgrown_Hedges_Streets" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_There_Overgrown_Hedges_Streets" id="Are_There_Overgrown_Hedges_Streets" value="No" class="">&nbsp; No
        <input type="radio" name="Are_There_Overgrown_Hedges_Streets" id="Are_There_Overgrown_Hedges_Streets" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Ramps_Or_Drop_Curbs_For_Wheelchairs_Road_Islands">Are there Ramps Or Drop Curbs For Wheelchairs on Road Islands</label>
        <div class="col-md-8">
        <input type="radio" name="Ramps_Or_Drop_Curbs_For_Wheelchairs_Road_Islands" id="Ramps_Or_Drop_Curbs_For_Wheelchairs_Road_Islands" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Ramps_Or_Drop_Curbs_For_Wheelchairs_Road_Islands" id="Ramps_Or_Drop_Curbs_For_Wheelchairs_Road_Islands" value="No" class="">&nbsp; No
        <input type="radio" name="Ramps_Or_Drop_Curbs_For_Wheelchairs_Road_Islands" id="Ramps_Or_Drop_Curbs_For_Wheelchairs_Road_Islands" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_There_Bus_Shelters">Are There Bus Shelters</label>
        <div class="col-md-8">
        <input type="radio" name="Are_There_Bus_Shelters" id="Are_There_Bus_Shelters" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_There_Bus_Shelters" id="Are_There_Bus_Shelters" value="No" class="">&nbsp; No
        <input type="radio" name="Are_There_Bus_Shelters" id="Are_There_Bus_Shelters" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <!-- Conditional of the above question -->
    <div class="form-group">
        <label class="col-md-4" for="Do_Shelters_Accommodate_All_People_Sizes">If yes, Do Shelters Accommodate All People Sizes</label>
        <div class="col-md-8">
        <input type="radio" name="Do_Shelters_Accommodate_All_People_Sizes" id="Do_Shelters_Accommodate_All_People_Sizes" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Do_Shelters_Accommodate_All_People_Sizes" id="Do_Shelters_Accommodate_All_People_Sizes" value="No" class="">&nbsp; No
        <input type="radio" name="Do_Shelters_Accommodate_All_People_Sizes" id="Do_Shelters_Accommodate_All_People_Sizes" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Bus_Shelters_Raised_Accommodate_Faster_Entrance">Do Bus Shelters Have Raised Platforms to Accommodate Faster Entrance</label>
        <div class="col-md-8">
        <input type="radio" name="Bus_Shelters_Raised_Accommodate_Faster_Entrance" id="Bus_Shelters_Raised_Accommodate_Faster_Entrance" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Bus_Shelters_Raised_Accommodate_Faster_Entrance" id="Bus_Shelters_Raised_Accommodate_Faster_Entrance" value="No" class="">&nbsp; No
        <input type="radio" name="Bus_Shelters_Raised_Accommodate_Faster_Entrance" id="Bus_Shelters_Raised_Accommodate_Faster_Entrance" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_Shelters_Well_Lit">Are Shelters Well Lit?</label>
        <div class="col-md-8">
        <input type="radio" name="Are_Shelters_Well_Lit" id="Are_Shelters_Well_Lit" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_Shelters_Well_Lit" id="Are_Shelters_Well_Lit" value="No" class="">&nbsp; No
        <input type="radio" name="Are_Shelters_Well_Lit" id="Are_Shelters_Well_Lit" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>
    
    <div class="form-group">
        <label class="col-md-4" for="Regular_Resting_Points">Are there regular rest points i.e. benches/seats? At least every 50-70m</label>
        <div class="col-md-8">
        <input type="radio" name="Regular_Resting_Points" id="Regular_Resting_Points" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Regular_Resting_Points" id="Regular_Resting_Points" value="No" class="">&nbsp; No
        <input type="radio" name="Regular_Resting_Points" id="Regular_Resting_Points" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

   

    <div class="form-group">
        <label class="col-md-4" for="Photo">Street Photo</label>
        <div class="col-md-8">
        <input type="file" name="Photo" id="Photo" class="form-control">
        </div> 
    </div>

<div class="form-group">
<label class="col-md-4" for="LatLong">Lattitude/Longitude</label>
<div class="col-md-8">
<input type="text" name="LatLong" id="LatLong" size="255" maxlength="255" class="form-control"><br/>
<button id="loc" type="button" onclick="getLocation();" class="btn btn-default">Click to generate geo codes</button>
</div> 
</div>


<div class="form-group">
        <label class="col-md-4" for="Rating">Rate this street</label>
        <div class="col-md-8">
        <input type="radio" name="Rating" id="Rating" value="1" class="">&nbsp; <i class="fas fa-star"></i> (Poor)<br/>
        <input type="radio" name="Rating" id="Rating" value="2" class="">&nbsp; <i class="fas fa-star"></i> <i class="fas fa-star"></i> (Hmmmm 🤔) <br/>
        <input type="radio" name="Rating" id="Rating" value="3" class="">&nbsp; <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (Average) <br/>
        <input type="radio" name="Rating" id="Rating" value="4" class="">&nbsp; <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (Good) <br/>
        <input type="radio" name="Rating" id="Rating" value="5" class="">&nbsp; <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (Great!) <br/>
        </div> 
</div>

<div class="form-group">
    <label class="col-md-4" for="comments">Your Comments</label>
    <div class="col-md-8">
        <textarea class="form-control" rows="5" id="comments" name="comments"></textarea>
    </div> 
</div>

<div class="form-group">
<label class="col-md-4" for="Posted_By">Posted By</label>
<div class="col-md-8">
<!-- <input type="text" name="Posted_By" id="Posted_By" size="255" maxlength="255" readonly value="<?php //if(isset($_SESSION['name'])){ echo $_SESSION['name']; } ?>" class="form-control"> -->
<input type="text" name="Posted_By" id="Posted_By" size="255" maxlength="255" value="" class="form-control">
</div> 
</div>

<div class="button clearfix col-md-12">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <input type="reset" value="Undo Form" class="btn btn-danger btn-block reset">
    </div>

    <div class="col-md-6 col-sm-6 col-xs-6">
        <input type="submit" name="submit" value="Submit" class="btn btn-success btn-block submit">
    </div> 
</div>

</form>