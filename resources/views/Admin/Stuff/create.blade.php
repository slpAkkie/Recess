@extends('tpl.main')

@section('body')
    <section class="site-section">
        <div class="container">
            <div class="row">
                <h2 class="heading-39291 col-12">Добавить сотрудника</h2>

                <div class="col-12 bg-white p-6">
                    <form class="create-stuff-form col-12 mx-auto" action="{{ route('admin.stuff.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" name="full_name"
                                    class="form-control border @error('full_name') is-invalid @enderror"
                                    placeholder="Имя сотрудника"
                                    value="{{ old('full_name') }}">
                                <div class="invalid-feedback text-bold">
                                    @error('full_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" name="position"
                                    class="form-control border @error('position') is-invalid @enderror" placeholder="Должность"
                                    value="{{ old('position') }}">
                                <div class="invalid-feedback text-bold">
                                    @error('position')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="description" class="form-control border @error('description') is-invalid @enderror" placeholder="Описание"
                                    cols="30" rows="5">{{ old('description') }}</textarea>
                                <div class="invalid-feedback text-bold">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="d-block" for="avatar">Фотография</label>
                                <input type="file" name="avatar" id="avatar"
                                    class="form-control @error('avatar') is-invalid @enderror" accept=".jpg, .jpeg, .png">
                                <div class="invalid-feedback text-bold">
                                    @error('avatar')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5 rounded-0"
                                    value="Создать">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
