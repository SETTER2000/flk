<h1>Новая задача</h1>

<hr>

<div class="row">
    <div class="col-md-12">
        <form method="post" action="/form">
            <div class="form-group">
                <label for="exampleInputName">Пользователь</label>
                <input type="text" class="form-control" name="user" placeholder="Ваше имя">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputTask">Задача</label>
                <input type="text" class="form-control" name="task" placeholder="Описание задачи">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Добавить картинку</label>
                <input type="file" id="exampleInputFile">
<!--                <p class="help-block">Example block-level help text here.</p>-->
            </div>

            <hr>
            <button type="submit" class="btn btn-success ">Сохранить</button>
        </form>
    </div>
</div>