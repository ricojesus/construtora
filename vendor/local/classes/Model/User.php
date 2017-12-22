<?php 

namespace Notas\Model;

require_once 'vendor/autoload.php';

use Notas\DB\Sql;
use Notas\Model;

class User extends Model {

	const SESSION = "User";

	protected $fields = [
		"usuario_id", "usuario_nome", "usuario_login", "usuario_password"
	];


	public static function listAll(){
		$sql = new Sql();

		return $sql->select("select * from tb_usuario");
	}

	public function save(){
		$sql = new Sql();
		
		$sql->query("insert into tb_usuario (usuario_login, usaurio_nome, usuario_senha, usuario_status) values (:LOGIN, :NOME, :PASSWORD, 1)", array(
			':LOGIN' => $this->getusuario_login(),
			':NOME' => $this->getusuario_nome(),			
			':PASSWORD' => $this->getusuario_password()
		));
	}


	public function update(){
		$sql = new Sql();
		
		$sql->query("update tb_usuario set usuario_nome = :NOME, usuario_login = :LOGIN where usuario_id = :ID", array(
			':NOME' => $this->getusuario_nome(),			
			':LOGIN' => $this->getusuario_login(),
			':ID' => $this->getusuario_id()
		));
	}

	public function get($id){
		$sql = new Sql();

		$result = $sql->select("select * from tb_usuario where usuario_id = :ID", array(
			':ID' => $id
		));

		$this->setData($result[0]);
	}
}

 ?>