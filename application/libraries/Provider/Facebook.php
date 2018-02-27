<?php
/**
 * Facebook OAuth2 Provider
 *
 * @package    CodeIgniter/OAuth2
 * @category   Provider
 * @author     Phil Sturgeon
 * @copyright  (c) 2012 HappyNinjas Ltd
 * @license    http://philsturgeon.co.uk/code/dbad-license
 */

class OAuth2_Provider_Facebook extends OAuth2_Provider
{
	protected $scope = array('email');

	public function url_authorize()
	{
		return 'https://www.facebook.com/dialog/oauth';
	}

	public function url_access_token()
	{
		return 'https://graph.facebook.com/oauth/access_token';
	}

	public function get_user_info(OAuth2_Token_Access $token)
	{
		$url = 'https://graph.facebook.com/me?fields=id,name,email&'.http_build_query(array(
			'access_token' => $token->access_token
		));
       $ci = get_instance();
 //      echo $token;
       //var_dump($ci->curl->simple_get($url));
		$user = json_decode($ci->curl->simple_get($url));
		// Create a response from the request
		return array(
			'uid' => $user->id,
			'nickname' => isset($user->username) ? $user->username : null,
			'name' => isset($user->name) ? $user->name : null,
			'first_name' => isset($user->first_name) ? $user->first_name : null,
			'last_name' => isset($user->last_name) ? $user->last_name : null,
			'email' => isset($user->email) ? $user->email : null,
			'location' => isset($user->hometown->name) ? $user->hometown->name : null,
			'description' => isset($user->bio) ? $user->bio : null,
			'image' => 'https://graph.facebook.com/me/picture?type=normal&access_token='.$token->access_token,
			'urls' => array(
			  'Facebook' => isset($user->link) ? $user->link : null,
			),
		);
	}
}
