<?php
// контролер
Class Controller_Task Extends Controller_Base {
	
	// шаблон
	public $layouts = "first_layouts";
	
	// экшен
	public function index() {
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
	public function task(){
	    $id = $_GET['id'];
        $model = new Model_Task();
        $userInfo = $model->get_one_db($id);
        $this->template->vars('data', $userInfo);
        $this->template->view('task');
    }


    /**
     * @throws \Exception
     */
     function create()
    {
        $task = new Model_Task();
        if (!empty($_POST)) {
            if($task->create($_POST)){
                header('Location: /task');
            }
        }
        $this->template->vars('task', $task);
        $this->template->view('create');
    }

    /**
     * @throws \Exception
     */
    public function edit()
    {
        if (!isset($_COOKIE['username'])) {
        header("Location: /login");
        }
        if(isset($_GET['id']) || isset($_POST['id'])) {
            $model = new Model_Task();
            $id = $_GET['id'];
            $task = $model->findById($id);

            if (isset($_POST['save'])) {
                $model->save($_POST);
                header("Location: /task");
            } else {
                $this->template->vars('data', $task);
                $this->template->view('edit');
            }
        }else{
            header("Location: /task");

        }
    }
}