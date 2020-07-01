<form class="rwdform" method="POST" enctype="multipart/form-data" name="questionnaire" id="indoorForm" action="action.php">
    <input type="hidden" name="form" value="indoor">
    <div class="form-group">
        <div class="input-group-prepend">
            <label class="input-group-text col-md-4" for="entity_code"> Zone Number </label>
        </div>
        <div class="col-md-8">
        <select class="custom-select" name="select" id="select" required class="form-control">
        <option value="">Select Zone...</option>
        <?php $ddSelect->zoner(); ?>
        </select>
        </div>
    </div>

    <div class="form-group buildingsX">
        <div class="input-group-prepend">
            <label class="input-group-text col-md-4" for="entity_code"> University Code </label>
        </div>
        <div class="col-md-8">
        <select class="custom-select" name="entity_code" id="entity_code" required class="form-control"></select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4" for="building_type">Department/Faculty</label>
        <div class="col-md-8">
            <input type="text" name="department_faculty" id="department_faculty" required  class=""> 
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="building_type">Building Type</label>
        <div class="col-md-8">
            <input type="radio" name="building_type" id="building_type" value="private" class=""> Private
            <input type="radio" name="building_type" id="building_type" value="public" class=""> Public
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
        <label class="col-md-4" for="Clear_Signage_Business_Signs_Sign_Boards">Clear Signage on Business Signs and Sign Boards</label>
        <div class="col-md-8">
        <input type="radio" name="Clear_Signage_Business_Signs_Sign_Boards" id="Clear_Signage_Business_Signs_Sign_Boards" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Clear_Signage_Business_Signs_Sign_Boards" id="Clear_Signage_Business_Signs_Sign_Boards" value="No" class="">&nbsp; No
        <input type="radio" name="Clear_Signage_Business_Signs_Sign_Boards" id="Clear_Signage_Business_Signs_Sign_Boards" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>


    <div class="form-group">
        <label class="col-md-4" for="Are_There_Ramps">Are there ramps at the entrances or exits?</label>
        <div class="col-md-8">
        <input type="radio" name="Are_There_Ramps" id="Are_There_Ramps" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_There_Ramps" id="Are_There_Ramps" value="No" class="">&nbsp; No
        <input type="radio" name="Are_There_Ramps" id="Are_There_Ramps" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_The_Ramps_Negotiable">If yes, are the ramps negotiable? (No more than 63cm at the top)</label>
        <div class="col-md-8">
        <input type="radio" name="Are_The_Ramps_Negotiable" id="Are_The_Ramps_Negotiable" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_The_Ramps_Negotiable" id="Are_The_Ramps_Negotiable" value="No" class="">&nbsp; No
        <input type="radio" name="Are_The_Ramps_Negotiable" id="Are_The_Ramps_Negotiable" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_There_Escalators">Are There Escalators</label>
        <div class="col-md-8">
        <input type="radio" name="Are_There_Escalators" id="Are_There_Escalators" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_There_Escalators" id="Are_There_Escalators" value="No" class="">&nbsp; No
        <input type="radio" name="Are_There_Escalators" id="Are_There_Escalators" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_There_Lifts">Are There Lifts</label>
        <div class="col-md-8">
        <input type="radio" name="Are_There_Lifts" id="Are_There_Lifts" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_There_Lifts" id="Are_There_Lifts" value="No" class="">&nbsp; No
        <input type="radio" name="Are_There_Lifts" id="Are_There_Lifts" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Lift_Or_Escalators_Are_There_Visual_Indicators">Do the Lift Or Escalators Have Visual Indicators</label>
        <div class="col-md-8">
        <input type="radio" name="Lift_Or_Escalators_Are_There_Visual_Indicators" id="Lift_Or_Escalators_Are_There_Visual_Indicators" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Lift_Or_Escalators_Are_There_Visual_Indicators" id="Lift_Or_Escalators_Are_There_Visual_Indicators" value="No" class="">&nbsp; No
        <input type="radio" name="Lift_Or_Escalators_Are_There_Visual_Indicators" id="Lift_Or_Escalators_Are_There_Visual_Indicators" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Lift_Or_Escalators_Are_There_Auditory_Indicators">Do the lifts have auditory indicators?</label>
        <div class="col-md-8">
        <input type="radio" name="Lift_Or_Escalators_Are_There_Auditory_Indicators" id="Lift_Or_Escalators_Are_There_Auditory_Indicators" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Lift_Or_Escalators_Are_There_Auditory_Indicators" id="Lift_Or_Escalators_Are_There_Auditory_Indicators" value="No" class="">&nbsp; No
        <input type="radio" name="Lift_Or_Escalators_Are_There_Auditory_Indicators" id="Lift_Or_Escalators_Are_There_Auditory_Indicators" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Lift_Or_Escalators_There_Braille_Buttons">Do the lifts have braille on the buttons</label>
        <div class="col-md-8">
        <input type="radio" name="Lift_Or_Escalators_There_Braille_Buttons" id="Lift_Or_Escalators_There_Braille_Buttons" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Lift_Or_Escalators_There_Braille_Buttons" id="Lift_Or_Escalators_There_Braille_Buttons" value="No" class="">&nbsp; No
        <input type="radio" name="Lift_Or_Escalators_There_Braille_Buttons" id="Lift_Or_Escalators_There_Braille_Buttons" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_Doors_More_Than_Meter_Wide">Are doors more than 1m wide?</label>
        <div class="col-md-8">
        <input type="radio" name="Are_Doors_More_Than_Meter_Wide" id="Are_Doors_More_Than_Meter_Wide" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_Doors_More_Than_Meter_Wide" id="Are_Doors_More_Than_Meter_Wide" value="No" class="">&nbsp; No
        <input type="radio" name="Are_Doors_More_Than_Meter_Wide" id="Are_Doors_More_Than_Meter_Wide" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_There_Clear_Floor_Areas">Are There Clear Floor Areas</label>
        <div class="col-md-8">
        <input type="radio" name="Are_There_Clear_Floor_Areas" id="Are_There_Clear_Floor_Areas" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_There_Clear_Floor_Areas" id="Are_There_Clear_Floor_Areas" value="No" class="">&nbsp; No
        <input type="radio" name="Are_There_Clear_Floor_Areas" id="Are_There_Clear_Floor_Areas" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Floor_Area_Clear_Are_Objects_Attached_Or_Detached">Where floor spaces are not clear, are the objects attached or detachable?</label>
        <div class="col-md-8">
        <input type="radio" name="Floor_Area_Clear_Are_Objects_Attached_Or_Detached" id="Floor_Area_Clear_Are_Objects_Attached_Or_Detached" value="Attached" class="">&nbsp; Attached
        <input type="radio" name="Floor_Area_Clear_Are_Objects_Attached_Or_Detached" id="Floor_Area_Clear_Are_Objects_Attached_Or_Detached" value="Detachable" class="">&nbsp; Detachable
        <input type="radio" name="Floor_Area_Clear_Are_Objects_Attached_Or_Detached" id="Floor_Area_Clear_Are_Objects_Attached_Or_Detached" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_Doors_Manual_Or_Automatic">Are doors manual or automatic</label>
        <div class="col-md-8">
        <input type="radio" name="Are_Doors_Manual_Or_Automatic" id="Are_Doors_Manual_Or_Automatic" value="Manual" class="">&nbsp; Manual
        <input type="radio" name="Are_Doors_Manual_Or_Automatic" id="Are_Doors_Manual_Or_Automatic" value="Automatic" class="">&nbsp; Automatic
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Manual_Are_Doors_Push_Or_Pull">If the doors are manual, are doors Push Or Pull</label>
        <div class="col-md-8">
        <input type="radio" name="Manual_Are_Doors_Push_Or_Pull" id="Manual_Are_Doors_Push_Or_Pull" value="Push" class="">&nbsp; Push
        <input type="radio" name="Manual_Are_Doors_Push_Or_Pull" id="Manual_Are_Doors_Push_Or_Pull" value="Pull" class="">&nbsp; Pull
        <input type="radio" name="Manual_Are_Doors_Push_Or_Pull" id="Manual_Are_Doors_Push_Or_Pull" value="Both" class="">&nbsp; Both
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_Handles_Doors_Knobs_Or_Locks">Are there door knobs or levers on the doors?</label>
        <div class="col-md-8">
        <input type="radio" name="Are_Handles_Doors_Knobs_Or_Locks" id="Are_Handles_Doors_Knobs_Or_Locks" value="Knobs" class="">&nbsp; Knobs
        <input type="radio" name="Are_Handles_Doors_Knobs_Or_Locks" id="Are_Handles_Doors_Knobs_Or_Locks" value="Levers" class="">&nbsp; Levers
        <input type="radio" name="Are_Handles_Doors_Knobs_Or_Locks" id="Are_Handles_Doors_Knobs_Or_Locks" value="Handles" class="">&nbsp; Handles
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Clear_Signages_Eg_Room_Numbers_Fire_Exits">Is there clear sinage; e.g. Room Numbers Fire Exits</label>
        <div class="col-md-8">
        <input type="radio" name="Clear_Signages_Eg_Room_Numbers_Fire_Exits" id="Clear_Signages_Eg_Room_Numbers_Fire_Exits" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Clear_Signages_Eg_Room_Numbers_Fire_Exits" id="Clear_Signages_Eg_Room_Numbers_Fire_Exits" value="No" class="">&nbsp; No
        <input type="radio" name="Clear_Signages_Eg_Room_Numbers_Fire_Exits" id="Clear_Signages_Eg_Room_Numbers_Fire_Exits" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Handles_In_Seats_That_Accommodate_Disabled_Old">Are there arm rests on seats that accommodate the disabled and the elderly</label>
        <div class="col-md-8">
        <input type="radio" name="Handles_In_Seats_That_Accommodate_Disabled_Old" id="Handles_In_Seats_That_Accommodate_Disabled_Old" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Handles_In_Seats_That_Accommodate_Disabled_Old" id="Handles_In_Seats_That_Accommodate_Disabled_Old" value="No" class="">&nbsp; No
        <input type="radio" name="Handles_In_Seats_That_Accommodate_Disabled_Old" id="Handles_In_Seats_That_Accommodate_Disabled_Old" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Do_Chairs_Or_Benches_Have_Back_Rest">Do chairs or benches have back rest</label>
        <div class="col-md-8">
        <input type="radio" name="Do_Chairs_Or_Benches_Have_Back_Rest" id="Do_Chairs_Or_Benches_Have_Back_Rest" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Do_Chairs_Or_Benches_Have_Back_Rest" id="Do_Chairs_Or_Benches_Have_Back_Rest" value="No" class="">&nbsp; No
        <input type="radio" name="Do_Chairs_Or_Benches_Have_Back_Rest" id="Do_Chairs_Or_Benches_Have_Back_Rest" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_Seats_Accommodative_For_All">Are seats accommodative for all?  (Approx 0.5m high)</label>
        <div class="col-md-8">
        <input type="radio" name="Are_Seats_Accommodative_For_All" id="Are_Seats_Accommodative_For_All" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_Seats_Accommodative_For_All" id="Are_Seats_Accommodative_For_All" value="No" class="">&nbsp; No
        <input type="radio" name="Are_Seats_Accommodative_For_All" id="Are_Seats_Accommodative_For_All" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_Floors_Flat">Are floors flat through out?</label>
        <div class="col-md-8">
        <input type="radio" name="Are_Floors_Flat" id="Are_Floors_Flat" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_Floors_Flat" id="Are_Floors_Flat" value="No" class="">&nbsp; No
        <input type="radio" name="Are_Floors_Flat" id="Are_Floors_Flat" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_Floors_Slip_Resistant">Are floors slip resistant?</label>
        <div class="col-md-8">
        <input type="radio" name="Are_Floors_Slip_Resistant" id="Are_Floors_Slip_Resistant" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_Floors_Slip_Resistant" id="Are_Floors_Slip_Resistant" value="No" class="">&nbsp; No
        <input type="radio" name="Are_Floors_Slip_Resistant" id="Are_Floors_Slip_Resistant" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>
    <!-- Adding for stairwells -->
    <div class="form-group">
        <label class="col-md-4" for="Are_There_Stairwells">Are there stairwells?</label>
        <div class="col-md-8">
        <input type="radio" name="Are_There_Stairwells" id="Are_There_Stairwells" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_There_Stairwells" id="Are_There_Stairwells" value="No" class="">&nbsp; No
        <input type="radio" name="Are_There_Stairwells" id="Are_There_Stairwells" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_Stairwell_Meter_Wide">If yes, are they at least 1m wide??</label>
        <div class="col-md-8">
        <input type="radio" name="Are_Stairwell_Meter_Wide" id="Are_Stairwell_Meter_Wide" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_Stairwell_Meter_Wide" id="Are_Stairwell_Meter_Wide" value="No" class="">&nbsp; No
        <input type="radio" name="Are_Stairwell_Meter_Wide" id="Are_Stairwell_Meter_Wide" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Do_Stairwells_Have_Sturdy_Railings">Do the stairwells have sturdy railings for support?</label>
        <div class="col-md-8">
        <input type="radio" name="Do_Stairwells_Have_Sturdy_Railings" id="Do_Stairwells_Have_Sturdy_Railings" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Do_Stairwells_Have_Sturdy_Railings" id="Do_Stairwells_Have_Sturdy_Railings" value="No" class="">&nbsp; No
        <input type="radio" name="Do_Stairwells_Have_Sturdy_Railings" id="Do_Stairwells_Have_Sturdy_Railings" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>
    
    <div class="form-group">
        <label class="col-md-4" for="Do_Stairwells_Have_Lighting">Do the stairwells have lighting throughout?</label>
        <div class="col-md-8">
        <input type="radio" name="Do_Stairwells_Have_Lighting" id="Do_Stairwells_Have_Lighting" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Do_Stairwells_Have_Lighting" id="Do_Stairwells_Have_Lighting" value="No" class="">&nbsp; No
        <input type="radio" name="Do_Stairwells_Have_Lighting" id="Do_Stairwells_Have_Lighting" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="Are_Fittings_Meter_High">Where there are fittings like light switches, fire extinguishers, windows etc, are they between 0.7m and 1.2m?</label>
        <div class="col-md-8">
        <input type="radio" name="Are_Fittings_Meter_High" id="Are_Fittings_Meter_High" value="Yes" class="">&nbsp; Yes
        <input type="radio" name="Are_Fittings_Meter_High" id="Are_Fittings_Meter_High" value="No" class="">&nbsp; No
        <input type="radio" name="Are_Fittings_Meter_High" id="Are_Fittings_Meter_High" value="N/A" class="">&nbsp; N/A
        </div> 
    </div>
    <!-- stairwells -->

    <div class="form-group">
        <label class="col-md-4" for="Photo">Photo</label>
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
        <label class="col-md-4" for="Rating">Rate this premises</label>
        <div class="col-md-8">
        <input type="radio" name="Rating" id="Rating" value="1" class="">&nbsp; <i class="fas fa-star"></i> (Poor)<br/>
        <input type="radio" name="Rating" id="Rating" value="2" class="">&nbsp; <i class="fas fa-star"></i> <i class="fas fa-star"></i> (Hmmmm 🤔) <br/>
        <input type="radio" name="Rating" id="Rating" value="3" class="">&nbsp; <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (Average) <br/>
        <input type="radio" name="Rating" id="Rating" value="4" class="">&nbsp; <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (Good) <br/>
        <input type="radio" name="Rating" id="Rating" value="5" class="">&nbsp; <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (Great!) <br/>
        </div> 
    </div>

<div class="form-group">
    <label class="col-md-4" for="LatLong">Your Comments</label>
    <div class="col-md-8">
    <textarea class="form-control" rows="5" id="comments" name="comments"></textarea>
    </div> 
</div>

<div class="form-group">
<label class="col-md-4" for="Posted_By">Posted By</label>
<div class="col-md-8">
<input type="text" name="Posted_By" id="Posted_By" size="255" maxlength="255" readonly value="<?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; } ?>" class="form-control">
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