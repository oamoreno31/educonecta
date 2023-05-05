<div class="row" style="padding-left: {{ $level + 20 }}%">
    <div class="col-1">
        <img src="{{ asset('assets/img/marie.jpg') }}" alt="80" width="80">
    </div>
    <div class="col-9">
        @php
            $user = $com->user->name;
        @endphp
        <div class="row">
            <div class="col-4">
                <h6 class="mt-0">{{ $user }}</h6>
            </div>
            <div class="col-4">
                <p>{{ time_at($com->created_at) }}</p>
            </div>
            <div class="col-4">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#reply_comment"
                    data-id="{{ $com->id }}">
                    responder
                </button>
            </div>
        </div>
        <div class="row">
            <div class="px-5">
                <p>{{ $com->id }} :{{ $com->content }}</p>
            </div>
        </div>

    </div>
    {{-- <div class="col-2">

    </div> --}}
</div>
