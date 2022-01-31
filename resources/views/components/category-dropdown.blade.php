@props(['categories','currentCategory'])
<div>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-expanded="false">
            {{isset($currentCategory) ? $currentCategory->name : "Filtered by Category"}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @foreach ($categories as $category)
            <li><a class="dropdown-item" href="/categories/{{$category->slug}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>