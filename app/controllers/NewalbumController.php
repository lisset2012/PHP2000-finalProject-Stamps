<?php

use Phalcon\Mvc\Controller;

// Lists albumes
class NewalbumController extends Controller
{
	public function indexAction()
	{
        $this->view->setLayout('list');
    }
}

