<?

namespace Exercise6;

class RouteNotFoundException extends \Exception
{
    protected $message = 'Route not found.';
}
