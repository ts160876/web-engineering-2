<?

namespace Router3;

class RouteNotFoundException extends \Exception
{
    protected $message = 'Route not found.';
}
