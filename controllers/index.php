<?php
// контролер
Class Controller_Index Extends Controller_Base {
	
	// шаблон
	public $layouts = "first_layouts";
	
	// экшен
	function index() {
        $model = new Model_Task();

        $tasks =  $model->getTaskAll();
        $rows = 3;
        $pages = (int) count($tasks)/$rows;
        $sort = 'created';
        $sorttype = '';
        if (isset($_GET["page"])) {
            $page  = $_GET["page"];
        } else {
            $page=1;
        };

        if (isset($_GET["sort"]))
            $sort = $_GET["sort"];

        if (isset($_GET['sorttype']))
        {
            $sorttype = 'DESC';

        }

        $content = $model->getPageContent($page, $rows, $sort, $sorttype);


        $this->template->vars('data', $content);
        $this->template->vars('pages', $pages);
        $this->template->view('index');
	}
	
}