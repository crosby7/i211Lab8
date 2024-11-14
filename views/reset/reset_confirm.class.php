<?php
class ResetConfirm
{
    public function display(bool $condition)
    {
        if ($condition == true) {
            echo '<div class="top-row">Reset password</div>';
            echo '<div class="middle-row">
            <p>You have successfully reset your password.</p>
        </div>';
            echo '<div class="bottom-row">         
            <span style="float: left">
                Want to log out? <a href="index.php?action=logout">Logout</a>            </span>
            <span style="float: right">Dont have an account? <a href="index.php">Register</a></span>
        </div>';
        }else{
            echo '<div class="top-row">Reset password</div>';
            echo '<div class="middle-row">
            <p>Your last attempt to reset your password failed. Please try again.</p>
        </div>';
            echo '<div class="bottom-row">         
            <span style="float: left">
                Want to reset your password? <a href="index.php?action=reset">Reset</a>            </span>
            <span style="float: right">Dont have an account? <a href="index.php">Register</a></span>
        </div>';
        }
    }
}