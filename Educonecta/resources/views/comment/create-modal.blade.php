<div class="media">
    <div class="media-body row">
        <form method="POST" action="{{ route('comments.store') }}" role="form" enctype="multipart/form-data">
            @csrf
            @include('comment.form')
        </form>
    </div>
</div>
