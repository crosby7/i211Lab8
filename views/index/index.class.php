<?php

/*
 * Author: Millie Jones
 * Date: 11/14/24
 * Name: index.class.php
 * Description: This class extends the View class. The "display" method displays the registration form
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */

class Index extends View
{

    //display method
    public function display(): void
    {
        //call the header
        $this->header();
        ?>
        <div class="top-row">CREATE AN ACCOUNT</div>
        <div class="middle-row">
            <p>Please complete the entire form. All fields are required.</p>
            <form method="post" action="<?= BASE_URL?>/index.php?action=register">
                <div><input type="text" name="username" style="width: 99%" required="" placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%" required="" minlength="5"
                            placeholder="Password, 5 characters minimum"></div>
                <div><input type="email" name="email" style="width: 99%" required="" placeholder="Email"></div>
                <div><input type="text" name="fname" style="width: 99%" required="" placeholder="First name"></div>
                <div><input type="text" name="lname" style="width: 99%" required="" placeholder="Last name"></div>
                <div><input type="submit" class="button" value="register"></div>
            </form>
        </div>
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/index.php?action=login">Login</a></span>
            <span style="float: right"></span>
        </div>
        <?php
        //display the footer
        $this->footer();
    }
}