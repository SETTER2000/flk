<?php

class Controller_Tasks extends Controller
{

	function action_index()
	{
		$this->view->generate('tasks_view.php', 'template_view.php');
	}

}
