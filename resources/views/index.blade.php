@extends('app')

@section('content')

    <div class="row" style="text-align: left; padding-top: 20px; margin-bottom: 20px;">
        <div class="col-md-9">
            <div style="background: #ffffff; padding: 20px;">
                <div class="row">
                    <table class="table table-hover" style="">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Сотрудник</th>
                            <th>Возраст</th>
                            <th>Кол-во детей</th>
                            <th>Служ. Авто</th>
                            <th>ЗП</th>
                            <th>ЗП итог</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($employees)
                                @foreach($employees as $employ)
                                    <tr>
                                        <td>{{$employ->uuid}}</td>
                                        <td>{{$employ->surName}}&nbsp;{{$employ->name}}&nbsp;{{$employ->middleName}}</td>
                                        <td>{{$employ->age}}</td>
                                        <td>{{$employ->children}}</td>
                                        <td>
                                            @if(!empty($employ->isCompanyCar))
                                                <span>Да</span>
                                            @else
                                                <span>Нет</span>
                                            @endif
                                        </td>
                                        <td>{{$employ->salary}}</td>
                                        <td>{{$employ->salaryCalculate($employ)}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{--<div class="col-md-12" style="text-align: center;"><?php echo $employess->withQueryString()->links(); ?></div>--}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="background: #ffffff; padding: 10px;">
                <form method="POST" action="/employees/store">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Имя"><br>
                    <input type="text" class="form-control" name="surName" id="surName" placeholder="Фамилия"><br>
                    <input type="text" class="form-control" name="middleName" id="middleName" placeholder="Отчество"><br>
                    <input type="text" class="form-control" name="age" id="age" placeholder="Возраст / 36"><br>
                    <input type="text" class="form-control" name="children" id="children" placeholder="Кол-во детей / 2"><br>
                    <input type="text" class="form-control" name="salary" id="salary" placeholder="Зарплата / 100000"><br>
                    <input type="checkbox" name="isCompanyCar" id="isCompanyCar">&nbsp;<span>Использование служ. авто</span><br>
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="_method" name="_method" value="put"><br>
                    <button class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
