<?php
class Logout {
    public function display()
    {
        $this->View->header();
        echo '<div class="top-row">Login</div>';
        echo '<div class="middle-row">
            <p>You have successfully logged out.</p>
        </div>';
        echo '<div class="bottom-row">
                 <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
                <span style="float: right">Dont have an account? <a href="index.php">Register</a></span>
        </div>';
        $this->View->footer();
    }}
