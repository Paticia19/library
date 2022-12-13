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
    $page_title = 'Barangay | Show Barangay Information';
    $settings = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>
 
    <!Doctype>
    <html style="background: url(Picture/bg.png); background-repeat: no-repeat; background-size:cover; ">
<link rel="shortcut icon" href="Icon/Indang logo.png" />

<link href="Resident_Profiling/css/bootstrap.min.css" rel="stylesheet">
<link href="Resident_Profiling/vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" type="text/css" href="Css/homepage.css"> -->
<style type="text/css">
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 800px !important;
      min-height: 400px;
      margin: auto;
      text-align: center;
      font-family: arial;
      background-color: white;
    }
    .card:hover{
      border: solid 1px;
      background-color: #e9e9e9;
    }
    
    .title {
      color: grey;
      font-size: 18px;
    }
    
   
</style>

<body style="
     background-color: transparent !important;">



    <div class="container" style="padding-top: 5em; padding-left: 15%;">


        <div class="col-sm-3 card ">
        <div class="col-sm-1"></div>
        <div class="card col-sm-3">
            <div style="padding:5px;">
                <img src="zcseal.png" alt="Chelsea" style="width:50% ">
            </div>
            <h4>Zamboanga City</h4>
            <p>REGION : IX </P>
        </div>
    <!-- Modal -->
    <div id="bmis" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <br>
                    <br>
                    <br>
                    
                </div>
                <div class="modal-body">
                    <center>
                        <h1>
                            <font size="8" color="green">
                                <B>Barangay Management Information System</b> </font>
                                
                        </h1>
                    </center>
                    <br>
                    <div>
                        <p><img src="zcseal.png" align="left" width="100" style="border:1px solid;"> &emsp; The Barangay Management Information System is a computerized information-processing system designed to support the activities, manages files and documents of company or organization.It
                            can provide up to date information of the residents with relatively little effort on the part of the user of the system and put a huge amount of information within convenient and comfortable read. Not mentioning the security
                            and integrity of the document, it also provides.
                            <Br><br>&emsp; The barangay officials will no longer have a hard time when it comes to organizing the data needed by the residents. it will help the barangay to solve the difficulty in retrieving large volume of residents information.
                            It makes things more convenient for the residents and reduces the number of visits in the barangay. &emsp; What will the BMIS achieve? To Address barangay efficiency issues and have a Satisfied or happier residents of the barangay.
                        </p>



                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>

        </div>
    </div>
</div>
    <!-- Modal -->
    <div id="mv" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="col-sm-3 card ">
                
            <div class="modal-content">
                <div class="modal-header">
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
                <div class="modal-body">
                    <center>
                        <h1>
                            <font size="5" color="green"> <b>Mission and Vision</b></font>
                        </h1>
                        <h1>
                            <font size="5" color="green"><b>Mission</b></font>
                        </h1>
                        <p> To effectively and efficiently realize its vision by selflessly serving barangay constituents, as well as tribal and Muslim communities congruent 
                            to the principle and plans of the City’s chief executive.</p>

                        <h1>
                            <font size="5" color="green"><b>Vision</b></font>
                        </h1>
                        <p> Envisioned as the lead division of the City Mayor’s Office to serve as pipeline to executive instruction, programs and projects of the City’s chief executive designed 
                            to promote the welfare of all the component barangays, the tribal minorities and muslim communities, managed by responsible leader and empowered personnel and dedicated to sustain barangay, tribal and Muslim communities growth & development.</p>
                    </center>
                </div>
            </div>

        </div>
    </div>
</div>
    <!-- Modal -->
    <div id="inprofile" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="col-sm-3 card ">
            <div class="modal-content">
                <div class="modal-header">
                    <br>
                    <br>
                    <center>
                    <h4 class="modal-title" >Zamboanga City Profile</h4>
</center>
                </div>
                <div class="modal-body">
                    <center>
                    <h1>
                        <font size="5" color="green">
                            <B>Fact and Figures</b> </font>
                    </h1>
</center>
                    <center>
                        <img src="zcpic.jpg" align="" width="300" style="border:1px solid;"></center>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <B>REGION</b> :</td>
                            <td>IX</td>
                        </tr>
                        <tr>
                            <td>
                                <B>PROVINCE</b> :</td>
                            <td>ZAMBOANGA DEL SUR</td>
                        </tr>

                        <tr>
                            <td>
                                <B>Income Class</b> :</td>
                            <td>1st Class</td>
                        </tr>

                        <tr>
                            <td>
                                <B>Meaning of its name </b> :</td>
                            <td>Indan tree or Anubing Established in 1655 under Juan Dimabiling</td>
                        </tr>

                        <tr>
                            <td>
                                <B>Land Area</b> :</td>
                            <td>8,920 hectares (89.20 sq.km.) </td>
                        </tr>

                        <tr>
                            <td>
                                <B>Number of Barangay</b> :</td>
                            <td> 98 barangays</td>
                        </tr>

                        <tr>
                            <td>
                                <B>Number of Bridge</b> :</td>
                            <td>51 bridges</td>
                        </tr>

                        <tr>
                            <td>
                                <B>Major Rivers </b> :</td>
                            <td>Six (6) with 88 natural springs</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>


    <script src="Resident_Profiling/jquery/jquery-3.3.1.min.js"></script>
    <script src="Resident_Profiling/js/bootstrap.min.js"></script>
    <script src="Resident_Profiling/vendor/js/jquery.dataTables.min.js"></script>
    <script src="Resident_Profiling/vendor/js/dataTables.bootstrap.min.js"></script>
</body>

</html>