<?php
function micontrolexcep1($excep)
{
    echo "Lo sentimos. La aplicacion no esta disponible";
    error_log($excep->getMessage());
}
