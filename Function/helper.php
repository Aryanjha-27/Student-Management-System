<?php
function is_logged_in()
{
    return isset($_SESSION['User_name']);
}
function is_admin()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === '0';
}
function is_user()
{
    return isset($_SESSION['role']) && $_SESSION['role'] === '1';
}
function render_default_template($contents)
{
    include('./templates/head.php');
    echo '<div class="app-wrapper">';
    include('./templates/navbar.php');
    include('./templates/sidebar.php');
    include $contents;
    include('./templates/footer.php');
    echo '</div>';
    include('./templates/foot.php');
}
