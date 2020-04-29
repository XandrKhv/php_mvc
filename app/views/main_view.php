<div class="row">
    <div class="col-md-10">
        <h1>Главная страница!</h1>
    </div>
    <div class="col-md-2">
        <a href="<?= View::urlHref('c', 'admin') ?>">
            <button type="button" class="btn btn-primary m-t-2">Войти</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form role="form" action="" method="post">
            <div class="form-group">
                <label for="inputName">Имя</label>
                <input type="text" class="form-control" id="inputName" name="name" placeholder="Введите имя">
            </div>
            <div class="form-group">
                <label for="inputEmail">Е-Маил</label>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Е-Маил">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="text" rows="3"></textarea>
            </div>
            <?php
            if ($data["login_status"] == 'empty_fields') {
                ?>
                <div class="alert alert-danger">Заполните все поля.</div>
                <?php
            } elseif ($data["login_status"] == 'email_not_valid') {
                ?>
                <div class="alert alert-danger">Введите корректный е-маил.</div>
                <?php
            } elseif ($data["login_status"] == 'error_save') {
                ?>
                <div class="alert alert-danger">Ошибка сохранения задачи.</div>
                <?php
            }
            ?>
            <button type="submit" id="addTask" class="btn btn-default">Добавить задачу</button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered m-t-4">
            <tr>
                <td><a href="<?= View::urlHref(['sort' => 'name', 'to' => Route::sortTo()]) ?>">Имя</a></td>
                <td><a href="<?= View::urlHref(['sort' => 'email', 'to' => Route::sortTo()]) ?>">E-Mail</a></td>
                <td>Задача</td>
                <td><a href="<?= View::urlHref(['sort' => 'status', 'to' => Route::sortTo()]) ?>">Статус</a></td>
            </tr>
            <?php foreach ($data['content'] as $task) : ?>
                <tr>
                    <td><?= $task['name'] ?></td>
                    <td><?= $task['email'] ?></td>
                    <td><?= $task['text'] ?></td>
                    <td>
                        <?= $task['status'] ? 'выполнено' : 'не выполнено' ?>
                        <?= $task['edit'] ? '<br>отредактировано администратором' : '' ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?= Utils::Pagination($data['pagination']['count'], $data['pagination']['pages'], $data['pagination']['page']) ?>
</div>