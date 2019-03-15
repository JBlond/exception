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
    protected $eFile;

    /**
     * Error line
     *
     * @var integer
     */
    protected $eLine;

    /**
     * Error context
     *
     * @var mixed
     */
    protected $mixedVars;

    /**
     * trace bool
     * @var boolean
     */
    protected $boolTrace;

    /**
     * is context enabled or not
     *
     * @var boolean
     */
    protected $boolContext;


    /**
     * exception_error_handler constructor.
     * @param int $eConstantError
     * @param string $eStr
     * @param string $eFile
     * @param mixed $eLine
     * @param mixed $mixedVars
     * @param boolean $boolTrace
     * @param boolean $boolContext
     */
    public function __construct(
        $eConstantError,
        $eStr,
        $eFile,
        $eLine,
        $mixedVars,
        $boolTrace = false,
        $boolContext = false
    ) {
        parent::__construct($eStr, $eConstantError);
        $this->eFile = $eFile;
        $this->eLine = $eLine;
        $this->mixedVars = $mixedVars;
        $this->boolTrace = $boolTrace;
        $this->boolContext = $boolContext;
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
        $sMsg .= '<em>File</em> : ' . $this->eFile . ' on line ' . $this->eLine . '<br />';
        if ($this->boolTrace === true) {
            $sMsg .= '<em>Trace</em> :<br /><pre>' . $this->getTraceAsString() . '</pre><br />';
        }
        if ($this->boolContext === true) {
            $sMsg .= '<em>Context</em> :<br><pre>';
            try {
                $sMsg .= print_r($this->mixedVars, true);
            } catch (Exception $e) {
                $sMsg .= 'No Context available';
            }
            $sMsg .= '</pre>';
        }
        return $sMsg;
    }
}
