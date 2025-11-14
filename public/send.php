<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "constantlycodingllc@gmail.com";
    $subject = "New Intake Form Submission";

    $body = "";
    foreach($_POST as $key => $value){
        $body .= ucfirst(str_replace("_", " ", $key)) . ": " . $value . "\n";
    }

    $headers = "From: noreply@yourdomain.com";

    mail($to, $subject, $body, $headers);

    echo "Your intake form was successfully submitted!";
}
?>
