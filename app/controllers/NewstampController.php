<?php

use Phalcon\Mvc\Controller;

class NewstampController extends Controller
{
	public function indexAction()
	{
		$this->view->setLayout('list');
	}

	
	public function getalbumsAction()
	{
		// get list of albums
		$albums = Album::find();

		// send data to the view
		$this->view->albums = $albums;

		$this->view->setLayout('list');
	}
}