<?php
class C
{
    private int $a = 5;

    public function m()
    {
        return $this->a;
    }

    public function n(C $c)
    {
        return $c->a;
    }
}


$c1 = new C;
$c2 = new C;
echo $c1->m();
echo $c2->m();
echo $c1->n($c2);
