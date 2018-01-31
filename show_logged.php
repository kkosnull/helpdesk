<?php
if ($handle = opendir('logged_users')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

			$entry=str_replace("txt", "", $entry);
			
			$entry=str_replace(".", "", $entry);
			
            echo "$entry<br>";
        }
    }

    closedir($handle);
}

?>