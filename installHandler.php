<?php
####################################
# File created by @joshingeneral   #
# part of the xssPackage           #
# date 07/01/2013                  #
# description file generates       #
# config.php for connecting to db  #
####################################
// all of these are user input from index.html
$host = $_POST['host'];
$dbname = $_POST['dbname'];
$username  = $_POST['uname'];
$password = $_POST['passwd'];

//enter config filename here
$filename = 'config.php';
$somecontent = "<?php
####################################
# File created by @joshingeneral   #
# part of the xssPackage           #
# date 07/01/2013                  #
# Description: File auto generated #
####################################
\n//include here the MYSQL dbname, hostname, username, password
\$hostname = \"$host\";
\$dbname = \"$dbname\";
\$db_username = \"$username\";
\$db_password = \"$password\";
\n?>
\n";
//change permissions so we can write the to the file
chmod("*", 7777);
// Let's make sure the file exists and is writable first.

    // In our example we're opening $filename in append mode.
    // The file pointer is at the bottom of the file hence
    // that's where $somecontent will go when we fwrite() it.
    if (!$handle = fopen($filename, 'w+')) {
         echo "Cannot open file ($filename)";
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
    }
   echo" <table align='center'>
	<tr><td align='center'>
   	Success sending configuration to file.
    	<br><a href='create.php'>create tables</a>
    	<br><font color='red'>Warning - existing tables will be deleted</br>
	</td></tr>
	</table>
	";
    fclose($handle);
?>
