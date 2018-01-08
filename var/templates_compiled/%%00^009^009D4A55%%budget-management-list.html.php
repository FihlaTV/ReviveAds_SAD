<?php /* Smarty version 2.6.18, created on 2018-01-08 12:52:50
         compiled from budget-management-list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ox_column_class', 'budget-management-list.html', 38, false),array('function', 'ox_column_title', 'budget-management-list.html', 39, false),array('function', 't', 'budget-management-list.html', 42, false),array('function', 'cycle', 'budget-management-list.html', 83, false),array('function', 'ox_entity_id', 'budget-management-list.html', 93, false),array('modifier', 'count', 'budget-management-list.html', 50, false),array('modifier', 'escape', 'budget-management-list.html', 90, false),)), $this); ?>


<div class='tableWrapper'>
    <div class='tableHeader'>


        <ul class='tableFilters alignRight'>

            <?php if (! empty ( $this->_tpl_vars['topPager']->links )): ?>
            <li>
                <div class="pager">
                    <span class="controls"><?php echo $this->_tpl_vars['topPager']->links; ?>
</span>
                </div>
            </li>
            <?php endif; ?>
        </ul>

        <div class='clear'></div>

        <div class='corner left'></div>
        <div class='corner right'></div>
    </div>

    <table cellspacing='0' summary=''>
        <thead>
        <tr>
            <th class='<?php echo OA_Admin_Template::_function_ox_column_class(array('item' => 'name','order' => 'up','default' => 1), $this);?>
'>
                <?php echo OA_Admin_Template::_function_ox_column_title(array('item' => 'name','order' => 'up','default' => 1,'str' => 'Name','url' => "advertiser-index.php"), $this);?>

            </th>
            <th class="">
                <?php echo OA_Admin_Template::_function_t(array('str' => 'Balance'), $this);?>

            </th>
            <th class='last alignRight'>&nbsp;

            </th>
        </tr>
        </thead>

        <?php if (! count($this->_tpl_vars['from'])): ?>
        <tbody>
        <tr class='odd'>
            <td colspan='3'>&nbsp;</td>
        </tr>
        <tr class='even'>
            <td colspan='3' class="hasPanel">
                <div class='tableMessage'>
                    <div class='panel'>

                        <?php if ($this->_tpl_vars['hideinactive']): ?>
                        <?php echo $this->_tpl_vars['aCount']['advertisers_hidden']; ?>
 <?php echo OA_Admin_Template::_function_t(array('str' => 'InactiveAdvertisersHidden'), $this);?>

                        <?php else: ?>
                        <?php echo OA_Admin_Template::_function_t(array('str' => 'NoClients'), $this);?>

                        <?php endif; ?>

                        <div class='corner top-left'></div>
                        <div class='corner top-right'></div>
                        <div class='corner bottom-left'></div>
                        <div class='corner bottom-right'></div>
                    </div>
                </div>

                &nbsp;
            </td>
        </tr>
        <tr class='odd'>
            <td colspan='3'>&nbsp;</td>
        </tr>
        </tbody>

        <?php else: ?>
        <tbody>
        <?php echo smarty_function_cycle(array('name' => 'bgcolor','values' => "even,odd",'assign' => 'bgColor','reset' => 1), $this);?>

        <?php $_from = $this->_tpl_vars['from']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['clientId'] => $this->_tpl_vars['client']):
?>
        <?php echo smarty_function_cycle(array('name' => 'bgcolor','assign' => 'bgColor'), $this);?>

        <tr class='<?php echo $this->_tpl_vars['bgColor']; ?>
 <?php if ($this->_tpl_vars['client']['type'] == $this->_tpl_vars['MARKET_TYPE']): ?>systemAdvertiser<?php endif; ?>'>

            <td>
                <?php if ($this->_tpl_vars['client']['type'] == $this->_tpl_vars['MARKET_TYPE']): ?>                 <span class='inlineIcon iconAdvertiserSystem'><?php echo ((is_array($_tmp=$this->_tpl_vars['client']['clientname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</span>
                <?php else: ?>
                <a href='advertiser-edit.php?clientid=<?php echo $this->_tpl_vars['clientId']; ?>
' class='inlineIcon iconAdvertiser'><?php echo ((is_array($_tmp=$this->_tpl_vars['client']['clientname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a>
                <?php echo OA_Admin_Template::_function_ox_entity_id(array('type' => 'Advertiser','id' => $this->_tpl_vars['clientId']), $this);?>

                <?php endif; ?>
            </td>
            <td>50</td>
            <td class='alignRight horizontalActions'>
                <ul class='rowActions'>
                    <li>
                        <a href='' class='inlineIcon <?php if ($this->_tpl_vars['client']['type'] == $this->_tpl_vars['MARKET_TYPE']): ?>iconCampaignSystemAdd<?php else: ?>iconCampaignAdd<?php endif; ?>'><?php echo OA_Admin_Template::_function_t(array('str' => 'Recharge'), $this);?>
</a>
                    </li>
                </ul>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        </tbody>
        <?php endif; ?>
        <?php if (! empty ( $this->_tpl_vars['pager']->links )): ?>
        <tbody class="tableFooter">
        <tr>
            <td  colspan="3">
                <div class="pager">
                    <span class="summary"><?php echo $this->_tpl_vars['pager']->summary; ?>
</span>
                    <span class="controls"><?php echo $this->_tpl_vars['pager']->links; ?>
</span>
                </div>
            </td>
        </tr>
        </tbody>
        <?php endif; ?>
    </table>
</div>