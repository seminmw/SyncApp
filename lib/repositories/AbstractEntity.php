<?php

abstract class AbstractEntity {

    abstract function getAll();
    abstract function create($data);

    /**
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public function exec($sql, $params = []) {
        return Database::exec($sql, $params);
    }

    /**
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public function getRows($sql, $params = []) {
        return $this->exec($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $sql
     * @param array $params
     * @return array|mixed
     */
    public function getRow($sql, $params = []) {
        $results = $this->getRows($sql, $params);
        return empty($results) ? [] : $results[0];
    }
}