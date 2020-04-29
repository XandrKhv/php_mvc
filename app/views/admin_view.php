<div class="row">
    <div class="col-md-10">
        <h1>Панель администрирования!</h1>
    </div>
    <div class="col-md-2">
        <a href="<?= View::urlHref('a', 'logout') ?>">
            <button type="button" class="btn btn-primary m-t-2">Выйти</button>
        </a>
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
                    <td><a href="<?= View::urlHref(['c' => 'admin', 'a' => 'editTask', 'view' => $task['id']]) ?>"><?= $task['name'] ?></a></td>
                    <td><a href="<?= View::urlHref(['c' => 'admin', 'a' => 'editTask', 'view' => $task['id']]) ?>"><?= $task['email'] ?></a></td>
                    <td><a href="<?= View::urlHref(['c' => 'admin', 'a' => 'editTask', 'view' => $task['id']]) ?>"><?= mb_substr($task['text'], 0, 30) ?> ... </a></td>
                    <td>
                        <div class="checkbox">
                            <label>
                                <input class="statusChecked" name="status" type="checkbox" id="<?= $task['id'] ?>" <?= $task['status'] ? 'checked' : '' ?>> Выполнено
                            </label>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?= Utils::Pagination($data['pagination']['count'], $data['pagination']['pages'], $data['pagination']['page']) ?>
</div>