<?php
require_once("modelos/Connection.php");

require_once("modelos/Alumno.php");
require_once("modelos/Maestro.php");
require_once("modelos/Grupo.php");
require_once("modelos/Clase.php");
require_once("modelos/Asistencia.php");

/**
* 
*/
class Api
{
	public $uri 		= '';
	public $server_method = '';
	public $item		= array();
	protected $model 	= '';
	protected $method 	= '';
	protected $args		= array();

	protected $response = array();
	public $results  = null;

	function __construct($request_uri, $server_method)
	{
		$this->uri 			 = $request_uri;
		$this->server_method = $server_method;

		/*switch ($server_method) {
			case 'GET':
				$this->uri = $request_uri;
			break;
			case 'POST':
				$this->uri = $request_uri;
				$this->item = $_POST['item'];
			break;
		}*/
	}

	public function call()
	{
		if($this->server_method == 'GET'){
			$this->results = call_user_func_array(array(new $this->model, $this->method), $this->item);
			$this->make_json();
		} else {
			$this->response = call_user_func_array(array(new $this->model, $this->method), $this->item);
		}

	}

	public function make_json()
	{
		echo json_encode($this->results);
		//echo utf8_encode(json_encode([0=> ['nombre'=>'Colsón']]));
	}

	public function resolve()
	{
		//echo "uri: $this->uri | método: $this->server_method <br>";

		$url 	= explode('/', $this->uri);
		$modelo = $url[0];
		$id 	= (isset($url[1]))? true: false;

		$this->set_class($modelo);
		$this->set_class_method($id);

	}

	private function set_class($modelo)
	{
		switch ($modelo) {
			case 'alumnos':
				$this->model = 'Alumno';
				break;
			case 'maestros':
				$this->model = 'Maestro';
				break;
			case 'grupos':
				$this->model = 'Grupo';
				break;
			case 'clases':
				$this->model = 'Clase';
				break;
			case 'asistencias':
				$this->model = 'Asistencias';
				break;
			default:
				# code...
				break;
		}
	}

	private function set_class_method($id_exists = false)
	{
		switch ($this->server_method) {
			case 'GET':
				if($id_exists)
					$this->method = 'get';
				else
					$this->method = 'all';
				break;
			case 'POST':
				$this->method = 'create';
				$this->item   = $_POST['item'];
				break;
			case 'PUT':
				$this->method = 'update';
				break;
		}
	}

	public function debug()
	{
		//print_r($this->response);
		print_r($this->results);
	}

	public function __toString()
	{
		return "Cachado: $this->model -> $this->method";
	}

}

header('Content-Type: application/json');

//echo json_encode(['hola' => 'mundo']);
$api = new Api($_REQUEST['request'], $_SERVER['REQUEST_METHOD']);

//$api->uri = $_GET['uri'];
//$api->server_method = $_SERVER['REQUEST_METHOD'];

$api->resolve();
$api->call();

//$api->debug();


//Expresiones regulares preg_match($regexp, $field)
//
// Listar todos - /alumno$/
// Editar - /alumno\/[1-9]$/
// Actualizar - /^$/

/*$nuevo_alumno = array( 'alumno' => 
	array('nombre' => 'Octavio', 'apellidos' => 'Perez', 'fecha_registro' => date('Y-m-d'))
);

$api->call('Alumno', 'save', $nuevo_alumno);*/
//$api->call('Alumno', 'all');
//$api->call('Alumno', 'get', array('id' => 1));

//$api->debug();
//$alumno = new Alumno();

/**
 * @desc Get all alumnos
 * print_r($alumno->all());
 */
 
 //print_r($alumno->all());

/**
 * @desc Find a sigle alumno by id
 * $alumno->get(2);
 */

/**
 * @desc Save a alumno
 * $alumno->save((object)array("title" => "Nuevo alumno 3", "content" => "Nuevo content 3"));
 */


/**
 * @desc Update a alumno
 * $alumno->update((object)array("title" => "Nuevo alumno 2 actualizado", "content" => "Nuevo content 2", "id" => 2));
 */

/**
 * @desc Delete a alumno by id
 * $alumno->delete(2);
 */