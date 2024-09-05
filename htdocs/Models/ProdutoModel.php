<?php
    require_once 'DAL/ProdutoDAO.php';

    class ProdutoModel {
        public ?int $id;
        public ?string $quantidade;
        public ?string $preco;

        public function __construct(
            ?int $id = null,
            ?string $quantidade = null,
            ?string $preco = null,

        ) {
            $this->id = $id;
            $this->quantidade = $quantidade;
            $this->preco = $preco;
        }

        public function getProdutos() {
            $produtoDAO = new ProdutoDAO();

            $produto = $produtoDAO->getProdutos();

            foreach ($produto as $chave => $produto) {
                $produto[$chave] = new ProdutoModel(
                    $produto['id'],
                    $produto['quantidade'],
                    $produto['preco'],
                );
            }

            return $produto;
        }

        public function getProdutoPorId($id_produto) {
            $produtoDAO = new ProdutoDAO;

            $produto = $produtoDAO->getProdutoPorId($id_produto);

            $produto = new produtoModel(
                $produto['id'],
                $produto['quantidade'],
                $produto['preco']
            );
            return $produto;
            
        }

        public function create() {
            $produtoDAO = new ProdutoDAO();

            return $produtoDAO->createProduto($this);
        }

        public function update() {
            $produtoDAO = new ProdutoDAO();

            return $produtoDAO->updateProduto($this);
        }

        public function delete() {
            $produtoDAO = new ProdutoDAO();

            return $produtoDAO->deleteProduto($this);
        }
    }