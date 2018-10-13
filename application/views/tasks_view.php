<h1>Новая задача</h1>

<hr>
<div >
    <pop-up-msg></pop-up-msg>
<div class="row">
    <div class="col-md-12">
        <form name="myForm" method="post" action="/tasks/add" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName">Пользователь</label>
                <input type="text" class="form-control" name="user" placeholder="Ваше имя" ng-model="task.user" required >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" ng-model="task.email" >
            </div>
            <div class="form-group">
                <label for="exampleInputTask">Задача</label>
                <input type="text" class="form-control" name="description" placeholder="Описание задачи" ng-model="task.description" required >
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Добавить картинку</label>
                <input type="file" id="pic" name="pic" class="btn  btn-default" ng-model="task.pic" onchange="previewFile()">

            </div>

            <img src="" id="myimg" height="200" alt="Image preview...">

            <hr>
            <button type="submit" class="btn btn-success ">Сохранить</button>
            <button type="button" class="btn btn-info" ng-click="openPopUp(task)">Предварительный просмотр</button>
        </form>

    </div>
    </div>
</div>