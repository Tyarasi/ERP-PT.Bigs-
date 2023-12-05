<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-navy">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img
        src="{{ asset('dist/img/B.png') }}"
        alt="AdminLTE Logo"
        class="brand-image elevation-3"
        style="opacity: 0.8"
      />
      <span class="brand-text font-weight-light">Big Integrasi Teknologi</span>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
        <li class="nav-item">
          <a href="/" class="nav-link">
            <i class="nav-icon fa fa-bookmark"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">Project Management</li>
            <li class="nav-item">
              <a href="{{ route('all.project')}}" class="nav-link">
                <i class="nav-icon fa fa-adjust"></i>
                <p>
                  Project
                </p>
              </a>
            </li>
  
            <li class="nav-item">
              <a href="{{ route('calendar.project')}}" class="nav-link">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                  Schedule
                </p>
              </a>
            </li>
  
            <li class="nav-item">
              <a href="{{ route('all.trash')}}" class="nav-link">
                <i class="nav-icon fas fa-trash"></i>
                <p>
                  Trash List
                </p>
              </a>
            </li>
       
            <li class="nav-header">Finance</li>
          <!--Finance-->
            
              <li class="nav-item">
                <a href="{{ route('pemasukan.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-plus-circle"></i>
                  <p>
                    Pemasukkan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('pengeluaran.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-minus-circle"></i>
                  <p>
                    Pengeluaran
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{ route('laporan.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-balance-scale"></i>
                  <p>
                    Laporan
                  </p>
                </a>
              </li>
                  

          
          <!--Customer Relationship Management-->
          <li class="nav-header">Customer Relationship Management</li>
              <li class="nav-item">
                <a href="{{ route('customer.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                    Customer
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('karyawan.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-address-book"></i>
                  <p>
                    Karyawan
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{ route('jenisjabatan.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-asterisk"></i>
                  <p>
                    Jenis Jabatan
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{ route('penawaran.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-handshake"></i>
                  <p>
                    Penawaran
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{ route('jenisproduk.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-folder"></i>
                  <p>
                    Jenis Produk
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('kontrak.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Kontrak
                  </p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>