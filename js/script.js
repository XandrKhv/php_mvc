$(function () {

    $('#addTask').click(function () {
        var name = $('input[name=name]').val();
        var email = $('input[name=email]').val();
        var text = $('textarea[name=text]').val();

        if (!name) {
            alert('Введите имя!');
            return false;
        } else if (!email) {
            alert('Введите емаил!');
            return false;
        } else if (!text) {
            alert('Введите текст!');
            return false;
        }
    });

    $('.statusChecked').click(function () {
        var status = $(this).is(':checked');
        var taskId = $(this).attr('id');

        $.post("/index.php?c=admin&a=updateStatus", {
            taskId: taskId,
            status: status
        })
        .done(function (data) {
            console.log(data);
        });
    });
});
