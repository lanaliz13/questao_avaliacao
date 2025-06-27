<?php
include 'conexao.php';

$total_compra = 0;
$itens_com_desconto = 0;

$query = "SELECT * FROM carrinho";
$resultado = mysqli_query($conexao, $query);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

$carrinho = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Preço Unitário (R$)</th>
        <th>Subtotal (R$)</th>
      </tr>";

foreach ($carrinho as $produto) {
    $subtotal = $produto["quantidade"] * $produto["preco_unitario"];
    $subtotal_original = $subtotal;

    if ($produto["quantidade"] > 1 && $produto["preco_unitario"] > 50) {
        $subtotal *= 0.9;
        $itens_com_desconto++;
    }

    $total_compra += $subtotal;

    echo "<tr>
            <td>{$produto['item']}</td>
            <td>{$produto['quantidade']}</td>
            <td>" . number_format($produto['preco_unitario'], 2, ',', '.') . "</td>
            <td>" . number_format($subtotal, 2, ',', '.') . "</td>
          </tr>";
}

if ($itens_com_desconto >= 2) {
    $total_compra *= 0.95; 
}

echo "<tr>
        <td colspan='3'><strong>Valor da Compra</strong></td>
        <td><strong>R$ " . number_format($total_compra, 2, ',', '.') . "</strong></td>
      </tr>";

echo "</table>";
?>

