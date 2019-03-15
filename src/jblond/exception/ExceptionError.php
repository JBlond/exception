<?php
namespace jblond\exception;

/**
 * exception_error
 *
 * @package exceptionErrorHandler
 * @desc exceptionErrors for Fatal errors
 * @access public
 */
class ExceptionError extends ExceptionErrorHandler
{

	/**
	 * error message
	 * @var string
	 */
	protected $eType = 'Fatal error';
}
