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
                <form action="<?php echo base_url('#') ?>" method="POST">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <select class="form-control opcoes-vendas" name="produtos_id">
                                <option selected>Selecione o cliente</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <select class="form-control opcoes-vendas" name="produtos_id">
                                <option selected>Selecione o produto</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="quantidade" placeholder="Quantidade" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <select class="form-control opcoes-vendas">
                                <option selected>Forma de pagamento</option>
                                <option value="DINHEIRO">DINHEIRO</option>
                                <option value="CARTÃO">CARTÃO</option>
                                <option value="BOLETO">BOLETO</option>
                                <option value="CHEQUE">CHEQUE</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="valor_total" placeholder="Valor total R$" readonly required>
                        </div>
                    </div> 
                    <hr class="divisao"/>
                    <div class="mensagem-erro">
                    <?php
                        if($msgError = get_msg_error()) {
                            echo $msgError;
                        }
                    ?>
                    </div>
                    <div class="mensagem-sucesso">
                    <?php
                        if($msgSucess = get_msg_sucess()) {
                            echo $msgSucess;
                        }
                    ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
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
  <script>
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
  <script>
    function moeda(a, e, r, t) {
        let n = ""
          , h = j = 0
          , u = tamanho2 = 0
          , l = ajd2 = ""
          , o = window.Event ? t.which : t.keyCode;
        if (13 == o || 8 == o)
            return !0;
        if (n = String.fromCharCode(o),
        -1 == "0123456789".indexOf(n))
            return !1;
        for (u = a.value.length,
        h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
            ;
        for (l = ""; h < u; h++)
            -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
        if (l += n,
        0 == (u = l.length) && (a.value = ""),
        1 == u && (a.value = "0" + r + "0" + l),
        2 == u && (a.value = "0" + r + l),
        u > 2) {
            for (ajd2 = "",
            j = 0,
            h = u - 3; h >= 0; h--)
                3 == j && (ajd2 += e,
                j = 0),
                ajd2 += l.charAt(h),
                j++;
            for (a.value = "",
            tamanho2 = ajd2.length,
            h = tamanho2 - 1; h >= 0; h--)
                a.value += ajd2.charAt(h);
            a.value += r + l.substr(u - 2, u)
        }
        return !1
    }
 </script>
</body>
</html>