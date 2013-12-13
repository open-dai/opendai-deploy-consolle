<?php
/**
 * @author Luca Gioppo
 * @created 28/11/2013
 */

include_once('easy.curl.class.php');

class restmco{
	private $curl;
	private $curl_options;
	private $mco_server;	

	private $debug = false;

	public $error_message = '';
	public $error_code = 0;
	public $result = '';
	
	function __construct($mco_server, $debug = false){
		$headers[] = "Accept: */*";
		$headers[] = "Connection: Keep-Alive";
		$headers[] = "content-type: application/json";
		$agent            = "Nokia-Communicator-WWW-Browser/2.0 (Geos 3.0 Nokia-9000i)";
		$cookie_file_path = "cookie.txt";
		$this->curl_options = array(CURLOPT_HTTPHEADER => $headers,
								   CURLOPT_SSL_VERIFYHOST=>0,
								   CURLOPT_SSL_VERIFYPEER=>false,
								   CURLOPT_COOKIEFILE=>$cookie_file_path,
								   CURLOPT_COOKIEJAR=>$cookie_file_path,
								   CURLOPT_FOLLOWLOCATION=>1,
								   CURLOPT_FAILONERROR=>false,
								   CURLOPT_RETURNTRANSFER=>1,
								   CURLOPT_USERAGENT=>$agent,
								   CURLOPT_HEADER=>0);
		$this->mco_server = $mco_server;
		$this->debug = $debug;
		$this->curl =  new cURL($mco_server);
		$this->curl->options($this->curl_options);
	}

	public function call_agent($agent, $action, $filters = array(), $parameters = array(), $schedule = array(), $limit = array(), $timeout = null, $discoverytimeout = null){
		
		# http://<your box>:4567/mcollective/rpcutil/ping/
# JSON structure :
#{
# filters: {
#   class: ["c1", "c2"],
#   identity: ["i1", "i2"]
#   fact: [ "f1=foo","f2=bar"],
#   agent: [ "a1", "a2"],
#   compound: value
# },
# parameters: {
#   p1name: value,
#   p2name: value
# },
# schedule: {
#   schedtype: value,
#   schedarg: value
# },
# limit: {
#   targets: value,
#   method: value
# },
# timeout: value,
# discoverytimeout: value
#}

		$mco_url = $this->mco_server . '/mcollective/' . $agent . '/' . $action . '/';
		
		$mco_post = array();
		if (!empty($filters)){
			$mco_post['filters'] = $filters;
		}
		if (!empty($parameters)){
			$mco_post['parameters'] = $parameters;
		}
		if (!empty($schedule)){
			$mco_post['schedule'] = $schedule;
		}
		if (!empty($limit)){
			$mco_post['limit'] = $limit;
		}
		if (!empty($timeout)){
			$mco_post['timeout'] = $timeout;
		}
		if (!empty($discoverytimeout)){
			$mco_post['discoverytimeout'] = $discoverytimeout;
		}
		
		$mco_post_value = '';
		if (!empty($discoverytimeout)){
			$mco_post_value = json_encode($mco_post);
		}
		if ($this->debug) error_log("mco_post_value :" . $mco_post_value);
		if ($this->debug) error_log("mco_url :" . $mco_url);
		$mco_ret = $this->curl->post($mco_url, 
									 $mco_post_value,
									 $this->curl_options);
		// two possible errors cURL and API manager
		if ($this->curl->error_code){
			$this->error_message = 'Call-agent: '.$this->curl->error_string . ' - ' . $mco_url . ' - ' . print_r($mco_post_value,true);
			$this->error_code = $this->curl->error_code;
		}else{
		}
		$this->result = $mco_ret;
		return true;
		
	}

	public function getFilters($class = array(), $identity = array(), $facts = array(), $agent = array(), $compound = null){
		$ret = array();
		if (!empty($class)){
			$ret['class'] = $class;
		}
		if (!empty($identity)){
			$ret['identity'] = $identity;
		}
		if (!empty($facts)){
			$ret['facts'] = $facts;
		}
		if (!empty($agent)){
			$ret['agent'] = $agent;
		}
		if (!empty($compound)){
			$ret['compound'] = $compound;
		}
		
	}
}

?>
