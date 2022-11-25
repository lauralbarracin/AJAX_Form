<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    if ($_POST) {
        $recipient = "contact@lauracod.ca";
        $subject = 'Email from site';
        $visitor_name         = "";
        $visitor_email        = "";
        $message      = "";
        $fail = array();
    
        if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
            $visitor_name .= filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
        }else{
            array_push($fail, "firstname");
        }
        if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
            $visitor_name .= filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
        }else{
            array_push($fail, "lastname");
        }
    
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            // Replace all occurrences of the search string with the replacement string (empty quotes)
            /* %0A & %0D are the hexidecimal representation of a linefeed, and forces a line break in the email’s header block.  This will help to stop intejection attacks as the user can not create linebreaks and add additional headers.
            */
            $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        }else{
            array_push($fail, "email");
        }
    
        if (isset($_POST['message']) && !empty($_POST['message'])) {
            $clean = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
            //Converts special characters to html entities (helps stop XSS)
            $message = htmlspecialchars($clean);
        }else{
            array_push($fail, "message");
        }
    
        /*
        It is an in-built function of PHP, which is used to insert the HTML line breaks before all newlines in the string. Although, we can also use PHP newline character \n or \r\n inside the source code to create the newline, but these line breaks will not be visible on the browser.
        */
    
        $headers = 'From: contact@lauracod.ca' . "\r\n" .
        'Reply-To: visitor@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        
        
        if (count($fail)==0) {
            //echo count($fail);
            mail($recipient, $subject, $message, $headers);
            /* In printf, %s is a placeholder for data that will be inserted into the string. 
            The extra arguments to printf are the values to be inserted. They get associated with 
            the placeholders positionally: the first placeholder gets the first value, the second 
            the second value, and so on.  $visitor_name is the %s(this is the placeholder within the string).
            */
            $results['message'] = sprintf('Thank you for contacting us, %s. You will get a reply as soon as possible', $visitor_name);
        } else {
            // Using this as a response message with a  custom code to grab with JS.
            header('HTTP/1.1 488 You Did NOT fill out the form correctly');
            die(json_encode(["message" => $fail]));
        }
    } else {
        $results['message'] = 'No submission';
    }
    
    echo json_encode($results);