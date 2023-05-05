<div class="media">
    <div class="media-body">
        <div class="row" style="padding-left: {{ $level }}%">
            <div class="col-1">
                <img src="{{ asset('assets/img/marie.jpg') }}" alt="80" width="80">
            </div>
            <div class="col-9">
                @php
                    $user = $com->user->name;
                @endphp
                <h6 class="mt-0">{{ $user }}</h6>
                <div class="px-5">
                    <p>{{ $com->content }}</p>
                </div>
            </div>
            <div class="col-2">
                <p>{{ time_at($com->created_at) }}</p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#reply_comment"
                    data-id="{{ $com->id }}">
                    responder
                </button>
            </div>
        </div>
        @forelse ($com->comments as $com)
            @php
                $level = $level + 3;
            @endphp
            @include('post.comments')
        @empty
        @endforelse

        {{-- @while ()
            @include('post.comments')
        @endwhile --}}
    </div>
</div>

<script type="text">

</script>

<!-- Modal -->
<div class="modal fade" id="reply_comment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reply_comment_title">Responder Comentario </h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                {{-- <input type="text" name="comment_id" class="comment_id"> --}}
                <div class="form-reply-comment">
                    @php
                        $comment = new App\Models\Comment();
                    @endphp
                    @include('comment.create-modal')
                </div>
            </div>
        </div>
    </div>
</div>
