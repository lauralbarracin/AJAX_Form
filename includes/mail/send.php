<?php
// required Header 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

IF($_POST) {
    $recipient = "youraddressgoeshere@upururl.com";
    $subject = "Email from my portfolio site";//para entender que es de tu portfolio 
    $visitor_name = "";
    $visitor_email = "";
    $message = "";
    $fail = array();

    //Checks for firstname and cleans the text.
    if(isset($_POST['firstname']) && !empty($_POST['firstname'])) {
        $visitor_name .= filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    }else {
        array_push($fail, "firstname");
    }

    //Checks for firstname and cleans the text.
    if {(isset($_POST['lastname']) && !empty($_POST['lastname']))
        $visitor_name .= " ".filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
    }else {
        array_push($fail, "lastname");
    }
    
    //Checks for email and cleans the text
    if (isset($_POST['email']) && !empty($_POST['email'])){
        $visitor_email .= str_replace(array("\r", "\n", "%0a", "%0d"), "", $_POST['email']);
        $visitor_email .= filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }else {
        array_push($fail, "email");
    }

    //Checks our message and cleans it.
    if(isset($_POST['message']) && !empty($_POST['message'])){
        $clean = filter_var($_POST['message'],
        FILTER_SANITIZE_STRING);
        $message = htmlspecialchars($clean);//it is not mandatory but it is useful 
    }else{
        array_push($fail, "message");
    }

    // esto hace parte de la tarea se debe incluir y descifrar 
    $headers = "From: the variable that holds their email" . "\r\n". "reply-to: email from the person"."\r\n"."X-Mailer:PHP/".phpversion();//if you don`t fill this you will receive this email in your server

    if(count($fail)==0) {
        mail( $receipient, $subject, $message, $headers);
        $results['message'] = sprintf("Thank you for contacting us, %s. We will get back to you in 24 hours", $visitor_name);
    }else {
        header('HTTP/1.1 488 Stop Being Lazy, fill out the damn form..thanks;');
        die(json_encode(["message"=> $fail]));
    }


}else {
    $results['message'] = "Please fill out the form";
}

echo json_encode($results);
//siempre chequear por positivo y negativo
?>