<?php

use Phalcon\Mvc\Controller;

// Lists albumes
class AlbumlistController extends Controller
{
	public function indexAction()
	{
		// get list of albums
		$albums = Album::find();

		// send data to the view
		$this->view->albums = $albums;

		$this->view->setLayout('list');
	}

}