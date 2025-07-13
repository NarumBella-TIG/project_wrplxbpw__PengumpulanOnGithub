<?php
$plaintext = "Narum123";
$hashedPassword = password_hash($plaintext, PASSWORD_DEFAULT);

echo $hashedPassword;
?>