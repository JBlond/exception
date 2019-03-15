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
    public static $boolContext = false;

    /**
     * bool trace
     * @var boolean
     */
    public static $boolTrace = false;

    /**
     * constructor, optional bool_context boolean can be given if you want context to be displayed or not
     * @param boolean $boolTrace
     * @param boolean $boolContext (optional, default = false)
     * @desc constructor, optional bool_context boolean can be given if you want context to be displayed or not
     */
    public function __construct($boolTrace = false, $boolContext = false)
    {
        self::$boolTrace = $boolTrace;
        self::$boolContext = $boolContext;
        set_error_handler(array($this, 'errorHandler'));
    }

    /**
     * error handler
     *
     * @param mixed $eConstantError
     * @param string $eStr
     * @param mixed $eFile
     * @param int $eLine
     * @param mixed $mixedVars
     * @desc error handler
     * @throws ExceptionUnexpected
     */
    public static function errorHandler($eConstantError, $eStr, $eFile, $eLine, $mixedVars)
    {
        if (!isset(self::$aTrans[$eConstantError])) {
            throw new ExceptionUnexpected($eConstantError, $eStr, $eFile, $eLine, $mixedVars, self::$boolTrace,
                self::$boolContext);
        } else {
            throw new self::$aTrans[$eConstantError]($eConstantError, $eStr, $eFile, $eLine, $mixedVars,
                self::$boolTrace, self::$boolContext);
        }
    }
}
