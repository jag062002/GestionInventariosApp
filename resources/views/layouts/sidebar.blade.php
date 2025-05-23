      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
          <!--begin::Sidebar Brand-->
          <div class="sidebar-brand">
              <!--begin::Brand Link-->
              <a href="./index.html" class="brand-link">
                  <!--begin::Brand Image-->
                  <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                      class="brand-image opacity-75 shadow" />
                  <!--end::Brand Image-->
                  <!--begin::Brand Text-->
                  <span class="brand-text fw-light">Gestión Inventario App</span>
                  <!--end::Brand Text-->
              </a>
              <!--end::Brand Link-->
          </div>
          <!--end::Sidebar Brand-->
          <!--begin::Sidebar Wrapper-->
          <div class="sidebar-wrapper">
              <nav class="mt-2">
                  <!--begin::Sidebar Menu-->
                  <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                      data-accordion="false">

                      <!-- Modulos para la gestión -->
                      <li class="nav-header">GESTIÓN</li>
                      <li class="nav-item">
                          <a href="{{route('proveedores.index')}}" class="nav-link">
                              <i class="nav-icon bi bi-people"></i>
                              <p>Proveedores</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('categorias.index')}}" class="nav-link">
                              <i class="nav-icon bi bi-tags"></i>
                              <p>Categorías</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('productos.index')}}" class="nav-link">
                              <i class="nav-icon bi bi-bag"></i>
                              <p>Productos</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('entradasStock.index')}}" class="nav-link">
                              <i class="nav-icon bi bi-box-seam-fill"></i>
                              <p>Entradas de Stock</p>
                          </a>
                      </li>
                      <!-- Fin Modulos para la gestión -->

                      <!-- Modulos para la administración -->
                      <li class="nav-header">ADMINISTRACIÓN</li>
                      <li class="nav-item">
                          <a href="{{route('roles.index')}}" class="nav-link">
                              <i class="nav-icon bi bi-gear"></i>
                              <p>Roles</p>
                          </a>
                      </li>
                      <!--
                      <li class="nav-item">
                          <a href="./docs/layout.html" class="nav-link">
                              <i class="nav-icon bi bi-people-fill"></i>
                              <p>Usuarios</p>
                          </a>
                      </li> -->
                      <!-- Fin Modulos para la administración -->
                  </ul>
                  <!--end::Sidebar Menu-->
              </nav>
          </div>
          <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
