<?php

use Phalcon\Mvc\Controller;

class HomeController extends Controller
{
	public function indexAction()
	{
		// load users from database
		$users = Users::find();

		// send data to the view
		$this->view->users = $users;
	}

	public function newAction()
	{
	}

	public function submitAction()
	{
		// get the request from POST
		$name = $this->request->get('name');
		$year = $this->request->get('year');

		// save in the database
		$users = new Users();
		$users->name = $name;
		$users->year = $year;
		$users->save();

		// redirect to home
		$this->response->redirect('home');
	}

	public function deleteAction()
	{
		// get the request from GET
		$id = $this->request->get('id');

		// find user in the database
		$user = Users::findFirst($id);
		$user->delete();

		// redirect to home
		$this->response->redirect('home');
	}
}