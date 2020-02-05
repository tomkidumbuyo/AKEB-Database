<?php 

function to_array($object){
	return json_decode(json_encode($object),true);
}

function get_time($thetime){
	$time = array();
	
	if($thetime){
		$CI                = get_instance();
		if($at = $CI->input->post('access_token')){
			
			$token             = new Oauth_access_tokens($at);
			$user              = new users();
			$user              = $user->get_user_by_username($token->user_id);
			$time['timestamp'] = gmt_to_local(strtotime($thetime),$user->tz);
			
		}else{
			
			
			
			$timezone = $CI->session->userdata('timezone');
			
			if(!$CI->session->userdata('timezone') && $CI->session->userdata('user_id')){
				$user = new users($CI->session->userdata('user_id'));
				if($user->tz){
					$timezone = $user->tz;
				}else{
					$timezone = 'UP3';
				}
			}else if(!$CI->session->userdata('timezone') && !$CI->session->userdata('user_id')){
				$timezone = 'UP3';
			}
			
			
			$time['timestamp'] = gmt_to_local(strtotime($thetime),$timezone);
			
		}
		
		$time['date']      = date("j F, Y",$time['timestamp']);
		$time['time']      = date("g:i a",$time['timestamp']);
		$time['time24']    = date("H:i a",$time['timestamp']);
		$time['weekday']   = date("l",$time['timestamp']);
		$time['weekday2']   = date("D",$time['timestamp']);
		$time['past']      = timespan($time['timestamp'],gmt_to_local(convert_to_gmt(time()),$CI->session->userdata('timezone')));
		$time['date_time']   = date("j F, Y. g:i:a",$time['timestamp']);
		$time['js_datetime'] = date("D M d Y g:i:a",$time['timestamp']);

		$time['now']  = gmt_to_local(local_to_gmt(time()),$CI->session->userdata('timezone'));
		
		$time['dif']  = $time['now'] - $time['timestamp'];
		
		if($time['dif'] < 60){
			
			$time['display_time'] = $time['dif'].'s ago';
			$time['display_time_short'] = $time['time'];
			
		}else if($time['dif']  >= 60 && $time['dif']  < 3600){
			
			$time['display_time'] = round($time['dif'] /60).'m ago';
			$time['display_time_short'] = $time['time'];
			
		}else if($time['dif']  >= 3600 && $time['dif']  < (3600*24)){
			
			$time['display_time'] = $time['time'];
			$time['display_time_short'] =  $time['time'];
			
		}else if($time['dif']  >= 3600*24 && $time['dif']  < 3600*24*2){
			
			$time['display_time'] = 'Yesterday at '.$time['time'];
			$time['display_time_short'] = 'Ystr '.$time['time']; 
			
		}if($time['dif']  >= 3600*24*2 && $time['dif']  < 3600*24*7){
			
			$time['display_time'] = $time['weekday'].' at '.$time['time'];
			$time['display_time_short'] = $time['weekday2'].' '.$time['time'];
			
		}else if($time['dif'] >= 3600*24*7 && $time['dif'] < 3600*24*30){
			
			$time['display_time'] = floor ($time['dif']/(3600*24)).'d';
			$time['display_time_short'] =  floor ($time['dif']/(3600*24)).'d';
			
		}else if($time['dif'] >= 3600*24*30){
			
			$time['display_time'] = $time['date'];
			$time['display_time_short'] = date("j M, y",$time['timestamp']); 
			
		}
		
		
	}else{
		
		$time['timestamp'] = '0';
		$time['date']      = '-';
		$time['time']      = '-';
		$time['time24']    = '-';
		$time['past']      = '-';
		$time['date_time'] = '-';
		$time['js_datetime'] = 0;
		
	}
	return $time;
}

function convert_to_gmt($time = '', $timezone = '' , $dst = true)
{     

	$CI   = get_instance();
	if( !$timezone || $timezone == '' ){
		$time = strtotime(gmdate('Y-m-d H:i:s',$time));
	}else{
		$time -= timezones($timezone) * 3600;
	}
    return $time == '' ? now():$time;
}

function unique_array_object($array){
	
	$result = [];
	static $idList = array();
	foreach($array as $obj){
		if(is_object($obj) && isset($obj->id)){
			if(!in_array($obj->id,$idList)) {
				//return false;
				$idList []= $obj->id;
				$result[] = $obj;
			}
		}else if(is_array($obj) && isset($obj['id'])){
			if(!in_array($obj['id'],$idList)) {
				$idList []= $obj['id'];
				$result[] = $obj;
			}
		}
	}
	
	return $result;
	
}