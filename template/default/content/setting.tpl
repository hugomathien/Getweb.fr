<div class="task">
  <div class="disabled"><img src="template/default/image/list_disabled.png" alt="<?php echo $button_list; ?>" class="png" /><?php echo $button_list; ?></div>
  <div class="disabled"><img src="template/default/image/insert_disabled.png" alt="<?php echo $button_insert; ?>" class="png" /><?php echo $button_insert; ?></div>
  <div class="disabled"><img src="template/default/image/update_disabled.png" alt="<?php echo $button_update; ?>" class="png" /><?php echo $button_update; ?></div>
  <div class="disabled"><img src="template/default/image/delete_disabled.png" alt="<?php echo $button_delete; ?>" class="png" /><?php echo $button_delete; ?></div>
  <div class="enabled" onmouseover="className='hover'" onmouseout="className='enabled'" onclick="document.getElementById('form').submit();"><img src="template/default/image/save_enabled.png" alt="<?php echo $button_save; ?>" class="png" /><?php echo $button_save; ?></div>
  <div class="enabled" onmouseover="className='hover'" onmouseout="className='enabled'" onclick="location='<?php echo $cancel; ?>'"><img src="template/default/image/cancel_enabled.png" alt="<?php echo $button_cancel; ?>" class="png" /><?php echo $button_cancel; ?></div>
