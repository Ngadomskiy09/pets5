<?php

class Routes
{
    private $_f3;

    function __construct($f3)
    {
      $this->_f3 = $f3;
    }

    function home()
    {
        $views = new Template();
        echo $views->render("views/home.html");
    }

    function order()
    {
        $_SESSION = array();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['animalName'])) {
                $animal = $_POST['animalName'];
                if (validString($animal)) {
                    switch (strtolower($animal)) {
                        case "cat":
                            $_SESSION['animal'] = new Cat($animal);
                            break;
                        case "dog":
                            $_SESSION['animal'] = new Dog($animal);
                            break;
                        case "bengal":
                            $_SESSION['animal'] = new Bengal($animal);
                            break;
                        default:
                            $_SESSION['animal'] = new Pet($animal);
                    }
                    $this->_f3->reroute('/order2');
                } else {
                    $this->_f3->set("errors['animal']", "Please enter an animal");
                }
            }
        }
        $view = new Template();
        echo $view->render('views/form1.html');
    }

    function order2()
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_f3->set('name', $_POST['name']);
            $this->_f3->set('passedColor', $_POST['color']);

            $valid = true;
            if (isset($_POST['color']) && validColor($_POST['color'])) {
                $_SESSION['animal']->setColor($_POST['color']);
            } else {
                $valid = false;
                $this->_f3->set("errors['color']", "Please enter a color");
            }

            $animalName = $_POST['name'];
            if (isset($animalName) && validString($animalName)) {
                $_SESSION['animal']->setName($animalName);
            } else {
                $valid = false;
                $this->_f3->set("errors['name']", "Please enter an animal name");
            }

            if($valid){
                $this->_f3->reroute('/results');
            }
        }

        $view = new Template();
        echo $view->render('views/form2.html');
    }

    function result()
    {
        $view = new Template();
        echo $view->render('views/results.html');
    }

    function randomRoute($item)
    {
        //var_dump($params);

        switch($item) {
            case 'chicken':
                echo "<p>Cluck</p>";
                break;
            case 'dog':
                echo "<p>woof</p>";
                break;
            case 'horse':
                echo "<p>neigh</p>";
                break;
            case 'cat':
                echo "<p>meow</p>";
                break;
            case 'dino':
                echo "<p>rwar</p>";
                break;
            default:
                $this->_f3->error(404);
        }
    }
}