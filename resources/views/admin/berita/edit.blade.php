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
                <form class="space-y-4" method="POST" action="{{ route('admin.berita.update', $berita->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-area relative">
                        <label for="berita_judul" class="form-label">{{ __('berita.field.berita_judul') }}
                            <x-required /></label>
                        <input type="text" id="berita_judul" name="berita_judul" class="form-control"
                            placeholder="{{ __('table.enter') }} {{ __('berita.field.berita_judul') }}"
                            value="{{ $berita->berita_judul }}">
                        <x-input-error :messages="$errors->get('berita_judul')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="berita_desc" class="form-label">{{ __('berita.field.berita_desc') }}
                            <x-required /></label>
                        <textarea id="berita_desc" name="berita_desc" rows="5" class="form-control my-editor"
                            placeholder="{{ __('table.enter') }} {{ __('berita.field.berita_desc') }}">{!! $berita->berita_desc !!}</textarea>
                        <x-input-error :messages="$errors->get('berita_desc')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="berita_foto" class="form-label">{{ __('berita.field.berita_foto') }}</label>
                        <div class="filePreview">
                            <label>
                                <input type="file" class=" w-full hidden" id="berita_foto" name="berita_foto">
                                <span class="w-full h-[40px] file-control flex items-center custom-class">
                                    <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                                        <span id="placeholder" class="text-slate-400">{{ __('table.input.image') }}</span>
                                    </span>
                                    <span
                                        class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                                </span>
                            </label>
                            <x-input-error :messages="$errors->get('berita_foto')" class="mt-2" />
                            <div id="file-preview"></div>
                        </div>
                    </div>
                    <div id="file-preview"></div>
                    <button class="btn inline-flex justify-center btn-dark">{{ __('table.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