</div>
<?php if ($error) { ?>
<div class="warning"><?php echo $error; ?></div>
<?php } ?>
<?php if ($message) { ?>
<div class="message"><?php echo $message; ?></div>
<?php } ?>
<div class="heading"><?php echo $heading_title; ?></div>
<div class="description"><?php echo $heading_description; ?></div>
<script type="text/javascript" src="javascript/tab/tab.js"></script>
<link rel="stylesheet" type="text/css" href="javascript/tab/tab.css" />
<script type="text/javascript" src="javascript/ajax/jquery.js"></script>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
  <div class="tab" id="tab">
    <div class="tabs"><a><?php echo $tab_shop; ?></a><a><?php echo $tab_admin; ?></a><a><?php echo $tab_local; ?></a><a><?php echo $tab_stock; ?></a><a><?php echo $tab_option; ?></a><a><?php echo $tab_mail; ?></a><a><?php echo $tab_cache; ?></a><a><?php echo $tab_image; ?></a><a><?php echo $tab_download; ?></a></div>
    <div class="pages">
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185"><span class="required">*</span> <?php echo $entry_store; ?></td>
              <td><input type="text" name="global_config_store" value="<?php echo $global_config_store; ?>" />
                <?php if ($error_store) { ?>
                <span class="error"><?php echo $error_store; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td><span class="required">*</span> <?php echo $entry_owner; ?></td>
              <td><input type="text" name="global_config_owner" value="<?php echo $global_config_owner; ?>" />
                <?php if ($error_owner) { ?>
                <span class="error"><?php echo $error_owner; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td valign="top"><span class="required">*</span> <?php echo $entry_address; ?></td>
              <td><textarea name="global_config_address" cols="40" rows="5"><?php echo $global_config_address; ?></textarea>
                <?php if ($error_address) { ?>
                <span class="error"><?php echo $error_address; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td><span class="required">*</span> <?php echo $entry_telephone; ?></td>
              <td><input type="text" name="global_config_telephone" value="<?php echo $global_config_telephone; ?>" />
                <?php if ($error_telephone) { ?>
                <span class="error"><?php echo $error_telephone; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_fax; ?></td>
              <td><input type="text" name="global_config_fax" value="<?php echo $global_config_fax; ?>" /></td>
            </tr>
            <tr>
              <td><?php echo $entry_template; ?></td>
              <td><select name="catalog_config_template">
                  <?php foreach ($catalog_templates as $catalog_templates) { ?>
                  <?php if ($catalog_templates == $catalog_config_template) { ?>
                  <option value="<?php echo $catalog_templates; ?>" selected><?php echo $catalog_templates; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $catalog_templates; ?>"><?php echo $catalog_templates; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_rows_per_page; ?></td>
              <td><input type="text" name="catalog_config_max_rows" value="<?php echo $catalog_config_max_rows; ?>" size="2" /></td>
            </tr>
            <tr>
              <td><?php echo $entry_url_alias; ?></td>
              <td><?php if ($catalog_config_url_alias) { ?>
                <input type="radio" name="catalog_config_url_alias" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_url_alias" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="catalog_config_url_alias" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_url_alias" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_parse_time; ?></td>
              <td><?php if ($catalog_config_parse_time) { ?>
                <input type="radio" name="catalog_config_parse_time" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_parse_time" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="catalog_config_parse_time" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_parse_time" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_ssl; ?></td>
              <td><?php if ($catalog_config_ssl) { ?>
                <input type="radio" name="catalog_config_ssl" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_ssl" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="catalog_config_ssl" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_ssl" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185"><?php echo $entry_template; ?></td>
              <td><select name="admin_config_template">
                  <?php foreach ($admin_templates as $admin_templates) { ?>
                  <?php if ($admin_templates == $admin_config_template) { ?>
                  <option value="<?php echo $admin_templates; ?>" selected><?php echo $admin_templates; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $admin_templates; ?>"><?php echo $admin_templates; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_rows_per_page; ?></td>
              <td><input type="text" name="admin_config_max_rows" value="<?php echo $admin_config_max_rows; ?>" size="2" /></td>
            </tr>
            <tr>
              <td><?php echo $entry_parse_time; ?></td>
              <td><?php if ($admin_config_parse_time) { ?>
                <input type="radio" name="admin_config_parse_time" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="admin_config_parse_time" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="admin_config_parse_time" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="admin_config_parse_time" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_ssl; ?></td>
              <td><?php if ($admin_config_ssl) { ?>
                <input type="radio" name="admin_config_ssl" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="admin_config_ssl" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="admin_config_ssl" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="admin_config_ssl" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185"><?php echo $entry_country; ?></td>
              <td><select name="global_config_country_id" onchange="$('#zone').load('index.php?controller=setting&action=zone&country_id='+this.value+'&zone_id=<?php echo $global_config_zone_id; ?>');">
                  <?php foreach ($countries as $country) { ?>
                  <?php if ($country['country_id'] == $global_config_country_id) { ?>
                  <option value="<?php echo $country['country_id']; ?>" selected><?php echo $country['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $country['country_id']; ?>"><?php echo $country['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td><?php echo $entry_zone; ?></td>
              <td id="zone"><select name="global_config_zone_id">
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_language; ?></td>
              <td><select name="global_config_language">
                  <?php foreach ($languages as $languages) { ?>
                  <?php if ($languages['code'] == $global_config_language) { ?>
                  <option value="<?php echo $languages['code']; ?>" selected><?php echo $languages['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $languages['code']; ?>"><?php echo $languages['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td><?php echo $entry_currency; ?></td>
              <td><select name="global_config_currency">
                  <?php foreach ($currencies as $currencies) { ?>
                  <?php if ($currencies['code'] == $global_config_currency) { ?>
                  <option value="<?php echo $currencies['code']; ?>" selected><?php echo $currencies['title']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $currencies['code']; ?>"><?php echo $currencies['title']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_weight; ?></td>
              <td><select name="global_config_weight_class_id">
                  <?php foreach ($weight_classes as $weight_class) { ?>
                  <?php if ($weight_class['weight_class_id'] == $global_config_weight_class_id) { ?>
                  <option value="<?php echo $weight_class['weight_class_id']; ?>" selected><?php echo $weight_class['title']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $weight_class['weight_class_id']; ?>"><?php echo $weight_class['title']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_tax; ?></td>
              <td><?php if ($global_config_tax) { ?>
                <input type="radio" name="global_config_tax" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="global_config_tax" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="global_config_tax" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="global_config_tax" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_order_status; ?></td>
              <td><select name="global_config_order_status_id">
                  <?php foreach ($order_statuses as $order_status) { ?>
                  <?php if ($order_status['order_status_id'] == $global_config_order_status_id) { ?>
                  <option value="<?php echo $order_status['order_status_id']; ?>" selected><?php echo $order_status['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185"><?php echo $entry_stock_check; ?></td>
              <td><?php if ($catalog_config_stock_check) { ?>
                <input type="radio" name="catalog_config_stock_check" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_stock_check" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="catalog_config_stock_check" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_stock_check" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_stock_checkout; ?></td>
              <td><?php if ($catalog_config_stock_checkout) { ?>
                <input type="radio" name="catalog_config_stock_checkout" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_stock_checkout" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="catalog_config_stock_checkout" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_stock_checkout" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td width="185"><?php echo $entry_stock_subtract; ?></td>
              <td><?php if ($catalog_config_stock_subtract) { ?>
                <input type="radio" name="catalog_config_stock_subtract" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_stock_subtract" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="catalog_config_stock_subtract" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_stock_subtract" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185"><?php echo $entry_vat; ?></td>
              <td><input type="text" name="catalog_config_vat" value="<?php echo $catalog_config_vat; ?>" /></td>
            </tr>
            <tr>
              <td><?php echo $entry_account; ?></td>
              <td><select name="catalog_config_account_id">
                  <option value="0"><?php echo $text_none; ?></option>
                  <?php foreach ($informations as $information) { ?>
                  <?php if ($information['information_id'] == $catalog_config_account_id) { ?>
                  <option value="<?php echo $information['information_id']; ?>" selected><?php echo $information['title']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $information['information_id']; ?>"><?php echo $information['title']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_checkout; ?></td>
              <td><select name="catalog_config_checkout_id">
                  <option value="0"><?php echo $text_none; ?></option>
                  <?php foreach ($informations as $information) { ?>
                  <?php if ($information['information_id'] == $catalog_config_checkout_id) { ?>
                  <option value="<?php echo $information['information_id']; ?>" selected><?php echo $information['title']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $information['information_id']; ?>"><?php echo $information['title']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185"><?php echo $entry_email; ?></td>
              <td><input type="text" name="global_config_email" value="<?php echo $global_config_email; ?>" /></td>
            </tr>
            <tr>
              <td><?php echo $entry_email_send; ?></td>
              <td><?php if ($global_config_email_send) { ?>
                <input type="radio" name="global_config_email_send" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="global_config_email_send" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="global_config_email_send" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="global_config_email_send" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td><?php echo $entry_cache_query; ?></td>
              <td><?php if ($global_config_cache_query) { ?>
                <input type="radio" name="global_config_cache_query" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="global_config_cache_query" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="global_config_cache_query" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="global_config_cache_query" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td width="185"><?php echo $entry_compress_output; ?></td>
              <td><?php if ($global_config_compress_output) { ?>
                <input type="radio" name="global_config_compress_output" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="global_config_compress_output" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="global_config_compress_output" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="global_config_compress_output" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_compress_level; ?></td>
              <td><input type="text" name="global_config_compress_level" value="<?php echo $global_config_compress_level; ?>" size="3" /></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185"><?php echo $entry_image_resize; ?></td>
              <td><?php if ($global_config_image_resize) { ?>
                <input type="radio" name="global_config_image_resize" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="global_config_image_resize" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="global_config_image_resize" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="global_config_image_resize" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_image_width; ?></td>
              <td><input type="text" name="global_config_image_width" value="<?php echo $global_config_image_width; ?>" size="3" /></td>
            </tr>
            <tr>
              <td><?php echo $entry_image_height; ?></td>
              <td><input type="text" name="global_config_image_height" value="<?php echo $global_config_image_height; ?>" size="3" /></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185"><?php echo $entry_download; ?></td>
              <td><?php if ($catalog_config_download) { ?>
                <input type="radio" name="catalog_config_download" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_download" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="catalog_config_download" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="catalog_config_download" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_download_status; ?></td>
              <td><select name="catalog_config_download_status">
                  <?php foreach ($order_statuses as $order_status) { ?>
                  <?php if ($order_status['order_status_id'] == $catalog_config_download_status) { ?>
                  <option value="<?php echo $order_status['order_status_id']; ?>" selected><?php echo $order_status['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript"><!--
  tabview_initialize('tab');
  //--></script>
  <script type="text/javascript"><!--
  $('#zone').load('index.php?controller=setting&action=zone&country_id=<?php echo $global_config_country_id; ?>&zone_id=<?php echo $global_config_zone_id; ?>');
  //--></script>
</form>
