<?php
//Errors
$errors = [
    'username' => "",
    'email' => "",
    'password' => "",
    'conf_password' => "",
    'box' => ""
];

// if form is submitted
if(isset($_GET['submit'])) {

    //CHECKBOX
    // Verify if checkbox is checked?
    $box = filter_input(INPUT_GET, 'box', FILTER_SANITIZE_STRING);

    //check against the valid value
    if (@$_GET['box'] !== "TOS") {
        $errors['box'] = 'To join us, you need to agree to the TOS!';
    }

    //OTHER INPUTS
    foreach($_GET as $input_name => $input_value) {

        // Check if all inputs are NOT completed
        if(empty($input_value) || !isset($input_value)) {
            

            //for 2nd password input
            $name = (strtolower($input_name) === "conf_password") ?  "PASSWORD" :  strtoupper($input_name);

            // Add to errors array an error message for this input
            $errors[$input_name] = " $name is required!";
        }

        // In function of data its validity
        switch ($input_name) {
            // $input_name == username
            case "username":
                // if it contains other characters than letters
                //min 8 characters
                if (strlen($_GET['username'])<8) {
                    $errors['username'] = "Minimum 8 characters for username";
                }

                if (!preg_match('/[a-z]/i', $_GET['username'])) {
                    $errors['username'] = "Username can contain only letters";

                }

                break;
            case "email":
                //if it is not well-formed "blabla@.(thing)"
                if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Invalid email format";
                } else {
                    $errors['email'] = "";
                }
                break;
            //Password1 same as Password 2 && length password min 8 
            case 'password':
                if (strlen($_GET['password']) < 8) {
                    $errors['password'] = "Password is not enough strong";
                }

                if ($_GET['password']!==$_GET['conf_password']) {
                    $errors['password'] = "Password must be the same";
                }

                break;
            //Password1 same as Password 2 && length password min 8 
            case 'conf_password':
                if (strlen($_GET['conf_password']) < 8) {
                    $errors['conf_password'] = "Password is not enough strong";
                }
    
                if ($_GET['conf_password']!==$_GET['conf_password']) {
                    $errors['conf_password'] = "Password must be the same";
                }
    
                break;

                default:
                    break;

        }

    }

}