<x-layout>
    <div class="container py-md-5">
        <form method="POST" action="/post/create">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" value="{{old('title')}}" class="form-control" id="title" name="title">
                @error('title')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
              <label for="body" class="form-label">Content</label>
              <textarea name="body" id="body" class="body-content tall-textarea form-control" type="text">{{old('body')}}</textarea>
              @error('body')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-layout>