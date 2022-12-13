<section class="home-section">
    <nav>
        <div class="side-bar-button">
            <i class='bx bx-menu small'></i>
            <i class='bx bx-menu large'></i>
</div>
        <div class="profile-details">
            <i class='bx bx-user-circle'></i>
            <!-- each time you need to output in PHP, use echo -->
            <!-- the $_SESSION['fullname'] is set in login page -->
            <!-- session variables can be accessed anywhere in the page -->
            <span class="admin-name"><?php echo $_SESSION['fullname']; ?></span>
            <br>
            <br>

            <a class="logout-link" href="../login/logout.php" title="Logout">
            <span type="button" class="links-name"><i class='bx bx-log-out' color="green"></i></span>
            </a>
        </div>
            
       

           
</div>

<div id="logout-dialog" class="dialog" title="Logout">
    <p><span>Are you sure you want to logout?</span></p>
</div>

<script>
    $(document).ready(function() {
        $("#logout-dialog").dialog({
            resizable: false,
            draggable: false,
            height: "auto",
            width: 400,
            modal: true,
            autoOpen: false
        });
        $(".logout-link").on('click', function(e) {
            e.preventDefault();
            var theHREF = $(this).attr("href");

            $("#logout-dialog").dialog('option', 'buttons', {
                "Yes" : function() {
                    window.location.href = theHREF;
                },
                "No" : function() {
                    $(this).dialog("close");
                }
            });

            $("#logout-dialog").dialog("open");
        });
    });
</script>
    </nav>


    <script>
        var reference = (function self(){
            if(sessionStorage.getItem("sidebar") == "small"){
                small();
            }else{
                large();
            }
        }());

        $('.bx-menu.small').on('click', function(){
            small();
        });
        $('.bx-menu.large').on('click', function(){
            large();
        });

        function small(){
            $('.bx-menu.small').hide();
            $('.bx-menu.large').show();

            $('.side-bar').css('width', '60px');
            $('.home-section').css('width', 'calc(100% - 60px)');
            $('.home-section').css('left', '60px');
            $('.home-section nav').css('width', 'calc(100% - 60px)');
            $('.home-section nav').css('left', '60px');

            sessionStorage.setItem("sidebar", "small");
        }

        function large(){
            $('.bx-menu.small').show();
            $('.bx-menu.large').hide();

            $('.side-bar').css('width', '250px');
            $('.home-section').css('width', 'calc(100% - 250px)');
            $('.home-section').css('left', '250px');
            $('.home-section nav').css('width', 'calc(100% - 250px)');
            $('.home-section nav').css('left', '250px');

            sessionStorage.setItem("sidebar", "large");
        }
    </script>