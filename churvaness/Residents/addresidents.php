<?php

    require_once '../tools/functions.php';
    require_once '../classes/residents.class.php';

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

        $residents = new Residents;
        //sanitize user inputs
        $residents->zone = htmlentities($_POST['zone']);
        $residents->image = htmlentities($_POST['image']);
        $residents->cname = $_POST['cname'];
        $residents->age = $_POST['age'];
        $residents->gender = htmlentities($_POST['gender']);
        $residents->formerAddress = 'former Address';
        if(isset($_POST['Option'])){
            $residents->status = $_POST['Option'];
        }
        if(validate_add_residents($_POST)){
            if($residents->add()){
                //redirect user to residents page after saving
                header('location: residents.php');
            }
        }
    }

    require_once '../tools/variables.php';
    $page_title = 'Residents | Add residents';
    $residents = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Manage Resident</h3>
                <a class="back" href="residents.php"><i class='bx bx-caret-left'></i style="float: rigth;">Back</a>
            </div>
            <div class="add-form-container">
                <label class="control-label" id="cname">Name:</label><br>
                    <div class="col-sm-4">
                <input name="lname" id="cname" type="text" placeholder="Lastname"/>
                    </div>
                    <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                <div class="col-sm-4">
                <input name="txt_fname" id="cname" type="text" placeholder="Firstname"/>
                </div>
                <?php
                        if(isset($_POST['save']) && !validate_first_name($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                <div class="col-sm-4">
                <input name="txt_mname" id="cname"  type="text" placeholder="Middlename"/>
                    </div>
                    <?php
                        if(isset($_POST['save']) && !validate_middle_name($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                    <?php
                        if(isset($_POST['save']) && !validate_cname($_POST)){
                    ?>
                    <?php
                        }
                    ?>
            </div>
           

                                        <label class="control-label">Birthdate:</label>
                                        <input name="txt_bdate" type="date" placeholder="Birthdate"/>
                                    
                                        <label class="control-label">Age:</label>
                                        <input name="txt_age" type="number" id="age" required placeholder="Age" value="<?php if(isset($_POST['age'])) { echo $_POST['age']; } ?>">
                                        <?php
                        if(isset($_POST['save']) && !validate_age($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                                        <label class="control-label">Barangay:</label>
                                        <input name="txt_brgy" class="form-control input-sm input-size" type="text" placeholder="Barangay"/>

                                        <label class="control-label">Household #:</label>
                                        <input name="txt_householdnum" class="form-control input-sm input-size" type="number" min="1" placeholder="Household #"/>

                                        <label class="control-label">Differently-abled Person:</label>
                                        <input name="txt_dperson" class="form-control input-sm input-size" type="text" placeholder="Differently-abled Person"/>

                                        <label class="control-label">Blood Type:</label>
                                        <input name="txt_btype" class="form-control input-sm input-size" type="text" placeholder="Blood Type"/>

                                        <label class="control-label">Civil Status:</label>
                                        <input name="txt_cstatus" class="form-control input-sm input-size" type="text" placeholder="Civil Status"/>



                                        <label class="control-label">Religion:</label>
                                        <input name="txt_religion" class="form-control input-sm input-size" type="text" placeholder="Religion"/>


                                        <label class="control-label">Educational Attainment:</label>
                                        <select name="ddl_eattain" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-- Select -- </option>
                                            <option>No schooling completed</option>
                                            <option>Elementary</option>
                                            <option>High school, undergrad</option>
                                            <option>High school graduate</option>
                                            <option>College, undergrad</option>
                                            <option>Vocational</option>
                                            <option>Bachelor’s degree</option>
                                            <option>Master’s degree</option>
                                            <option>Doctorate degree</option>
                                        </select>

                                        <label class="control-label">Land Ownership Status:</label>
                                        <select name="ddl_los" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-- Select -- </option>
                                            <option>Owned</option>
                                            <option>Landless</option>
                                            <option>Tenant</option>
                                            <option>Care Taker</option>
                                        </select>





                                    

                                    
                                        <label class="control-label">Gender:</label>                                  
                                        <select name="ddl_gender" class="form-control input-sm">
                                            <option selected="" disabled="">-Select Gender-</option>
                                            <option value="Male" <?php if(isset($_POST['gender'])) { if ($_POST['gender'] == 'Male') echo ' selected="selected"'; } ?>>Male</option>
                                            <option value="Female" <?php if(isset($_POST['gender'])) { if ($_POST['gender'] == 'Female') echo ' selected="selected"'; } ?>>Female</option>
                                        </select>
                                        <?php
                        if(isset($_POST['save']) && !validate_gender($_POST)){
                    ?>
                    <?php
                        }
                    ?>

                                        <label class="control-label">Birthplace:</label>
                                        <input name="txt_bplace" class="form-control input-sm" type="text" placeholder="Birthplace"/>


                                        <label class="control-label">Zone #:</label>
                                        <input name="txt_zone" class="form-control input-sm" type="text"  id="zone" required placeholder="Zone #" value="<?php if(isset($_POST['zone'])) { echo $_POST['zone']; } ?>">
                                        <?php
                        if(isset($_POST['save']) && !validate_zone($_POST)){
                    ?>
                    <?php
                        }
                    ?>



                                        <label class="control-label">Occupation:</label>
                                        <input name="txt_occp" class="form-control input-sm" type="text" placeholder="Occupation"/>

                                        <label class="control-label">Monthly Income:</label>
                                        <input name="txt_income" class="form-control input-sm" type="number" min="1" placeholder="Monthly Income"/>

                                        <label class="control-label">Nationality:</label>
                                        <input name="txt_national" class="form-control input-sm" type="text" placeholder="Nationality"/>


                                        <label class="control-label">PhilHealth #:</label>
                                        <input name="txt_phno" class="form-control input-sm" type="number" max="999999999999" min="1" placeholder="eg. 010000000001"/>

                                        <label class="control-label">House Ownership Status:</label>
                                        <select name="ddl_hos" class="form-control input-sm">
                                        <option selected="" disabled="">-- Select -- </option>
                                            <option value="Own Home">Own Home</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Live with Parents/Relatives">Live with Parents/Relatives</option>
                                        </select>



                                        <label class="control-label">Former Address:</label>
                                        <input name="txt_faddress" type="text" id="formerAddress" required placeholder="Former Address" value="<?php if(isset($_POST['formerAddress'])) { echo $_POST['formerAddress']; } ?>">
                                        <?php
                        if(isset($_POST['save']) && !validate_formerAddress($_POST)){
                    ?>
                    <?php
                        }
                    ?>
                                 
                                        <label class="control-label">Image:</label>
                                        <input name="txt_image" type="file"  id="image" value="<?php if(isset($_POST['image'])) { echo $_POST['image']; } ?>" >
                                        <?php
                        if(isset($_POST['save']) && !validate_image($_POST)){
                    ?>
                    <?php
                        }
                    ?>


                        <input type="submit" class="button" value="Add Residents" name="save" id="save">
                    </div>
                </div>
              </div>
              </form>
            </div>
                   
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>