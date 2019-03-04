@extends('layouts.app')

@section('title', '看診紀錄資訊')

@section('content')

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <small></small>
            </h1>
        </div>
        <!-- Post Content -->
    </div>
    <article>
        <div class="container">
                <div class="page-header">
                    <h1>看診資料</h1>
                </div>
                <div class="page-header">
                    <h1></h1>
                </div>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>姓名</th>
                            <th>就醫紀錄</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($exams as $index => $exam)
                            <tr>
                                <td>
                                    @foreach ($names as  $name)
                                        @if($name->id === $exam->patient_id)
                                            {{$name->name}}
                                        @endif
                                        @break;
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach

                            <form action="" method="POST" >
                           {{ csrf_field() }}
                           {{ method_field('PATCH') }}
                        <td>
                            <div class="form-group">
                                <label for="symptom">症狀</label>
                                <textarea class="form-control" id="symptom" rows="3"></textarea>
                            </div>

                            <form action="/examination/store" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                    <div class="col-sm-9">
                                        <select name="medicines" class="form-control">
                                            @foreach ($medicines as  $medicine)
                                            <option value="{{$medicine->medicine}}">{{$medicine->medicine}}</option>
                                            @endforeach
                                        </select>
                                        <select name=note1 class="form-control">
                                                <option value=></option>
                                                <option value=每日4次>每日4次</option>
                                                <option value=每日3次>每日3次</option>
                                                <option value=每日2次>每日2次</option>
                                                <option value=每日1次>每日1次</option>
                                        </select>
                                        <select name=note2 class="form-control">
                                            <option value=></option>
                                            <option value=飯前服用>飯前服用</option>
                                            <option value=飯後服用>飯後服用</option>
                                            <option value=睡前服用>睡前服用</option>
                                        </select>

                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-plus"></i>新增藥物
                                        </button>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-plus"></i>下一位
                                        </button>
                                    </div>
                                   </form>
                            <div class="row">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>藥物名稱</th>
                                        <th>備註</th>
                                        <th>    </th>
                                    </tr>
                                    </thead>
                                <tbody>

                                @foreach ($ExamineMedicines as  $ExamineMedicine)
                                    <tr>
                                    <td>{{ $ExamineMedicine->medicine}}</td>
                                    <td>{{ $ExamineMedicine->note1}}</td>
                                    <td>{{ $ExamineMedicine->note2}}</td>
                                    </tr>
                                @endforeach

                               </tbody>
                                </table>
                            </div>
                                </td>
                        </form>
                        </tbody>
                    </table>
                </div>
        </div>
    </article>
@endsection
