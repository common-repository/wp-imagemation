<?php
/*
Plugin Name: WP_ImageMation
Plugin URI: http://www.finethemes.com/ImageMation
Description: Gives video effect to the images. It shows a set of sliding images on your website or wordpress pages/posts. 
You can specify the window size in which the images will move as per the direction of mouse. 
Captions can also be specified for each image. The image can be moved to any four directions with the movement of the mouse.
Version: 1.1
Author: Ravi
Author URI: http://www.finethemes.com
*/

/*  Copyright 2009  Ravinder Mann  (email : ravi@finethemes.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if (!class_exists("WP_ImageMation")) {
	class WP_ImageMation {
		var $adminOptionsName = "WP_ImageMationAdminOptions";
		
		
		function WP_ImageMation() { //constructor
			global $img_width;
		}
		function init() {
			$this->getAdminOptions();
			}
		
	
		//Returns an array of admin options
		function getAdminOptions() {
			$imageMationAdminOptions = array(
			    'width' => '200',
			    'height' => '100',
			    'direction' => 'TOPRIGHT',
			    'image1' => '',
				'image2' => '', 
				'image3' => '', 
				'image4' => '',
				'image5' => '',
				'image6' => '',
				'image7' => '',
				'image8' => '',
				'image9' => '',
				'image10' => '',
				'caption1' => '',
				'caption2' => '', 
				'caption3' => '', 
				'caption4' => '',
				'caption5' => '',
				'caption6' => '',
				'caption7' => '',
				'caption8' => '',
				'caption9' => '',
				'caption10' => ''
				);
				
				
			$imageMationOptions = get_option($this->adminOptionsName);
			if (!empty($imageMationOptions)) {
				foreach ($imageMationOptions as $key => $option)
					$imageMationAdminOptions[$key] = $option;
			}				
			update_option($this->adminOptionsName, $imageMationAdminOptions);
			return $imageMationAdminOptions;
		 }
		
		function addHeaderCode() {
    
    global $img_width;
	echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/WP_ImageMation/ImageExp.css" />' . "\n";
 
            if (function_exists('wp_enqueue_script')) {

                wp_enqueue_script('imageMation_plugin_series', get_bloginfo('wpurl') . '/wp-content/plugins/WP_ImageMation/ImageMation.ImageExp.nocache.js','0.1');

            }

		$imageMationOptions = $this->getAdminOptions();
		
		$js_string="";
		
//		 url: "http://www.url-1.com/a.jpg----"+ "http://www.url-2.com/a.jpg----"+ "http://www.url-3.com/a.jpg----"+ "http://www.url-4.com/a.jpg----"+ "http://www.url-5.com/a.jpg", 
		 
	if(trim($imageMationOptions['image1'])!="")
	$js_string=$js_string.'"'.$imageMationOptions['image1'].'----"+'."\n";
	if(trim($imageMationOptions['image2'])!="")
	$js_string=$js_string.'"'.$imageMationOptions['image2'].'----"+'."\n";
if(trim($imageMationOptions['image3'])!="")
	$js_string=$js_string.'"'.$imageMationOptions['image3'].'----"+'."\n";
if(trim($imageMationOptions['image4'])!="")
	$js_string=$js_string.'"'.$imageMationOptions['image4'].'----"+'."\n";
if(trim($imageMationOptions['image5'])!="")
	$js_string=$js_string.'"'.$imageMationOptions['image5'].'----"+'."\n";
if(trim($imageMationOptions['image6'])!="")
	$js_string=$js_string.'"'.$imageMationOptions['image6'].'----"+'."\n";
if(trim($imageMationOptions['image7'])!="")
	$js_string=$js_string.'"'.$imageMationOptions['image7'].'----"+'."\n";
if(trim($imageMationOptions['image8'])!="")
	$js_string=$js_string.'"'.$imageMationOptions['image8'].'----"+'."\n";
if(trim($imageMationOptions['image9'])!="")
	$js_string=$js_string.'"'.$imageMationOptions['image9'].'----"+'."\n";
if(trim($imageMationOptions['image10'])!="")
	$js_string=$js_string.'"'.$imageMationOptions['image10'].'----"+'."\n";

$js_string = substr($js_string, 0, -7);
$js_string=$js_string.'",'."\n";

$js_string2="";

if(trim($imageMationOptions['caption1'])!="")
	$js_string2=$js_string2.'"'.$imageMationOptions['caption1'].'----"+'."\n";
else
	$js_string2=$js_string2.'"----"+'."\n";
	if(trim($imageMationOptions['caption2'])!="")
	$js_string2=$js_string2.'"'.$imageMationOptions['caption2'].'----"+'."\n";
	else
	$js_string2=$js_string2.'"----"+'."\n";

if(trim($imageMationOptions['caption3'])!="")
	$js_string2=$js_string2.'"'.$imageMationOptions['caption3'].'----"+'."\n";
	else
	$js_string2=$js_string2.'"----"+'."\n";

if(trim($imageMationOptions['caption4'])!="")
	$js_string2=$js_string2.'"'.$imageMationOptions['caption4'].'----"+'."\n";
	else
	$js_string2=$js_string2.'"----"+'."\n";

if(trim($imageMationOptions['caption5'])!="")
	$js_string2=$js_string2.'"'.$imageMationOptions['caption5'].'----"+'."\n";
	else
	$js_string2=$js_string2.'"----"+'."\n";

if(trim($imageMationOptions['caption6'])!="")
	$js_string2=$js_string2.'"'.$imageMationOptions['caption6'].'----"+'."\n";
	else
	$js_string2=$js_string2.'"----"+'."\n";

if(trim($imageMationOptions['caption7'])!="")
	$js_string2=$js_string2.'"'.$imageMationOptions['caption7'].'----"+'."\n";
	else
	$js_string2=$js_string2.'"----"+'."\n";

if(trim($imageMationOptions['caption8'])!="")
	$js_string2=$js_string2.'"'.$imageMationOptions['caption8'].'----"+'."\n";
	else
	$js_string2=$js_string2.'"----"+'."\n";

if(trim($imageMationOptions['caption9'])!="")
	$js_string2=$js_string2.'"'.$imageMationOptions['caption9'].'----"+'."\n";
	else
	$js_string2=$js_string2.'"----"+'."\n";

if(trim($imageMationOptions['caption10'])!="")
	$js_string2=$js_string2.'"'.$imageMationOptions['caption10'].'----"+'."\n";
	else
	$js_string2=$js_string2.'"----"+'."\n";


$js_string2 = substr($js_string2, 0, -7);
$js_string2=$js_string2.'"'."\n";


//	print $js_string;
$img_width=$imageMationOptions['width'];

	echo '<script type="text/javascript">'."\n";	
	echo	'var ImageMation = { 
width: "'.$imageMationOptions['width'].'", 
height: "'.$imageMationOptions['height'].'", 
url: '.$js_string;

echo 'direction: "TOPRIGHT"';

if(strlen($js_string2)>3)
echo ','."\n".'descriptions: '.$js_string2;
echo ' }; ';
echo "\n".'</script>';


		}
		
		//Prints out the admin page
		function printAdminPage() {
					$imageMationOptions = $this->getAdminOptions();
										
					if (isset($_POST['update_WP_ImageMationSettings'])) { 
					
					    if (isset($_POST['ImageMation_height'])) {
							$imageMationOptions['height'] = $_POST['ImageMation_height'];
						}
						if (isset($_POST['ImageMation_width'])) {
							$imageMationOptions['width'] = $_POST['ImageMation_width'];
						}
						if (isset($_POST['ImageMation_image1'])) {
							$imageMationOptions['image1'] = $_POST['ImageMation_image1'];
						}
						if (isset($_POST['ImageMation_image2'])) {
							$imageMationOptions['image2'] = $_POST['ImageMation_image2'];
						}
						if (isset($_POST['ImageMation_image3'])) {
							$imageMationOptions['image3'] = $_POST['ImageMation_image3'];
						}
						if (isset($_POST['ImageMation_image4'])) {
							$imageMationOptions['image4'] = $_POST['ImageMation_image4'];
						}
						if (isset($_POST['ImageMation_image5'])) {
							$imageMationOptions['image5'] = $_POST['ImageMation_image5'];
						}
						if (isset($_POST['ImageMation_image6'])) {
							$imageMationOptions['image6'] = $_POST['ImageMation_image6'];
						}
						if (isset($_POST['ImageMation_image7'])) {
							$imageMationOptions['image7'] = $_POST['ImageMation_image7'];
						}
						if (isset($_POST['ImageMation_image8'])) {
							$imageMationOptions['image8'] = $_POST['ImageMation_image8'];
						}
						if (isset($_POST['ImageMation_image9'])) {
							$imageMationOptions['image9'] = $_POST['ImageMation_image9'];
						}
						if (isset($_POST['ImageMation_image10'])) {
							$imageMationOptions['image10'] = $_POST['ImageMation_image10'];
						}
						
						
						if (isset($_POST['ImageMation_caption1'])) {
							$imageMationOptions['caption1'] = $_POST['ImageMation_caption1'];
						}
						if (isset($_POST['ImageMation_caption2'])) {
							$imageMationOptions['caption2'] = $_POST['ImageMation_caption2'];
						}
						if (isset($_POST['ImageMation_caption3'])) {
							$imageMationOptions['caption3'] = $_POST['ImageMation_caption3'];
						}
						if (isset($_POST['ImageMation_caption4'])) {
							$imageMationOptions['caption4'] = $_POST['ImageMation_caption4'];
						}
						if (isset($_POST['ImageMation_caption5'])) {
							$imageMationOptions['caption5'] = $_POST['ImageMation_caption5'];
						}
						if (isset($_POST['ImageMation_caption6'])) {
							$imageMationOptions['caption6'] = $_POST['ImageMation_caption6'];
						}
						if (isset($_POST['ImageMation_caption7'])) {
							$imageMationOptions['caption7'] = $_POST['ImageMation_caption7'];
						}
						if (isset($_POST['ImageMation_caption8'])) {
							$imageMationOptions['caption8'] = $_POST['ImageMation_caption8'];
						}
						if (isset($_POST['ImageMation_caption9'])) {
							$imageMationOptions['caption9'] = $_POST['ImageMation_caption9'];
						}
						if (isset($_POST['ImageMation_caption10'])) {
							$imageMationOptions['caption10'] = $_POST['ImageMation_caption10'];
						}
						
						
					
						update_option($this->adminOptionsName, $imageMationOptions);
						
						?>
<div class="updated"><p><strong><?php _e("Settings Updated.", "WP_ImageMation");?></strong></p></div>
					<?php
					} ?>
<div class='wrap'>
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
<h2>WP ImageMation Settings</h2>
[please make sure that you've added the widget at the required place such as sidebar or footer etc. You can add the widget from 'Appearance - Widget menu']<br /><br /> 
<br /><br />
<b><u>Image Box Dimensions</u></b><br />
Please specify the dimensions in pixels for image box. This is the box in which the images will be displayed. Please make sure that width or height
is set according to the space available. If you're placing this widget in your sidebar then the width should be set accordingly to fit into the sidebar.
<br /><br />
<b>Image Box Height</b> : <input size='5' type="text" id="ImageMation_height" name="ImageMation_height" value="<?php echo $imageMationOptions['height']; ?>" />px
&nbsp&nbsp&nbsp&nbsp
<b>Image Box Widht</b> : <input size='5' type="text" id="ImageMation_width" name="ImageMation_width" value="<?php echo $imageMationOptions['width']; ?>" />px

<br /><br />

<b><u>Image Locations [upto 10]</u></b><br />
Please specify image URL's. You can get these from different shared image sites or create a account at <u>www.flickr.com</u> and upload your own images and specify those URL's. <br /><br />
<b>Image 1 URL</b> : <input size='55' type="text" id="ImageMation_image1" name="ImageMation_image1" value="<?php echo $imageMationOptions['image1']; ?>" /><br />
<b>Image 1 Caption</b> : <input size='55' type="text" id="ImageMation_caption1" name="ImageMation_caption1" value="<?php echo $imageMationOptions['caption1']; ?>" /><br />
<br />
<b>Image 2 URL</b> : <input size='55'  type="text" id="ImageMation_image2" name="ImageMation_image2" value="<?php  echo $imageMationOptions['image2']; ?>" /><br />
<b>Image 2 Caption</b> : <input size='55' type="text" id="ImageMation_caption2" name="ImageMation_caption2" value="<?php echo $imageMationOptions['caption2']; ?>" /><br />
<br />
<b>Image 3 URL</b> : <input size='55'  type="text" id="ImageMation_image3" name="ImageMation_image3" value="<?php  echo $imageMationOptions['image3']; ?>" /><br />
<b>Image 3 Caption</b> : <input size='55' type="text" id="ImageMation_caption3" name="ImageMation_caption3" value="<?php echo $imageMationOptions['caption3']; ?>" /><br />
<br />
<b>Image 4 URL</b> : <input size='55'  type="text" id="ImageMation_image4" name="ImageMation_image4" value="<?php  echo $imageMationOptions['image4']; ?>" /><br />
<b>Image 4 Caption</b> : <input size='55' type="text" id="ImageMation_caption4" name="ImageMation_caption4" value="<?php echo $imageMationOptions['caption4']; ?>" /><br />
<br />
<b>Image 5 URL</b> : <input size='55'  type="text" id="ImageMation_image5" name="ImageMation_image5" value="<?php echo $imageMationOptions['image5']; ?>" /><br />
<b>Image 5 Caption</b> : <input size='55' type="text" id="ImageMation_caption5" name="ImageMation_caption5" value="<?php echo $imageMationOptions['caption5']; ?>" /><br />
<br />
<b>Image 6 URL</b> : <input size='55'  type="text" id="ImageMation_image6" name="ImageMation_image6" value="<?php  echo $imageMationOptions['image6']; ?>" /><br />
<b>Image 6 Caption</b> : <input size='55' type="text" id="ImageMation_caption6" name="ImageMation_caption6" value="<?php echo $imageMationOptions['caption6']; ?>" /><br />
<br />
<b>Image 7 URL</b> : <input size='55'  type="text" id="ImageMation_image7" name="ImageMation_image7" value="<?php  echo $imageMationOptions['image7']; ?>" /><br />
<b>Image 7 Caption</b> : <input size='55' type="text" id="ImageMation_caption7" name="ImageMation_caption7" value="<?php echo $imageMationOptions['caption7']; ?>" /><br />
<br />
<b>Image 8 URL</b> : <input size='55'  type="text" id="ImageMation_image8" name="ImageMation_image8" value="<?php  echo $imageMationOptions['image8']; ?>" /><br />
<b>Image 8 Caption</b> : <input size='55' type="text" id="ImageMation_caption8" name="ImageMation_caption8" value="<?php echo $imageMationOptions['caption8']; ?>" /><br />
<br />
<b>Image 9 URL</b> : <input size='55'  type="text" id="ImageMation_image9" name="ImageMation_image9" value="<?php  echo $imageMationOptions['image9']; ?>" /><br />
<b>Image 9 Caption</b> : <input size='55' type="text" id="ImageMation_caption9" name="ImageMation_caption9" value="<?php echo $imageMationOptions['caption9']; ?>" /><br />
<br />
<b>Image 10 URL</b> : <input size='55'  type="text" id="ImageMation_image10" name="ImageMation_image10" value="<?php  echo $imageMationOptions['image10']; ?>" /><br />
<b>Image 10 Caption</b> : <input size='55' type="text" id="ImageMation_caption10" name="ImageMation_caption10" value="<?php echo $imageMationOptions['caption10']; ?>" /><br />
<br />

<div class="submit">
<input type="submit" name="update_WP_ImageMationSettings" value="<?php _e('Update Settings', 'WP_ImageMation') ?>" /></div>
</form>
 </div>
					<?php
				}//End function printAdminPage()
	
	}

} //End Class WP_ImageMation

if (class_exists("WP_ImageMation")) {
	$ImageMation_pluginSeries = new WP_ImageMation();
}

//Initialize the admin panel
if (!function_exists("WP_ImageMation_ap")) {
	function WP_ImageMation_ap() {
		global $ImageMation_pluginSeries;
		if (!isset($ImageMation_pluginSeries)) {
			return;
		}
		if (function_exists('add_options_page')) {
	add_options_page('WP_ImageMation', 'WP_ImageMation', 9, basename(__FILE__), array(&$ImageMation_pluginSeries, 'printAdminPage'));
		}
	}	
}

//Actions and Filters	
if (isset($ImageMation_pluginSeries)) {
	//Actions
	add_action('admin_menu', 'WP_ImageMation_ap');
	add_action('wp_head', array(&$ImageMation_pluginSeries, 'addHeaderCode'), 1);
	add_action('activate_WP_ImageMation/WP_ImageMation.php',  array(&$ImageMation_pluginSeries, 'init'));
    add_action("plugins_loaded", "registerImageMation_widget");
    
}

	function registerImageMation_widget(){
		register_sidebar_widget("WP_ImageMation", "showImageMation_widget");     

		}

	function showImageMation_widget(){
	$imageMationOptions = get_option("WP_ImageMationAdminOptions");
$wid=$imageMationOptions['width'];
$hit=$imageMationOptions['height'];

		print '<table align="center" cellpadding="0" cellspacing="0"><tr>
		<td width="'.$wid.'" height="'.$hit.'">
		<div id="slidingimage"></div>
		<div id="infopane"></div>
		</td></tr></table>';

	
		}
		
		

?>
