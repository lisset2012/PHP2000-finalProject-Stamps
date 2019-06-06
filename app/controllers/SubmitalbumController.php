<?php

use Phalcon\Mvc\Controller;

class SubmitalbumController extends Controller
{
	public function indexAction()
	{

        // get variables from POST
		$album_name = $this->request->get('title');

        // upload the image
        $ext = strtolower(pathinfo($_FILES["album_img"]["name"], PATHINFO_EXTENSION));
        $filename = md5(rand() . $album_name . date('d')) . ".$ext";
		copy($_FILES["album_img"]["tmp_name"], "images/$filename");
		
		// validate no fields are empty
		if(empty($album_name)) {
			die("You need to fill of the required fields");
		}

		// save the new album in the DB
		$album = new Album();
		$album->imagen = $filename;
		$album->album_name = $album_name;
		$album->save();

		// redirect to album list
		$this->response->redirect('/albumlist');
	}
}