<?php
namespace jblond\exception;

/**
 * exception_user_error
 *
 * @package ExceptionErrorHandler
 * @desc exceptionErrors for User errors
 * @access public
 */
class ExceptionUserError extends ExceptionErrorHandler
{

	/**
	 * error message
	 * @var string
	 */
	protected $eType = 'User error';
}
