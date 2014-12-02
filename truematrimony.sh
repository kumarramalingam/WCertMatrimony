 #!/bin/bash
clear
component='com_truematrimony'
folder='com_truematrimony'
source='/home/weblogicx/joomla/git/wcertmatrimony'
target='/var/www/matrimony'

ln -s $source/admin/language/en-GB.com_truematrimony.ini  $target/administrator/language/en-GB/en-GB.com_truematrimony.ini
ln -s $source/admin/language/en-GB.com_truematrimony.sys.ini  $target/administrator/language/en-GB/en-GB.com_truematrimony.sys.ini

ln -s $source/site/language/en-GB.com_truematrimony.ini  $target/language/en-GB/en-GB.com_truematrimony.ini
ln -s $source/site/language/en-GB.com_truematrimony.sys.ini  $target/language/en-GB/en-GB.com_truematrimony.sys.ini
