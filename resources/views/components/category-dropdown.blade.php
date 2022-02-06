<div>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{request('category') ?? "Filtered by category"}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/">All</a></li>
            @foreach ($categories as $category)
            <li><a class="dropdown-item"
                    href="/?category={{$category->slug}}{{request('author') ? '&author=' . request('author') : ''}}{{request('search') ? '&serach=' . request('search') : ''}}">{{$category->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>