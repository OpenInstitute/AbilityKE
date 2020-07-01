<?php
require_once 'classes/cls.constants.php'; 

// This function will help with the new checklist - 8th Nov 2019

//if(isset($_SESSION['name'])){
if($type == ''){
?>

<div class="container">
    <div class="intro">
        <h3> Select Checklist </h3>
        <!-- <center><h5>Welcome <?php  //echo $_SESSION['name']. '. Not '.$_SESSION['name'].' ? '; ?> &middot; <a href="logout.php"> Log out and enter your email address</a> </h5></center> -->
        <center><h5>Welcome to the Ability Checklist</h5></center>
        <p style="text-align: center;">
        Please select a checklist from below. <br/> 
        Indoor checklist has details for mapping inside buildings. <br/>
        Outdoor checklist contains a form with street detail questions.
        </p>
    </div>

    <div class="row">
        <!-- <div class="col-md-4 col-sm-12 col-xs-12 link">
            <a href="index.php?type=indoor">
                <button class="btn btn-block btn-default"> <i class="fas fa-door-closed"></i>  Indoor </button>
            </a>
        </div>
    
        <div class="col-md-4 col-sm-12 col-xs-12 link">
            <a href="index.php?type=outdoor">
                <button class="btn btn-block btn-default"><i class="fas fa-door-open"></i> Outdoor </button>
            </a>
        </div> -->
        <!-- Manually add initial -->
        <!-- <div class="col-md-4 col-sm-12 col-xs-12 link">
            <a href="index.php?type=indoor-manual">
                <button class="btn btn-block btn-default"><i class="fas fa-edit"></i> Manually Add  - Indoor Checklist </button>
            </a>
        </div> -->

        <div class="col-md-6 col-sm-6 col-xs-12 link">
            <a href="index.php?type=indoor-manual">
                <button class="btn btn-block btn-default"><i class="fas fa-door-closed"></i> Indoor Checklist </button>
            </a>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12 link">
            <a href="index.php?type=outdoor-manual">
                <button class="btn btn-block btn-default"><i class="fas fa-door-open"></i> Outdoor Checklist </button>
            </a>
        </div>

    </div>

    <!-- <div class="row hide" style="margin-top: 2%;">
        <div class="col-md-6 col-sm-6 col-xs-12 link">
            <a href="index.php?type=umc-indoor">
                <button class="btn btn-block btn-default"> <i class="fas fa-map-marked-alt"></i>  #UniversityMappingChallenge - Indoor </button>
            </a>
        </div>

        <div class="col-md-6 col-sm-6  col-xs-4 link">
            <a href="index.php?type=outdoor">
                <button class="btn btn-block btn-default"><i class="fas fa-door-open"></i> #UniversityMappingChallenge - Outdoor </button>
            </a>
        </div>

    </div> -->

    <!-- Contribute form -->
    <!-- <div class="row hide" style="margin-top: 2%;">
        <div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-12 link">
            <a href="index.php?type=contribute">
                <button class="btn btn-block btn-default"> <i class="fas fa-map-marked-alt"></i>  Add a place - Indoor </button>
            </a>
        </div> -->


    </div>

   
</div>

<?php 
}
//}

if($type == 'indoor'){
    echo $back;
    include_once 'forms/indoor.php';
} 

if($type == 'outdoor'){
    echo $back;
    include_once 'forms/outdoor.php';
}

// Added on 3rd Dec for Addis trip
if($type == 'outdoor-manual'){
    echo $back;
    include_once 'forms/outdoor-manual.php';
}

if($type == 'indoor-manual'){
    echo $back;
    include_once 'forms/indoor-manual.php';
} 


if($type == 'umc-indoor'){
    echo $back;
    include_once 'forms/umc-indoor.php';
} 

if($type == 'contribute'){
    echo $back;
    include_once 'forms/indoor-public.php';
} 

if($type == 'access-audit-checklist'){
    echo $back;
    include_once 'forms/access-audit-checklist.php';
} 


?>