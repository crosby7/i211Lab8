<?php
class Index {
    public function display(){
        $this->View->header();
        echo "<form method = 'post' action='../../index.php?action=register'>";
        echo "<input type='text' name='username' style='width:99%' placeholder='Username' required>";
        echo '<input type="password" name="password" style="width: 99%" minlength="5" placeholder="Password, 5 characters minimum" required>';
        echo '<input type="email" name="email" style="width: 99%" required="" placeholder="Email">';
        echo '<input type="text" name="fname" style="width: 99%" required="" placeholder="First name">';
        echo '<input type="text" name="lname" style="width: 99%" required="" placeholder="Last name">';
        echo '<input type="submit" class="button" value="register">';
        $this->View->footer();
    }
}