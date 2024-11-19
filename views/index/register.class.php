<?php

/*
 * Author: Millie Jones
 * Date: 11/14/24
 * Name: index.class.php
 * Description: This class extends the View class. The "display" method displays the confirmation message when the registration form has been submitted
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */

class Register extends View
{
    //display function
    public function display(bool $condition): void
    {
        //call and display header
        $this->header();
        //message if account was successful
        if ($condition == true) {
            ?>
            <div class="top-row">CREATE AN ACCOUNT</div>
            <div class="middle-row">
                <p>Your account has been successfully created.</p>
            </div>
            <div class="bottom-row">
                <span style="float: left">Already have an account? <a
                            href="<?= BASE_URL ?>/index.php?action=login">Login</a></span>
                <span style="float: right"></span>
            </div>
            <?php
        } //message if account creation failed
        else {
            ?>
            <div class="top-row">CREATE AN ACCOUNT</div>
            <div class="middle-row">
                <p>Your account was not successfully created. Please try again.</p>
            </div>
            <div class="bottom-row">
                <span style="float: left">Register for an account <a href="<?= BASE_URL ?>/index.php?action=register">Register</a></span>
                <span style="float: right"></span>
            </div>

            <?php
            //display footer
            $this->footer();
        }
    }
}