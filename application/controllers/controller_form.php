<?php

class Controller_Form extends Controller
{
    function __construct()
    {
        $this->model = new Model_Form();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();

        $this->view->generate('forms_view.php', 'template_view.php', $this->data);
    }

}
