<body>
    <div class="cont_Logo_BtnBar">
        <div class="logo">
            <a href="inicio.php"><i class="fa-brands fa-pied-piper"></i></a>
        </div>
        <div class="btnBar">
            <i class="fa-solid fa-bars"></i>
        </div>

    </div>
    <header class="conteiner-header">

        <nav class="nac-Container">
            <ul class="ul-Container">
                <li class="Li_logo"><a href="inicio.php" title="ir a inicio"><i class="fa-brands fa-pied-piper logo"></i></a></li>
                <li><i class="fa-solid fa-house"></i><a href="inicio.php" class="a_special">Inicio</a></li>
                <li><i class="fa-solid fa-gavel"></i><a href="gestionCa.php" class="a_special">Gestion de casos</a></li>
                <li><i class="fa-solid fa-people-roof"></i><a href="gestion_Cliente.php" class="a_special">Gestion de clientes</a></li>
                <li><i class="fa-solid fa-list-check"></i><a href="reporteC.php" class="a_special">Reportes</a></li>
                <li class="menuCon"><i class="fa-solid fa-gears menuConfi"></i><a href="#" class="menuConfi1">Configuraciones</a>
                    <ul class="sub_Menu_Confi">
                        <li><a href="tipo_caso.php" class="sub_casos">Tipos de casos</a></li>
                        <li><a href="estado_caso.php" class="sub_casos">Estado de casos</a></li>
                        <li><a href="gestion_abogado.php" class="sub_casos">Abogados</a></li>
                    </ul>
                </li>

                <li><i class="fa-solid fa-person-walking-arrow-right"></i><a href="#" class="salir">Salir</a></li>
            </ul>
        </nav>
    </header>


    <div class="modal fade" id="modalConfirSalir" tabindex="-1" role="dialog" aria-labelledby="EjemploModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EjemploModalLabel">
                        Desea salir?
                    </h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success " data-dismiss="modal">
                        Cancelar
                    </button>
                    <form action="salirProgram.php" method="post">
                        <select class="confirSalir" name="conSalir">
                            <option value="salir"></option>
                        </select>

                        <button type="submit" class="btn btn-danger salir ">
                            Salir
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="../js/verifiSalir.js"></script>