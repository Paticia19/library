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
    $page_title = 'Barangay | Show Blotter Record';
    $blotter = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading">
                <h3 class="table-title">Blotter List</h3>
                <?php
                    if($_SESSION['user_type'] == 'admin'){ 
                ?>
                    <a href="addblotter.php" class="button">Manage Record</a>
                <?php
                    }
                ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th>Date Recorded</th>
                    <th>Complainant</th>
                    <th>Person To Complain</th>
                    <th>Complaint</th>
                    <th>Action Taken</th>
                    <th>Status</th>
                    <th>Location of Incidence</th>
                        <?php
                            if($_SESSION['user_type'] == 'admin'){ 
                        ?>

                        <?php
                            }
                        ?>
                    </tr>
                    </thead>
                
                
                <tbody>
                    <?php
                        require_once '../classes/blotter.class.php';

                        $blotter = new Blotter();
                        //We will now fetch all the records in the array using loop
                        //use as a counter, not required but suggested for the table
                        $i = 1;
                        $result = $blotter->show();
                       //loop for each record found in the array
                       //loop for each record found in the array
                       foreach ($result as $value){

                    ?>
                        <tr>
                            <!-- always use echo to output PHP values -->
                            <td><?php echo $value['dateRecorded'] ?></td>
                            <td><?php echo $value['complainant'] ?></td>
                            <td><?php echo $value['rname'] ?></td>
                            <td><?php echo $value['complaint'] ?></td>
                            <td><?php echo $value['actionTaken'] ?></td>
                            <td><?php echo $value['sStatus'] ?></td>
                            <td><?php echo $value['locationOfIncidence'] ?></td>

                            <?php
                                if($_SESSION['user_type'] == 'admin'){ 
                            ?>
                                <td>
                                    <div class="action">
                                        <a class="action-edit" href="editblotter.php?id=<?php echo $value['id'] ?>"><i class='bx bx-edit'></i></a>
                                        <a class="action-delete" href="deleteblotter.php?id=<?php echo $value['id'] ?>"><i class='bx bxs-trash'></i></a>
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

<div id="delete-dialog" class="dialog" title="Delete blotter">
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