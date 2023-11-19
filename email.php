<?php 
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;

        require 'vendor/autoload.php';


        if(isset($_POST['submit'])){

            $mail = new PHPMailer(true);

            try {                                    
            $mail->isSMTP();                                            
            $mail->Host       = 'mail.mindspacementalhealthcare.co.za';
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'info@mindspacementalhealthcare.co.za';         
            $mail->Password   = 'mindspace@mentalhealthcare2023';                        
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
        
            $mail->setFrom($_POST["email"], $_POST['first_name']);           
            $mail->addAddress('info@mindspacementalhealthcare.co.za');
            $mail->addAddress('info@mindspacementalhealthcare.co.za', 'MP Njeke');
            
            $mail->isHTML(true);

            $mail->Subject = 'New MP Njeke Email from '.$_POST["first_name"];
            $mail->Body    = 'New email from '.$_POST['first_name'].' '.'<br>'.'<br>'
            .'Client Details:  '.'<br>'.$_POST['first_name'].' '.'<br>'.$_POST["email"].'<br>'.$_POST['phone_number']
            .'<br>'
            .'<br>'
            .'Message: '.$_POST['message'];
            $mail->AltBody = 'New email from '.$_POST['first_name'].' '
            .'Client Details:  '.$_POST['first_name'].' '.$_POST["email"].$_POST['phone_number']
            .'Message: '.$_POST['message'];

            $mail->send();
            
            echo "<script>
                alert('Thank you for contacting us. We will get back to you shortly');
                document.location.href = 'https://mindspacementalhealthcare.co.za/'
            </script>";
            
            

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        }
?>