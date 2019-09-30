<div class="task">
  <div class="enabled" onmouseover="className='hover'" onmouseout="className='enabled'" onclick="location='<?php echo $list; ?>'"><img src="template/default/image/list_enabled.png" alt="<?php echo $button_list; ?>" class="png" /><?php echo $button_list; ?></div>
  <div class="enabled" onmouseover="className='hover'" onmouseout="className='enabled'" onclick="location='<?php echo $insert; ?>'"><img src="template/default/image/insert_enabled.png" alt="<?php echo $button_insert; ?>" class="png" /><?php echo $button_insert; ?></div>
  <?php if (@$update) { ?>
  <div class="enabled" onmouseover="className='hover'" onmouseout="className='enabled'" onclick="location='<?php echo $update; ?>'"><img src="template/default/image/update_enabled.png" alt="<?php echo $button_update; ?>" class="png" /><?php echo $button_update; ?></div>
  <?php } else { ?>
  <div class="disabled"><img src="template/default/image/update_disabled.png" alt="<?php echo $button_update; ?>" class="png" /><?php echo $button_update; ?></div>
  <?php } ?>
  <?php if (@$delete) { ?>
  <div class="enabled" onmouseover="className='hover'" onmouseout="className='enabled'" onclick="location='<?php echo $delete; ?>';"><img src="template/default/image/delete_enabled.png" alt="<?php echo $button_delete; ?>" class="png" /><?php echo $button_delete; ?></div>
  <?php } else { ?>
  <div class="disabled"><img src="template/default/image/delete_disabled.png" alt="<?php echo $button_delete; ?>" class="png" /><?php echo $button_delete; ?></div>
  <?php } ?>
  <div class="enabled" onmouseover="className='hover'" onmouseout="className='enabled'" onclick="document.getElementById('form').submit();"><img src="template/default/image/save_enabled.png" alt="<?php echo $button_save; ?>" class="png" /><?php echo $button_save; ?></div>
  <div class="enabled" onmouseover="className='hover'" onmouseout="className='enabled'" onclick="location='<?php echo $cancel; ?>'"><img src="template/default/image/cancel_enabled.png" alt="<?php echo $button_cancel; ?>" class="png" /><?php echo $button_cancel; ?></div>
