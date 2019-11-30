<?php


class ImagesRepository extends AbstractEntity
{
    function getAll()
    {
        return $this->getRows("SELECT id, name, created_at FROM images ORDER BY id ASC");
    }

    public function getImages($id) {
        return $this->getRow("SELECT id, name, created_at FROM images WHERE id = ?", [$id]);
    }

    public function create($title) {
        $this->exec("INSERT INTO images (name) VALUES (?)", [$title]);
        return Database::getActiveConnection()->lastInsertId();
    }

}