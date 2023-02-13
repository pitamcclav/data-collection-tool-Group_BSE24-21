@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        <div class="head my-2 ">
                            <h2 class="mx-3">

                                {{ __($title) }}
                            </h2>
                            <form action="{{ route('posts') }}" method="GET" class="mx-3">
                                <div class="input-group ">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                    <button class="btn btn-outline-secondary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                      </svg></button>
                                </div>
                            </form>
                            <a href="{{route('new_post')}}" class="btn btn-outline-primary mx-5 btn-md">New </a>
                        </div>





                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Age</th>
                              <th scope="col">Employment</th>
                              <th scope="col">Education</th>


                              <th scope="col">Actions</th>

                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->age_bracket }}</td>
                                <td>{{ $post->employment_status }}</td>
                                <td>{{ $post->education_level }}</td>

                                <td><a class="mx-2 btn btn-primary btn-sm" href="/posts/view/{{ $post->id }}">View</a>

                            </tr>

                            @endforeach
                          </tbody>

                            </tr>
                          </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

