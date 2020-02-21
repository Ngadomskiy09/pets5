<?php
class Dog extends Pet
{
    function fetch()
    {
        echo "<p>".$this->getName()." is fetching</p>";
    }
}