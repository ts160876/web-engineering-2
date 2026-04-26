<?

namespace Router2;

class RouteNotFoundException extends \Exception
{
    protected $message = 'Route not found.';
}
