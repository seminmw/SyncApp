<?php

class Database {

    public static $conn = null;

    /**
     * @return object
     */
    public static function getActiveConnection() {
        if (is_null(self::$conn)) {
            die('Failed to retrieve active connection');
        }
        return self::$conn;
    }

    /**
     * @param string $type
     * @param string $host
     * @param string $port
     * @param string $username
     * @param string $password
     * @param string $db
     */
    public static function connect($type ='', $host = '', $port = '', $username = '', $password = '', $db ='') {
        $dsn = sprintf('%s:host=%s;port=%s;dbname=%s', $type, $host, $port, $db);

        try {
            self::$conn = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Connection Failed: " . $e->getMessage());
        }
    }

    /**
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public static function exec($sql, $params = []) {
        $statement = self::getActiveConnection()->prepare($sql);
        $statement->execute($params);
        return $statement;
    }

    /**
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public function getRows($sql, $params = []) {
        return $this->exec($sql, $params)->fetchAll();
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

    /**
     * @param $sql
     * @param array $params
     * @return int
     */
    public function getCountColumn($sql, $params = []) {
        $results = $this->getRow($sql, $params);
        return empty($results) ? 0 : intval($results['total']);
    }
}