 #!/bin/bash
clear
component='com_wcertmatrimony'
folder='com_wcertmatrimony'
source='/home/weblogicx/joomla/git/wcertmatrimony'
target='/var/www/matrimony'

ln -s $source/admin/com_wcertmatrimony  $target/administrator/components/com_wcertmatrimony
ln -s $source/site/com_wcertmatrimony  $target/components/com_wcertmatrimony  
ln -s $source/media/wcertmatrimony  $target/media/wcertmatrimony
