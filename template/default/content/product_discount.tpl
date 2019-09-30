<tr id="discount_<?php echo $discount_id; ?>">
  <td><?php echo $entry_quantity; ?></td>
  <td><input type="text" name="product_discount[<?php echo $discount_id; ?>][quantity]" value="" size="2" /></td>
  <td><?php echo $entry_discount; ?></td>
  <td><input type="text" name="product_discount[<?php echo $discount_id; ?>][discount]" value="" /></td>
  <td><input type="button" value="<?php echo $button_remove; ?>" onclick="removeDiscount('discount_<?php echo $discount_id; ?>');" /></td>
</tr>
