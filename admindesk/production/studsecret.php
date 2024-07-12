<?php 
SESSION_START();
if($_SESSION['opuname']!='101554@!&%3xxp' || $_SESSION['uname']!='11aA554@!&%5')
{
	header("location:logoutstud.php");
}
?>
<!--<script>
 const channel = new BroadcastChannel('tab');

channel.postMessage('another-tab');
// note that listener is added after posting the message

channel.addEventListener('message', (msg) => {
  if (msg.data === 'another-tab') {
    // message received from 2nd tab
    window.location='logoutstud.php';
  }
});
      </script>
	  -!>