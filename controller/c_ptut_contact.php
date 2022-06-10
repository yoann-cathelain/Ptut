<?php
    include('../models/m_ptut_contact.php');
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
        
        $to      = 'yoanncathelain23@gmail.com';
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $headers = 'From:'. $_POST['email'] . "\r\n" .
        'Reply-To: yoanncathelain23@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

    }
    ?>