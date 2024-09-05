<?php
    require_once './models/ItensPedidoModel.php';

    class ItensPedidoController {
        public function getItensPedido() {
            $itensPedidoModel = new ItensPedidoModel();

            $itensPedido = $itensPedidoModel->getItensPedido();

            return json_encode([
                'error' => null,
                'result' => $itensPedido
            ]);
        }
    }
?>