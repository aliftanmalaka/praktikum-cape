@extends('admin.admin_template')

@section('main')
    @include('partials.breadcrumb')
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
                </div>
            </header>
            <div class="card-text h-full ">
                @include('partials.alert')
                <form class="space-y-4">
                    <div class="input-area relative">
                        <label for="berita_judul" class="form-label">{{ __('berita.field.berita_judul') }}</label>
                        <input type="text" id="berita_judul" name="berita_judul" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('berita.field.berita_judul') }}"
                            value="{{ $berita->berita_judul }}">
                        <x-input-error :messages="$errors->get('berita_judul')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="berita_desc" class="form-label">{{ __('berita.field.berita_desc') }}</label>
                        <textarea id="berita_desc" name="berita_desc" rows="5" class="form-control my-editor"
                            placeholder="{{ __('table.enter') }} {{ __('berita.field.berita_desc') }}">{!! $berita->berita_desc !!}</textarea>
                        <x-input-error :messages="$errors->get('berita_desc')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="berita_foto" class="form-label">{{ __('berita.field.berita_foto') }}</label>
                        <div class="card">
                            <div class="card-body flex flex-col p-6">
                                <div class="card-text h-full ">
                                    <img src="{{ Storage::url($berita->berita_foto) }}" class="rounded-md" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
