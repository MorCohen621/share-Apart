<html><body>
<?php
session_start();
session_destroy();
header("Location: index.html");
?>
</body></html>