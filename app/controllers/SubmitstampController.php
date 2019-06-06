<?php

use Phalcon\Mvc\Controller;

class SubmitstampController extends Controller
{
	public function indexAction()
	{
		  // get variables from POST
		  $stamp_name = $this->request->get('stamp_name');
		  $album = $this->request->get('album');
		  $year = $this->request->get('year');
		  $description = $this->request->get('description');
		  $width = $this->request->get('width');
		  $height = $this->request->get('height');

		  // upload the image
		  $ext = strtolower(pathinfo($_FILES["stamp_image"]["name"], PATHINFO_EXTENSION));
		  $filename = md5(rand() . $stamp_name . date('d')) . ".$ext";
		  copy($_FILES["stamp_image"]["tmp_name"], "images/$filename");
		  
		  // validate no fields are empty
		//   if(empty($stamp_name) || empty($album) || ($year) || empty($description) || empty($width) || ($height) || empty($filename)) {
		// 	  die("You need to fill of the required fields");
		//   }
  
		  // save the new album in the DB
		  $stamp = new Stamp();
		  $stamp->name = $stamp_name;
		  $stamp->stamp_img = $filename;
		  $stamp->album = $album;
		  $stamp->year = $year;
		  $stamp->description = $description;
		  $stamp->width = $width;
		  $stamp->height = $height;
		  $stamp->save();
  
		  // redirect to album list
		  $this->view->setLayout('list');
		//   $this->view->pick('stampslist/index');
	}
}