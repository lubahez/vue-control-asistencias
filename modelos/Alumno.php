<?php

/**
 * Class Post
 */
class Alumno
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
        $alumnos = $this->connection->query('SELECT * FROM alumnos');
        if( ! empty( $alumnos ) )
        {
            return $alumnos->fetchAll();
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
        $stmt = $this->connection->query('SELECT * FROM alumnos WHERE id = ?');
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
    public function save( $alumno )
    {
        $stmt = $this->connection->prepare(
            'INSERT INTO alumnos (nombre, apellidos, fecha_registro) values (?,?,?)'
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
    public function update( $alumno )
    {
        $stmt = $this->connection->prepare(
            'UPDATE alumnos SET nombre = ?, apellidos = ? WHERE id = ?'
        );

        $stmt->bindParam(1, $alumno->nombre, SQLITE3_TEXT);
        $stmt->bindParam(2, $alumno->apellidos, SQLITE3_TEXT);
        $stmt->bindParam(3, $alumno->id, SQLITE3_INTEGER);
        return $stmt->execute();
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete( $id )
    {
        $stmt = $this->connection->prepare('DELETE FROM alumno WHERE id = ?');
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