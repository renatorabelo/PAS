<?
    $Error = new Error();
    if (isset($_SESSION[SESSION_NAME])):
        $Dieta = new Dieta();
        $arrValue = $Dieta->getAllDieta();
?>
<div id="main">
    <header>
        <div id="logo">
            <div id="logo_text">
                <h1><a href="?">Lar da<span class="logo_colour"> Vovó</span></a></h1>
                <h2>Asilo Nossa Senhora da Piedade.</h2>
            </div>
        </div>
        <nav>
            <ul class="sf-menu" id="nav">
                <li><a href="?page=Home">Início</a>
                <li><a href="javascript: void(Group4);">Cadastros</a>
                    <ul>
                        <li><a href="?page=Usuarios">Usuários</a></li>
                        <li><a href="?page=Idosos">Idosos</a></li>
                        <li><a href="?page=Produtos">Produtos</a></li>
                        <li><a href="?page=Dietas">Dietas</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(Group4);">Estoque</a>
                    <ul>
                        <li><a href="?page=EntradaAtivos">Entrada de Ativos</a></li>
                        <li><a href="?page=SaidaAtivos">Saída de Ativos</a></li>
                    </ul>
                </li>
                <li><a href="javascript: void(Group4);">Relatórios</a>
                    <ul>
                        <li><a href="?page=RelacaoDietas">Relação de Dietas</a></li>
                        <li><a href="?page=RelacaoMedicamentos">Relação de Medicamentos</a>
                        <li><a href="javascript: void(Group4);">Relatórios de Estoque</a>
                            <ul>
                                <li><a href="?page=PosicaoEstoque">Posição de estoque</a></li>
                                <li><a href="?page=LogAtivos">Saída/Entrada Ativos</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="?page=Logout">Sair do Sistema</a>
            </ul>
        </nav>
    </header>
    <div id="site_content">
        <div id="content">
            <h1>Dietas</h1>
            <?
                if(empty($arrValue)) {
                    $Error->setError('Não há dieta cadastrada!');
                    $Error->ShowError();
                }
            ?>
            <div id="table">
                <table>
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?
                        if(!empty($arrValue)):
                            foreach($arrValue as $value):
                    ?>
                    <tr>
                        <th><?=$value['CDDIETA']?></th>
                        <td><?=$value['NMDIETA']?></td>
                        <td><?=$value['DSDIETA']?></td>
                        <td><?=$Dieta->getStatusColor($value['IDATIVO'])?></td>
                        <th class="update" id="AlterDieta"><a href="?page=DietasAlter&id=<?=$value['CDDIETA']?>" style="text-decoration: none; color: #FFFFFF;">Alterar</a></th>
                        <th class="delete" id="ExclDieta"><a href="?page=DietasExcl&id=<?=$value['CDDIETA']?>" style="text-decoration: none; color: #FFFFFF;">Excluir</a></th>
                    </tr>
                    <?
                            endforeach;
                        endif;
                    ?>
                    <tr>
                        <th class="insert" id="InsDieta"><a href="?page=DietasCad" style="text-decoration: none; color: #FFFFFF;">Incluir</a></th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<? else:
    $Error->setError('É preciso estar logado para acessar a página!');
    $Error->ShowDie();
endif;
?>