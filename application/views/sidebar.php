<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Menu</li>
            <?php
            if ($_SESSION['user_type'] == 'student') {
    ?>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-star" aria-hidden="true"></i>
 &nbsp;&nbsp; Test</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            My records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Upcoming Tests</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php
if ($_SESSION['user_type'] == 'admin') {
    ?>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-envelope" aria-hidden="true"></i>
 &nbsp;&nbsp; Backups</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/export_feedback_pr">
                            Practical Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/export_feedback_th">
                            Theory Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/export_counter_th">
                            Theory Counter Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/export_counter_pr">
                            Practical Counter Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/export_reviews">
                            Reviews</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-user" aria-hidden="true"></i>
 &nbsp;&nbsp; Add Users</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/add_admin">
                            Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/add_faculty">
                            Faculty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/add_students">
                            Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/loadTTMatrixPage">
                            Load Matrix</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-tags" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Load Matrix</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Timetable">
                            Update Load Matrix</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/renderAttendance">
                
                <i class="fa fa-star" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Attendance</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/table">
                <i class="fa fa-commenting mr-3"></i>Class Wise</a>
            </li>
<?php 
}
?>
<?php
            if ($_SESSION['user_type'] == 'student') {
    ?>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="fa fa-commenting"></i> &nbsp;&nbsp; Feedback</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="ctrl_feedback">
                            Theory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ctrl_feedback_pr">
                            Practical</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="review">
                            Review</a>
                    </li>
                </ul>
            </li>
            <?php } ?>

            <?php
            if ($_SESSION['user_type'] == 'faculty') {
    ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_faculty_chart/load_page_th/<?php echo $_SESSION['user_id']; ?>">
                    Theory Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_faculty_chart/load_page_pr/<?php echo $_SESSION['user_id']; ?>">
                    Practical Feedback</a>
                </li>
            <?php } ?>
                <li class="nav-item">
                    <!-- <i class="fa fa-sign-out-alt" aria-hidden="true"></i> -->
                    <a class="nav-link" href="<?=base_url();?>index.php/Ctrl_feedback/logout">
                    Logout</a>
                </li>
            

            <li class="divider"></li>

        </ul>
    </nav>
</div>