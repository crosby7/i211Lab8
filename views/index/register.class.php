<?php
class Register{
    public  function display(bool$condition){
        if($condition == true){
           echo '<div class="top-row">CREATE AN ACCOUNT</div>';
           echo '<div class="middle-row">
            <p>Your account has been successfully created.</p>
        </div>';
           echo '<div class="bottom-row">         
            <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            <span style="float: right"></span>
        </div>';
        }
        else{
            echo '<div class="top-row">CREATE AN ACCOUNT</div>';
            echo '<div class="middle-row">
            <p>Your account was not successfully created. Please try again.</p>
        </div>';
            echo '<div class="bottom-row">         
            <span style="float: left">Register for an account <a href="index.php?action=register">Register</a></span>
            <span style="float: right"></span>
        </div>';
        }
    }
}