<?php
function Debug($var)
{
  $debug = debug_backtrace();
  echo "<pre>";
  echo $debug[0]['file'] . " " . $debug[0]['line'] . "<br><br>";
  print_r($var);
  echo "</pre>";
  echo "<br>";
}

// function DebugToConsole($var)
// {
//   $output = $var;
//   if (is_array($output))
//     $output = implode(',', $output);

//   echo "<script>console.log('Debug Object: " . $output . "')</script>";
// };
?>