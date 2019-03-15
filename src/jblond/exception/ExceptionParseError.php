<?php
namespace jblond\exception;

/**
 * exception_parse_error
 *
 * @package ExceptionErrorHandler
 * @desc exceptionErrors for Parse errors
 * @access public
 */
class ExceptionParseError extends ExceptionErrorHandler
{

	/**
	 * error message
	 * @var string
	 */
	protected $eType = 'Parse error';
}
