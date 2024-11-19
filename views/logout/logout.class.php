<?php

/*
 * Author: Millie Jones
 * Date: 11/14/24
 * Name: index.class.php
 * Description: This class extends the View class. The "display" method displays the message if log out was successful
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */
class Logout extends View{
    //function to display confirmation message for logout
    public function display()
    {
        //display the header
        $this->header();?>
<div class="top-row">Login</div>
<div class="middle-row">
    <p>You have successfully logged out.</p>
        </div>
        <div class="bottom-row">
                 <span style="float: left">Already have an account? <a href="<?=BASE_URL?>/index.php?action=login">Login</a></span>
                <span style="float: right">Dont have an account? <a href="<?=BASE_URL?>/index.php">Register</a></span>
        </div>
<?php
        //display the footer
        $this->footer();
    }}
