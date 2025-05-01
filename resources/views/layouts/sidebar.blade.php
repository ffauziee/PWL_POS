@php
    $user = auth()->user();

    $menus = [
        [
            'title' => 'Dashboard',
            'url' => '/',
            'icon' => 'fas fa-tachometer-alt',
            'menu' => 'dashboard',
            'roles' => ['ADM', 'MNG', 'STF'],
        ],
        [
            'header' => 'Data Pengguna',
        ],
        [
            'title' => 'Level User',
            'url' => '/level',
            'icon' => 'fas fa-layer-group',
            'menu' => 'level',
            'roles' => ['ADM'],
        ],
        [
            'title' => 'Data User',
            'url' => '/user',
            'icon' => 'far fa-user',
            'menu' => 'user',
            'roles' => ['ADM'],
        ],
        [
            'header' => 'Supplier',
        ],
        [
            'title' => 'Data Supplier',
            'url' => '/supplier',
            'icon' => 'fas fa-user',
            'menu' => 'supplier',
            'roles' => ['ADM', 'MNG'],
        ],
        [
            'header' => 'Data Barang',
        ],
        [
            'title' => 'Kategori Barang',
            'url' => '/kategori',
            'icon' => 'far fa-bookmark',
            'menu' => 'kategori',
            'roles' => ['ADM', 'MNG', 'STF'],
        ],
        [
            'title' => 'Data Barang',
            'url' => '/barang',
            'icon' => 'far fa-list-alt',
            'menu' => 'barang',
            'roles' => ['ADM', 'MNG', 'STF'],
        ],
        [
            'header' => 'Transaksi',
        ],
        [
            'title' => 'Stok Barang',
            'url' => '/stock',
            'icon' => 'fas fa-cubes',
            'menu' => 'stock',
            'roles' => ['ADM', 'MNG', 'STF'],
        ],
        [
            'title' => 'Transaksi Penjualan',
            'url' => '/penjualan',
            'icon' => 'fas fa-cash-register',
            'menu' => 'penjualan',
            'roles' => ['ADM', 'MNG', 'STF'],
        ],
        [
            'header' => 'Settings',
        ],
        [
            'title' => 'Ganti Foto Profile',
            'url' => 'user/settings/change-profile-picture',
            'icon' => 'fas fa-cubes',
            'menu' => 'change_profile_picture',
            'roles' => ['ADM', 'MNG', 'STF'],
        ],
    ];
@endphp

<div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @foreach ($menus as $menu)
                @if (isset($menu['header']))
                    <li class="nav-header">{{ $menu['header'] }}</li>
                @elseif (isset($menu['title']) && in_array($user->level->level_kode, $menu['roles']))
                    <li class="nav-item">
                        <a href="{{ url($menu['url']) }}"
                            class="nav-link {{ $activeMenu == $menu['menu'] ? 'active' : '' }}">
                            <i class="nav-icon {{ $menu['icon'] }}"></i>
                            <p>{{ $menu['title'] }}</p>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
    
    <!-- Logout Button Section (Outside of nav to fix centering) -->
    @auth
        <div class="logout-wrapper">
            <button id="btn-logout" type="button" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </div>
    @endauth
</div>

@push('styles')
<style>
    /* Memastikan sidebar memiliki positioning relative */
    .sidebar {
        position: relative;
        min-height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    /* Container khusus untuk tombol logout */
    .logout-wrapper {
        width: 100%;
        padding: 15px;
        margin-top: auto;
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    
    /* Memastikan tombol logout berada tepat di tengah */
    .btn-logout {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80%;
        padding: 10px 15px;
        background: linear-gradient(45deg, #dc3545, #b02a37);
        color: white;
        border: none;
        border-radius: 4px;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(220, 53, 69, 0.3);
        margin: 0 auto; /* Untuk memastikan posisi center */
    }
    
    .btn-logout:hover {
        background: linear-gradient(45deg, #c82333, #a71d2a);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.5);
        transform: translateY(-2px);
    }
    
    .btn-logout:active {
        transform: translateY(1px);
        box-shadow: 0 1px 3px rgba(220, 53, 69, 0.4);
    }
    
    .btn-logout i {
        margin-right: 8px;
        font-size: 16px;
    }
</style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            $('#btn-logout').click(function() {
                $(this).addClass('btn-clicked');
                

                $.ajax({
                    url: '{{ url('logout') }}',
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        // Tambahkan efek transisi sebelum redirect
                        $('body').fadeOut(300, function() {
                            window.location.href = '{{ url('login') }}';
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        // Hapus kelas animasi jika terjadi error
                        $('#btn-logout').removeClass('btn-clicked');
                    }
                });
            });
        });
    </script>
@endpush