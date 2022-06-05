@extends('tpl.main')

@section('body')
    <section class="site-section">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <a href="{{ route('admin.works.index') }}"
                    class="btn btn-primary py-2 px-3 mr-2 rounded-0">Все работы</a>
                </div>
            </div>
            <div class="row">
                <h2 class="heading-39291 col-12 mb-1">{{ $work->title }} <span
                        class="text-muted">({{ $work->type->title }})</span></h2>
                <h6 class="col-12 mb-4">{{ $work->country }}, {{ $work->city }}</h6>

                <div class="col bg-white p-6">
                    <div class="row">
                        <div class="col d-flex flex-column align-items-start">
                            <div class="d-flex mt-1">
                                <a href="{{ route('admin.works.edit', $work->id) }}"
                                    class="btn btn-light py-2 px-3 mr-2 rounded-0">Редактировать</a>
                                <form action="{{ route('admin.works.delete', $work->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="btn btn-primary text-white py-2 px-3 rounded-0">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12"><h4 class="text-bold">Файлы</h4></div>
                        <div class="col-12 mb-4">
                            <form action="{{ route('admin.works.objects.upload', $work->id) }}" id="upload-form" method="post" class="d-flex align-items-center gap-5">
                                @csrf
                                <button id="upload-form__add-btn"
                                    class="btn btn-primary text-white py-2 px-3 rounded-0">Добавить</button>
                                <input class="d-none" id="upload-form__file" type="file" accept=".jpg, .jpeg, .png, .mp4, .avi, .mov">
                            </form>
                            <div class="resumable-list"></div>
                        </div>
                        <div class="col-12">
                            @foreach ($work->objects()->orderBy('type_id')->get() as $o)
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        @if ($o->type_id == 1)
                                            <video src="{{ $o->path }}" class="w-100"></video>
                                        @else
                                            <img src="{{ $o->path }}" class="w-100" alt="Фото">
                                        @endif
                                    </div>
                                    <div class="col-3">
                                        <div>{{ $o->type->title }}</div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-end">
                                            <form action="{{ route('admin.works.objects.delete', [
                                                'work' => $work->id,
                                                'work_object' => $o->id,
                                            ]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-primary text-white py-2 px-3 rounded-0">Удалить</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <x-Works.row :work="$work" withoutHeading />
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        let addedFiles = 0;
        let uploadedFiles = 0;

        $(document).ready(function () {
            $('#upload-form').on('submit', function (e) {
                e.preventDefault();
            });

            $('#upload-form__add-btn').on('click', function () {
                $('#upload-form__file').click();
            });

            var r = new Resumable({
                target: $('#upload-form').attr('action'),
                chunkSize: 5 * 1024 * 1024,
                simultaneousUploads: 5,
                testChunks: false,
                throttleProgressCallbacks: 1,
                query: {_token: $('#upload-form input[name=_token]').val()}
            });

            var fileElement = document.getElementById('upload-form__file');
            r.assignBrowse(fileElement);

            r.on('fileAdded', function (file) {
                $('.resumable-list').append('<li class="resumable-file-' + file.uniqueIdentifier + '">Загрузка <span class="resumable-file-name"></span> <span class="resumable-file-progress"></span>');
                $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-name').html(file.fileName);
                addedFiles++;
                r.upload();
            });

            r.on('fileSuccess', function (file, message) {
                $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').html('(загружен)');
                uploadedFiles++;
                if (uploadedFiles === addedFiles) location.reload();
            });
            r.on('fileError', function (file, message) {
                $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').html('(Ошибка: ' + message + ')');
            });
            r.on('fileProgress', function (file) {
                $('.resumable-file-' + file.uniqueIdentifier + ' .resumable-file-progress').html(Math.floor(file.progress() * 100) + '%');
                $('.progress-bar').css({width: Math.floor(r.progress() * 100) + '%'});
            });
            r.on('cancel', function () {
                $('.resumable-file-progress').html('отменено');
            });
            r.on('uploadStart', function () {
                $('.progress-resume-link').hide();
                $('.progress-pause-link').show();
            });
        })
    </script>
@endsection
