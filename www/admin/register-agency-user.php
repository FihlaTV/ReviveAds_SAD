<?php

/*
+---------------------------------------------------------------------------+
| Revive Adserver                                                           |
| http://www.revive-adserver.com                                            |
|                                                                           |
| Copyright: See the COPYRIGHT.txt file.                                    |
| License: GPLv2 or later, see the LICENSE.txt file.                        |
+---------------------------------------------------------------------------+
*/

// Require the initialisation file
require_once '../../init.php';

// Required files
require_once MAX_PATH . '/www/admin/config-no-auth.php';
require_once MAX_PATH . '/www/admin/lib-statistics.inc.php';
require_once MAX_PATH . '/lib/OA/Session.php';
require_once MAX_PATH . '/lib/OA/Admin/UI/UserAccess.php';
require_once MAX_PATH . '/lib/max/other/html.php';


//OA_Permission::enforceAccount(OA_ACCOUNT_ADMIN, OA_ACCOUNT_MANAGER);
//OA_Permission::enforceAccountPermission(OA_ACCOUNT_MANAGER, OA_PERM_SUPER_ACCOUNT);
//OA_Permission::enforceAccessToObject('agency', $agencyid);

$userAccess = new OA_Admin_UI_UserAccess();
$userAccess->init();

function OA_HeaderNavigation()
{
    global $agencyid;

    if (OA_Permission::isAccount(OA_ACCOUNT_ADMIN)) {
        phpAds_PageHeader("agency-access");
        $doAgency = OA_Dal::staticGetDO('agency', $agencyid);
        MAX_displayInventoryBreadcrumbs(array(array("name" => $doAgency->name)), "agency");
    } else {
        phpAds_PageHeader_No_Auth("agency-user");
    }
}


/*-------------------------------------------------------*/
/* Initialise agency data                                    */
/*-------------------------------------------------------*/


$userAccess->setNavigationHeaderCallback('OA_HeaderNavigation');

$userAccess->setPagePrefix('agency');

$aAllowedPermissions = array();

$aAllowedPermissions[OA_PERM_SUPER_ACCOUNT] = array($strAllowCreateAccounts, false);

$userAccess->setAllowedPermissions($aAllowedPermissions);

$userAccess->processRegisterAgency();

$userAccess->processRegisterUser();

?>
