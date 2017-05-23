<?php 
	/*
	Template Name: Grabber
	*/
	function add_grabber() {
   add_menu_page( 'Grabber page', 'Grabber', 'manage_options', 'grabber/grabber-template.php', '', plugins_url('grabber/icon-grabber.png'), 26);
	};

	add_action('admin_menu', 'add_grabber');


?>