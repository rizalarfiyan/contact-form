<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	static $table = 'users';

	static $admin = 'admin';
	static $guest = 'guest';
}
