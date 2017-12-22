<?php 

namespace Notas\Model;

require_once 'vendor/autoload.php';

use Notas\DB\Sql;
use Notas\Model;

class Nota extends Model {

	const SESSION = "Nota";

	protected $fields = [
		"nota_id", "nota_numero", "fornecedor_id","fornecedor_nome", "nota_vencimento", "nota_valor", "nota_descricao", "nota_pagamento", "nota_valor_pago"
	];

	public function __construct(){
		$this->setnota_id(0);
		$this->setnota_numero(null);
		$this->setfornecedor_id(null);
		$this->setfornecedor_nome(null);
		$this->setnota_vencimento(null);
		$this->setnota_valor(null);
		$this->setnota_descricao(null);
		$this->setnota_pagamento(null);
		$this->setnota_valor_pago(null);
		$this->setnota_status(null);

	}

	public static function listAll(){
		$sql = new Sql();

		return $sql->select("select nota_id, nota_numero, fornecedor_nome, nota_vencimento, nota_valor, nota_descricao, nota_pagamento, nota_valor_pago, nota_status
		 from tb_nota n inner join tb_fornecedor f 
			on n.fornecedor_id = f.fornecedor_id ");
	}

	public static function pay($id, $data, $valor){
		$sql = new Sql();

		$sql->query("update tb_nota set nota_pagamento = :PAGAMENTO, nota_valor_pago = :PAGO, nota_status = 2 where nota_id = :ID", array(
			':PAGAMENTO' => $data,			
			':PAGO' => $valor,
			':ID' => $id
			));

	}

	public function save(){
		$sql = new Sql();

		var_dump($this->getnota_id());

		if ((int)$this->getnota_id() === 0){
		
			$sql->query("insert into tb_nota (nota_numero, fornecedor_id, nota_vencimento, nota_valor, nota_descricao, nota_status) values (:NOME, :FORNECEDOR, :VENCIMENTO, :VALOR, :DESCRICAO, 1)", array(
				':NOME' => $this->getnota_numero(),			
				':FORNECEDOR' => $this->getfornecedor_id(),
				':VENCIMENTO' => $this->getnota_vencimento(),
				':DESCRICAO' => $this->getnota_descricao(),
				':VALOR' => $this->getnota_valor()
			));
		}else{
			$sql->query("update tb_nota set nota_numero = :NOME, fornecedor_nome = :CONTATO, nota_vencimento = :VENCIMENTO, nota_valor = :VALOR, nota_descricao = :DESCRICAO where nota_id = :ID", array(
				':NOME' => $this->getnota_numero(),			
				':FORNECEDOR' => $this->getfornecedor_id(),
				':ID' => $this->getnota_id(),
				':VENCIMENTO' => $this->getnota_vencimento(),
				':DESCRICAO' => $this->getnota_descricao(),
				':VALOR' => $this->getnota_valor()
			));
		}
	}

	public function get($id){
		$sql = new Sql();

		$result = $sql->select("select * from tb_nota where nota_id = :ID and status <> 3", array(
			':ID' => $id
		));

		if (count($result) > 0){
			$this->setData($result[0]);
		}else{
			$this->setData(new Nota());
		}
	}
}

 ?>