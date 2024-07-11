<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Array
    // (
    //     [email] => asgdgdhf
    //     [Password] => gdfgd
    // )


    echo "the email address:";
    echo $_POST["email"];
    echo "<br>";
    echo " and the password:";
    echo $_POST["Password"];
    echo " has been saved succefully ";
}
