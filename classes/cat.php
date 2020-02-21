<?php
class Cat extends Pet
{
    function meow()
    {
        echo "<p>".$this->getName()." is meowing</p>";
    }
}
