# Exception

## Example

```PHP
if($debug == false){
	$exception = new exception_handler(false,false);
	error_reporting(0);
	ini_set('display_errors',0);
}
else
{
	$exception = new exception_handler(true,true);
	error_reporting(E_ALL);
	ini_set('display_errors',1);
}
```
