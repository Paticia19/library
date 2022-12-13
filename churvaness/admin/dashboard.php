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
    $page_title = 'Barangay | Dashboard';
    $dashboard = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>
    
    
    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                <div class="number">11</div>
                    <div class="box-topic">Total Residents</div>
                    <div class="indicator">
                        
                    </div>
                </div>
                <i class='bx bxs-group cart'></i>
            </div>

            <div class="box">
                <div class="right-side">
                <div class="number">2</div>
                    <div class="box-topic">Total Blotter</div>
                    <div class="indicator">
                        
                    </div>
                </div>
                <i class='bx bxs-user-account cart two'></i>
            </div>

            <div class="box">
                <div class="right-side">
                <div class="number">7</div>
                    <div class="box-topic">Certificate</div>
                    <div class="indicator">
                    </div>
                </div>
                <i class='bx bx-id-card cart cart three'></i>
            </div>

            <div class="box">
                <div class="right-side">
                <div class="number">6</div>
                    <div class="box-topic">Barangay Officials</div>
                    <div class="indicator">
                        
                    </div>
                </div>
                <i class='bx bxs-user-detail cart four'></i>
            </div>
        </div>

    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>