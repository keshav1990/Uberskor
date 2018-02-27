<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Socket extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','file'));
		// $this->load->library(array('form_validation'));
		$this->load->model(array('Parse_xml','Common_model'));
	}
	public function server()
	{
			// set some variables
			$host = "127.0.0.1";
			$port = 25003;
			// don't timeout!
			set_time_limit(0);
			// create socket
			$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
			// bind socket to port
			$result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");
			// start listening for connections
			$result = socket_listen($socket, 3) or die("Could not set up socket listener\n");

			// accept incoming connections
			// spawn another socket to handle communication
			$spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
			// read client input
			$input = socket_read($spawn, 1024) or die("Could not read input\n");
			// clean up input string
			$input = trim($input);
			echo "Client Message : ".$input;
			// reverse client input and send back
			$output = strrev($input) . "\n";
			socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");
			// close sockets
			socket_close($spawn);
			socket_close($socket);

	}
	public function client()
	{
			$host    = "127.0.0.1";
			$port    = 25003;
			$message = "Hello This Is My Socket Server Testing.";
			echo "Message To server :".$message."<br>";
			// create socket
			$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
			// connect to server
			$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
			// send string to server
			socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
			// get server response
			$result = socket_read ($socket, 1024) or die("Could not read server response\n");
			echo "Reply From Server  :".$result;
			// close socket
			socket_close($socket);

} 