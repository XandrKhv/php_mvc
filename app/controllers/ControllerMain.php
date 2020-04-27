<?php

class ControllerMain extends Controller
{

    public function actionIndex()
    {
        $data = $this->getData();

        $this->model->saveTask($data);

        $data['title'] = 'Главная страница';
        $this->view->render('main_view', $data);
    }
}
