<nav class="navbar navbar-light position-relative" style="width: 250px;">
    <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#allCat">
        <h4 class="m-0"><i class="fa fa-bars me-2"></i>All Categories</h4>
    </button>
    <div class="collapse navbar-collapse rounded-bottom" id="allCat">
        <div class="navbar-nav ms-auto py-0">
            <ul class="list-unstyled categories-bars">
                @foreach($categories as $category)
                    <li>
                        <div class="categories-bars-item">
                            <a href="#">{{ $category->title }}</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
