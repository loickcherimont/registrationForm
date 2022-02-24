<?php
// No error at the beginning
$errors = [
    'username' => "",
    'email' => "",
    'password' => "",
    'conf_password' => "",
    'tos' => ""
];

// Submission
if(isset($_POST) && !empty($_POST)) {

    $TOS = $_POST['tos'] ?? '';

    if (!$TOS) {$errors['tos'] = 'To join us, you need to agree to the TOS!';}

    // Check other fields
    foreach($_POST as $input_name => $input_value) {

        // NOT completed input
        if(empty($input_value) || !isset($input_value)) {
            
            // Show to user error
            // Adapt error message for conf_password input
            $inputToComplete = (strtolower($input_name) === "conf_password") ?  "PASSWORD" :  strtoupper($input_name);
            $errors[$input_name] = " $inputToComplete is required!";
            break;
        }

        // Specific validity for other inputs
        // than TOS input
        switch ($input_name) {

            case "username":
                $usernameValue = $_POST[$input_name];
                $USERNAME_LENGTH = strlen($usernameValue);
                $usernameRegex = '/^[a-z0-9]$/i';
                $invalidUsername = !preg_match($usernameRegex, $usernameValue);

                // Temp: 8 character for user
                if ($USERNAME_LENGTH < 8) { $errors[$input_name] = "Minimum 8 characters for $input_name"; }
                break;

                if ($invalidUsername) { $errors[$input_name] = "Only letters and numbers for username"; }
                break;

            case "email":
                $emailValue = $_POST[$input_name];
                $invalidEmailFormat = !filter_var($emailValue, FILTER_VALIDATE_EMAIL);

                if ($invalidEmailFormat) { $errors[$input_name] = "Invalid $input_name format";}
                break;

            // Temp: Password limited to 8 characters min
            case 'password':
                $passwordValue = $_POST[$input_name];
                $PASSWORD_LENGTH = strlen($passwordValue);
                $confirmPasswordValue = $_POST['conf_password'];

                if ($PASSWORD_LENGTH < 8) {$errors[$input_name] = "Not enough strong $input_name";}
                break;

                if ($passwordValue != $confirmPasswordValue) {$errors[$input_name] = "Password must be the same";}
                break;

            case 'conf_password':
                $confirmPasswordValue = $_POST[$input_name];
                $passwordValue = $_POST['password'];
                $CONFIRM_PASSWORD_LENGTH = strlen($confirmPasswordValue);

                if ($CONFIRM_PASSWORD_LENGTH < 8) {$errors[$input_name] = "Not enough strong password";}
                break;
    
                if ($passwordValue !== $confirmPasswordValue) {$errors[$input_name] = "Password must be the same";}
                break;

            default:
                break;

        }

    }

}


// For TOS
// Memorize value of checkbox
function followUserDecision() {
    $TOS = $_POST['tos'] ?? "";
    if(isset($TOS) && !(empty($TOS))) echo "checked";
}