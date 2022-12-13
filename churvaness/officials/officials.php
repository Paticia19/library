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
    $page_title = 'Baranagay | Show Officials';
    $officials = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>
 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Barangay Officials
                    </h1>
                    
                </section>

         <div class="home-content">
        <div class="table-container">
            <div class="table-heading">
                <h3 class="table-title">List of Officials</h3>
                <?php
                    if($_SESSION['user_type'] == 'admin'){ 
                ?>
                    <a href="addofficials.php" class="button">Manage Officials</a>
                <?php
                    }
                ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th>Position</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Start of Term</th>
                    <th>End of Term</th>
                    <th style="width: 130px !important;">Status</th>
                        <?php
                            if($_SESSION['user_type'] == 'admin'){ 
                        ?>
                        <th class="action">Option</th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                <?php
                        require_once '../classes/officials.class.php';

                        $officials = new Officials();
                        //We will now fetch all the records in the array using loop
                        //use as a counter, not required but suggested for the table
                        $i = 1;
                        $result = $officials->show();
                        //loop for each record found in the array
                        foreach ($result as $value){ //start of loop
                    ?>
                        <tr>
                            <!-- always use echo to output PHP values -->
                            <td><?php echo $value['sPosition'] ?></td>
                            <td><?php echo $value['completeName'] ?></td>
                            <td><?php echo $value['pcontact'] ?></td>
                            <td><?php echo $value['paddress'] ?></td>
                            <td><?php echo $value['termStart'] ?></td>
                            <td><?php echo $value['termEnd'] ?></td>
                            <td><?php echo $value['status'] ?></td>
                            <?php
                                if($_SESSION['user_type'] == 'admin'){ 
                            ?>  
                             <td>
                                    <div class="action">
                                        <a class="action-edit" href="editofficials.php?id=<?php echo $value['id'] ?>"><i class='bx bx-edit'></i></a>
                                        <a class="action-delete" href="deleteofficials.php?id=<?php echo $value['id'] ?>"><i class='bx bxs-trash'></i></a>
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