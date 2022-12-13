<?php

    require_once '../tools/functions.php';
    require_once '../classes/settings.class.php';

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
    $settings = new Settings;
    //if add faculty is submitted
    if(isset($_POST['save'])){
        //sanitize user inputs
        $settings->id = $_POST['residents-id'];
        $settings->code = htmlentities($_POST['code']);
        $settings->old_code = htmlentities($_POST['old-code']);
        $settings->description = htmlentities($_POST['description']);
        $settings->years = $_POST['years'];
        $settings->level = $_POST['level'];
        $settings->cet = htmlentities($_POST['cet']);
        $settings->status = 'Not Set';
        if(isset($_POST['status'])){
            $settings->status = $_POST['status'];
        }
        if(validate_add_program($_POST)){
            if($settings->edit()){
                //redirect user to program page after saving
                header('location: residents.php');
            }
        }
    }else{
        if ($settings->fetch($_GET['id'])){
            $data = $settings->fetch($_GET['id']);
            $settings->id = $data['id'];
            $settings->province = $data['province'];
            $settings->brgy = $data['brgy'];
            $settings->town = $data['town'];
            $settings->number = $data['number'];
            $settings->db_txt = $data['db_txt'];
            $settings->city_logo = $data['city_logo'];
            $settings->brgy_logo = $data['brgy_logo'];
            $settings->db_image = $data['db_image'];

        }
    }

    require_once '../tools/variables.php';
    $page_title = 'Barangay | Update Residents';
    $settings = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Update Program</h3>
                <a class="back" href="residents.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="editresidents.php" method="post">
                    <input type="text" hidden name="program-id" value="<?php echo $program->id; ?>">
                    <input type="text" hidden name="old-code" value="<?php echo $program->old_code; ?>">
                    <label for="code">Program Code</label>
                    <input type="text" id="code" name="code" required placeholder="Enter Program Code" value="<?php if(isset($_POST['code'])) { echo $_POST['code']; } else { echo $program->code; }?>">
                    <?php
                        if(isset($_POST['save']) && !validate_program_code($_POST)){
                    ?>
                                <p class="error">Program Code is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                        else if(isset($_POST['save']) && !validate_program_code_duplicate($_POST)){
                    ?>
                                <p class="error">Program Code already exist.</p>
                    <?php
                        }
                    ?>
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" required placeholder="Enter Program Description" value="<?php if(isset($_POST['description'])) { echo $_POST['description']; } else { echo $program->description; }?>">
                    <?php
                        if(isset($_POST['save']) && !validate_program_desc($_POST)){
                    ?>
                                <p class="error">Program description is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="years">Years to Complete</label>
                    <input type="number" id="years" min="1" max="5" name="years" required value="<?php if(isset($_POST['years'])) { echo $_POST['years']; } else { echo $program->years; }?>">
                    
                    <label for="level">Level</label>
                    <select name="level" id="level">
                        <option value="None" <?php if(isset($_POST['level'])) { if ($_POST['level'] == 'None') echo ' selected="selected"'; } elseif ($program->level == 'None') echo ' selected="selected"'; ?>>--Select--</option>
                        <option value="Diploma" <?php if(isset($_POST['level'])) { if ($_POST['level'] == 'Diploma') echo ' selected="selected"'; } elseif ($program->level == 'Diploma') echo ' selected="selected"'; ?>>Diploma</option>
                        <option value="Associate" <?php if(isset($_POST['level'])) { if ($_POST['level'] == 'Associate') echo ' selected="selected"'; } elseif ($program->level == 'Associate') echo ' selected="selected"'; ?>>Associate</option>
                        <option value="Bachelor" <?php if(isset($_POST['level'])) { if ($_POST['level'] == 'Bachelor') echo ' selected="selected"'; } elseif ($program->level == 'Bachelor') echo ' selected="selected"'; ?>>Bachelor</option>
                        <option value="Masteral" <?php if(isset($_POST['level'])) { if ($_POST['level'] == 'Masteral') echo ' selected="selected"'; } elseif ($program->level == 'Masteral') echo ' selected="selected"'; ?>>Masteral</option>
                        <option value="Doctorate" <?php if(isset($_POST['level'])) { if ($_POST['level'] == 'Doctorate') echo ' selected="selected"'; } elseif ($program->level == 'Doctorate') echo ' selected="selected"'; ?>>Doctorate</option>
                    </select>
                    <?php
                        if(isset($_POST['save']) && !validate_level($_POST)){
                    ?>
                                <p class="error">Please select a program level from the dropdown.</p>
                    <?php
                        }
                    ?>
                    <label for="cet">CET Requirements</label>
                    <input type="text" id="cet" step="any" name="cet" required value="<?php if(isset($_POST['cet'])) { echo $_POST['cet']; } else { echo $program->cet; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_cet($_POST)){
                    ?>
                                <p class="error">Please input CET >= 55.</p>
                    <?php
                        }
                    ?>

                    <div>
                        <label for="status">Status</label><br>
                        <label class="container" for="Offering">Offering
                            <input type="radio" name="status" id="Offering" value="Offering" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Offering') echo ' checked'; } elseif ($program->status == 'Offering') echo ' checked'; ?>>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container" for="Phase-Out">Phase-Out
                            <input type="radio" name="status" id="Phase-Out" value="Phase-Out" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Phase-Out') echo ' checked'; } elseif ($program->status == 'Phase-Out') echo ' checked'; ?>>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <?php
                        if(isset($_POST['save']) && !validate_status($_POST)){
                    ?>
                                <p class="error">Please select program status.</p>
                    <?php
                        }
                    ?>
                    <input type="submit" class="button" value="Save Program" name="save" id="save">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>