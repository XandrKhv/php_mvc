<?php

class Controller404 extends Controller
{

    public function actionIndex()
    {
        $this->view->render('404_view');
    }
}
