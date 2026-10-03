<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // File upload handling
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $fileTmpPath = $_FILES['attachment']['tmp_name'];
        $fileName = $_FILES['attachment']['name'];
        move_uploaded_file($fileTmpPath, "uploads/" . $fileName); // Save file
    }

    // Send email (basic example)
    $to = "infosafslb362@gmail.com";
  
    $headers = "From: $email\r\n";
    $mailBody = $message;

    mail($to, $subject, $mailBody, $headers);
    echo "Email sent. Redirecting to homepage in 3 seconds...";

}
?>

<script>
    setTimeout(function(){
        window.location.href = 'index.htm'; // Change to your main page
    }, 3000); // 3000 milliseconds = 3 seconds
</script>