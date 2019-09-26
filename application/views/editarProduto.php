<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema de vendas, página de atualização de produto - WR Vendas">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png'); ?>">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png'); ?>">
  <title>WR Vendas | Painel de Atualização do Produto</title>
  <link href="<?php echo base_url('assets/css/nucleo-icons.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/black-dashboard.css?v=1.0.0'); ?>" rel="stylesheet" />
</head>
<body>
  <div class="wrapper">
    <div class="sidebar">
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            WR 
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Vendas
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="<?php echo base_url('usuarios'); ?>">
              <i class="tim-icons icon-single-02"></i>
              <p>Usuários</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('clientes'); ?>">
              <i class="tim-icons icon-badge"></i>
              <p>Clientes</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('produtos'); ?>">
              <i class="tim-icons icon-cart"></i>
              <p>Produtos</p>
            </a>
          </li>
          <li>
            <a href="./notifications.html">
              <i class="tim-icons icon-bag-16"></i>
              <p>Vendas</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand logo-wr-vendas-painel" href="javascript:void(0)"><img src="<?php echo base_url('assets/img/wr-vendas-oficial.png'); ?>" alt="logo marca do sistema wr vendas"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="search-bar input-group">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                  <span class="d-lg-none d-md-block">Pesquisar</span>
                </button>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="<?php echo base_url('assets/img/anime3.png'); ?>" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Sair
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Perfil</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Configurações</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Sair</a></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pesquisar">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-12 text-left">
                    <h2 class="card-title">Dados do Produto</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
              <form action="<?php echo base_url('editar_produto') ?>" method="POST">
                <div class="row">
                    <input type="hidden" class="form-control" name="id" value="<?= $id ?>">
                    <div class="form-group col-sm-12">
                        <input type="text" class="form-control" name="codigo_barras" value="<?= $codigo_barras ?>" placeholder="Código de barras" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" name="descricao" value="<?= $descricao ?>" placeholder="Nome do produto" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" name="preco_vista" value="<?= $preco_vista ?>" onKeyPress="return(moeda(this,'.',',',event))" placeholder="Preço avista" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" name="preco_prazo" value="<?= $preco_prazo ?>" onKeyPress="return(moeda(this,'.',',',event))" placeholder="Preço a prazo" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" name="detalhamento" value="<?= $detalhamento ?>" placeholder="Detalhes do produto" required>
                    </div>
                </div> 
                <button type="submit" class="btn btn-primary">Atualizar</button>
              </form>
              <div class="mensagem-erro-edit">
                  <?php
                      if($msgError = get_msg_error()) {
                          echo $msgError;
                      }
                  ?>
                </div>
                <div class="mensagem-sucesso-edit">
                  <?php
                      if($msgSucess = get_msg_sucess()) {
                          echo $msgSucess;
                      }
                  ?>
                </div>
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