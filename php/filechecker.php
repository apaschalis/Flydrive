<?php
require_once('configfile.php');

function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }

    return $bytes;
}

$username = $_SESSION['username'];
$filenames = mysql_query("SELECT * FROM files WHERE username='$username'");

if (mysql_num_rows($filenames) > 0) {
    while($row = mysql_fetch_assoc($filenames)) {
        extract($row);
        $prettySize = formatSizeUnits($File_Size);
        echo "<tr><td> <input name = \"chkbox[]\" id=\"chkbox[]\" type=\"checkbox\" value=\"$Name\" /></td><td>$Name</td><td>$prettySize</td><td>$Date_Added</td>  </tr>";
    }
}

?>