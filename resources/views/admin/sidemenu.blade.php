<aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
    <div class="sidebar-header">
        <a class="brand-mark" href="{{ url('/admin') }}" aria-label="adminHMD dashboard">
            <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
            <span class="brand-copy">
                <span class="brand-title">AdminDashboard</span>
                <span class="brand-subtitle">Directory Place</span>
            </span>
        </a>
    </div>

    <nav class="sidebar-nav">
        <a class="nav-link active" href="{{route('admin.dashboard')}}" aria-current="page">
            <span class="nav-icon"><i class="bi bi-house-door" aria-hidden="true"></i></span>
            <span class="nav-text">Homepage</span>
        </a>

        <a class="nav-link" href="{{route('admin.categories.index')}}">
            <span class="nav-icon"><i class="bi bi-tags" aria-hidden="true"></i></span>
            <span class="nav-text">Categories</span>
        </a>

        <a class="nav-link" href="{{route('admin.product.index')}}">
            <span class="nav-icon"><i class="bi bi-box-seam" aria-hidden="true"></i></span>
            <span class="nav-text">Products</span>
        </a>

        <a class="nav-link" href="#">
            <span class="nav-icon"><i class="bi bi-star-half" aria-hidden="true"></i></span>
            <span class="nav-text">Reviews</span>
        </a>

        <a class="nav-link" href="#">
            <span class="nav-icon"><i class="bi bi-truck" aria-hidden="true"></i></span>
            <span class="nav-text">Shipping Dates</span>
        </a>

        <a class="nav-link" href="#">
            <span class="nav-icon"><i class="bi bi-envelope" aria-hidden="true"></i></span>
            <span class="nav-text">Contact</span>
        </a>

        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <span class="nav-icon"><i class="bi bi-people-fill" aria-hidden="true"></i></span>
            <span class="nav-text">Users</span>
        </a>

        <a class="nav-link" href="#">
            <span class="nav-icon"><i class="bi bi-gear" aria-hidden="true"></i></span>
            <span class="nav-text">Settings</span>
        </a>

    </nav>

    <div class="sidebar-footer">
        <span class="status-dot"></span>
        <span class="sidebar-footer-text">System running smoothly</span>
    </div>
</aside>
