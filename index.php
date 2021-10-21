  <?php
// $green2="\033[1;32m";
 
  $to = 'nnur22233@gmail.com';
  
  $supject = 'nayan hacker';
  
  $random_hash = md5(date('r',time()));
  $headers = "from: world health organization <phedoc@who.int>";
  $headers .= \r\nContent-Type: multipart/mixed; boundary: \"PHP-mixed-".$random_hash."\"";
  
  $attachment = chunk_split(base64_encode(file_put_contents('Guidelines.txt')));
  
  ob_start();
  ?>
  --PHP-mixed-<?php echo $random_hash; ?>
  Content-Type: multipart/alternative; boundary: "PHP-alt-<?pho echo $random_hash; ?>"
  
  --PHP-alt-<?php echo $random_hash; ?>
  Content-Type: text/plain; charset="iso-8859-1"
  Content-Transfer-Encoding: 7bit
  
  Guidelines to de followed for COVID-19
  
  --PHP-alt-<?php echo $random_hash; ?>
  Content-Type: text/html; charset="iso-8859-1"
  Content-Transfer-Encoding: 7bit
  
  <p>Hello<p> <br> <br> how are you ? www.xxx.com 
  
  --PHP-alt-<?php echo $random_hash; ?>
  Content-Type: application/zip; name: "Guidelines.txt"
  Content-Transfer-Encoding: base64
  Content-Disposition: attachment
  
  <?php echo $attachment; ?>
  --PHP-mixed-<?php echo $random_hash; ?>--
  
  <?php 
  $message = ob_get_clean();
  $mail_sent = mail($to,$supject,$headers);
  echo $mail_sent ? "mail sent":"fail mail";
  
  
  ?>