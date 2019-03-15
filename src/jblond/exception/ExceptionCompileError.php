<?php
namespace jblond\exception;

/**
 * exception_compile_error
 *
 * @package ExceptionErrorHandler
 * @desc exceptionErrors for Compile errors
 * @access public
 */
class ExceptionCompileError extends ExceptionErrorHandler
{

	/**
	 * error message
	 * @var string
	 */
	protected $eType = 'Compile error';
}
