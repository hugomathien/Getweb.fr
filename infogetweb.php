<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html dir="ltr" lang="en">
<head>
<title>Administration</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<base href="http://demo.opensourcecms.com/opencart/admin/">

<link rel="stylesheet" type="text/css" href="template/default/css/default.css">
</head>
<body>
<div id="header"><h1>Administration</h1>
<div class="a">Vous êtes connecté en tant qu'<strong>administrateur</strong></div>
</div>
<link rel="stylesheet" href="javascript/JSCookMenu/default/theme.css" type="text/css" />

<script type="text/javascript" src="javascript/JSCookMenu/JSCookMenu.js"></script>

<script type="text/javascript" src="javascript/JSCookMenu/default/theme.js"></script>

<div id="myMenuID"></div>

<script language="JavaScript"><!--  

  var myMenu = [ 

    [null, 'Admin', null, null, null,

	    ['<img src="javascript/JSCookMenu/default/home.png" />', 'Accueil', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=home', null, null],

	   

	    ['<img src="javascript/JSCookMenu/default/configuration.png" />', 'Configuration', null, null, null,

			['<img src="javascript/JSCookMenu/default/setting.png" />', 'Info GetWeb', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=setting', null, null],

		    ['<img src="javascript/JSCookMenu/default/url_alias.png" />', 'Agenda', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=url_alias', null, null],

			['<img src="javascript/JSCookMenu/default/backup.png" />', 'Sauvegarde', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=backup', null, null],

			],			
['<img src="javascript/JSCookMenu/default/currency.png" />', 'Budget', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=logout', null, null],
['<img src="javascript/JSCookMenu/default/report.png" />', 'Statistiques', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=logout', null, null],
['<img src="javascript/JSCookMenu/default/review.png" />', 'Marketing', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=logout', null, null],
	    ['<img src="javascript/JSCookMenu/default/logout.png" />', 'Logout', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=logout', null, null]

	  ],
    [null, 'Clients', null, null, null,

	    ['<img src="javascript/JSCookMenu/default/users.png" />', 'Gestion Clients', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=home', null, null],
	   

	    ['<img src="javascript/JSCookMenu/default/order.png" />', 'Réalisations', null, null, null,

			['<img src="javascript/JSCookMenu/default/module.png" />', 'Voir', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=setting', null, null],

		    ['<img src="javascript/JSCookMenu/default/url_alias.png" />', 'Ajouter', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=url_alias', null, null],


			],			
['<img src="javascript/JSCookMenu/default/order_status.png" />', 'Assistance', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=logout', null, null],


	  ],
	  
	  [null, 'Options', null, null, null,

	    ['<img src="javascript/JSCookMenu/default/newsletter.png" />', 'Email', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=home', null, null],
	    ['<img src="javascript/JSCookMenu/default/information.png" />', 'Boite à outils', null, null, null],			

	  ],

  ]
  

//--></script>

<script language="JavaScript"><!--

  cmDraw('myMenuID', myMenu, 'hbr', cmThemeDefault, 'ThemeDefault');

//--></script>

<div class="heading">Settings</div>
<div class="description">You can edit your shop information and settings here.</div>
<script type="text/javascript" src="javascript/tab/tab.js"></script>
<link rel="stylesheet" type="text/css" href="javascript/tab/tab.css" />
<script type="text/javascript" src="javascript/ajax/jquery.js"></script>
<form action="http://demo.opensourcecms.com/opencart/admin/index.php?controller=setting" method="post" enctype="multipart/form-data" id="form">

  <div class="tab" id="tab">
    <div class="tabs"><a>Shop</a><a>Admin</a><a>Local</a><a>Stock</a><a>Option</a><a>Mail</a><a>Cache</a><a>Image</a><a>Download</a></div>
    <div class="pages">
      <div class="page">

        <div class="pad">
          <table>
            <tr>
              <td width="185"><span class="required">*</span> Store Name:</td>
              <td><input type="text" name="global_config_store" value="Your Store" />
                </td>
            </tr>

            <tr>
              <td><span class="required">*</span> Store Owner:</td>
              <td><input type="text" name="global_config_owner" value="Your Name" />
                </td>
            </tr>
            <tr>
              <td valign="top"><span class="required">*</span> Address:</td>

              <td><textarea name="global_config_address" cols="40" rows="5">Address
City
County 
Postal Code
Country</textarea>
                </td>
            </tr>
            <tr>
              <td><span class="required">*</span> Telephone:</td>
              <td><input type="text" name="global_config_telephone" value="0123456789" />
                </td>

            </tr>
            <tr>
              <td>Fax:</td>
              <td><input type="text" name="global_config_fax" value="0123456789" /></td>
            </tr>
            <tr>
              <td>Template:</td>
              <td><select name="catalog_config_template">

                                                      <option value="default" selected>default</option>
                                                    </select></td>
            </tr>
            <tr>
              <td>Rows Per Page:</td>
              <td><input type="text" name="catalog_config_max_rows" value="9" size="2" /></td>
            </tr>
            <tr>

              <td>Use URL Alias:</td>
              <td>                <input type="radio" name="catalog_config_url_alias" value="1" checked />
                Yes                <input type="radio" name="catalog_config_url_alias" value="0" />
                No                </td>
            </tr>
            <tr>
              <td>Display Parse Time:</td>

              <td>                <input type="radio" name="catalog_config_parse_time" value="1" />
                Yes                <input type="radio" name="catalog_config_parse_time" value="0" checked />
                No                </td>
            </tr>
            <tr>
              <td>Use SSL:</td>
              <td>                <input type="radio" name="catalog_config_ssl" value="1" />

                Yes                <input type="radio" name="catalog_config_ssl" value="0" checked />
                No                </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="page">
        <div class="pad">

          <table>
            <tr>
              <td width="185">Template:</td>
              <td><select name="admin_config_template">
                                                      <option value="default" selected>default</option>
                                                    </select></td>
            </tr>
            <tr>

              <td>Rows Per Page:</td>
              <td><input type="text" name="admin_config_max_rows" value="20" size="2" /></td>
            </tr>
            <tr>
              <td>Display Parse Time:</td>
              <td>                <input type="radio" name="admin_config_parse_time" value="1" />
                Yes                <input type="radio" name="admin_config_parse_time" value="0" checked />

                No                </td>
            </tr>
            <tr>
              <td>Use SSL:</td>
              <td>                <input type="radio" name="admin_config_ssl" value="1" />
                Yes                <input type="radio" name="admin_config_ssl" value="0" checked />
                No                </td>

            </tr>
          </table>
        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185">Country:</td>

              <td><select name="global_config_country_id" onchange="$('#zone').load('index.php?controller=setting&action=zone&country_id='+this.value+'&zone_id=3563');">
                                                      <option value="1">Afghanistan</option>
                                                                        <option value="2">Albania</option>
                                                                        <option value="3">Algeria</option>
                                                                        <option value="4">American Samoa</option>
                                                                        <option value="5">Andorra</option>

                                                                        <option value="6">Angola</option>
                                                                        <option value="7">Anguilla</option>
                                                                        <option value="8">Antarctica</option>
                                                                        <option value="9">Antigua and Barbuda</option>
                                                                        <option value="10">Argentina</option>
                                                                        <option value="11">Armenia</option>

                                                                        <option value="12">Aruba</option>
                                                                        <option value="13">Australia</option>
                                                                        <option value="14">Austria</option>
                                                                        <option value="15">Azerbaijan</option>
                                                                        <option value="16">Bahamas</option>
                                                                        <option value="17">Bahrain</option>

                                                                        <option value="18">Bangladesh</option>
                                                                        <option value="19">Barbados</option>
                                                                        <option value="20">Belarus</option>
                                                                        <option value="21">Belgium</option>
                                                                        <option value="22">Belize</option>
                                                                        <option value="23">Benin</option>

                                                                        <option value="24">Bermuda</option>
                                                                        <option value="25">Bhutan</option>
                                                                        <option value="26">Bolivia</option>
                                                                        <option value="27">Bosnia and Herzegowina</option>
                                                                        <option value="28">Botswana</option>
                                                                        <option value="29">Bouvet Island</option>

                                                                        <option value="30">Brazil</option>
                                                                        <option value="31">British Indian Ocean Territory</option>
                                                                        <option value="32">Brunei Darussalam</option>
                                                                        <option value="33">Bulgaria</option>
                                                                        <option value="34">Burkina Faso</option>
                                                                        <option value="35">Burundi</option>

                                                                        <option value="36">Cambodia</option>
                                                                        <option value="37">Cameroon</option>
                                                                        <option value="38">Canada</option>
                                                                        <option value="39">Cape Verde</option>
                                                                        <option value="40">Cayman Islands</option>
                                                                        <option value="41">Central African Republic</option>

                                                                        <option value="42">Chad</option>
                                                                        <option value="43">Chile</option>
                                                                        <option value="44">China</option>
                                                                        <option value="45">Christmas Island</option>
                                                                        <option value="46">Cocos (Keeling) Islands</option>
                                                                        <option value="47">Colombia</option>

                                                                        <option value="48">Comoros</option>
                                                                        <option value="49">Congo</option>
                                                                        <option value="50">Cook Islands</option>
                                                                        <option value="51">Costa Rica</option>
                                                                        <option value="52">Cote D'Ivoire</option>
                                                                        <option value="53">Croatia</option>

                                                                        <option value="54">Cuba</option>
                                                                        <option value="55">Cyprus</option>
                                                                        <option value="56">Czech Republic</option>
                                                                        <option value="57">Denmark</option>
                                                                        <option value="58">Djibouti</option>
                                                                        <option value="59">Dominica</option>

                                                                        <option value="60">Dominican Republic</option>
                                                                        <option value="61">East Timor</option>
                                                                        <option value="62">Ecuador</option>
                                                                        <option value="63">Egypt</option>
                                                                        <option value="64">El Salvador</option>
                                                                        <option value="65">Equatorial Guinea</option>

                                                                        <option value="66">Eritrea</option>
                                                                        <option value="67">Estonia</option>
                                                                        <option value="68">Ethiopia</option>
                                                                        <option value="69">Falkland Islands (Malvinas)</option>
                                                                        <option value="70">Faroe Islands</option>
                                                                        <option value="71">Fiji</option>

                                                                        <option value="72">Finland</option>
                                                                        <option value="73">France</option>
                                                                        <option value="74">France, Metropolitan</option>
                                                                        <option value="75">French Guiana</option>
                                                                        <option value="76">French Polynesia</option>
                                                                        <option value="77">French Southern Territories</option>

                                                                        <option value="78">Gabon</option>
                                                                        <option value="79">Gambia</option>
                                                                        <option value="80">Georgia</option>
                                                                        <option value="81">Germany</option>
                                                                        <option value="82">Ghana</option>
                                                                        <option value="83">Gibraltar</option>

                                                                        <option value="84">Greece</option>
                                                                        <option value="85">Greenland</option>
                                                                        <option value="86">Grenada</option>
                                                                        <option value="87">Guadeloupe</option>
                                                                        <option value="88">Guam</option>
                                                                        <option value="89">Guatemala</option>

                                                                        <option value="90">Guinea</option>
                                                                        <option value="91">Guinea-bissau</option>
                                                                        <option value="92">Guyana</option>
                                                                        <option value="93">Haiti</option>
                                                                        <option value="94">Heard and Mc Donald Islands</option>
                                                                        <option value="95">Honduras</option>

                                                                        <option value="96">Hong Kong</option>
                                                                        <option value="97">Hungary</option>
                                                                        <option value="98">Iceland</option>
                                                                        <option value="99">India</option>
                                                                        <option value="100">Indonesia</option>
                                                                        <option value="101">Iran (Islamic Republic of)</option>

                                                                        <option value="102">Iraq</option>
                                                                        <option value="103">Ireland</option>
                                                                        <option value="104">Israel</option>
                                                                        <option value="105">Italy</option>
                                                                        <option value="106">Jamaica</option>
                                                                        <option value="107">Japan</option>

                                                                        <option value="108">Jordan</option>
                                                                        <option value="109">Kazakhstan</option>
                                                                        <option value="110">Kenya</option>
                                                                        <option value="111">Kiribati</option>
                                                                        <option value="112">Korea, Democratic People's Republic of</option>
                                                                        <option value="113">Korea, Republic of</option>

                                                                        <option value="114">Kuwait</option>
                                                                        <option value="115">Kyrgyzstan</option>
                                                                        <option value="116">Lao People's Democratic Republic</option>
                                                                        <option value="117">Latvia</option>
                                                                        <option value="118">Lebanon</option>
                                                                        <option value="119">Lesotho</option>

                                                                        <option value="120">Liberia</option>
                                                                        <option value="121">Libyan Arab Jamahiriya</option>
                                                                        <option value="122">Liechtenstein</option>
                                                                        <option value="123">Lithuania</option>
                                                                        <option value="124">Luxembourg</option>
                                                                        <option value="125">Macau</option>

                                                                        <option value="126">Macedonia, The Former Yugoslav Republic of</option>
                                                                        <option value="127">Madagascar</option>
                                                                        <option value="128">Malawi</option>
                                                                        <option value="129">Malaysia</option>
                                                                        <option value="130">Maldives</option>
                                                                        <option value="131">Mali</option>

                                                                        <option value="132">Malta</option>
                                                                        <option value="133">Marshall Islands</option>
                                                                        <option value="134">Martinique</option>
                                                                        <option value="135">Mauritania</option>
                                                                        <option value="136">Mauritius</option>
                                                                        <option value="137">Mayotte</option>

                                                                        <option value="138">Mexico</option>
                                                                        <option value="139">Micronesia, Federated States of</option>
                                                                        <option value="140">Moldova, Republic of</option>
                                                                        <option value="141">Monaco</option>
                                                                        <option value="142">Mongolia</option>
                                                                        <option value="143">Montserrat</option>

                                                                        <option value="144">Morocco</option>
                                                                        <option value="145">Mozambique</option>
                                                                        <option value="146">Myanmar</option>
                                                                        <option value="147">Namibia</option>
                                                                        <option value="148">Nauru</option>
                                                                        <option value="149">Nepal</option>

                                                                        <option value="150">Netherlands</option>
                                                                        <option value="151">Netherlands Antilles</option>
                                                                        <option value="152">New Caledonia</option>
                                                                        <option value="153">New Zealand</option>
                                                                        <option value="154">Nicaragua</option>
                                                                        <option value="155">Niger</option>

                                                                        <option value="156">Nigeria</option>
                                                                        <option value="157">Niue</option>
                                                                        <option value="158">Norfolk Island</option>
                                                                        <option value="159">Northern Mariana Islands</option>
                                                                        <option value="160">Norway</option>
                                                                        <option value="161">Oman</option>

                                                                        <option value="162">Pakistan</option>
                                                                        <option value="163">Palau</option>
                                                                        <option value="164">Panama</option>
                                                                        <option value="165">Papua New Guinea</option>
                                                                        <option value="166">Paraguay</option>
                                                                        <option value="167">Peru</option>

                                                                        <option value="168">Philippines</option>
                                                                        <option value="169">Pitcairn</option>
                                                                        <option value="170">Poland</option>
                                                                        <option value="171">Portugal</option>
                                                                        <option value="172">Puerto Rico</option>
                                                                        <option value="173">Qatar</option>

                                                                        <option value="174">Reunion</option>
                                                                        <option value="175">Romania</option>
                                                                        <option value="176">Russian Federation</option>
                                                                        <option value="177">Rwanda</option>
                                                                        <option value="178">Saint Kitts and Nevis</option>
                                                                        <option value="179">Saint Lucia</option>

                                                                        <option value="180">Saint Vincent and the Grenadines</option>
                                                                        <option value="181">Samoa</option>
                                                                        <option value="182">San Marino</option>
                                                                        <option value="183">Sao Tome and Principe</option>
                                                                        <option value="184">Saudi Arabia</option>
                                                                        <option value="185">Senegal</option>

                                                                        <option value="186">Seychelles</option>
                                                                        <option value="187">Sierra Leone</option>
                                                                        <option value="188">Singapore</option>
                                                                        <option value="189">Slovakia (Slovak Republic)</option>
                                                                        <option value="190">Slovenia</option>
                                                                        <option value="191">Solomon Islands</option>

                                                                        <option value="192">Somalia</option>
                                                                        <option value="193">South Africa</option>
                                                                        <option value="194">South Georgia and the South Sandwich Islands</option>
                                                                        <option value="195">Spain</option>
                                                                        <option value="196">Sri Lanka</option>
                                                                        <option value="197">St. Helena</option>

                                                                        <option value="198">St. Pierre and Miquelon</option>
                                                                        <option value="199">Sudan</option>
                                                                        <option value="200">Suriname</option>
                                                                        <option value="201">Svalbard and Jan Mayen Islands</option>
                                                                        <option value="202">Swaziland</option>
                                                                        <option value="203">Sweden</option>

                                                                        <option value="204">Switzerland</option>
                                                                        <option value="205">Syrian Arab Republic</option>
                                                                        <option value="206">Taiwan</option>
                                                                        <option value="207">Tajikistan</option>
                                                                        <option value="208">Tanzania, United Republic of</option>
                                                                        <option value="209">Thailand</option>

                                                                        <option value="210">Togo</option>
                                                                        <option value="211">Tokelau</option>
                                                                        <option value="212">Tonga</option>
                                                                        <option value="213">Trinidad and Tobago</option>
                                                                        <option value="214">Tunisia</option>
                                                                        <option value="215">Turkey</option>

                                                                        <option value="216">Turkmenistan</option>
                                                                        <option value="217">Turks and Caicos Islands</option>
                                                                        <option value="218">Tuvalu</option>
                                                                        <option value="219">Uganda</option>
                                                                        <option value="220">Ukraine</option>
                                                                        <option value="221">United Arab Emirates</option>

                                                                        <option value="222" selected>United Kingdom</option>
                                                                        <option value="223">United States</option>
                                                                        <option value="224">United States Minor Outlying Islands</option>
                                                                        <option value="225">Uruguay</option>
                                                                        <option value="226">Uzbekistan</option>
                                                                        <option value="227">Vanuatu</option>

                                                                        <option value="228">Vatican City State (Holy See)</option>
                                                                        <option value="229">Venezuela</option>
                                                                        <option value="230">Viet Nam</option>
                                                                        <option value="231">Virgin Islands (British)</option>
                                                                        <option value="232">Virgin Islands (U.S.)</option>
                                                                        <option value="233">Wallis and Futuna Islands</option>

                                                                        <option value="234">Western Sahara</option>
                                                                        <option value="235">Yemen</option>
                                                                        <option value="236">Yugoslavia</option>
                                                                        <option value="237">Zaire</option>
                                                                        <option value="238">Zambia</option>
                                                                        <option value="239">Zimbabwe</option>

                                                    </select>
              </td>
            </tr>
            <tr>
              <td>Region / State:</td>
              <td id="zone"><select name="global_config_zone_id">
                </select></td>
            </tr>

            <tr>
              <td>Language:</td>
              <td><select name="global_config_language">
                                                      <option value="en" selected>English</option>
                                                    </select>
              </td>
            </tr>
            <tr>

              <td>Currency:</td>
              <td><select name="global_config_currency">
                                                      <option value="USD">US Dollar</option>
                                                                        <option value="EUR">Euro</option>
                                                                        <option value="GBP" selected>Pound Sterling</option>
                                                    </select></td>
            </tr>

            <tr>
              <td>Weight:</td>
              <td><select name="global_config_weight_class_id">
                                                      <option value="1">Gram(s)</option>
                                                                        <option value="3">Ounce(s)</option>
                                                                        <option value="4">Pound(s)</option>
                                                                        <option value="2" selected>Kilogram(s)</option>

                                                    </select></td>
            </tr>
            <tr>
              <td>Tax:</td>
              <td>                <input type="radio" name="global_config_tax" value="1" checked />
                Yes                <input type="radio" name="global_config_tax" value="0" />
                No                </td>

            </tr>
            <tr>
              <td>Order Status:</td>
              <td><select name="global_config_order_status_id">
                                                      <option value="12">Canceled</option>
                                                                        <option value="16">Complete</option>
                                                                        <option value="1" selected>Pending</option>

                                                                        <option value="2">Processing</option>
                                                                        <option value="3">Shipped</option>
                                                    </select></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="page">

        <div class="pad">
          <table>
            <tr>
              <td width="185">Check Stock:</td>
              <td>                <input type="radio" name="catalog_config_stock_check" value="1" />
                Yes                <input type="radio" name="catalog_config_stock_check" value="0" checked />
                No                </td>

            </tr>
            <tr>
              <td>Allow Checkout:</td>
              <td>                <input type="radio" name="catalog_config_stock_checkout" value="1" checked />
                Yes                <input type="radio" name="catalog_config_stock_checkout" value="0" />
                No                </td>
            </tr>

            <tr>
              <td width="185">Subtract Stock:</td>
              <td>                <input type="radio" name="catalog_config_stock_subtract" value="1" />
                Yes                <input type="radio" name="catalog_config_stock_subtract" value="0" checked />
                No                </td>
            </tr>
          </table>

        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185">VAT Registration ID:</td>
              <td><input type="text" name="catalog_config_vat" value="123456" /></td>

            </tr>
            <tr>
              <td>Account Terms:</td>
              <td><select name="catalog_config_account_id">
                  <option value="0"> --- None --- </option>
                                                      <option value="1">About Us</option>
                                                                        <option value="2">Privacy Policy</option>

                                                                        <option value="3">Terms & Conditions</option>
                                                    </select></td>
            </tr>
            <tr>
              <td>Checkout Terms:</td>
              <td><select name="catalog_config_checkout_id">
                  <option value="0"> --- None --- </option>

                                                      <option value="1">About Us</option>
                                                                        <option value="2">Privacy Policy</option>
                                                                        <option value="3" selected>Terms & Conditions</option>
                                                    </select></td>
            </tr>
          </table>
        </div>

      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185">E-Mail:</td>
              <td><input type="text" name="global_config_email" value="webmaster@opencart.com" /></td>
            </tr>

            <tr>
              <td>Send E-Mails:</td>
              <td>                <input type="radio" name="global_config_email_send" value="1" checked />
                Yes                <input type="radio" name="global_config_email_send" value="0" />
                No                </td>
            </tr>
          </table>

        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td>Database Caching:</td>
              <td>                <input type="radio" name="global_config_cache_query" value="1" checked />

                Yes                <input type="radio" name="global_config_cache_query" value="0" />
                No                </td>
            </tr>
            <tr>
              <td width="185">Use Compression:</td>
              <td>                <input type="radio" name="global_config_compress_output" value="1" checked />
                Yes                <input type="radio" name="global_config_compress_output" value="0" />

                No                </td>
            </tr>
            <tr>
              <td>Compression Level:</td>
              <td><input type="text" name="global_config_compress_level" value="4" size="3" /></td>
            </tr>
          </table>
        </div>

      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>
              <td width="185">Resize Images:</td>
              <td>                <input type="radio" name="global_config_image_resize" value="1" checked />
                Yes                <input type="radio" name="global_config_image_resize" value="0" />

                No                </td>
            </tr>
            <tr>
              <td>Image Width:</td>
              <td><input type="text" name="global_config_image_width" value="100" size="3" /></td>
            </tr>
            <tr>
              <td>Image Height:</td>

              <td><input type="text" name="global_config_image_height" value="100" size="3" /></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="page">
        <div class="pad">
          <table>
            <tr>

              <td width="185">Allow Download:</td>
              <td>                <input type="radio" name="catalog_config_download" value="1" checked />
                Yes                <input type="radio" name="catalog_config_download" value="0" />
                No                </td>
            </tr>
            <tr>
              <td>Download Status:</td>

              <td><select name="catalog_config_download_status">
                                                      <option value="12">Canceled</option>
                                                                        <option value="16" selected>Complete</option>
                                                                        <option value="1">Pending</option>
                                                                        <option value="2">Processing</option>
                                                                        <option value="3">Shipped</option>

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
  $('#zone').load('index.php?controller=setting&action=zone&country_id=222&zone_id=3563');
  //--></script>
</form>
<div id="footer">
  <p><a href="http://www.opencart.com">www.getweb.fr</a></p>
</div>
</body>
</html>