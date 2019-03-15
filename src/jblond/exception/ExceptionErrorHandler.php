<?php
namespace jblond\exception;

use Exception;

/**
 * ExceptionErrorHandler
 *
 * @package ExceptionErrorHandler
 * @access public
 */

/**
 * Class exception_error_handler
 * @package jblond
 */
abstract class ExceptionErrorHandler extends Exception
{

    /**
     * Error type
     *
     * @var string
     */
    protected $eType;

    /**
     * Error file
     *
     * @var string
     */
    protected $e_file;

    /**
     * Error line
     *
     * @var integer
     */
    protected $e_line;

    /**
     * Error context
     *
     * @var mixed
     */
    protected $mixed_vars;

    /**
     * trace bool
     * @var boolean
     */
    protected $bool_trace;

    /**
     * is context enabled or not
     *
     * @var boolean
     */
    protected $bool_context;


    /**
     * exception_error_handler constructor.
     * @param int $e_constant_error
     * @param string $e_str
     * @param string $e_file
     * @param mixed $e_line
     * @param mixed $mixed_vars
     * @param boolean $bool_trace
     * @param boolean $bool_context
     */
    public function __construct(
        $e_constant_error,
        $e_str,
        $e_file,
        $e_line,
        $mixed_vars,
        $bool_trace = false,
        $bool_context = false
    ) {
        parent::__construct($e_str, $e_constant_error);
        $this->e_file = $e_file;
        $this->e_line = $e_line;
        $this->mixed_vars = $mixed_vars;
        $this->bool_trace = $bool_trace;
        $this->bool_context = $bool_context;
    }

    /**
     * Exception::__toString() overloading
     * @desc Exception::__toString() overloading
     *
     * @return string
     */
    public function __toString()
    {
        $sMsg = '<strong>' . $this->eType . '</strong><br />';
        $sMsg .= $this->getMessage() . '[' . $this->getCode() . ']<br />';
        $sMsg .= '<em>File</em> : ' . $this->e_file . ' on line ' . $this->e_line . '<br />';
        if ($this->bool_trace === true) {
            $sMsg .= '<em>Trace</em> :<br /><pre>' . $this->getTraceAsString() . '</pre><br />';
        }
        if ($this->bool_context === true) {
            $sMsg .= '<em>Context</em> :<br><pre>';
            try {
                $sMsg .= print_r($this->mixed_vars, true);
            } catch (Exception $e) {
                $sMsg .= 'No Context available';
            }
            $sMsg .= '</pre>';
        }
        return $sMsg;
    }
}
