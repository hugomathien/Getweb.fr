<?php if ($error) { ?>
<div class="warning"><?php echo $error; ?></div>
<?php } ?>
<table cellspacing="5" cellpadding="6" id="login">
  <tr>
    <td><img src="template/default/image/login.png" /></td>
    <td id="login_form"><form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <table cellpadding="1">
          <tr>
            <td><?php echo $entry_username; ?></td>
          </tr>
          <tr>
            <td><input type="text" name="username" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_password; ?></td>
          </tr>
          <tr>
            <td><input type="password" name="password" /></td>
          </tr>
          <tr>
            <td><input type="submit" value="<?php echo $button_login; ?>" id="login_button" /></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
