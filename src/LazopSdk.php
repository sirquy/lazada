<?php
/**
 * IOP SDK entry
 * please do not modified this file unless you know how to modify and how to recover
 * @author xuteng.xt
 */

/**
 * log dir
 */
if (!defined("LAZOP_SDK_WORK_DIR"))
{
	define("LAZOP_SDK_WORK_DIR", dirname(__FILE__));
}

if (!defined("LAZOP_AUTOLOADER_PATH"))
{
	define("LAZOP_AUTOLOADER_PATH", dirname(__FILE__));
}

/**
* regist autoLoader
**/
require("Autoloader.php");

?>