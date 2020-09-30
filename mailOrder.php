<?php
	if ( isset($_POST["orderMailBody"]) ) {	
		$orderMailBody = $_POST["orderMailBody"];
		$to ="perry80601@gmail.com"; //收件者
		$subject = "水族訂單"; //信件標題
		$headers = "MIME-Version: 1.0" . "\r\n";
		// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: w200813<w200813@w200813.stu.fgchen.com>' . "\r\n";
		if(mail($to, $subject, $orderMailBody, $headers)) {
		echo "信件發送成功。";//寄信成功就會顯示的提示訊息
		}
		

	}
?>