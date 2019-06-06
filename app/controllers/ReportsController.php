<?php

use Phalcon\Mvc\Controller;

class ReportsController extends Controller
{
	public function indexAction()
	{
		$this->view->setLayout('list');
    }
    
	public function byyearAction()
	{
		// get list of stamps by year
		$stamps = Stamp::find([
			'order'=> 'year ASC'
		]);		

		// send data to the view
		$this->view->stamps = $stamps;

        $this->view->setLayout('list');
		$this->view->pick('stampslist/index');
    }
    
	public function repeatedAction()
	{
		$this->view->setLayout('list');
		$this->view->pick('stampslist/index');
    }
    
	public function ungluedAction()
	{
		$this->view->setLayout('list');
		$this->view->pick('stampslist/index');
	}

	public function increaseAction()
	{
		$id = $this->request->get('id');
		
		$stamp = Stamp::findFirst($id);
		$stamp->quantity += 1;
		$stamp->save();

        $this->response->redirect('reports/byyear');
	}

	public function deleteAction()
	{
		// get variables from the view via url
		$id = $this->request->get('id');

		// delete the stamp from the DB
		$stamp = Stamp::findFirst($id);
		//
		if($stamp->quantity == 1) {

			$stamp->delete();

		}elseif($stamp->quantity > 1){

			$stamp->quantity -= 1;
			$stamp->save();
			
		}
		// redirect to user stamplist
		$this->response->redirect('reports/byyear');
	}

	
}