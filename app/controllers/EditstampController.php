<?php

use Phalcon\Mvc\Controller;

class EditstampController extends Controller
{
	public function indexAction()
	{
		$id = $this->request->get('id');
		

		$stamp = Stamp::find($id);
		die($stamp->name);
		// send data to the view
		$this->view->stamp = $stamp;

		$this->view->setLayout('list');
		
	}
}


