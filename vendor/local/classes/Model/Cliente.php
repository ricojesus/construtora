<?php 

namespace Notas\Model;

require_once 'vendor/autoload.php';

use Notas\DB\Sql;
use Notas\Model;

class Cliente extends Model {

	const SESSION = "Cliente";

	protected $fields = [
		"id", "nome", "construtora_id", "telefone", "celular"
	];

	public function __construct(){
		$this->setid(0);
		$this->setnome(null);
		$this->setconstrutora_id(0);
		$this->settelefone(null);
		$this->setcelular(null);

	}

	public static function listAll(){
		$sql = new Sql();

		return $sql->select("select * from cliente order by nome");
	}

	public function save(){
		$sql = new Sql();

		var_dump($this->getid());

		if ((int)$this->getid() === 0){
		
			$sql->query("insert into cliente (nome, construtora_id, telefone, celular, status) values (:NOME, 1, :TELEFONE, :CELULAR, 1)", array(
				':NOME' => $this->getnome(),			
				//':CONSTRUTORA_ID' => $this->getconstrutora_id(),
				':TELEFONE' => $this->gettelefone(),
				':CELULAR' => $this->getcelular()
			));
		}else{
			$sql->query("update cliente set nome = :NOME, construtora_id = 1, telefone = :TELEFONE, celular = :CELULAR where id = :ID", array(
				':NOME' => $this->getnome(),			
				//':CONSTRUTORA_ID' => $this->getconstrutora_id(),
				':ID' => $this->getid(),
				':TELEFONE' => $this->gettelefone(),
				':CELULAR' => $this->getcelular()
			));
		}
	}

	public function get($id){
		$sql = new Sql();

		$result = $sql->select("select * from cliente where id = :ID", array(
			':ID' => $id
		));

		if (count($result) > 0){
			$this->setData($result[0]);
		}else{
			$this->setData(new Cliente());
		}
	}
}

 ?>