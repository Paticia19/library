<?php

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
    //if the above code is false then html below will be displayed

    require_once '../tools/variables.php';
    $page_title = 'Barangay | Show Resident';
    $residents = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>


    <div class="home-content">
        <div class="table-container">
            <div class="table-heading">
                <h3 class="table-title">Residents</h3>
                <?php
                    if($_SESSION['user_type'] == 'admin'){ 
                ?>
                    <a href="addresidents.php" class="button">Manage Residents</a>
                <?php
                    }
                ?>
            </div>
            <table class="table">
            <thead>
                                            <tr>
                                                <?php 
                                                    if(!isset($_SESSION['staff']))
                                                    {
                                                ?>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                <?php
                                                    }
                                                ?>
                                                <th>Zone</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Former Address</th>
                                                <th style="width: 40px !important;">Option</th>
                                            </tr>
                                        </thead>
                <tbody>
                    <?php
                         require_once '../classes/residents.class.php';

                         $residents = new Residents();
                         //We will now fetch all the records in the array using loop
                         //use as a counter, not required but suggested for the table
                         $i = 1;
                         //loop for each record found in the array
                         $result = $residents->show();
                        // print_r($residents);
                         foreach ($result as $value){ 
                    ?>
                        <tr>
                            <!-- always use echo to output PHP values -->
                            <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'"> </td>
                            <td><?php echo $value['zone']?></td>
                            <td style="width:70px;"><image src="image/'.basename($row['image']).'" style="width:60px;height:60px;"></td>
                            <td><?php echo $value['lname'].", ".$value['fname']; ?></td>
                            <td><?php echo $value['age'] ?></td>
                            <td><?php echo $value['gender'] ?></td>
                            <td><?php echo $value['formerAddress'] ?></td>
                            <?php
                                if($_SESSION['user_type'] == 'admin'){ 
                            ?>
                                <td>
                                    <div class="action">
                                    <a class="action-edit" href="editresidents.php?id=<?php echo $value['id'] ?>"><i class='bx bx-edit'></i></a>
                                    <a class="action-delete" href="deleteresidents.php?id=<?php echo $value['id'] ?>"><i class='bx bxs-trash'></i></a>

                                    </div>
                                </td>
                            <?php
                                }
                            ?>
                        </tr>
                    <?php
                        $i++;
                    //end of loop
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>

<div id="delete-dialog" class="dialog" title="Delete Record">
    <p><span>Are you sure you want to delete the selected record?</span></p>
</div>

<script>
    $(document).ready(function() {
        $("#delete-dialog").dialog({
            resizable: false,
            draggable: false,
            height: "auto",
            width: 400,
            modal: true,
            autoOpen: false
        });
        $(".action-delete").on('click', function(e) {
            e.preventDefault();
            var theHREF = $(this).attr("href");

            $("#delete-dialog").dialog('option', 'buttons', {
                "Yes" : function() {
                    window.location.href = theHREF;
                },
                "Cancel" : function() {
                    $(this).dialog("close");
                }
            });

            $("#delete-dialog").dialog("open");
        });
    });
</script>