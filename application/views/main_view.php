<div class="jumbotron">
    <h1>Список задач </h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis consectetur consequuntur dignissimos
        distinctio dolor doloremque ea eaque, enim eos eveniet incidunt ipsam, iusto nam odio pariatur quos sequi
        voluptatem.</p>
    <p><a class="btn btn-primary btn-lg" href="/tasks" role="button">Добавить задачу</a></p>
</div>
<div class="row">
    <div class="col-md-12">
        <table id="myTable" class="table table-striped  tablesorter">
            <!--        <table class="table table-striped  ">-->
            <thead>
            <tr>
                <th>Пользователь</th>
                <th>Email</th>
                <th>Задача</th>
                <th>Картинка</th>
                <th class="text-center">Статус</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $row) {
                if ($_SESSION['admin'] == 123) {
                    $check = ($row['done']) ? '<input type="checkbox" name="done"  checked ><span class="hidden">1</span>' : '<input type="checkbox"  name="done" ><span class="hidden">2</span>';
                    $btn = '<button type="submit" class="btn btn-success ">Сохранить</button>';
                    $desc = '<input  class="form-control" name="description" value=' . $row['description'] . '>';
                } else {
                    $check = ($row['done']) ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"><span class="hidden">1</span></span>' : '<span class="glyphicon glyphicon-hourglass" aria-hidden="true"><span class="hidden">2</span></span>';
                    $desc = $row['description'];
                }
                echo '<tr><form name="read" action="/tasks/update"  method="post" ><td>' . $row['user'] . '</td><td>' . $row['email'] . '</td><td>' . $desc . '</td><td><img  src="/images/' . $row['pic'] . '" alt=""></td><td class="text-center">' . $check . '</td><td  class="pull-right">' . $btn . '</td><input type="hidden" name="task_id" value="' . $row['task_id'] . '"></form></tr>';

            }
            ?>
            </tbody>
        </table>

        <div id="pager" class="pager">
            <form id="pager" style="margin-left:90px">
                <!--                <img src="/bower_components/tablesorter/addons/pager/icons/first.png" class="first"/>-->
                <!--                <img src="/bower_components/tablesorter/addons/pager/icons/prev.png" class="prev"/>-->

                <a href=""> <span class="first"><img src="" alt="">&laquo;</span></a>
                <a href=""> <span class="prev">&lsaquo;</span></a>
                <input type="text" class="pagedisplay"/>
                <a href=""><span class="next">&rsaquo;</span></a>
                <a href=""><span class="last">&raquo;</span></a>
                <!--                <img src="/bower_components/tablesorter/addons/pager/icons/next.png" class="next"/>-->
                <!--                <img src="/bower_components/tablesorter/addons/pager/icons/last.png" class="last"/>-->
                <select class="pagesize">
                    <option selected="selected" value="3">3</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                </select>
            </form>
        </div>

    </div>
</div>


