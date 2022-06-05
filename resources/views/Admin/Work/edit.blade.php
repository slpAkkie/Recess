@extends('tpl.main')

@section('body')
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <form class="login-form col-12" action="{{ route('admin.works.update', $work->id) }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Название" value="{{ old('title') ?? $work->title }}">
                            <div class="invalid-feedback text-bold">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="type_id">Вид съемки</label>
                            <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                                @foreach ($types as $t)
                                    <option value="{{ $t->id }}"
                                        {{ (old('type_id') ?? $work->type_id) == $t->id ? 'selected' : '' }}>
                                        {{ $t->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="country" class="form-control @error('country') is-invalid @enderror"
                                placeholder="Страна" value="{{ old('country') ?? $work->country }}">
                            <div class="invalid-feedback text-bold">
                                @error('country')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                                placeholder="Город" value="{{ old('city') ?? $work->city }}">
                            <div class="invalid-feedback text-bold">
                                @error('city')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="shooted_at">Дата съемки</label>
                            <input type="date" name="shooted_at" id="shooted_at"
                                class="form-control @error('shooted_at') is-invalid @enderror" placeholder="Дата съемки"
                                value="{{ old('shooted_at') ?? $work->shooted_at }}">
                            <div class="invalid-feedback text-bold">
                                @error('shooted_at')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 mr-auto">
                            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5 rounded-0"
                                value="Сохранить">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
