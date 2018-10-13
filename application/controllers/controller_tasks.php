<?php

class Controller_Tasks extends Controller
{
    private $_supportedFormats = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');


    function __construct()
    {
        $this->model = new Model_Tasks();
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('tasks_view.php', 'template_view.php');
    }

    function action_add()
    {
//        print_r($_POST);
//        exit();

        if (empty($_POST['user']) || empty($_POST['description'])) {
            $this->view->generate('taskadd_view.php', 'template_view.php', 'Ошибка! Задача не добавлены.');
            return;
        }

        $file = $_FILES['pic'];
        $this->upload_file($file);
        $_POST['pic'] = $file['name'];
        if (isset($_POST['user']) && $this->model->add_data($_POST)) {
            header('Location:/');
        }

    }


    function action_update()
    {

        $_POST['task_id'] = (isset($_POST['task_id'][0])) ? $_POST['task_id'][0] : '';
        $_POST['done'] = (isset($_POST['done'])) ? $_POST['done'] : '';
        if (!empty($_POST['task_id'][0]) && $this->model->update_data($_POST)) {
            header('Location:/');
        }
        $this->view->generate('taskadd_view.php', 'template_view.php', 'Ошибка! Данные не добавлены.');
    }


    function upload_file($file)
    {

        if (is_array($file) && !empty($file['name'])) {
            if (in_array($file['type'], $this->_supportedFormats)) {

                $this->cropImage($file['tmp_name'], $file['tmp_name'], 320, 240);
                move_uploaded_file($file['tmp_name'], 'images/' . $file['name']);
            } else {
                die('Ошибка! Не тот формат файла!');
            }
        }

    }

    /**
     * @param string $aInitialImageFilePath - строка, представляющая путь к обрезаемому изображению
     * @param string $aNewImageFilePath - строка, представляющая путь куда нахо сохранить выходное обрезанное изображение
     * @param int $aNewImageWidth - ширина выходного обрезанного изображения
     * @param int $aNewImageHeight - высота выходного обрезанного изображения
     */
    function cropImage($aInitialImageFilePath, $aNewImageFilePath, $aNewImageWidth, $aNewImageHeight)
    {
        if (($aNewImageWidth < 0) || ($aNewImageHeight < 0)) {
            return false;
        }

        // Массив с поддерживаемыми типами изображений
        $lAllowedExtensions = array(1 => "gif", 2 => "jpeg", 3 => "png");

        // Получаем размеры и тип изображения в виде числа
        list($lInitialImageWidth, $lInitialImageHeight, $lImageExtensionId) = getimagesize($aInitialImageFilePath);

        if (!array_key_exists($lImageExtensionId, $lAllowedExtensions)) {
            return false;
        }
        $lImageExtension = $lAllowedExtensions[$lImageExtensionId];

        // Получаем название функции, соответствующую типу, для создания изображения
        $func = 'imagecreatefrom' . $lImageExtension;
        // Создаём дескриптор исходного изображения
        $lInitialImageDescriptor = $func($aInitialImageFilePath);

        // Определяем отображаемую область
        $lCroppedImageWidth = 0;
        $lCroppedImageHeight = 0;
        $lInitialImageCroppingX = 0;
        $lInitialImageCroppingY = 0;
        if ($aNewImageWidth / $aNewImageHeight > $lInitialImageWidth / $lInitialImageHeight) {
            $lCroppedImageWidth = floor($lInitialImageWidth);
            $lCroppedImageHeight = floor($lInitialImageWidth * $aNewImageHeight / $aNewImageWidth);
            $lInitialImageCroppingY = floor(($lInitialImageHeight - $lCroppedImageHeight) / 2);
        } else {
            $lCroppedImageWidth = floor($lInitialImageHeight * $aNewImageWidth / $aNewImageHeight);
            $lCroppedImageHeight = floor($lInitialImageHeight);
            $lInitialImageCroppingX = floor(($lInitialImageWidth - $lCroppedImageWidth) / 2);
        }

        // Создаём дескриптор для выходного изображения
        $lNewImageDescriptor = imagecreatetruecolor($aNewImageWidth, $aNewImageHeight);
        imagecopyresampled($lNewImageDescriptor, $lInitialImageDescriptor, 0, 0, $lInitialImageCroppingX, $lInitialImageCroppingY, $aNewImageWidth, $aNewImageHeight, $lCroppedImageWidth, $lCroppedImageHeight);
        $func = 'image' . $lImageExtension;

        // сохраняем полученное изображение в указанный файл
        return $func($lNewImageDescriptor, $aNewImageFilePath);
    }


}
