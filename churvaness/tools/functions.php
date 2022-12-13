<?php


function validate_first_name($POST){
    if(!isset($POST['fname'])){
        return false;
    }else if(strlen(trim($POST['fname']))<1){
        return false;
    }
    return true;
}

function validate_last_name($POST){
    if(!isset($POST['lnanme'])){
        return false;
    }else if(strlen(trim($POST['lnanme']))<1){
        return false;
    }
    return true;
}

function validate_middle_name($POST){
    if(!isset($POST['mnanme'])){
        return false;
    }else if(strlen(trim($POST['mnanme']))<1){
        return false;
    }
    return true;
}

function validate_zone($POST){
    if(!isset($POST['zone'])){
        return false;
    }else if(strcmp($POST['zone'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_image($POST){
    if(!isset($POST['image'])){
        return false;
    }else if(strcmp($POST['image'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_cname($POST){
    if(!isset($POST['cname'])){
        return false;
    }else if(strcmp($POST['cname'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_age($POST){
    if(!isset($POST['age'])){
        return false;
    }else if(strcmp($POST['age'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_gender($POST){
    if(!isset($POST['gender'])){
        return false;
    }else if(strcmp($POST['gender'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_formerAddress($POST){
    if(!isset($POST['formerAddress'])){
        return false;
    }else if(strcmp($POST['formerAddress'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_add_residents($POST){
    if(!validate_zone($POST) || !validate_image($POST) || !validate_cname($POST) || !validate_age($POST) || !validate_gender($POST) || !validate_formeraddress($POST)){
     
    return false;
     }
    return true;
}

function validate_add_officials($POST){
    if(!validate_sPosition($POST) || !validate_completeName($POST) || !validate_pcontact($POST) || !validate_paddress($POST) || 
    !validate_termStart($POST) || !validate_termEnd($POST)){     
    return false;
     }
    return true;
}

function validate_sPosition($POST){
    if(!isset($POST['sPosition'])){
        return false;
    }else if(strcmp($POST['sPosition'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_completeName($POST){
    if(!isset($POST['completeName'])){
        return false;
    }else if(strcmp($POST['completeName'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_pcontact($POST){
    if(!isset($POST['pcontact'])){
        return false;
    }else if(strcmp($POST['pcontact'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_paddress($POST){
    if(!isset($POST['paddress'])){
        return false;
    }else if(strcmp($POST['paddress'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_termStart($POST){
    if(!isset($POST['termStart'])){
        return false;
    }else if(strcmp($POST['termStart'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_termEnd($POST){
    if(!isset($POST['termEnd'])){
        return false;
    }else if(strcmp($POST['termEnd'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_add_blotter($POST){
    if(!validate_date_Recorded($POST) || !validate_complainant($POST) || !validate_rname($POST) || !validate_complaint($POST) || !validate_action_taken($POST) || !validate_sStatus($POST) || !validate_location_Of_Incidence($POST)){     
    return false;
     }
    return true;
}

function validate_dateRecorded($POST){
    if(!isset($POST['dateRecorded'])){
        return false;
    }else if(strcmp($POST['dateRecorded'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_complainant($POST){
    if(!isset($POST['complainant'])){
        return false;
    }else if(strcmp($POST['complainant'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_rname($POST){
    if(!isset($POST['rname'])){
        return false;
    }else if(strcmp($POST['rname'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_complaint($POST){
    if(!isset($POST['complaint'])){
        return false;
    }else if(strcmp($POST['complaint'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_actiontaken($POST){
    if(!isset($POST['actiontaken'])){
        return false;
    }else if(strcmp($POST['actiontaken'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_status($POST){
    if(!isset($POST['status'])){
        return false;
    }
    return true;
}

function validate_locationOfIncidence($POST){
    if(!isset($POST['locationOfIncidence'])){
        return false;
    }else if(strcmp($POST['locationOfIncidence'], 'None') == 0){
        return false;
    }
    return true;
}

?>