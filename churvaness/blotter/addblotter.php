<?php

    require_once '../tools/functions.php';
    require_once '../classes/blotter.class.php';

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

    //if add blotter is submitted
    if(isset($_POST['save'])){

        $blotter = new Blotter();
        //sanitize user inputs
        $blotter->lname = htmlentities($_POST['lname']);
        $blotter->fname = htmlentities($_POST['fname']);
        $blotter->mname = htmlentities($_POST['mname']);
        $blotter->dateRecorded = htmlentities($_POST['dateRecorded']);
        $blotter->complainant = htmlentities($_POST['complainant']);
        $blotter->rname = htmlentities($_POST['rname']);
        $blotter->complaint = $_POST['complaint'];
        $blotter->actionTaken = $_POST['actionTaken'];
        $blotter->locationOfIncidence = $_POST['locationOfIncidence'];
        }
        if(isset($_POST['status'])){
            $blotter->status = $_POST['status'];
        }
        if(isset($_POST['option'])){
            $blotter->option = $_POST['option'];
        }
        if(validate_add_blotter($_POST)){
            if($blotter->add()){  
                //redirect user to blotter page after saving
                header('location: blotter.php');
            }
        }
    

    require_once '../tools/variables.php';
    $page_title = 'Barangay | Add blotter';
    $blotter = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New Record</h3>
                <a class="back" href="blotter.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="addblotter.php" method="post">
                <label class="control-label" >Complainant:</label><br>
                
                <input name="txt_lname" class="form-control input-sm" type="text" placeholder="Lastname" width="2" value="<?php if(isset($_POST['lname'])) { echo $_POST['lname']; } ?>">
                <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                <input name="txt_fname" class="form-control input-sm col-sm-4" type="text" placeholder="Firstname" value="<?php if(isset($_POST['fname'])) { echo $_POST['fname']; } ?>">
                <?php
                        if(isset($_POST['save']) && !validate_first_name($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                <input name="txt_mname" class="form-control input-sm col-sm-4" type="text" placeholder="Middlename" value="<?php if(isset($_POST['mname'])) { echo $_POST['mname']; } ?>">
                <?php
                        if(isset($_POST['save']) && !validate_middle_name($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                    
                                    <?php
                        if(isset($_POST['save']) && !validate_complainant($_POST)){
                    ?>
                    <?php
                        }
                    ?>

                                        <label class="control-label">Age:</label>
                                        <input name="txt_cage" class="form-control input-sm" type="number" placeholder="Complainant Age" />
                           
                        
                                        <label class="control-label">Address:</label>
                                        <input name="txt_cadd" class="form-control input-sm" type="text" placeholder="Complainant Address"/>
                                        
                                        <label class="control-label">Contact #:</label>
                                        <input name="txt_ccontact" class="form-control input-sm" type="number" placeholder="Contact #"/>

                                
                                        <label class="control-label">Complainee:</label>
                                    <input name="txt_lname" class="form-control input-sm" type="text" placeholder="Lastname"/>
                                    <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                                    <input name="txt_fname" class="form-control input-sm col-sm-4" type="text" placeholder="Firstname"/>
                                    <?php
                        if(isset($_POST['save']) && !validate_first_name($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                                    <input name="txt_mname" class="form-control input-sm col-sm-4" type="text" placeholder="Middlename"/>
                                    <?php
                        if(isset($_POST['save']) && !validate_middle_name($_POST)){
                    ?>
                    <?php
                        }
                    ?>

                                        <label class="control-label">Age:</label>
                                        <input name="txt_page" class="form-control input-sm" type="number" placeholder="Complainee Age"/>

                                        <label class="control-label">Address:</label>
                                        <input name="txt_padd" class="form-control input-sm" type="text" placeholder="Complainee Address"/>

                                        <label class="control-label">Contact #:</label>
                                        <input name="txt_pcontact" class="form-control input-sm" type="number" placeholder="Contact #"/>

                               

                                        <label class="control-label">Complaint:</label>
                                        <input name="txt_complaint" class="form-control input-sm" type="text" placeholder="Complaint"/>

                                        <label class="control-label">Action:</label>
                                        <select name="ddl_acttaken" class="form-control input-sm">
                                            <option value="1st Option">1st Option</option>
                                            <option value="2nd Option">2nd Option</option>
                                        </select>
                               

                                        <label class="control-label">Status:</label>
                                        <select name="ddl_stat" class="form-control input-sm">
                                            <option >Solved</option>
                                            <option >Unsolved</option>
                                        </select>

                                        <label class="control-label">Incidence:</label>
                                        <input name="txt_location" class="form-control input-sm" type="text" placeholder="Location of Incidence"/>
                            </div>
                        </div>
                       
                            <br>
                            <br>
                            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                            <input type="submit" class="button" value="Add Officials" name="submit" id="submit">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>