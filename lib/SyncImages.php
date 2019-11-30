<?php


class SyncImages
{
    private $data;
    private $pathToFolder;

    /**
     * SyncImages constructor.
     * @param array $data -> данные по изображениями
     * @param string $pathToFolder -> путь к дериктории
     */
    public function __construct(array $data, string $pathToFolder)
    {
        $this->data = $data;
        $this->pathToFolder = $pathToFolder;
    }

    /**
     * Метод для синхронизации файлов в папке и бд
     * @return array
     */
    public function getSyncData():array
    {
        $this->setScriptProperty();

        if(empty($this->data)) {
            return ["Empty data"];
        }

        // Получаем файлы в папке
        $imagesToFolder = $this->scanFolder();

        if(empty($imagesToFolder)) {
            return ["Empty data"];
        }

        $nameFiles = array_map(function($item) {
            return $item['name'];
        }, $this->data);

        $res = [];

        foreach ($nameFiles as $name) {
            if(in_array($name, $imagesToFolder)) {
                $res[] = $name;
            }
        }

        return $res;
    }

    /**
     * Получаем файлы в дериктории
     * @return array|false
     */
    private function scanFolder():array
    {
        $files = scandir($this->pathToFolder);

        // Получаем файлы
        $onlyFiles = array_filter($files, function($item) {
           return !is_dir($item);
        });

        return $onlyFiles;
    }

    /**
     * Метод для отображения результата
     * @param array $data
     */
    public static function viewResult(array $data):void
    {
        if(empty($data)) {
            echo 'Empty data to folder';
            return;
        }

        foreach ($data as $file) {
            echo $file;
            echo "\n";
        }
    }

    private function setScriptProperty()
    {
        ini_set('max_execution_time', '0');
        ini_set('memory_limit', '-1');
    }
}