</div>
<?php if ($error) { ?>
<div class="warning"><?php echo $error; ?></div>
<?php } ?>
<div class="heading"><?php echo $heading_title; ?></div>
<div class="description"><?php echo $heading_description; ?></div>
<script type="text/javascript" src="javascript/tab/tab.js"></script>
<link rel="stylesheet" type="text/css" href="javascript/tab/tab.css" />
<script type="text/javascript" src="javascript/ajax/jquery.js"></script>
<script type="text/javascript" src="javascript/fckeditor/fckeditor.js"></script>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
  <div class="tab" id="tab">
    <div class="tabs"><a><?php echo $tab_general; ?></a><a><?php echo $tab_data; ?></a><a href="#discount"><?php echo $tab_discount; ?></a><a><?php echo $tab_image; ?></a><a><?php echo $tab_download; ?></a><a><?php echo $tab_category; ?></a></div>
    <div class="pages">
      <div class="page">
        <div id="tabmini">
          <div class="tabs">
            <?php foreach ($products as $product) { ?>
            <a><?php echo $product['language']; ?></a>
            <?php } ?>
          </div>
          <div class="pages">
            <?php foreach ($products as $product) { ?>
            <div class="page">
              <div class="minipad">
                <table>
                  <tr>
                    <td width="185"><span class="required">*</span> <?php echo $entry_name; ?></td>
                    <td><input name="name[<?php echo $product['language_id']; ?>]" value="<?php echo $product['name']; ?>" />
                      <?php if ($error_name) { ?>
                      <span class="error"><?php echo $error_name; ?></span>
                      <?php } ?></td>
                  </tr>
                  <tr>
                    <td valign="top"><span class="required">*</span> <?php echo $entry_description; ?></td>
                    <td><textarea name="description[<?php echo $product['language_id']; ?>]" id="description<?php echo $product['language_id']; ?>"><?php echo $product['description']; ?></textarea>
                      <?php if ($error_description) { ?>
                      <span class="error"><?php echo $error_description; ?></span>
                      <?php } ?></td>
                  </tr>
                </table>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185"><span class="required">*</span> <?php echo $entry_model; ?></td>
              <td><input name="model" value="<?php echo $model; ?>" />
                <?php if ($error_model) { ?>
                <span class="error"><?php echo $error_model; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_manufacturer; ?></td>
              <td><select name="manufacturer_id">
                  <option value="0" selected><?php echo $text_none; ?></option>
                  <?php foreach ($manufacturers as $manufacturer) { ?>
                  <?php if ($manufacturer['manufacturer_id'] == $manufacturer_id) { ?>
                  <option value="<?php echo $manufacturer['manufacturer_id']; ?>" selected><?php echo $manufacturer['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $manufacturer['manufacturer_id']; ?>"><?php echo $manufacturer['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_shipping; ?></td>
              <td><?php if ($shipping == 1) { ?>
                <input type="radio" name="shipping" value="1" checked />
                <?php echo $text_yes; ?>
                <input type="radio" name="shipping" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="shipping" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="shipping" value="0" checked />
                <?php echo $text_no; ?>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_date_available; ?></td>
              <td><input name="date_available_day" value="<?php echo $date_available_day; ?>" size="2" maxlength="2" />
                <select name="date_available_month">
                  <?php foreach ($months as $month) { ?>
                  <?php if ($month['value'] == $date_available_month) { ?>
                  <option value="<?php echo $month['value']; ?>" selected><?php echo $month['text']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $month['value']; ?>"><?php echo $month['text']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
                <input name="date_available_year" value="<?php echo $date_available_year; ?>" size="4" maxlength="4" />
                <?php if ($error_date_available) { ?>
                <span class="error"><?php echo $error_date_available; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $entry_quantity; ?></td>
              <td><input name="quantity" value="<?php echo $quantity; ?>" size="2" /></td>
            </tr>
            <tr>
              <td><?php echo $entry_status; ?></td>
              <td><select name="status">
                  <?php if ($status == '1') { ?>
                  <option value="1" selected><?php echo $text_enabled; ?></option>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <option value="0" selected><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_sort_order; ?></td>
              <td><input name="sort_order" value="<?php echo $sort_order; ?>" size="1" /></td>
            </tr>
            <tr>
              <td><?php echo $entry_tax_class; ?></td>
              <td><select name="tax_class_id">
                  <option value="0"><?php echo $text_none; ?></option>
                  <?php foreach ($tax_classes as $tax_class) { ?>
                  <?php if ($tax_class['tax_class_id'] == $tax_class_id) { ?>
                  <option value="<?php echo $tax_class['tax_class_id']; ?>" selected><?php echo $tax_class['title']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $tax_class['tax_class_id']; ?>"><?php echo $tax_class['title']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_price; ?></td>
              <td><input name="price" value="<?php echo $price; ?>" /></td>
            </tr>
            <tr>
              <td><?php echo $entry_weight_class; ?></td>
              <td><select name="weight_class_id">
                  <?php foreach ($weight_classes as $weight_class) { ?>
                  <?php if ($weight_class['weight_class_id'] == $weight_class_id) { ?>
                  <option value="<?php echo $weight_class['weight_class_id']; ?>" selected><?php echo $weight_class['title']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $weight_class['weight_class_id']; ?>"><?php echo $weight_class['title']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_weight; ?></td>
              <td><input name="weight" value="<?php echo $weight; ?>" /></td>
            </tr>
          </table>
        </div>
      </div>
      <div id="discount" class="page">
        <div class="pad">
          <table id="discounts">
            <?php $i = 0; ?>
            <?php foreach ($product_discounts as $product_discount) { ?>
            <tr id="discount_<?php echo $i; ?>">
              <td><?php echo $entry_quantity; ?></td>
              <td><input type="text" name="product_discount[<?php echo $i; ?>][quantity]" value="<?php echo $product_discount['quantity']; ?>" size="2" /></td>
              <td><?php echo $entry_discount; ?></td>
              <td><input type="text" name="product_discount[<?php echo $i; ?>][discount]" value="<?php echo $product_discount['discount']; ?>" /></td>
              <td><input type="button" value="<?php echo $button_remove; ?>" onclick="removeDiscount('discount_<?php echo $i; ?>');" /></td>
            </tr>
            <?php $i++; ?>
            <?php } ?>
          </table>
          <table>
            <tr>
              <td colspan="5"><input type="button" value="<?php echo $button_add; ?>" onclick="addDiscount();" /></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185"><?php echo $entry_image; ?></td>
              <td><select name="image_id" id="image_id" onchange="$('#image').load('index.php?controller=image&action=view&image_id='+this.value);">
                  <?php foreach ($images as $image) { ?>
                  <?php if ($image['image_id'] == $image_id) { ?>
                  <option value="<?php echo $image['image_id']; ?>" selected><?php echo $image['title']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $image['image_id']; ?>"><?php echo $image['title']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td></td>
              <td id="image"></td>
            </tr>
            <tr>
              <td valign="top"><?php echo $entry_images; ?></td>
              <td><select name="image[]" multiple="multiple">
                  <?php foreach ($images as $image) { ?>
                  <?php if (!$image['product_id']) { ?>
                  <option value="<?php echo $image['image_id']; ?>"><?php echo $image['title']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $image['image_id']; ?>" selected><?php echo $image['title']; ?></option>
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
              <td width="185" valign="top"><?php echo $entry_download; ?></td>
              <td><select name="download[]" multiple="multiple">
                  <?php foreach ($downloads as $download) { ?>
                  <?php if (!$download['product_id']) { ?>
                  <option value="<?php echo $download['download_id']; ?>"><?php echo $download['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $download['download_id']; ?>" selected><?php echo $download['name']; ?></option>
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
              <td width="185" valign="top"><?php echo $entry_category; ?></td>
              <td><select name="category[]" multiple="multiple">
                  <?php foreach ($categories as $category) { ?>
                  <?php if (!$category['product_id']) { ?>
                  <option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $category['category_id']; ?>" selected><?php echo $category['name']; ?></option>
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
  var sBasePath           = document.location.href.replace(/index\.php.*/, 'javascript/fckeditor/');
  <?php foreach ($products as $product) { ?>
  var oFCKeditor<?php echo $product['language_id']; ?>          = new FCKeditor('description<?php echo $product['language_id']; ?>');
	  oFCKeditor<?php echo $product['language_id']; ?>.BasePath = sBasePath;
	  oFCKeditor<?php echo $product['language_id']; ?>.Value	= document.getElementById('description<?php echo $product['language_id']; ?>').value;
	  oFCKeditor<?php echo $product['language_id']; ?>.Width    = '600';
	  oFCKeditor<?php echo $product['language_id']; ?>.Height   = '300';
	  oFCKeditor<?php echo $product['language_id']; ?>.ReplaceTextarea();
  <?php } ?>	  
  //--></script>
  <script type="text/javascript"><!--
function addDiscount() {
	$.ajax({
   		type:    'GET',
   		url:     'index.php?controller=product&action=discount&discount_id='+$('#discounts tr').size(),
		async:   false,
   		success: function(data) {
     		$('#discounts').append(data);
   		}
 	});
}
  
function removeDiscount(row) {
  	$('#'+row).remove();
}
//--></script>
  <script type="text/javascript"><!--
  $('#image').load('index.php?controller=image&action=view&image_id='+document.getElementById('image_id').value);
  //--></script>
  <script type="text/javascript"><!--
  tabview_initialize('tab');
  //--></script>
  <script type="text/javascript"><!--
  tabview_initialize('tabmini');
  //--></script>
</form>
