<?php

  function string_clean($db_conn, $data){
    $data = trim($data);
    $data = mysqli_real_escape_string($db_conn, $data);
    return $data;
  }
?>