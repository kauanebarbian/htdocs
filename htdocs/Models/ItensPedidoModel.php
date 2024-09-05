<?php
    require_once 'DAL/ItensPedidoDAO.php';

    class ItensPedidoModel {
        public ?int $id;
        public ?string $id_pedido;
        public ?string $id_produto;
        public ?string $quantidade;
        public ?string $id_status;

        public function __construct(
            ?int $id = null,
            ?string $id_pedido = null,
            ?string $id_produto = null,
            ?string $quantidade = null,
            ?string $id_status = null,

        ) {
            $this->id = $id;
            $this->id_pedido = $id_pedido;
            $this->id_produto = $id_produto;
            $this->quantidade = $quantidade;
            $this->id_status = $id_status;
        }

        public function getItensPedido() {
            $itensPedidoDAO = new ItensPedidoDAO();

            $itensPedidos = $itensPedidoDAO->getItensPedido();

            foreach ($itensPedidos as $chave => $itensPedido) {
                $itensPedido[$chave] = new ProdutoModel(
                    $itensPedido['id'],
                    $itensPedido['id_pedido'],
                    $itensPedido['id_produto'],
                    $itensPedido['quantidade'],
                    $itensPedido['id_status'],
                );
            }

            return $itensPedido;
        }
    }
?>