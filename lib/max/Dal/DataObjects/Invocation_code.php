<?php
/**
 * Created by PhpStorm.
 * User: dwt
 * Date: 2017/9/27
 * Time: 11:00
 */

/**
 * Table Definition for invocation_code
 */
require_once 'DB_DataObjectCommon.php';

class DataObjects_Invocation_code extends DB_DataObjectCommon
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'invocation_code';                   // table name
    public $bannerid;                // MEDIUMINT(9)
    public $invocation_code;                         // VARCHAR(255)

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGetFromClassName('DataObjects_Invocation_code',$k,$v); }

    var $defaultValues = array(
        'invocation_code' => "",
    );

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    function _auditEnabled()
    {
        return false;
    }

    function _getContextId()
    {
        return $this->bannerid;
    }

    function _getContext()
    {
        return 'Invocation Code';
    }


}

?>