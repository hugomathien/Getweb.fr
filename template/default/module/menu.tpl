<link rel="stylesheet" href="javascript/JSCookMenu/default/theme.css" type="text/css" />

<script type="text/javascript" src="javascript/JSCookMenu/JSCookMenu.js"></script>

<script type="text/javascript" src="javascript/JSCookMenu/default/theme.js"></script>

<div id="myMenuID"></div>

<script language="JavaScript"><!--  

  var myMenu = [ 

    [null, '<?php echo $text_admin; ?>', null, null, null,

	    ['<img src="javascript/JSCookMenu/default/home.png" />', '<?php echo $text_home; ?>', '<?php echo $home; ?>', null, null],

	    ['<img src="javascript/JSCookMenu/default/shop.png" />', '<?php echo $text_shop; ?>', '<?php echo $shop; ?>', null, null],

	    ['<img src="javascript/JSCookMenu/default/configuration.png" />', '<?php echo $text_configuration; ?>', null, null, null,

			['<img src="javascript/JSCookMenu/default/setting.png" />', '<?php echo $text_setting; ?>', '<?php echo $setting; ?>', null, null],

		    ['<img src="javascript/JSCookMenu/default/users.png" />', '<?php echo $text_users; ?>', null, null, null,

		      ['<img src="javascript/JSCookMenu/default/user.png" />', '<?php echo $text_user; ?>', '<?php echo $user; ?>', null, null],

		      ['<img src="javascript/JSCookMenu/default/user_group.png" />', '<?php echo $text_user_group; ?>', '<?php echo $user_group; ?>', null, null]

		    ],

		    ['<img src="javascript/JSCookMenu/default/localisation.png" />', '<?php echo $text_localisation; ?>', null, null, null,

		      ['<img src="javascript/JSCookMenu/default/language.png" />', '<?php echo $text_language; ?>', '<?php echo $language; ?>', null, null],

		      ['<img src="javascript/JSCookMenu/default/currency.png" />', '<?php echo $text_currency; ?>', '<?php echo $currency; ?>', null, null],

		      ['<img src="javascript/JSCookMenu/default/order_status.png" />', '<?php echo $text_order_status; ?>', '<?php echo $order_status; ?>', null, null],

			  ['<img src="javascript/JSCookMenu/default/country.png" />', '<?php echo $text_country; ?>', '<?php echo $country; ?>', null, null],

		      ['<img src="javascript/JSCookMenu/default/zone.png" />', '<?php echo $text_zone; ?>', '<?php echo $zone; ?>', null, null],

		      ['<img src="javascript/JSCookMenu/default/geo_zone.png" />', '<?php echo $text_geo_zone; ?>', '<?php echo $geo_zone; ?>', null, null],

		      ['<img src="javascript/JSCookMenu/default/tax_class.png" />', '<?php echo $text_tax_class; ?>', '<?php echo $tax_class; ?>', null, null],

		      ['<img src="javascript/JSCookMenu/default/weight_class.png" />', '<?php echo $text_weight_class; ?>', '<?php echo $weight_class; ?>', null, null]

		    ],

		    ['<img src="javascript/JSCookMenu/default/url_alias.png" />', '<?php echo $text_url_alias; ?>', '<?php echo $url_alias; ?>', null, null],

			['<img src="javascript/JSCookMenu/default/backup.png" />', '<?php echo $text_backup; ?>', '<?php echo $backup; ?>', null, null],

		    ['<img src="javascript/JSCookMenu/default/server_info.png" />', '<?php echo $text_server_info; ?>', '<?php echo $server_info; ?>', null, null]

			],			

	    ['<img src="javascript/JSCookMenu/default/logout.png" />', '<?php echo $text_logout; ?>', '<?php echo $logout; ?>', null, null]

	  ],

//--></script>

<script language="JavaScript"><!--

  cmDraw('myMenuID', myMenu, 'hbr', cmThemeDefault, 'ThemeDefault');

//--></script>