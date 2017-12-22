<?php 

namespace Notas\Model;

require_once 'vendor/autoload.php';

use Notas\DB\Sql;
use Notas\Model;

class Fornecedor extends Model {

	const SESSION = "Fornecedor";

	protected $fields = [
		"fornecedor_id", "fornecedor_nome", "fornecedor_contato", "fornecedor_telefone", "fornecedor_celular"
	];

	public function __construct(){
		$this->setfornecedor_id(0);
		$this->setfornecedor_nome(null);
		$this->setfornecedor_contato(null);
		$this->setfornecedor_telefone(null);
		$this->setfornecedor_celular(null);

	}

	public static function listAll(){
		$sql = new Sql();

		return $sql->select("select * from tb_fornecedor order by fornecedor_nome");
	}

	public function save(){
		$sql = new Sql();

		var_dump($this->getfornecedor_id());

		if ((int)$this->getfornecedor_id() === 0){
		
			$sql->query("insert into tb_fornecedor (fornecedor_nome, fornecedor_contato, fornecedor_telefone, fornecedor_celular, fornecedor_status) values (:NOME, :CONTATO, :TELEFONE, :CELULAR, 1)", array(
				':NOME' => $this->getfornecedor_nome(),			
				':CONTATO' => $this->getfornecedor_contato(),
				':TELEFONE' => $this->getfornecedor_telefone(),
				':CELULAR' => $this->getfornecedor_celular()
			));
		}else{
			$sql->query("update tb_fornecedor set fornecedor_nome = :NOME, fornecedor_contato = :CONTATO, fornecedor_telefone = :TELEFONE, fornecedor_celular = :CELULAR where fornecedor_id = :ID", array(
				':NOME' => $this->getfornecedor_nome(),			
				':CONTATO' => $this->getfornecedor_contato(),
				':ID' => $this->getfornecedor_id(),
				':TELEFONE' => $this->getfornecedor_telefone(),
				':CELULAR' => $this->getfornecedor_celular()
			));
		}
	}

	public function get($id){
		$sql = new Sql();

		$result = $sql->select("select * from tb_fornecedor where fornecedor_id = :ID", array(
			':ID' => $id
		));

		if (count($result) > 0){
			$this->setData($result[0]);
		}else{
			$this->setData(new Fornecedor());
		}
	}
}

 ?>