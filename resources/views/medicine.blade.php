@extends('layouts.app')

@section('title', '藥品資訊')

@section('content')


    <div class="container">
        <div class="page-header">
            <h1>藥品資訊</h1>
        </div>
    </div>
    <div>
        <form action="/medicine/store" method="POST" class="form-horizontal">
        {{ csrf_field() }}

            <div class="form-group">
                <label for="medicine-name">藥品</label>

                <div class="col-sm-6">
                    <input type="text" name="medicine" id="medicine-name" class="form-control">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> 增加藥品
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{--@if (count($medicines) > 0)--}}
        {{--<div>--}}
            {{--<div class="panel-heading">--}}
                {{--目前藥品--}}
            {{--</div>--}}

            {{--<div class="panel-body">--}}
                {{--<table>--}}

                    {{--<!-- 表頭 -->--}}
                    {{--<thead>--}}
                    {{--<th>Task</th>--}}
                    {{--<th>&nbsp;</th>--}}
                    {{--</thead>--}}

                    {{--<!-- 表身 -->--}}
                    {{--<tbody>--}}
                    {{--@foreach ($medicines as $medicine)--}}
                        {{--<tr>--}}
                            {{--<!-- 任務名稱 -->--}}
                            {{--<td class="table-text">--}}
                                {{--<div>{{ $medicine->medicine }}</div>--}}
                            {{--</td>--}}

                            {{--<!-- 刪除按鈕 -->--}}
                            {{--<td>--}}
                                {{--<form action="/medicines/{{ $medicine->id }}" method="POST">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--{{ method_field('DELETE') }}--}}

                                    {{--<button>刪除藥品</button>--}}
                                {{--</form>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}

    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>藥物名稱</th>
                <th>備註</th>

            </tr>
            </thead>
            <tbody>



            </tbody>
        </table>
    </div>

@endsection 