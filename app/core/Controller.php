<?php

class Controller
{

    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    // действие (action), вызываемое по умолчанию
    public function actionIndex()
    {
        // todo
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        $data['content'] = $this->model->getData();
        $data['pagination']['count'] = $this->model->countTask();
        $data['pagination']['pages'] = $this->model->perPage;
        $data['pagination']['page'] = $this->model->page ?? 1;
        $data['title'] = '';

        return $data;
    }
}
