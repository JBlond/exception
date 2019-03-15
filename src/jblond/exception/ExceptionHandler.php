<?php

namespace jblond\exception;

/**
 * Generic exceptionError class. Overload Exception::__toString() method and Exception::__construct() method
 * exception_handler
 *
 * @package ExceptionErrorHandler
 * @desc error handler, calling correct exceptionError type
 * @access public
 */
class ExceptionHandler
{

	/**
	* translation between context error and exceptionError type of class
	*
	* @var array
	*/
	public static $aTrans = array(
		E_ERROR => '\jblond\exception\ExceptionError',
		E_WARNING => '\jblond\exception\ExceptionWarning',
		E_PARSE => '\jblond\exception\ExceptionParseError',
		E_NOTICE => '\jblond\exception\ExceptionNotice',
		E_CORE_ERROR => '\jblond\exception\ExceptionCoreError',
		E_CORE_WARNING => '\jblond\exception\ExceptionCoreWarning',
		E_COMPILE_ERROR => '\jblond\exception\ExceptionCompileError',
		E_COMPILE_WARNING => '\jblond\exception\ExceptionCompileWarning',
		E_USER_ERROR => '\jblond\exception\ExceptionUserError',
		E_USER_WARNING => '\jblond\exception\ExceptionUserWarning',
		E_USER_NOTICE => '\jblond\exception\ExceptionUserNotice',
		E_STRICT => '\jblond\exception\ExceptionStrict'
	);

	/**
	* is context enabled or not
	*
	* @var boolean
	*/
	public static $bool_context = false;

	/**
	* bool trace
	* @var boolean
	*/
	public static $bool_trace = false;

	/**
	* constructor, optional bool_context boolean can be given if you want context to be displayed or not
	* @param boolean $bool_trace
	* @param boolean $bool_context (optional, default = false)
	* @desc constructor, optional bool_context boolean can be given if you want context to be displayed or not
	*/
	public function __construct($bool_trace = false, $bool_context = false) {
		self::$bool_trace = $bool_trace;
		self::$bool_context = $bool_context;
		set_error_handler(array($this, 'errorHandler'));
	}

	/**
	 * error handler
	 *
	 * @param mixed $e_constant_error
	 * @param string $e_str
	 * @param mixed $e_file
	 * @param int $e_line
	 * @param mixed $mixed_vars
	 * @desc error handler
	 * @throws ExceptionUnexpected
	 */
	public static function errorHandler($e_constant_error, $e_str, $e_file, $e_line, $mixed_vars) {
		if(!isset(self::$aTrans[$e_constant_error])) {
			throw new ExceptionUnexpected($e_constant_error, $e_str, $e_file, $e_line, $mixed_vars, self::$bool_trace, self::$bool_context);
		}
		else
		{
			throw new self::$aTrans[$e_constant_error]($e_constant_error, $e_str, $e_file, $e_line, $mixed_vars, self::$bool_trace, self::$bool_context);
		}
	}
}
