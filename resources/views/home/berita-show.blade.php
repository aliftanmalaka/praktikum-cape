@extends('home.home_template')


@section('main')
    <div class="lg:flex flex-wrap blog-posts lg:space-x-5 space-y-5 lg:space-y-0 rtl:space-x-reverse">
        <div class="flex-1">
            <div class="grid grid-cols-1 gap-5">
                <div class="card p-6">
                    <div class=" w-full mb-6 ">
                        <img src="{{ Storage::url($berita->berita_foto) }}" alt="{{ $berita->berita_judul }}"
                            class="rounded-md w-full  object-cover">
                    </div>
                    <div class="flex justify-between mb-4">
                        <div class="inline-flex leading-5 text-slate-500 dark:text-slate-500 text-sm font-normal">
                            <span>
                                <iconify-icon icon="heroicons-outline:calendar"
                                    class="text-slate-400 dark:text-slate-500 ltr:mr-2 rtl:ml-2 text-lg"></iconify-icon>
                            </span>
                            <span>
                                {{ \Carbon\Carbon::parse($berita->created_at)->format('d M Y') }}
                            </span>
                        </div>
                        @if ($berita->user)
                            <div class="flex space-x-4 rtl:space-x-reverse">
                                <a>
                                    <span
                                        class="inline-flex leading-5 text-slate-500 dark:text-slate-500 text-sm font-normal">
                                        <iconify-icon icon="heroicons-outline:user"
                                            class="text-slate-400 dark:text-slate-500 ltr:mr-2 rtl:ml-2 text-lg"></iconify-icon>
                                        {{ __('berita.author') }}: {{ $berita->user->name }}
                                    </span>
                                </a>
                            </div>
                        @endif
                    </div>
                    <h5 class="card-title text-slate-900">
                        <h3>{{ $berita->berita_judul }}</h3>
                    </h5>
                    <div
                        class="card-text dark:text-slate-300 mt-4 space-y-4 leading-5 text-slate-600 text-sm border-b border-slate-100
                    dark:border-slate-700 pb-6">
                        {!! $berita->berita_desc !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
