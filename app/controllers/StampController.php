<?php

use Phalcon\Mvc\Controller;

//Stamp details
class StampController extends Controller
{
	public function indexAction()
	{
        $id = $this->request->get('id');

        $stamp = Stamp::findFirst($id);

        $this->view->stamp = $stamp;

        $this->view->setLayout('list');
    }
}

