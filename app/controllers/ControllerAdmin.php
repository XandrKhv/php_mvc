<?php

class ControllerAdmin extends Controller
{
    public function actionIndex()
    {
        session_start();

        if ($_SESSION['admin'] == "123") {
            $data = $this->getData();
            $data['title'] = 'Панель управления';
            $this->view->render('admin_view', $data);
        } else {
            session_destroy();
            header('Location:' . View::urlHref('c', 'login'));
        }

    }

    public function actionLogout()
    {
        session_start();
        session_destroy();
        header('Location:/');
    }

    public function actionUpdateStatus()
    {
        $postData = Route::postParams();

        $this->model->updateStatus((int)$postData['taskId'], $postData['status']);
    }

    public function actionEditTask()
    {
        session_start();

        if ($_SESSION['admin'] == "123") {
            $data = $this->getData();

            $postData = Route::postParams();
            if (isset($postData['taskId']) && isset($postData['text'])) {
                $text = htmlspecialchars($postData['text']);
                if ($data['content'][0]['text'] != $text) {
                    $this->model->update((int)$postData['taskId'], $text);
                    $data['content'][0]['text'] = $text;
                }
            } else {
                $data["login_status"] = 'empty_fields';
            }

            $data['title'] = 'Редактирование задачи';
            $this->view->render('admin_edit_task_view', $data['content'][0]);
        } else {
            session_destroy();
            header('Location:' . View::urlHref('c', 'login'));
        }
    }
}
