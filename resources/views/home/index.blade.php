@extends('home.home_template')


@section('main')
    <div class="space-y-5">
        <!-- Basic Image -->
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full ">
                    <img src="{{ asset('frontend/image/hero.png') }}" class="rounded-md" alt="image">
                </div>
            </div>
        </div>
    </div>
@endsection
