@layout('templates.main')

@section('content')
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="post">
                <h1> {{ HTML::link('view/' . $post->id, $post->title) }} </h1>
                <p>{{ substr($post->body, 0, 120). ' [..]' }} </p>
                <p>{{ HTML::link('view/' . $post->id, 'Read more &rarr;') }}</p>
            </div>
        @endforeach
    @endif
@endsection
