
<!-- Navbar -->
<nav class="navbar navbar-expand-xl bg-dark" data-bs-theme="dark">

    <div class="container-fluid">
    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="Administrador.php" class="navbar-brand">
            <img src="../Img/Logo.png" alt="Farmacia Logo" class="log-img">
        </a>
    
        <div class="navbar-nav ms-auto d-flex flex-row align-items-center">
            <li class="nav-item marg">
                <span class="navbar-text fw-bold me-3 d-lg-inline" href="#"><span id="nombre2"></span> <span id="apellido2"></span></span>
            </li>
            <li class="nav-item marg">
                <a class="nav-link" href="FinalizarCompra.php"><i class="fas fa-shopping-cart"></i></a>
            </li>
            <li class="nav-item marg">
                <a class="nav-link" href="../Controller/Logout.php"><i class="fas fa-sign-out-alt"></i></a>
            </li>
        </div>
    
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if ($_SESSION['tipo_usuario_id'] == 1): ?>
                    <li class="nav-item i1">
                        <a class="nav-link active" aria-current="page" href="Administrador.php">Home</a>
                    </li>
                <?php elseif ($_SESSION['tipo_usuario_id'] == 2): ?>
                    <li class="nav-item i1">
                        <a class="nav-link active" aria-current="page" href="Trabajador.php">Home</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item i2">
                    <a class="nav-link" href="Perfil.php">Perfil</a>
                </li>
                <li class="nav-item i3">
                    <a class="nav-link" href="VentaProductos.php">Venta de Productos</a>
                </li>
                <?php if ($_SESSION['tipo_usuario_id'] == 2): ?>
                    <li class="nav-item i4">
                        <a class="nav-link disabled" href="#">Administrar Insumos Medicos</a>
                    </li>
                    <li class="nav-item i5">
                        <a class="nav-link disabled" href="#">Administrar Cuentas</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item i4">
                        <a class="nav-link" href="AdminInsumos.php">Administrar Insumos Medicos</a>
                    </li>
                    <li class="nav-item i5">
                        <a class="nav-link" href="AdminCuentas.php">Administrar Cuentas</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    
                
    </div>
            
</nav>
