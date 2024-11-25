<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Define a custom error handler function
function customError($errno, $errstr) {
  echo "Error [$errno]: $errstr\n";
}

// Set the custom error handler
set_error_handler("customError");

// Trigger an error (division by zero)
echo 10 / 0; // This will trigger the custom error handler
?>

</body>
</html>