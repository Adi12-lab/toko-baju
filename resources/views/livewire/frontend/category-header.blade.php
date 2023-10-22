<ul>
    <li>
        <h4>Daftar Kategori</h4>
    </li>
    @foreach ($categories as $category)
        <li><a href="{{ $category->slug }}">{{ $category->name }}</a></li>
    @endforeach
</ul>
