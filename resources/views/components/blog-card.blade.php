@props(['blogs','categories','currentCategory'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <x-category-dropdown />
    <form action="/" class="my-3">
        <div class="input-group mb-3">
            <input type="text" name="search" value="{{request('search')??''}}" autocomplete="false" class="form-control"
                placeholder="Search Blogs..." />
            @if (request('author'))
            <input type="hidden" name="author" value="{{request('author')??''}}" />
            @endif

            @if (request('category'))
            <input type="hidden" name="category" value="{{request('category')??''}}" />
            @endif
            <button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
                Search
            </button>
        </div>
        @if (!$blogs->count())
        <p>Blog not found</p>
        @endif
    </form>
    <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <div class="card-body">
                    <h3 class="card-title">{{$blog->title}}</h3>
                    <p class="fs-6 text-secondary">
                        <a
                            href="/?author={{$blog->author->username}}{{request('search') ? '&search=' . request('search') : ''}}{{request('category') ? '&category=' . request('category') : ''}}">{{$blog->author->name}}</a>
                        <span> - {{$blog->created_at->diffForHumans()}}</span>
                    </p>
                    <div class="tags my-3">
                        <a
                            href="/?category={{$blog->category->slug}}{{request('author') ? '&author=' . request('author') : ''}}{{request('search') ? '&search=' . request('search') : ''}}"><span
                                class="badge bg-primary">{{$blog->category->name}}</span></a>
                    </div>
                    <p class="card-text">
                        {{$blog->intro}}
                    </p>
                    <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $blogs->links() }}
</section