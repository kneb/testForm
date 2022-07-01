@extends('layouts.main')

@section('main_content')
    @foreach($complaints as $compl)
    <div class="card mb-3">
        <div class="card-header d-flex pt-1 pb-1">
            <div class="align-self-center">{{ $compl->reason['title'] }}</div>
            <div class="ms-auto">
            <span class="badge bg-info">{{ $compl->polyclinic['title'] }}</span>
            <p class="mb-0" style="font-size: 10pt;">{{ $compl['created_at'] }}</p>
            </div>
        </div>
        <div class="card-body pb-1">
            <p class="card-text">{{ $compl['text'] }}</p>
            <div class="border-top row w-100">
                <div class="col-xs-1 col-sm-auto">
                    <svg class="align-self-center" id="i-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="1.2em" height="1.2em" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2px" overflow="visible">
                        <path d="M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22 11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z" />
                    </svg>{{ $compl->client['fio'] }}
                </div>
                <div class="d-block text-nowrap col-xs-1 col-sm-2">
                <svg class="align-self-center" id="i-mobile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="1.2em" height="1.2em" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2px" overflow="visible">
                    <path d="M21 2 L11 2 C10 2 9 3 9 4 L9 28 C9 29 10 30 11 30 L21 30 C22 30 23 29 23 28 L23 4 C23 3 22 2 21 2 Z M9 5 L23 5 M9 27 L23 27" />
                </svg>{{ $compl['client_id'] }}</div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
@endsection