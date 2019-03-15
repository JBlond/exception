<?php
namespace jblond\exception;

/**
 * exception_unexpected
 *
 * @package ExceptionErrorHandler
 * @desc exceptionErrors for not handled yet errors
 * @access public
 */
class ExceptionUnexpected extends ExceptionErrorHandler
{

	/**
	 * error message
	 * @var string
	 */
	protected $eType = 'Not handled yet';
}
