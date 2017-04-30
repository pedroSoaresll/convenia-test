# convenia-test
Teste api convenia

# Descrição
API para inserção e consulta de dados
- inserção de vendas
- inserção de venedores
- consulta de vendedores com suas respectivas vendas

# rotas para uso
Inserir vendedor: api/seller/create | POST | exemplo json para enviar {"name" : "Pedro", "email" : "pedro@email.com"}
Inserir venda: api/sale/create | POST | exemplo json pra enviar {"value": 400.00, "seller_id": 1}
Consultar todos os vendedores com suas vendas: api/seller/all | GET
Consultar vendedor especifico com suas vendas: api/seller/{id} | GET
