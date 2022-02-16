<?php 
    
    session_start();
	session_destroy();
	// fungsi redirect menggunakan javascript
	echo '<script language="javascript"> window.location.href = "index.php" </script>';
?>