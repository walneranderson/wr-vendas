<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema de vendas, página vendas de produto - WR Vendas">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png'); ?>">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png'); ?>">
  <title>WR Vendas | Vendas</title>
  <link href="<?php echo base_url('assets/css/nucleo-icons.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/black-dashboard.css?v=1.0.0'); ?>" rel="stylesheet" />
</head>
<body>
  <div class="wrapper">
    <div class="main-panel painel-vendas">
        <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand logo-wr-vendas-painel" href="javascript:void(0)"><img src="<?php echo base_url('assets/img/wr-vendas-oficial.png'); ?>" alt="logo marca do sistema wr vendas"></a>
                </div>
            </div>
        </nav>
      <div class="content content-vendas">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-body">
                <form action="<?php echo base_url('efetuarVenda/vend') ?>" method="POST" id="formPagamento">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <select class="form-control opcoes-vendas" name="clientes_id">
                                <option value="NULL" selected>Selecione o cliente</option>
                                <?php foreach ($data['clientes'] as $key => $clientes) { ?>
                                <option value="<?= $clientes['id']; ?>"><?= $clientes['nome']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <select class="form-control opcoes-vendas" name="produtos_id" id="produtos">
                                <option value="NULL" selected>Selecione o produto</option>
                                <?php foreach ($data['produtos'] as $key => $produtos) { ?>
                                <option value="<?= $produtos['id']; ?>"><?= $produtos['descricao']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="quantidade" id="quantidade" placeholder="Quantidade" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <select class="form-control opcoes-vendas" name="forma_pagamento" id="formaPagamento">
                                <option value="NULL" selected>Forma de pagamento</option>
                                <option value="DINHEIRO">DINHEIRO</option>
                                <option value="CARTÃO">CARTÃO</option>
                                <option value="BOLETO">BOLETO</option>
                                <option value="CHEQUE">CHEQUE</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" id="valorUnitario" placeholder="Valor unitário" readonly required>
                        </div>
                        <div class="form-group col-sm-6"></div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" id="valorTotal" name="valor_total" placeholder="Valor total" readonly required>
                        </div>
                    </div> 
                    <hr class="divisao"/>
                    <div class="mensagem-erro messagem">
                    <?php
                        if($msgError = get_msg_error()) {
                            echo $msgError;
                        }
                    ?>
                    </div>
                    <div class="mensagem-sucesso messagem">
                    <?php
                        if($msgSucess = get_msg_sucess()) {
                            echo $msgSucess;
                        }
                    ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-salvar">Salvar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script> Produzido por <i class="tim-icons icon-heart-2"></i>
            <a href="javascript:void(0)" target="_blank">Walner Anderson</a> para teste seletivo Infor Geneses.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="<?php echo base_url('assets/js/core/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/core/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/black-dashboard.min.js?v=1.0.0'); ?>"></script>
  <script src="<?php echo base_url('assets/js/set-time-out.js'); ?>"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $().ready(function() {
        $sidebar    = $('.sidebar');
        $navbar     = $('.navbar');
        $main_panel = $('.main-panel');
        $full_page  = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color         = false;
        window_width        = $(window).width();
        fixed_plugin_open   = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
      });
    });
  </script>
  <script type="text/javascript">
        var id_produto;
        $(document).ready(function(){
            $('#produtos').change(function(){
                id_produto = $(this).val();
                $.ajax({
                    type:'POST',
                    data:{id: id_produto},
                    url:'<?php echo base_url('preco'); ?>',
                    success: function(value){
                        $('#quantidade').val(1)
                        $('#valorUnitario').val(value) 
                        $('#valorTotal').val(value);  
                    }
                });
            });

            $('#formaPagamento').change(function(){
                var formaPagamento = $(this).val();
                $.ajax({
                    type:'POST',
                    data:{id: id_produto, pagamento: formaPagamento},
                    url:'<?php echo base_url('forma_pagamento'); ?>',
                    success: function(value){
                        if ($('#quantidade').val() != '') {
                            $('#valorUnitario').val(value);
                            valorTotal = value * $('#quantidade').val();
                            $('#valorTotal').val(valorTotal.toFixed(2));  
                        }
                    }
                });
            });
        });     

        $('#quantidade').keyup(function(){
            qtd        = $(this).val();
            valortotal = $('#valorUnitario').val() * qtd;
            $('#valorTotal').val(valortotal.toFixed(2));  
        });
    </script>
</body>
</html>