<?php
function send_mail($name, $email, $phone, $message) {
	 // Sanitize and validate inputs
	 $name = filter_var($name, FILTER_SANITIZE_STRING);
	 $email = filter_var($email, FILTER_SANITIZE_EMAIL);
	 $phone = filter_var($phone, FILTER_SANITIZE_STRING);
	 $message = filter_var($message, FILTER_SANITIZE_STRING);
	// Check for invalid email
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		die('Invalid email');
	}

	$to = "info@cloudzguru.com";
	$subject = "Website Contact Form:  $name";

	// Define the headers we want passed. Note that they are separated with \r\n
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= "From: <info@cloudzguru.com>" . "\r\n";
	ob_start(); // Turn on output buffering

	// Build the HTML email body
	?>
	<p>
		<table width="625px" border="0px" cellpadding="0px" cellspacing="0px">
			<tr>
				<td colspan="3" align="left" valign="middle" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; color:#990000; text-decoration:underline;">Enquiry Details</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="150px" align="right" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#000000;">Name</td>
				<td width="20px" align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#000000;">:</td>
				<td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#000000; padding-left:30px;"><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></td>
			</tr>
			<tr>
				<td height="15px" colspan="3"></td>
			</tr>
			<tr>
				<td align="right" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#000000;">E-mail ID</td>
				<td align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#000000;">:</td>
				<td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#000000; padding-left:30px;"><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></td>
			</tr>
			<tr>
				<td height="15px" colspan="3"></td>
			</tr>
			<!-- Add more rows as needed for other fields -->
		</table>
	</p>
	<?php

	$email_body = ob_get_clean(); // Get the output and clear the buffer

	$mailSent = mail($to, $subject, $email_body, $headers);
	if (!$mailSent) {
		die('Mail sending failed');
	}
	header('Location: www.cloudzguru.com');
	exit;
}
?>