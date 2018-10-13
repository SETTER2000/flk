<?php

class Controller_Pagination extends Pagination
{
//    function __construct()
//    {
//        $this->model = new Model_Main();
//        $this->view = new View();
//    }

//$navi = new PaginateNavigationBuilder("/sandbox/");
//$navi->tpl = "page{page}/";
//$navi->spread = 4;
//$template = $navi->build($limit, $count_all, $page_num);


    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

    function action_get()
    {
        $data = $this->model->get_data();
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

}