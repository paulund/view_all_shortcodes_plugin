<?php
/*
Plugin Name: Paulund View All Shortcodes
Plugin URI: http://www.paulund.co.uk
Description: View all the available shortcodes on your Wordpress blog. This page will show you everything that is currently registered so you can use these in the text editor of Wordpress
Version: 1
Author: Paul Underwood
Author URI: http://www.paulund.co.uk
*/

/**
 * Copyright (c) 2012 Paul Underwood. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

if(is_admin())
{
	// Create the Paulund toolbar
	$shortcodes = new View_All_Available_Shortcodes();
}

/**
 * View all available shrotcodes on an admin page
 *
 * @author
 **/
class View_All_Available_Shortcodes
{
	public function __construct()
	{
		$this->Admin();
	}
	/**
	 * Create the admin area
	 */
	public function Admin(){
		add_action( 'admin_menu', array(&$this,'Admin_Menu') );
	}

	/**
	 * Function for the admin menu to create a menu item in the settings tree
	 */
	public function Admin_Menu(){
		add_submenu_page(
			'options-general.php',
			'View All Shortcodes',
			'View All Shortcodes',
			'manage_options',
			'view-all-shortcodes',
			array(&$this,'Display_Admin_Page'));
	}

	/**
	 * Display the admin page
	 */
	public function Display_Admin_Page(){
		global $shortcode_tags;

        ?>
        <div class="wrap">
        	<div id="icon-options-general" class="icon32"><br></div>
			<h2>View All Available Shortcodes</h2>
			<div class="section panel">
				<p>This page will display all of the available shortcodes that you can use on your Wordpress blog.</p>
        	<table class="widefat importers">
        		<tr><td><strong>Shortcodes</strong></td></tr>
        <?php

	        foreach($shortcode_tags as $code => $function)
	        {
	        	?>
	        		<tr><td>[<?php echo $code; ?>]</td></tr>
	        	<?php
	        }
	    ?>

			</table>
			</div>
		</div>
		<?php
	}
} // END class View_All_Available_Shortcodes
?>