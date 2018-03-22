<?php
/**
 * @author		Parag Dhali
 * @since		Version 1.0.0
 * @version		1.0.2
 * 
 * Developed date: 18.02.2017
 * 
 */
// class form_validation {
 	 
	 /**
	 * Max Length
	 */
	 function max_length($str, $val)
	{
		if ( ! is_numeric($val))
		{
			return FALSE;
		}
		return ($val >= mb_strlen($str));
	}
	
	/**
	 * Exact Length
	 */
	 function exact_length($str, $val)
	{
		if ( ! is_numeric($val))
		{
			return FALSE;
		}
		return (mb_strlen($str) === (int) $val);
	}
	
	 function valid_email($str)
	{
		if (function_exists('idn_to_ascii') && sscanf($str, '%[^@]@%s', $name, $domain) === 2)
		{
			$str = $name.'@'.idn_to_ascii($domain);
		}
		return (bool) filter_var($str, FILTER_VALIDATE_EMAIL);
	}
	
	/**
	 * Valid Emails
	 */
	 function valid_emails($str)
	{
		if (strpos($str, ',') === FALSE)
		{
			return $this->valid_email(trim($str));
		}
		foreach (explode(',', $str) as $email)
		{
			if (trim($email) !== '' && $this->valid_email(trim($email)) === FALSE)
			{
				return FALSE;
			}
		}
		return TRUE;
	}
	
	/**
	 * Alpha
	 */
	 function alpha($str)
	{
		return ctype_alpha($str);
	}
	 
	/**
	 * Alpha-numeric
	 */
	 function alpha_numeric($str)
	{
		return ctype_alnum((string) $str);
	}
	
	/**
	 * Alpha-numeric w/ spaces
	 */
	 function alpha_numeric_spaces($str)
	{
		return (bool) preg_match('/^[A-Z0-9 ]+$/i', $str);
	}
	
	/**
	 * Alpha-numeric w/ spaces
	 */
	 function alpha_numeric_spaces_question_dash_fullstop($str)
	{
		return (bool) preg_match('/^[A-Za-z0-9 ?.,-]+$/i', $str);
	}
	
	
	/**
	 * Alpha w/ spaces
	 */
	 function alpha_spaces($str)
	{
		return (bool) preg_match('/^[A-Z ]+$/i', $str);
	}
	/**
	 * Alpha-numeric with underscores and dashes
	 */
	 function alpha_dash($str)
	{
		return (bool) preg_match('/^[a-z0-9_-]+$/i', $str);
	}
	/**
	 * Alpha-numeric with slash/
	 */
	 function number_slash($str)
	{

		return (bool) preg_match('/^[0-9\/]+$/i', $str);
	}
	/**
	 * Numeric
	 */
	 function numeric($str)
	{
		return (bool) preg_match('/^[\-+]?[0-9]*\.?[0-9]+$/', $str);
	}
	// --------------------------------------------------------------------
	/**
	 * Integer
	 */
	 function integer($str)
	{
		return (bool) preg_match('/^[\-+]?[0-9]+$/', $str);
	}
	
	/**
	 * Decimal number
	 */
	 function decimal($str)
	{
		return (bool) preg_match('/^[\-+]?[0-9]+\.[0-9]+$/', $str);
	}
	
	/**
	 * Greater than
	 */
	 function greater_than($str, $min)
	{
		return is_numeric($str) ? ($str > $min) : FALSE;
	}
	
	/**
	 * Equal to or Greater than
	 */
	 function greater_than_equal_to($str, $min)
	{
		return is_numeric($str) ? ($str >= $min) : FALSE;
	}

	/**
	 * Less than
	 */
	 function less_than($str, $max)
	{
		return is_numeric($str) ? ($str < $max) : FALSE;
	}
	
	/**
	 * Equal to or Less than
	 */
	 function less_than_equal_to($str, $max)
	{
		return is_numeric($str) ? ($str <= $max) : FALSE;
	}
	
	/**
	 * Value should be within an array of values
	 */
	 function in_list($value, $list)
	{
		return in_array($value, explode(',', $list), TRUE);
	}
	
	/**
	 * Is a Natural number  (0,1,2,3, etc.)
	 */
	 function is_natural($str)
	{
		return ctype_digit((string) $str);
	}
	
	/**
	 * Is a Natural number, but not a zero  (1,2,3, etc.)
	 */
	 function is_natural_no_zero($str)
	{
		return ($str != 0 && ctype_digit((string) $str));
	}
	
	/**
	 * Valid Base64
	 */
	 function valid_base64($str)
	{
		return (base64_encode(base64_decode($str)) === $str);
	}
	/**
	 * valid url/
	 */
	 function valid_url($str){
		if (empty($str))
		{
			return FALSE;
		}
		elseif (preg_match('/^(?:([^:]*)\:)?\/\/(.+)$/', $str, $matches))
		{
			if (empty($matches[2]))
			{
				return FALSE;
			}
			elseif ( ! in_array($matches[1], array('http', 'https'), TRUE))
			{
				return FALSE;
			}

			$str = $matches[2];
		}

		$str = 'http://'.$str;

		if (version_compare(PHP_VERSION, '5.2.13', '==') OR version_compare(PHP_VERSION, '5.3.2', '=='))
		{
			sscanf($str, 'http://%[^/]', $host);
			$str = substr_replace($str, strtr($host, array('_' => '-', '-' => '_')), 7, strlen($host));
		}

		return (filter_var($str, FILTER_VALIDATE_URL) !== FALSE);
	}
	
	
 //}
 
 //$validation = new form_validation();
 
 
 ?>
