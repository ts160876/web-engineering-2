<?php
class C
{
    public int $x = 5;
    public static int $y = 7;

    public function m()
    {
        return $this->x + C::$y;
    }

    public static function s()
    {
        //return $this->x + C::$y;
    }
}

$c = new C();
echo $c->m();
echo $c->s();
