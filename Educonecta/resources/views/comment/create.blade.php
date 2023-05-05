<div class="col-lg-2">
    <div class="card">
        <div class="card-header">Comentarios</div>
        <div class="card-body">
            <div class="media">
                <div class="media-body row">
                    <form method="POST" action="{{ route('comments.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @include('comment.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
