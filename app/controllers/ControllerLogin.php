<?php

class ControllerLogin extends Controller
{

    public function actionIndex()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            /*
            Производим аутентификацию, сравнивая полученные значения со значениями прописанными в коде.
            Такое решение не верно с точки зрения безопсаности и сделано для упрощения примера.
            Логин и пароль должны храниться в БД, причем пароль должен быть захеширован.
            */
            if ($login == "admin" && $password == "123") {
                session_start();
                echo $_SESSION['admin'];
                $_SESSION['admin'] = $password;
                header('Location:' . View::urlHref('c', 'admin'));
            } else {
                $data["login_status"] = "access_denied";
            }
        } else {
            $data["login_status"] = "";
        }

        $data['title'] = 'Страница авторизации';
        $this->view->render('login_view', $data);
    }
}
