<?php
class Login {
    public function display(){
        $this->View->header();
        echo '<div class="top-row">Login</div>';
        echo '<div class="middle-row">
            <p>Please enter your username and password.</p>
            <form method="post" action="index.php?action=verify">
                <div><input type="text" name="username" style="width: 99%" required="" placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%" required="" placeholder="Password"></div>
                <div><input type="submit" class="button" value="Login"></div>
            </form>
        </div>';
        echo '<div class="bottom-row">
            <span style="float: left">Dont have an account? <a href="index.php?action=index">Register</a></span>
            <span style="float: right"></span>
        </div>';
        echo '<span style="float: right"></span>';
      
    }
}