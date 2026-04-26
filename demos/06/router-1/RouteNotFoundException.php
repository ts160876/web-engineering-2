<?

namespace Router1;

class RouteNotFoundException extends \Exception
{
    protected $message = 'Route not found.';
}
