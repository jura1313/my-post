@extends('template4')


@section('content')
@foreach ( $post as $pos)
    <form method="POST" action="/edit/{{ $pos->id }}">
        @csrf

        <div class="container col-5">
            <div class="mb-3">
                <div class="mb-3">
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Judul" value="{{ $pos->title }}" required>
                  </div>
                  <div class="mb-3">
                    <select name="category" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                        <option value="{{ $pos->category_id }}">{{ $pos->category->category}}</option>
                        @foreach ($category as $category)
                        <option value="{{ $category->id }}">{{ $category->category}}</option>
                        @endforeach
                      </select>

                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea name="excerpt" class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize:none;" required placeholder="Excerpt" >{{ $pos->excerpt }}</textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" style="height:200px; resize:none;" required placeholder="Konten" >{{ $pos->content }}</textarea>
                  </div>

                <button type="submit" class="btn btn-primary">Unggah</button>

        </div>

@endforeach

    </form>

@endsection


