<?php
/**
 * Class Connection
 */
class Connection
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * Connection constructor.
     */
    public function __construct()
    {
        try {
            $this->connection = new PDO('sqlite:db_control_asistencia.s3db');
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo 'Falló la conexión ' . $e->getMessage();
        }
        //$this->_createPostsTable();
    }

    /**
     * @return PDO
     */
    public function get_connection()
    {
        return $this->connection;
    }

    /**
     * @desc Drop and Create posts table
     */
    private function _createPostsTable()
    {
        $this->connection->exec("
            DROP TABLE posts
        ");

        //crea la tabla posts
        $this->connection->exec("
            CREATE TABLE posts (
                Id INTEGER PRIMARY KEY,
                title TEXT,
                content TEXT
            )
        ");
    }
}