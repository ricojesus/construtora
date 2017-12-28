<?php 

namespace Construtora\Model;

require_once 'vendor/autoload.php';

use Construtora\DB\Sql;
use Construtora\Model;

class Usuario extends Model {

	const SESSION = "Usuario";

	protected $fields = [
		"id", "nome", "login", "senha", "email", "construtoraId", "clienteId"
	];


	public static function listAll(){
		$sql = new Sql();

		return $sql->select("select * from usuario");
	}

	public function save(){
		$sql = new Sql();
		
		$sql->query("insert into usuario (login, nome, email, construtora_id, cliente_id, status) values (:LOGIN, :NOME, :EMAIL, :CONSTRUTORA_ID, :CLIENTE_ID, 1)", array(
			':LOGIN' => $this->getlogin(),
			':NOME' => $this->getnome(),
			':EMAIL' => $this->getemail(),		
			':CONSTRUTORA_ID' => $this->getconstrutoraId(),
			':CLIENTE_ID' => $this->getclienteId()
		));
	}


	public function update(){
		$sql = new Sql();
		
		$sql->query("update usuario set nome = :NOME, login = :LOGIN, email = :EMAIL, construtora_id = :CONSTRUTORA_ID, cliente_id = :CLIENTE_ID,  where id = :ID", array(
			':NOME' => $this->getnome(),			
			':LOGIN' => $this->getlogin(),
			':ID' => $this->getid(),
			':EMAIL' => $this->getemail(),					
			':CONSTRUTORA_ID' => $this->getconstrutoraId(),
			':CLIENTE_ID' => $this->getclienteId()

		));
	}

	public function get($id){
		$sql = new Sql();

		$result = $sql->select("select * from usuario where id = :ID", array(
			':ID' => $id
		));

		$this->setData($result[0]);
	}
}

 ?>