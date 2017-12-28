<?php 

namespace Construtora\Model;

require_once 'vendor/autoload.php';

use Construtora\DB\Sql;
use Construtora\Model;

class Construtora extends Model {

	const SESSION = "Construtora";

	protected $fields = [
		"id", "nome", "responsavel", "telefone", "celular"
	];

	public function __construct(){
		$this->setid(0);
		$this->setnome(null);
		$this->setresponsavel(0);
		$this->settelefone(null);
		$this->setcelular(null);

	}

	public static function listAll(){
		$sql = new Sql();

		return $sql->select("select * from construtora order by nome");
	}

	public function save(){
		$sql = new Sql();

		var_dump($this->getid());

		if ((int)$this->getid() === 0){
		
			$sql->query("insert into construtora (nome, responsavel, telefone, celular, status) values (:NOME, :RESPONSAVEL, :TELEFONE, :CELULAR, 1)", array(
				':NOME' => $this->getnome(),			
				':RESPONSAVEL' => $this->getresponsavel(),
				':TELEFONE' => $this->gettelefone(),
				':CELULAR' => $this->getcelular()
			));
		}else{
			$sql->query("update construtora set nome = :NOME, responsavel = :RESPONSAVEL, telefone = :TELEFONE, celular = :CELULAR where id = :ID", array(
				':NOME' => $this->getnome(),			
				':RESPONSAVEL' => $this->getresponsavel(),
				':ID' => $this->getid(),
				':TELEFONE' => $this->gettelefone(),
				':CELULAR' => $this->getcelular()
			));
		}
	}

	public function get($id){
		$sql = new Sql();

		$result = $sql->select("select * from construtora where id = :ID", array(
			':ID' => $id
		));

		if (count($result) > 0){
			$this->setData($result[0]);
		}else{
			$this->setData(new Construtora());
		}
	}
}

 ?>