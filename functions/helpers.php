<?php 
    function curPage($page) {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        return (boolean) in_array($page, $uri);
    }

    function currentPath() {
        return basename($_SERVER['REQUEST_URI']);
    }

    function imgtrans($imgurl, $trans) {
      $imgurl = explode('upload', $imgurl);
      $imgurl[0] .= 'upload/s--6wvZmQAJ--/t_'.$trans;
      return implode('', $imgurl);
    }

    function genColor() {
    	return '#' . substr(md5(mt_rand()), 0, 6);
    }

    function readable($str, $insert='-') {
        return implode($insert, str_split($str, 3));
    }

    function short_date($date) {
		return date('M d', strtotime($date));
	}

    function long_date($date) {
        return date('M d, Y', strtotime($date));
    }

    function truncate($val, $len=30) {
		return strlen($val) <= $len ?  substr($val, 0, $len) : substr($val, 0, $len).'...';
	}

    function rand_color() {
        $arrColor = ['success', 'danger', 'primary', 'warning', 'secondary', 'dark'];
        $randIndex = array_rand($arrColor);
        return $arrColor[$randIndex];
    }

    function rem_char($str) {
        $res = str_replace( array( '\'', '"', 
        ',' , ';', '<', '>', '&' ), ' ', $str);
        return $res; 
    }

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
?>