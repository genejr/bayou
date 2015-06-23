<?php

	/***
	***	@redirect wp-admin for non guests
	***/
	add_action('init','um_block_wpadmin_for_guests');
	function um_block_wpadmin_for_guests() {
	global $pagenow;
	
		// Logout screen
		if ( isset( $pagenow ) && $pagenow == 'wp-login.php' && is_user_logged_in() && isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'logout' ) {
			$redirect = um_get_core_page('logout');
			if ( isset( $_REQUEST['redirect_to'] ) && !empty( $_REQUEST['redirect_to'] ) ) {
				$redirect = add_query_arg( 'redirect_to', $_REQUEST['redirect_to'], $redirect );
			}
			exit( wp_redirect( $redirect ) );
		}
			
		// Login screen
		if ( isset( $pagenow ) && $pagenow == 'wp-login.php' && !is_user_logged_in() && !isset( $_REQUEST['action'] ) ) {

			$allowed = um_get_option('wpadmin_login');
			$allowed = apply_filters('um_whitelisted_wpadmin_access', $allowed );
			
			if ( !$allowed ) {
				
				$act = um_get_option('wpadmin_login_redirect');
				$custom_url = um_get_option('wpadmin_login_redirect_url');
				
				if ( $act == 'um_login_page' || !$custom_url ) {
					$redirect = um_get_core_page('login');
				} else {
					$redirect = $custom_url;
				}
				exit( wp_redirect( $redirect ) );
			}
		}

		// Register screen
		if ( isset( $pagenow ) && $pagenow == 'wp-login.php' && !is_user_logged_in() && isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'register' ) {
			
			$allowed = um_get_option('wpadmin_register');
			$allowed = apply_filters('um_whitelisted_wpadmin_access', $allowed );
			
			if ( !$allowed ) {
				
				$act = um_get_option('wpadmin_register_redirect');
				$custom_url = um_get_option('wpadmin_register_redirect_url');
				
				if ( $act == 'um_register_page' || !$custom_url ) {
					$redirect = um_get_core_page('register');
				} else {
					$redirect = $custom_url;
				}
				exit( wp_redirect( $redirect ) );
			}
		}
		
		// Lost password page
		if ( isset( $pagenow ) && $pagenow == 'wp-login.php' && isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'lostpassword' ) {
			exit( wp_redirect( um_get_core_page('password-reset') ) );
		}
		
		// Prevention for logged in user
		if ( isset( $pagenow ) && $pagenow == 'wp-login.php' && is_user_logged_in() ) {
			
			if ( !um_user('can_access_wpadmin') ) {
				exit( wp_redirect( home_url() ) );
			} else {
				exit( wp_redirect( admin_url() ) );
			}
		
		}

	}
	
	/***
	***	@checks if user can access the backend
	***/
	function um_block_wpadmin_by_user_role(){
		global $ultimatemember;
		if( is_admin() && !defined('DOING_AJAX') && um_user('ID') && !um_user('can_access_wpadmin') && !is_super_admin( um_user('ID') ) ){
			um_redirect_home();
		}
	}
	add_action('init','um_block_wpadmin_by_user_role', 99);
	
	/***
	***	@hide admin bar appropriately
	***/
	function um_control_admin_bar(){
		if ( um_user('can_not_see_adminbar') )
			return false;

		if( !is_admin() && !um_user('can_access_wpadmin') ) {
			return false;
		} else {
			um_fetch_user( get_current_user_id() );
			return true;
		}
	}
	add_filter( 'show_admin_bar' , 'um_control_admin_bar');
	
	/***
	***	@fix permission for admin bar
	***/
	function um_force_admin_bar() {
		um_reset_user();
	}
	add_action( 'wp_footer', 'um_force_admin_bar' );