<?php

$file=$_GET['file'];

header("content-disposition: attachment; filename=" .urldecode($file));

?>