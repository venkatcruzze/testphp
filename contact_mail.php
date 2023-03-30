<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $message = $_POST["message"];

	include_once 'phpmailer/PHPMailerAutoload.php';
	$mail  = new PHPMailer();

	$body="
    <html>
        <style>body {padding: 0px;margin: 0px;}</style>
        <body style='background: #fbfbfb; padding:20px; margin:0px;font-family: Segoe UI,Tahoma,Geneva,Verdana,sans-serif'>
            <div style='border: 1px solid #1478a1; width:100%;'>
                <table width='100%' border='0'>
                    <tr bgcolor='#ffffff'>
                        <td height='37' colspan='3' style='text-align: center;'><img src='https://static.wixstatic.com/media/6a1177_4105d37d2ce049d197c8bd22b2800a70~mv2.png/v1/fill/w_186,h_35,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Main-logo-lean365.png' style='text-align:center; width: 30%; height: auto; padding: 7px 0px 5px 0px;' draggable='false' /></td>
                    </tr>
                    <tr>
                        <td bgcolor='#015a84' align='center' colspan='3' style='font-family:Arial,Helvetica,sans-serif; font-size:14px; color:#ffffff; padding:5px 0px 10px 0px;'>You have a new message</td>
                    </tr>
                    <tr style='line-height:30px;'>
                        <td>Contact Name</td>
                        <td>:</td>
                        <td>".$name."</td>
                    </tr>
                    <tr style='line-height:30px;'>
                        <td bgcolor='#F3F3F3' width='65'>Contact number</td>
                        <td bgcolor='#F3F3F3' width='6'>:</td>
                        <td bgcolor='#F3F3F3' width='280'>".$mobile."</td>
                    </tr>
                    <tr style='line-height:30px;'>
                        <td>E-mail Address</td>
                        <td>:</td>
                        <td>".$email."</td>
                    </tr>
                    <tr style='line-height:30px;'>
                        <td bgcolor='#F3F3F3' width='65'>Message</td>
                        <td bgcolor='#F3F3F3' width='6'>:</td>
                        <td bgcolor='#F3F3F3' width='280'>".$message."</td>
                    </tr>
                </table>
                <table cellpadding='0' cellspacing='0' style='background:#000;' width='100%' border='0'>
                    <tbody>
                        <tr>
                            <td style='word-wrap:break-word;font-size:0px;padding:5px 0px 10px 0px;' align='left'>
                                <div style='cursor:auto;color:#fff;font-family:Segoe UI,Tahoma,Geneva,Verdana,sans-serif;font-size:13px;line-height:22px;text-align:left;'>
                                    <p style='color:#fff; padding-left:10px; margin:0px 0px 0px 0px;font-size:12px; text-align:center;'><a style='color:#fff;font-size:12px; font-weight:400;text-decoration:none;' href='https://www.lean365.ai/'>© 2023 lean365. All rights reserved.</a></p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
    </html>";

    $mail->IsSMTP();
    $mail->isHTML(true);
    $mail->Host       = "smtp.office365.com";
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Username   = "venkatasubramani@cruzzesolutions.com";
    $mail->Password   = "Venkat@14";
    $mail->SetFrom("venkatasubramani@cruzzesolutions.com", "Enquiry on lean365");
    $mail->Subject = "lean365 Website Contact Enquiry";
    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
    $mail->MsgHTML($body);
    $mail->AddAddress("prasanna@cruzzesolutions.com","Enquiry on lean365");

    if(!$mail->Send()){
        echo "<script type='text/javascript'>alert('Message Not send')</script>";
        echo "<script type='text/javascript'> window.location.href = 'index.php';</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Your Message Send Successfully')</script>";
        echo "<script type='text/javascript'> window.location.href = 'index.php';</script>";
    }
    }
    else{
        echo "<script type='text/javascript'>alert('There was a problem with your submission, Please try again.')</script>";
        echo "<script type='text/javascript'> window.location.href = 'index.php';</script>";
    }
?>