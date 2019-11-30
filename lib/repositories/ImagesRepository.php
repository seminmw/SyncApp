<?php


class ImagesRepository extends AbstractEntity
{
    /**
     * @return mixed
     */
    function getAll() {
        return $this->getRows("SELECT id, name, created_at FROM images ORDER BY id ASC");
    }

    /**
     * @param $date_start
     * @param $date_end
     * @param $page
     * @param $per_page
     * @return mixed
     */
    function getForInterval($date_start, $date_end, $page, $per_page) {
        $offset = $page * $per_page;
        $sql_offset = sprintf(" LIMIT %s OFFSET %s", intval($per_page), intval($offset));
        $sql = sprintf("SELECT * FROM images WHERE created_at BETWEEN ? AND ? ORDER BY created_at DESC, id DESC %s", $sql_offset);
        return $this->getRows($sql, [$date_start, $date_end]);
    }

    /**
     * @param $title
     * @return mixed
     */
    public function create($title) {
        $this->exec("INSERT INTO images (name) VALUES (?)", [$title]);
        return Database::getActiveConnection()->lastInsertId();
    }
}