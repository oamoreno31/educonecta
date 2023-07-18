<div class="media" >
    <div class="media-body" style="padding-left: {{ $level }}%">
        <div class="row" >
            @php 
                $user = $com->user->name; 
            @endphp
            <div class="col-lg-10"><strong>{{ $user }}</strong>:<br/> {{ $com->content }}<br/> <small>{{ time_at($com->created_at) }}</small></div>
            <div class="col-lg-2" style="vertical-align: middle;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reply_comment"
                    data-id="{{ $com->id }}">
                    <i class='bx bx-reply' ></i>
                </button>
            </div>
        </div>
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
