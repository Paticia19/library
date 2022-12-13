<div class="side-bar">
    <div class="logo-details" title="Barangay">
    <i class='bx bxs-home-alt-2'></i>
        <span class="logo-name">Baranagay Management</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="../admin/dashboard.php" class="<?php echo $dashboard; ?>" title="Dashboard">
                <i class='bx bx-grid-alt' ></i>
                <span class="links-name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="../settings/settings.php" class="<?php echo $settings; ?>" title="Barangay Information">
            <i class='bx bx-info-circle'></i>
            <span class="links-name">Baranagay Information</span>
            </a>
        </li>
        <li>
            <a href="../officials/officials.php" class="<?php echo $officials; ?>" title="Barangay Officials">
            <i class='bx bxs-user'></i>
                <span class="links-name">Baranagay Officials</span>
            </a>
        </li>
        <li>
        <a href="../residents/residents.php" class="<?php echo $residents; ?>" title="Residents">
        <i class='bx bxs-group'></i>
                <span class="links-name">Residents</span>
            </a>
        </li>
        <li>
            <a href="../blotter/blotter.php" class="<?php echo $blotter; ?>" title="Blotter Record">
            <i class='bx bx-id-card'></i>
            <span class="links-name">Blotter Record</span>
            </a>
        </li>
        <li>
            <a href="../students/students.php" class="<?php echo $students; ?>" title="Settings">
                <i class='bx bx-cog'></i>
                <span class="links-name">Settings</span>
            </a>
        </li>
        <hr class="line">
        <li id="logout-link">
            <a class="logout-link" href="../login/logout.php" title="Logout">
                <i class='bx bx-log-out'></i>
                <span class="links-name">Logout</span>
            </a>
        </li>
    </ul>
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