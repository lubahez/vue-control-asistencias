<?php

/**
 * Class Post
 */
class Maestro
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $connection = new Connection();
        $this->connection = $connection->get_connection();
    }

    /**
     * @return array|mixed
     */
    public function all()
    {
        //get all posts
        $maestros = $this->connection->query('SELECT * FROM maestros');
        if( ! empty( $maestros ) )
        {
            return $maestros->fetchAll();
        }
        return array();
    }

    /**
     * @param $id
     * @return array|mixed
     */
    public function get( $id )
    {
        //get one post
        $stmt = $this->connection->query('SELECT * FROM maestros WHERE id = ?');
        $stmt->bindParam(1, $id, SQLITE3_INTEGER);
        $stmt->execute();

        if( ! empty( $stmt ) )
        {
            return $stmt->fetchObject();
        }
        return array();
    }

    /**
     * @param $alumno
     * @return bool
     */
    public function save( $maestro )
    {
        $stmt = $this->connection->prepare(
            'INSERT INTO maestros (nombre, apellidos, fecha_registro) values (?,?,?)'
        );

        $stmt->bindParam(1, $alumno['nombre'], SQLITE3_TEXT);
        $stmt->bindParam(2, $alumno['apellidos'] , SQLITE3_TEXT);
        $stmt->bindParam(3, $alumno['fecha_registro'] , SQLITE3_TEXT);
        return $stmt->execute();
    }

    /**
     * @param $alumno
     * @return bool
     */
    public function update( $maestro )
    {
        $stmt = $this->connection->prepare(
            'UPDATE maestros SET nombre = ?, apellidos = ? WHERE id = ?'
        );

        $stmt->bindParam(1, $maestro->nombre, SQLITE3_TEXT);
        $stmt->bindParam(2, $maestro->apellidos, SQLITE3_TEXT);
        $stmt->bindParam(3, $maestro->id, SQLITE3_INTEGER);
        return $stmt->execute();
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete( $id )
    {
        $stmt = $this->connection->prepare('DELETE FROM maestros WHERE id = ?');
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * @desc Close connection
     */
    public function __destruct()
    {
        $this->connection = null;
    }
}