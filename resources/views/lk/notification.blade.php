@extends('layouts.lk')

@section('content')
    <div class="card-lk">
        @if(count($notifications))
            <div class="card-lk__header">
                <h3 class="card-lk__title">Уведомления ({{ count($notifications) }})</h3>
            </div>
            <div class="card-lk__body card-lk-notifications">
                @foreach($notifications as $notification)
                    <div class="card-lk-notification">
                        <div class="card-lk-notification__header">
                            <div class="card-lk-notification__title">{{ $notification->data['status'] }}</div>
                            <div
                                class="card-lk-notification__date">{{ $notification->created_at->format('d.m.Y') }}</div>
                        </div>
                        <div class="card-lk-notification__body">
                            <div class="card-lk-notification__descr">{{ $notification->data['notice'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <x-empty-list page="notifications"/>
        @endif
    </div>
@endsection
