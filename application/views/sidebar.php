<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title"><i class="fa fa-thumb-tack" aria-hidden="true"></i>
Menu</li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-fw fa-search"></i> Test</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i class="fa fa-tags" aria-hidden="true"></i>   My records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i class="fa fa-tags" aria-hidden="true"></i>   Upcoming Tests</a>
                    </li>
                </ul>
            </li>
            <?php
if ($_SESSION['user_type'] == 'admin') {
    ?>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-fw fa-search"></i> Backups</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/export_feedback_pr">
                        <i class="fa fa-tags" aria-hidden="true"></i>   Practical Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/export_feedback_th">
                        <i class="fa fa-tags" aria-hidden="true"></i>   Theory Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/export_counter_th">
                        <i class="fa fa-tags" aria-hidden="true"></i>   Theory Counter Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/export_counter_pr">
                        <i class="fa fa-tags" aria-hidden="true"></i>   Practical Counter Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Ctrl_admin/export_reviews">
                        <i class="fa fa-tags" aria-hidden="true"></i>   Reviews</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-fw fa-search"></i> Add Users</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="ctrl_feedback">
                        <i class="fa fa-tags" aria-hidden="true"></i>   Faculty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ctrl_feedback_pr">
                        <i class="fa fa-tags" aria-hidden="true"></i>   Students</a>
                    </li>
                </ul>
            </li>

            <?php
}
?>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-fw fa-search"></i> Feedback</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="ctrl_feedback">
                        <i class="fa fa-tags" aria-hidden="true"></i>   Theory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ctrl_feedback_pr">
                        <i class="fa fa-tags" aria-hidden="true"></i>   Practical</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="review">
                        <i class="fa fa-tags" aria-hidden="true"></i>   Review</a>
                    </li>
                </ul>
            </li>

            <li class="divider"></li>

        </ul>
    </nav>
</div>