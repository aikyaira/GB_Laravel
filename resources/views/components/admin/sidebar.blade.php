<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('news') }}">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Admin -->
<li class="nav-item">
    <a class="nav-link" href="">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Админка</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Новости</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.news.index') }}">Новости</a>
            <a class="collapse-item" href="{{ route('admin.categories.index') }}">Категории</a>
        </div>
    </div>
    
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.users.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Пользователи</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.contacts.index') }}">
        <i class="far fa-fw fa-envelope"></i>
        <span>Сообщения</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.orders.index') }}">
        <i class="fas fa-fw fa-coins"></i>
        <span>Заказы</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.resources.index') }}">
        <i class="fas fa-fw fa-atlas"></i>
        <span>Ресурсы</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>