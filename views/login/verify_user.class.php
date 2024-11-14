<?php
class VerifyUser {
    public function display(bool$condition){
            if($condition == true){
                echo '<div class="top-row">Login</div>';
                echo '<div class="middle-row">
            <p>You have successfully logged in.</p>
        </div>';
                echo '<div class="bottom-row">
            <span style="float: left">
                Want to log out? <a href="index.php?action=logout">Logout</a>            </span>
            <span style="float: right">Reset password? <a href="index.php?action=reset">Reset</a></span>
        </div>';}
                else{
                    echo '<div class="top-row">Login</div>';
                    echo '<div class="middle-row">
            <p>Your last attempt to login failed. Please try again.</p>
        </div>';
                    echo '<div class="bottom-row">
            <span style="float: left">
                Already have an account? <a href="index.php?action=login">Login</a>            </span>
            <span style="float: right">Reset password? <a href="index.php?action=reset">Reset</a></span>
        </div>';}}}