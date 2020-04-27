<div class="row">
    <div class="col-md-8">
        <h1>Редактирование задачи №<?=$data['id']?>!</h1>
    </div>
    <div class="col-md-2">
        <a href="/index.php?c=admin">
            <button type="button" class="btn btn-primary m-t-2">К списку</button>
        </a>
    </div>
    <div class="col-md-2">
        <a href="<?= View::urlHref('a', 'logout') ?>">
            <button type="button" class="btn btn-primary m-t-2">Выйти</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form role="form" action="" method="post">
            <input type="hidden" name="taskId" value="<?=$data['id']?>">
            <div class="form-group">
                <p><b>Имя</b></p>
                <p><?=$data['name']?></p>
            </div>
            <div class="form-group">
                <p><b>Е-Маил</b></p>
                <p><?=$data['email']?></p>
            </div>
            <div class="form-group">
                <p><b>Задача</b></p>
                <textarea class="form-control" name="text" rows="6"><?=$data['text']?></textarea>
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
            <button type="submit" id="editTask" class="btn btn-default">Сохранить задачу</button>
        </form>
    </div>
</div>