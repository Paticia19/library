<?php

    require_once '../tools/functions.php';
    require_once '../classes/officials.class.php';

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }
    //if the above code is false then code and html below will be executed

    //if add faculty is submitted
    if(isset($_POST['save'])){

        $officials = new Officials;
        //sanitize user inputs
        $officials->sPosition = $_POST['sPosition'];
        $officials->completeName = htmlentities($_POST['completeName']);
        $officials->pcontact = htmlentities($_POST['pcontact']);
        $officials->paddress = htmlentities($_POST['paddress']);
        $officials->termStart = htmlentities($_POST['termStart']);
        $officials->termEnd =  htmlentities($_POST['termEnd']);
        if(isset($_POST['status'])){
            $officials->status = $_POST['status'];
        }
        if(isset($_POST['option'])){
            $officials->option = $_POST['option'];
        }
        if(validate_add_officials($_POST)){
            if($officials->add()){
                //redirect user to officials page after saving
                header('location: officials.php');
            }
        }
    }

    require_once '../tools/variables.php';
    $page_title = 'Officials | Add Barangay Officials';
    $officials = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
         <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Manage Officials</h3>
                <a class="back" href="officials.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="addofficials.php" method="post">
                      <label>Positions:</label>
                                    <select name="ddl_pos" class="form-control input-sm">
                                        <option selected="" disabled="">-- Select Positions -- </option>
                                        <option value="Captain" <?php if(isset($_POST['sPosition'])) { if ($_POST['sPosition'] == 'Captain') echo ' selected="selected"'; } ?>>Barangay Captain</option>
                                        <option value="Kagawad(Ordinance)"<?php if(isset($_POST['sPosition'])) { if ($_POST['sPosition'] == 'Kagawad(Ordinance)') echo ' selected="selected"'; } ?>>Barangay Kagawad(Ordinance)</option>
                                        <option value="Kagawad(Public Safety)"<?php if(isset($_POST['sPosition'])) { if ($_POST['Kagawad(Public Safety)'] == 'Kagawad(Public Safety)') echo ' selected="selected"'; } ?>>Barangay Kagawad(Public Safety)</option>
                                        <option value="Kagawad(Tourism)"<?php if(isset($_POST['sPosition'])) { if ($_POST['sPosition'] == 'Kagawad(Tourism)') echo ' selected="selected"'; } ?>>Barangay Kagawad(Tourism)</option>
                                        <option value="Kagawad(Budget & Finance)"<?php if(isset($_POST['sPosition'])) { if ($_POST['sPosition'] == '"Kagawad(Budget & Finance)') echo ' selected="selected"'; } ?>>Barangay Kagawad(Budget & Finance)</option>
                                        <option value="Kagawad(Agriculture)"<?php if(isset($_POST['sPosition'])) { if ($_POST['sPosition'] == 'Kagawad(Agriculture)') echo ' selected="selected"'; } ?>>Barangay Kagawad(Agriculture)</option>
                                        <option value="Kagawad(Education)"<?php if(isset($_POST['sPosition'])) { if ($_POST['sPosition'] == 'Kagawad(Education)') echo ' selected="selected"'; } ?>>Barangay Kagawad(Education)</option>
                                        <option value="Kagawad(Infrastracture)"<?php if(isset($_POST['sPosition'])) { if ($_POST['sPosition'] == 'Kagawad(Infrastracture)') echo ' selected="selected"'; } ?>>Barangay Kagawad(Infrastracture)</option>
                                        <option value="SK Chairman"<?php if(isset($_POST['sPosition'])) { if ($_POST['sPosition'] == 'SK Chairman') echo ' selected="selected"'; } ?>>SK Chairman</option>
                                        <option value="Secretary"<?php if(isset($_POST['sPosition'])) { if ($_POST['sPosition'] == 'Secretary') echo ' selected="selected"'; } ?>>Barangay Secretary</option>
                                        <option value="Treasurer"<?php if(isset($_POST['sPosition'])) { if ($_POST['sPosition'] == 'Treasurer') echo ' selected="selected"'; } ?>>Barangay Treasurer</option>
                                    </select>
                                    <?php
                        if(isset($_POST['save']) && !validate_sPosition($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                                
                                    <label>Name:</label>
                                    <input name="txt_cname" class="form-control input-sm" type="text" placeholder="Lastname, Firstname Middlename" value="<?php if(isset($_POST['completeName'])) { echo $_POST['completeName']; } ?>">
                                </div>
                                <?php
                        if(isset($_POST['save']) && !validate_completeName($_POST)){
                    ?>
                    <?php
                        }
                    ?>                          
                                    <label>Contact #:</label>
                                    <input name="txt_contact" class="form-control input-sm" type="number" placeholder="Contact #" value="<?php if(isset($_POST['pcontact'])) { echo $_POST['pcontact']; } ?>">
                                </div>
                                <?php
                        if(isset($_POST['save']) && !validate_pcontact($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                    <br>
                    <br>
                    
                                    <label>Address:</label>
                                    <input name="txt_address" class="form-control input-sm" type="text" placeholder="Address" value="<?php if(isset($_POST['paddress'])) { echo $_POST['paddress']; } ?>">
                                <?php
                        if(isset($_POST['save']) && !validate_paddress($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                                    <label>Start Term:</label>
                                    <input id="txt_sterm" name="txt_sterm" class="form-control input-sm" type="date" placeholder="Start Term" value="<?php if(isset($_POST['termStart'])) { echo $_POST['termStart']; } ?>">
                                <?php
                        if(isset($_POST['save']) && !validate_termStart($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                                    <label>End Term:</label>
                                    <input name="txt_eterm" class="form-control input-sm" type="date" placeholder="End Term" value="<?php if(isset($_POST['termEnd'])) { echo $_POST['termEnd']; } ?>">
                                <?php
                        if(isset($_POST['save']) && !validate_termEnd($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                     <label for="status">Status</label><br>
                     <label class="container" for="Offering">Ongoing term
                            <input type="radio" name="status" id="Offering" value="Offering" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Offering') echo ' checked'; } ?>>
                            <span class="checkmark"></span>
                        </label>
                        <?php
                        if(isset($_POST['save']) && !validate_status($_POST)){
                    ?>
                                <p class="error">Please select status.</p>
                    <?php
                        }
                    ?>

                        <input type="submit" class="button" value="Add Officials" name="submit" id="submit">
                    
                </form>
            </div>
        </div>
    </div>


<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>