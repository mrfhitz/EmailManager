<?php
class Mailit {
	private $mail,
			$reply,
			$header,
			$footer;

	public function __construct($myemail, $replymail = '') {
		$this->mail = $myemail;
		$this->reply = (empty($replymail)) ? $myemail : $replymail;

		$this->header = '';
		$this->footer = '';
	}

	public function setHeader($head) {
		$this->header = $header;
	}

	public function setFooter($footer) {
		$this->footer = $footer;
	}

	private function buildMessage($msg) {
		$message = $this->header;
		$message .= '<br />';
		$message .= $msg;
		$message .= '<br />';
		$message .= $this->footer;
		return $message;
	}

	public function sendMail($to, $subject, $msg){
		$headers = "From: " . $this->mail . "\r\n";
		$headers .= "Reply-To: ". $this->reply . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		$message = $this->buildMessage($msg);

		mail($to, $subject, $message, $headers);
	}

}