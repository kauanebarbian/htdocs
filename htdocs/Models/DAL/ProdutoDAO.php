<?php
    require_once 'Conexao.php';

    class ProdutoDAO {
        public function getProdutos() {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM produto;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProdutoPorId($id_pedido) {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM item_pedido WHERE id = :id_produto;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id', $id_pedido);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function createProduto(ProdutoModel $produto) {
            $conexao = (new Conexao())->getConexao();

            $sql = "INSERT INTO produto VALUES (:id, :quantidade, :preco);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', null);
            $stmt->bindValue(':quantidade', $produto->quantidade);
            $stmt->bindValue(':preco', $produto->preco);

            return $stmt->execute();
        }

        public function updateProduto(ProdutoModel $produto) {
            $conexao = (new Conexao())->getConexao();

            $sql = "UPDATE produto SET id = :id, quantidade = :quantidade, preco = :preco WHERE id = :id;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $produto->id);
            $stmt->bindValue(':quantidade', $produto->quantidade);
            $stmt->bindValue(':preco', $produto->preco);

            return $stmt->execute();
        }

        public function deleteProduto(ProdutoModel $produto) {
            $conexao = (new Conexao())->getConexao();

            $sql = "DELETE FROM produto WHERE id = :id";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $produto->id);

            return $stmt->execute();
        }
    }