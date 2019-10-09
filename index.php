<?php

/** config classes */
$tables=new tables();
/** end of config classes */

/**Template class */
$menutype=new template();

/** Page to open */
$action=$_REQUEST['action'];


/**CSRF protection */
$sessionProvider = new EasyCSRF\NativeSessionProvider();
$easyCSRF = new EasyCSRF\EasyCSRF($sessionProvider);
$token = $easyCSRF->generate('my_token');
/**CSRF protection end */



/** Phpfastcache */
date_default_timezone_set("Europe/Paris");
use Phpfastcache\CacheManager;
use Phpfastcache\Config\Config;
use Phpfastcache\Core\phpFastCache;

// Setup File Path on your config files
CacheManager::setDefaultConfig(new Config([
  "path" => sys_get_temp_dir(),
  "itemDetailedDate" => false
]));

// In your class, function, you can call the Cache
$InstanceCache = CacheManager::getInstance('files');
// OR $InstanceCache = CacheManager::getInstance() <-- open examples/global.setup.php to see more

/**
 * Try to get $products from Caching First
 * product_page is "identity keyword";
 */
$key = $action;
$CachedString = $InstanceCache->getItem($key);
$path="template/page/".$action.".phtml";

// open page
if(file_exists($path)){
	// Top file
    include("template/top.phtml");
    include("template/header.phtml");
    include("template/menu.phtml");
    include($path);
    include("template/footer.phtml");

}
else{

    // if the page not found here
	$error="404";
    include("template/top.phtml");
    include("template/page/404.phtml");
    

}

?>