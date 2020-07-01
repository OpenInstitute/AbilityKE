<form class="rwdform" method="POST" enctype="multipart/form-data" name="questionnaire" id="AUCForm" action="action.php">
    <input type="hidden" name="form" value="access-audit-checklist">

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

    <!-- User Metadata -->
    <h3>Personal Data</h3>
    <div class="form-group user_name">
        <div class="input-group-prepend">
            <label class="input-group-text col-md-4" for="user_name"> Name </label>
        </div>
        <div class="col-md-8">
        <input class="custom-select" type="text" name="user_name" id="user_name" required size="255" maxlength="255" class="form-control" placeholder="Your name (required)"></select>
        </div>
    </div>

    <div class="form-group user_email">
        <div class="input-group-prepend">
            <label class="input-group-text col-md-4" for="user_email"> E-mail Address </label>
        </div>
        <div class="col-md-8">
        <input class="custom-select" type="email" name="user_email" id="user_email" required size="255" maxlength="255" class="form-control" placeholder="Your e-mail address (required)"></select>
        </div>
    </div>

    <div class="form-group user_phone">
        <div class="input-group-prepend">
            <label class="input-group-text col-md-4" for="user_phone"> Phone Number </label>
        </div>
        <div class="col-md-8">
            <input class="custom-select" type="tel" name="user_phone" id="user_phone" size="255" maxlength="255" class="form-control" placeholder="Your phone number (optional, we'll use this to contact you.)"></select>
        </div>
    </div>

    <h3>Building Metadata</h3>

    <div class="form-group user_phone">
        <div class="input-group-prepend">
            <label class="input-group-text col-md-4" for="building_name"> Building Name </label>
        </div>
        <div class="col-md-8">
            <input class="custom-select" type="tel" name="building_name" id="building_name" size="255" maxlength="255" class="form-control" placeholder="Building name"></select>
        </div>
    </div>

    <div class="form-group user_phone">
        <div class="input-group-prepend">
            <label class="input-group-text col-md-4" for="audit_date"> Date of Audit </label>
        </div>
        <div class="col-md-8">
            <input class="custom-select" type="tel" name="audit_date" id="audit_date" size="255" maxlength="255" class="form-control" placeholder="Building name"></select>
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
        <label class="col-md-4" for="Photo">Photo</label>
        <div class="col-md-8">
        <input type="file" name="Photo" id="Photo" class="form-control">
        </div> 
    </div>

    <div class="form-group">
        <label class="col-md-4" for="building_type">Building Type</label>
        <div class="col-md-8">
            <input type="radio" name="building_type" id="building_type" value="private" class=""> Private
            <input type="radio" name="building_type" id="building_type" value="public" class=""> Public
        </div> 
    </div>
     <!-- User Metadata -->

     <!-- buildings metadata -->

    <!-- Main entrance -->
    <h3>Main Entrance checklist - Answer (Yes/No/Not Applicable)</h3>

    <?php
        $dispData->checklistCategory('main_entrance');
    ?>
    <!-- Main entrance -->

    <!-- Ramps -->
    <h3>Ramps (Yes/No/Not Applicable)</h3>

    <?php
        $dispData->checklistCategory('ramps');
    ?>
    <!-- Ramps -->

    <!-- Parking -->
    <h3>Parking (Yes/No/Not Applicable)</h3>

    <?php
        $dispData->checklistCategory('parking');
    ?>


    <!-- Parking -->

    <!-- Reception -->
    <h3>Reception & Information Counters</h3>
    
    <?php
        $dispData->checklistCategory('reception');
    ?>

    <!-- Reception -->

    <!-- Doors -->
    <h3>Doors</h3>
    <?php
        $dispData->checklistCategory('doors');
    ?>
    
    <!-- Doors -->

    <!-- Corridors -->
    <h3>Corridors</h3>

    <?php
        $dispData->checklistCategory('corridors');
    ?>
    <!-- Corridors -->

    <!-- Lifts -->
    <h3>Lifts </h3>
    <?php
        $dispData->checklistCategory('lifts');
    ?>
    <!-- Lifts -->

    <!-- Stairs -->
    <h3>Stairs</h3>
    <?php
        $dispData->checklistCategory('stairs');
    ?>
    <!-- Stairs -->

    <!-- Handrails -->
    <h3>Handrails</h3>
    <?php
        $dispData->checklistCategory('handrails');
    ?>
    <!-- Handrails -->

    <!-- Toilets -->
    <h3> Toilets </h3>
    
    <?php
        $dispData->checklistCategory('toilets');
    ?>
    <!-- Toilets -->

    <!-- Canteen -->
    <h3>Canteen</h3>
    <?php
        $dispData->checklistCategory('canteens');
    ?>
    <!-- Canteen -->

    <!-- Drinking water -->
    <h3>Drinking Water</h3>
    <?php
        $dispData->checklistCategory('drinking_water');
    ?>
    
    
    <!-- Drinking water -->

    <!-- Signages -->
    <h3>Signages</h3>
    <?php
        $dispData->checklistCategory('signages');
    ?>
    <!-- Signages -->

    <!-- Emergency Exits -->
    <h3>Emergency Exits</h3>

    <?php
        $dispData->checklistCategory('emergency_exits');
    ?>
    <!-- Public Telephones -->

    <!-- Resting Facilities -->
    <h3> Resting Facilities </h3>
    <?php
        $dispData->checklistCategory('resting_facilities');
    ?>
    
    <!-- Resting Facilities -->



     <!-- buildings metadata -->

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
    <label class="col-md-4" for="comments">Your Comments</label>
    <div class="col-md-8">
    <textarea class="form-control" rows="5" id="comments" name="comments"></textarea>
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