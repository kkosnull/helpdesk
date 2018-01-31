<?php
if ($handle = opendir('codes')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

			$entry=str_replace("code", "", $entry);
			$entry=str_replace("__", "", $entry);
			$entry=str_replace("html", "", $entry);
			$entry=str_replace(".", "", $entry);
			$entry=str_replace("_", "/", $entry);
            echo "$entry<br>";
        }
    }

    closedir($handle);
}

?>