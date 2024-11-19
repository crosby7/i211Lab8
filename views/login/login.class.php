<?php
/*
 * Author: Millie Jones
 * Date: 11/14/24
 * Name: index.class.php
 * Description: This class extends the View class. The "display" method displays the form to enter username and password to login
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */
class Login extends View{
    //function to display login form
    public function display(){
        //call the header
        $this->header(); ?>
        <div class="top-row">Login</div>
        <div class="middle-row">
            <p>Please enter your username and password.</p>
            <form method="post" action="<?=BASE_URL?>/index.php?action=verify">
                <div><input type="text" name="username" style="width: 99%" required="" placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%" required="" placeholder="Password"></div>
                <div><input type="submit" class="button" value="Login"></div>
            </form>
        </div>
        <div class="bottom-row">
            <span style="float: left">Dont have an account? <a href="<?=BASE_URL?>/index.php?action=index">Register</a></span>
            <span style="float: right"></span>
        </div>
        <?php //call the footer
        $this->footer();
    }
}