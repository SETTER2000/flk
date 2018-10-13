<h1>Новая задача</h1>

<hr>

<div class="row">
    <div class="col-md-12">
        <form method="post" action="/tasks/add" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName">Пользователь</label>
                <input type="text" class="form-control" name="user" placeholder="Ваше имя">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputTask">Задача</label>
                <input type="text" class="form-control" name="description" placeholder="Описание задачи">
            </div>
            <!--            <div class="form-group">-->
            <!--                <label for="exampleInputDone">Выполнена/Не выполнена</label>-->
            <!--                <input type="checkbox" class="form-control" name="done">-->
            <!--            </div>-->
<!--            <div class="has-success">-->
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input type="checkbox" id="checkboxSuccess" value="option1">-->
<!--                        Выполнена/Не выполнена-->
<!--                    </label>-->
<!--                </div>-->
<!--            </div>-->
            <div class="form-group">
                <label for="exampleInputFile">Добавить картинку</label>
                <input type="file" name="pic" id="exampleInputFile">
                <!--                <p class="help-block">Example block-level help text here.</p>-->
            </div>

            <hr>
            <button type="submit" class="btn btn-success ">Сохранить</button>
            <button type="button" class="btn btn-info ">Предварительный просмотр</button>
        </form>
    </div>
</div>