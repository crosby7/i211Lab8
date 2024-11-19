<?php

/*
 * Author: Millie Jones
 * Date: 11/14/24
 * Name: index.class.php
 * Description: This class extends the View class. The "display" method displays the message if reset was successful or not
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */
class ResetConfirm extends View
{

    public function display(bool $condition)
    {
        $this->header();
        if ($condition == true) {
            ?>
          <div class="top-row">Reset password</div>
            <div class="middle-row">
            <p>You have successfully reset your password.</p>
        </div>
            <div class="bottom-row">
            <span style="float: left">
                Want to log out? <a href="<?=BASE_URL?>/index.php?action=logout">Logout</a>            </span>
            <span style="float: right">Dont have an account? <a href="<?=BASE_URL?>/index.php">Register</a></span>
        </div>
<?php
        }else{
            ?>
          <div class="top-row">Reset password</div>
            <div class="middle-row">
            <p>Your last attempt to reset your password failed. Please try again.</p>
        </div>
            <div class="bottom-row">
            <span style="float: left">
                Want to reset your password? <a href=<?=BASE_URL?>"index.php?action=reset">Reset</a>            </span>
            <span style="float: right">Dont have an account? <a href=<?=BASE_URL?>"/index.php">Register</a></span>
        </div>
<?php
            $this->footer();
        }
    }
}