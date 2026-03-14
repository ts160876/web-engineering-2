<?php
class C1
{
    public int $a = 5;
    protected int $b = 9;
    private int $c = 11;

    public function m()
    {
        return $this->a + $this->b + $this->c;
    }
}

class C2 extends C1
{
    public function n()
    {
        //return $this->a + $this->b + $this->c;
    }
}


$c1 = new C1;
echo $c1->m();

$c2 = new C2;
echo $c2->m();
echo $c2->n();
