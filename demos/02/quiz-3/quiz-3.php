<?php
class C
{
    public static int $x = 0;

    public function m()
    {
        return ++C::$x;
    }
}


$c1 = new C();
echo $c1->m();
$c2 = new C();
echo $c2->m();
$c3 = new C();
echo $c3->m();
