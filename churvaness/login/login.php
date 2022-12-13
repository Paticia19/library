<?php
    $page_title = 'Barangay - Login';

    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system
    $accounts = array(
        "user1" => array(
            "firstname" => 'Patricia',
            "lastname" => 'Sarita',
            "type" => 'admin',
            "username" => 'patty',
            "password" => 'patty'
        ),
        "user2" => array(
            "firstname" => 'Chelsea',
            "lastname" => 'Alejandro',
            "type" => 'admin',
            "username" => 'chelsea',
            "password" => 'chelsea'
        ),
        "user3" => array(
            "firstname" => 'user1',
            "lastname" => '',
            "type" => 'staff',
            "username" => 'user',
            "password" => 'user'
        ),
        "user4" => array(
            "firstname" => 'staff',
            "lastname" => '',
            "type" => 'staff',
            "username" => 'staff',
            "password" => 'staff'
        ),
        "user5" => array(
            "firstname" => 'Lucy',
            "lastname" => 'Felix',
            "type" => 'staff',
            "username" => 'lucy',
            "password" => 'lucy'
        )
    );
    if(isset($_POST['username']) && isset($_POST['password'])){
        //Sanitizing the inputs of the users. Mandatory to prevent injections!
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        foreach($accounts as $keys => $value){
            //check if the username and password match in the array
            if($username == $value['username'] && $password == $value['password']){
                //if match then save username, fullname and type as session to be reused somewhere else
                $_SESSION['logged-in'] = $value['username'];
                $_SESSION['fullname'] = $value['firstname'] . ' ' . $value['lastname'];
                $_SESSION['user_type'] = $value['type'];
                //display the appropriate dashboard page for user
                if($value['type'] == 'admin'){
                    header('location: ../admin/dashboard.php');
                }else{
                    header('location: ../faculty/faculty.php');
                }
            }
        }
        //set the error message if account is invalid
        $error = 'Invalid username/password. Try again.';
    }

    require_once '../includes/header.php';

?>

    <div class="login-container">
        <form class="login-form" action="login.php" method="post">
            <div class="logo-details">
                <span class="logo-name">Barangay Management</span>
            </div>
            <hr class="divider">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required tabindex="1">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="2">
            <input class="button" type="submit" value="Login" name="login" tabindex="3">
            <?php
                //Display the error message if there is any.
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
        </form>
        </div>
    </div>
<?php
    require_once '../includes/footer.php';
?>