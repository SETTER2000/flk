<h1>Список задач</h1>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-success " href="/tasks">Добавить задачу</a>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <tr>
                <th>Пользователь</th>
                <th>Email</th>
                <th>Задача</th>
                <th>Картинка</th>
                <th class="text-center">Статус</th>
                <th></th>
            </tr>
            <?php
            foreach ($data as $row) {
                if ($_SESSION['admin'] == 123) {
                    $check = ($row['done']) ? '<input type="checkbox" name="done" checked >' : '<input type="checkbox" name="done" >';
                    $btn = '<button type="submit" class="btn btn-success ">Сохранить</button>';
                }else{  $check = ($row['done']) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span>'; }
                echo '<form method="post" action="/tasks/update" ><tr><td>' . $row['user'] . '</td><td>' . $row['email'] . '</td><td>' . $row['description'] . '</td><td><img  src="/images/' . $row['pic'] . '" alt=""></td><td class="text-center">' . $check . '</td><td  class="pull-right">' . $btn . '</td></tr><input type="hidden" name="task_id[]" value="' . $row['task_id'] . '"></form>';
            }
            ?>
        </table>
    </div>
</div>
