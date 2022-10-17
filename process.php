<?php
// No errors at the beginning
$errors = [
    'username' => "",
    'email' => "",
    'password' => "",
    'conf_password' => "",
    'tos' => ""
];

$TOS = $_POST['tos'] ?? '';

// When user send with POST method the datas
if(isset($_POST) && !empty($_POST)) {

    // Verify field by field
    checkUsername();
    checkEmail();
    checkPasswords();


    if (!$TOS) {
        $errors['tos'] = 'To join us, you need to agree to the TOS!'; 
    }


    correctInputs();
}

// -- USEFUL FUNCTIONS
function checkUsername() {

    global $errors, $memberName;

    $username = $_POST['username'];
    $USERNAME_LENGTH = strlen($username);
    $usernameRegex = '/^[a-z0-9]*$/i';
    $invalidUsername = !preg_match($usernameRegex, $username);


    if(!$username) {
        $errors['username'] = 'Please, add an USERNAME';
        return;
    }

    if ($USERNAME_LENGTH < 8) {
        $errors['username'] = 'Minimum 8 characters for USERNAME'; 
        return;
    }

    if ($invalidUsername) {
        $errors['username'] = 'Only letters and numbers for USERNAME';
        return;
    }
}

function checkEmail() {

    global $errors;

    $email = $_POST['email'];
    $invalidEmailFormat = !filter_var($email, FILTER_VALIDATE_EMAIL);

    if(!$email) {
        $errors['email'] = 'Please, add an EMAIL';
        return;
    }

    if ($invalidEmailFormat) { 
        $errors['email'] = 'Invalid EMAIL format';
        return;
    }
}

function checkPasswords() {

    global $errors;

    $password1 = $_POST['password'];
    $password2 = $_POST['conf_password'];
    $PASSWORD1_LENGTH = strlen($password1);
 
    if (!$password1) {
        $errors['password'] = 'Please, add a PASSWORD';
        return;
    }

    if ($PASSWORD1_LENGTH < 8) {
        $errors['password'] = "PASSWORD not enought strong";
        return;
    }

    if ($password1 !== $password2) {
        $errors['conf_password'] = 'The passwords entered do not match';
    }
}

// For TOS
// Memorize value of checkbox
function keepUserDecision() {
    $TOS = $_POST['tos'] ?? "";
    if(isset($TOS) && !empty($TOS)) {
        return "checked";
    }
}

// If all inputs are correctly completed
function correctInputs() {

    global $errors;

    // Valid inputs
    $noErrorUsername = !$errors['username'];
    $noErrorEmail = !$errors['email'];
    $noErrorPassword1 = !$errors['password'];
    $noErrorPassword2 = !$errors['conf_password'];
    $checkedTOS = !$errors['tos'];

    if($noErrorUsername && $noErrorEmail && $noErrorPassword1 && $noErrorPassword2 && $checkedTOS) {
        header("Location: http://registrationForm/public/homepage.php");
    }

}