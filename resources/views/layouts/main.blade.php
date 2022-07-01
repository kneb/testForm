<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Тест форма фиксации обращения/жалобы</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<header>
@if(count($errors) > 0)
        <div class="alert alert-danger">
            <h5 class="pb-1 border-bottom text-black">Ошибки:</h5>
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        <div class="bg-light " id="navbarHeader" style="">
@else
    <div class="bg-light collapse" id="navbarHeader" style="">
@endif
        <div class="container">
            <h5 class="pb-1 border-bottom">Создать обращение/жалобу</h5>
            <form class="row row-cols-md-2 row-cols-xs-1 gy-2 gx-3 align-items-center" action="/add" method="post">
                {{ csrf_field() }}
                <div class="col-auto">
                    <div class="input-group">
                        <div class="input-group-text">
                            <svg class="align-self-center" id="i-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="1.2em" height="1.2em" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2px" overflow="visible">
                                <path d="M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22 11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z" />
                            </svg>
                        </div>
                        <input type="text" class="form-control" id="fio" placeholder="ФИО" name="fio"
                            value="{{ old('fio') }}" required maxlength="100">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="input-group">
                        <div class="input-group-text">
                            <svg class="align-self-center" id="i-mobile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="1.2em" height="1.2em" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2px" overflow="visible">
                                <path d="M21 2 L11 2 C10 2 9 3 9 4 L9 28 C9 29 10 30 11 30 L21 30 C22 30 23 29 23 28 L23 4 C23 3 22 2 21 2 Z M9 5 L23 5 M9 27 L23 27" />
                            </svg></div>
                        <input type="text" class="form-control" id="id" pattern="[0-9]{3,12}"
                               value="{{ old('id') }}" placeholder="Номер телефона" name="id" maxlength="12" required>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="input-group"><div class="input-group-text">
                            <svg id="i-home" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="1.2em" height="1.2em" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M12 20 L12 30 4 30 4 12 16 2 28 12 28 30 20 30 20 20 Z" />
                            </svg>
                        </div>
                        <select class="form-select" id="polyclinic" name="polyclinic" required>
                            @foreach( $polyclinics as $polyclinic)
                            <option value="{{ $polyclinic['id'] }}"
                                @if(old('polyclinic') == $polyclinic['id'])
                                    selected
                                @endif
                                >{{ $polyclinic['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="input-group"><div class="input-group-text">
                            <svg id="i-tag" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="1.2em" height="1.2em" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <circle cx="24" cy="8" r="2" />
                                <path d="M2 18 L18 2 30 2 30 14 14 30 Z" />
                            </svg>
                        </div>
                        <select class="form-select" id="reason" name="reason" required>
                            @foreach($reasons as $reason)
                            <option value="{{ $reason['id'] }}"
                                 @if(old('reason') == $reason['id'])
                                    selected
                                 @endif
                            >{{ $reason['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-text">
                        <svg id="i-msg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="1.2em" height="1.2em" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M2 4 L30 4 30 22 16 22 8 29 8 22 2 22 Z" />
                        </svg>
                    </span>
                    <textarea class="form-control" aria-label="With textarea" name="text" id="text" placeholder="Текст обращения/жалобы"
                              maxlength="1000" required>{{ old('text') }}</textarea>
                </div>

                <div class="col mb-2">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </div>
            </form>

        </div>
    </div>
    <div class="navbar navbar-dark shadow-sm bg-secondary">
        <div class="container-md">
            <div class="d-flex w-100">
                <div>
                    <button class="navbar-toggler collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <svg id="i-compose" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="24" height="24" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
                        </svg>
                        <strong>Создать</strong>
                    </button>
                </div>
                <div class="ms-auto">
                    <a href="https://github.com/kneb/testForm" class="navbar-brand d-flex align-items-center"
                       target="_blank" title="Этот проект на GitHub">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 64 64">
                            <path d="M32 0 C14 0 0 14 0 32 0 53 19 62 22 62 24 62 24 61 24 60 L24 55 C17 57 14 53 13 50 13 50 13 49 11 47 10 46 6 44 10 44 13 44 15 48 15 48 18 52 22 51 24 50 24 48 26 46 26 46 18 45 12 42 12 31 12 27 13 24 15 22 15 22 13 18 15 13 15 13 20 13 24 17 27 15 37 15 40 17 44 13 49 13 49 13 51 20 49 22 49 22 51 24 52 27 52 31 52 42 45 45 38 46 39 47 40 49 40 52 L40 60 C40 61 40 62 42 62 45 62 64 53 64 32 64 14 50 0 32 0 Z"></path>
                            <circle cx="12" cy="13" r="4"></circle>
                        </svg>
                        <strong>GitHub</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container-md">
    <div class="d-flex pb-1 border-bottom mb-2">
        <div class="dropdown pe-3">
            <a class="rounded-0 rounded-bottom btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Повод
            </a>
            <ul class="dropdown-menu overflow-auto" aria-labelledby="dropdownMenuLink" style="max-height: 40vh;">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>

        <div class="dropdown">
            <a class="rounded-0 rounded-bottom btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Поликлиника
            </a>
            <ul class="dropdown-menu overflow-auto" aria-labelledby="dropdownMenuLink" style="max-height: 40vh;">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>
@yield('main_content')
</div>
<script language="JavaScript" src="js/bootstrap.bundle.min.js"></script>
<script>

            document.getElementById('navbarHeader').addEventListener('hidden', function () {
               console.log('kjkjhkjh');
            });
</script>
</body>
</html>
