<?php

	$actions = array();

	define('CUR_DIR', dirname(__FILE__));
	define('WP_DIR', preg_replace('/(\/|\\\)wp-switch/', '', CUR_DIR));

	# ------------------------------------------------------------------------------------------- #

	function ajax_respond($result, $data, $message) {
		$ret = array();
		$ret['result'] = $result;
		$ret['data'] = $data;
		$ret['message'] = $message;
		header('Content-Type: application/json');
		echo json_encode($ret);
		exit;
	}

	function register_action($action, $handler) {
		global $actions;
		$actions[$action] = $handler;
	}

	function route_request() {
		global $actions;
		$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
		$handler = isset($actions[$action]) ? $actions[$action] : '';
		if ($handler) {
			call_user_func($handler);
		} else {
			header('HTTP/1.1 404 Not Found');
		}
		exit;
	}

	# ------------------------------------------------------------------------------------------- #

	function fn_list_profiles() {
		$result = 'error';
		$data = array();
		$message = '';
		#
		$profiles = glob(CUR_DIR.'/profiles/*.json');
		if ($profiles) {
			$data['profiles'] = array();
			$result = 'success';
			foreach ($profiles as $profile) {
				$profile_data = json_decode( file_get_contents($profile) );
				$data['profiles'][] = array(
					'name' => substr($profile, strrpos($profile, '/') + 1),
					'content' => $profile_data->WP_CONTENT_DIR,
					'path' => $profile
				);
			}
		}
		#
		ajax_respond($result, $data, $message);
	}
	register_action('list_profiles', 'fn_list_profiles');

	function fn_apply_profile() {
		$result = 'error';
		$data = array();
		$message = '';
		#
		$profile = isset($_GET['profile']) ? $_GET['profile'] : '';
		$profile_path = CUR_DIR.'/profiles/'.$profile;
		$config_tpl_path = CUR_DIR.'/templates/wp-config.php.tpl';
		$config_path = WP_DIR.'/wp-config.php';
		if ( file_exists($profile_path) ) {
			# Load profile data
			$profile_data = json_decode( file_get_contents($profile_path) );
			$config_tpl = file_get_contents($config_tpl_path);
			#
			foreach ($profile_data as $key => $value) {
				$config_tpl = str_replace("%{$key}%", $value, $config_tpl);
			}
			$cur_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$cur_url = substr($cur_url, 0, stripos($cur_url, '/wp-switch'));
			$config_tpl = str_replace("%CUR_URL%", $cur_url, $config_tpl);
			file_put_contents($config_path, $config_tpl);
			sleep(1);
			#
			$result = 'success';
		}
		#
		ajax_respond($result, $data, $message);
	}
	register_action('apply_profile', 'fn_apply_profile');

	# ------------------------------------------------------------------------------------------- #

	function fn_generate_profile() {
		$result = 'error';
		$data = array();
		$message = '';
		#
		$profile = isset($_GET['profile']) ? $_GET['profile'] : '';
		$profile_path = CUR_DIR.'/profiles/'.$profile.'.json';
		$profile_tpl_path = CUR_DIR.'/templates/profile.json.tpl';
		$config_path = WP_DIR.'/wp-config.php';
		if ( file_exists($config_path) ) {
			# Load config file
			include $config_path;
			$profile_tpl = json_decode( file_get_contents($profile_tpl_path) );
			$data['debug'] = $profile_tpl;
			#
			foreach ($profile_tpl as $key => $value) {
				$profile_tpl->$key = str_replace(WP_DIR.'/', '', constant($key));
			}
			$data['debug'] = $profile_tpl;
			file_put_contents($profile_path, json_encode($profile_tpl, JSON_PRETTY_PRINT));
			sleep(1);
			// #
			$result = 'success';
		}
		#
		ajax_respond($result, $data, $message);
	}
	register_action('generate_profile', 'fn_generate_profile');

	# ------------------------------------------------------------------------------------------- #

	route_request();

	# ------------------------------------------------------------------------------------------- #

?>