<?php
class Reset{
    public function display(){
        $this->View->header();
        echo '<div class="top-row">Reset password</div>';
        echo '<div class="middle-row">
            <p>Please enter a new password. Username is not changeable.</p>
            <form method="post" action="index.php?action=do_reset">
                <div><input type="text" name="username" style="width: 99%" required="" value="superman" readonly="readonly"></div>
                <div><input type="password" name="password" style="width: 99%;" required="" minlength="5" placeholder="Password, 5 characters minimum"></div>
                <div><input type="submit" class="button" value="Reset Password"></div>
            </form>
        </div>';
        echo '<div class="bottom-row">         
            <span style="float: left">Cancel password reset? <a href="index.php?action=login">Cancel Reset</a></span>
            <span style="float: right"></span>
        </div>';
        $this->View->footer();
    }
}