<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/admin/dashboard') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>
        </a>
        <a href="/admin/ponentes" class="dashboard__enlace <?php echo pagina_actual('/admin/ponentes') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-microphone dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Ponentes
            </span>
        </a>

        <a href="/admin/eventos" class="dashboard__enlace <?php echo pagina_actual('/admin/eventos') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-calendar dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Eventos
            </span>
        </a>

        <a href="/admin/registrados" class="dashboard__enlace <?php echo pagina_actual('/admin/registrados') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-users dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Registrados
            </span>
        </a>

        <a href="/admin/regalos" class="dashboard__enlace <?php echo pagina_actual('/admin/regalos') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-gift dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Regalos
            </span>
        </a>

    </nav>
</aside>