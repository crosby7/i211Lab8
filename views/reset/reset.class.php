<?php

/*
 * Author: Millie Jones
 * Date: 11/14/24
 * Name: index.class.php
 * Description: This class extends the View class. The "display" method displays the form to reset password
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */
class Reset extends View{
    public function display(){
        //display the header
        $this->header();
        ?>
       <div class="top-row">Reset password</div>
        <div class="middle-row">
            <p>Please enter a new password. Username is not changeable.</p>
            <form method="post" action="<?=BASE_URL?>/index.php?action=do_reset">
                <div><input type="text" name="username" style="width: 99%" required="" value="<?= $_SESSION['username'] ?>" readonly="readonly"></div>
                <div><input type="password" name="password" style="width: 99%;" required="" minlength="5" placeholder="Password, 5 characters minimum"></div>
                <div><input type="submit" class="button" value="Reset Password"></div>
            </form>
        </div>
        <div class="bottom-row">
            <span style="float: left">Cancel password reset? <a href="<?=BASE_URL?>/index.php?action=login">Cancel Reset</a></span>
            <span style="float: right"></span>
        </div>
<?php
        //display footer
        $this->footer();
    }
}