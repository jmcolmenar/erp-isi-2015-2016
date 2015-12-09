<?php
$module04 = file_get_contents(\filter_input(\INPUT_SERVER, 'DOCUMENT_ROOT', \FILTER_SANITIZE_STRING).'/src/modules/module04/index.html');
echo $module04;
?>