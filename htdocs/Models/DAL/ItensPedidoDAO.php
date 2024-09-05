<?php
    require_once 'Conexao.php';

    class ItensPedidoDAO {
        public function getItensPedido() {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM item_pedido;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>