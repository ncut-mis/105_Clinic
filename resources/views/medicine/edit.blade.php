@extends('layouts.clinic')

@section('title', '藥物資訊')

<section class="content">

    <div class="container-fluid">
        <div class="block-header">
            <h3>藥物資訊</h3>
        </div>

        <div>
            <form action="/medicine/store" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="medicine-name"><h4>輸入藥品</h4></label>

                    <div class="col-sm-4">
                        <div class="modal-col-white">
                            <input type="text" name="medicine" id="medicine-name" class="form-control" placeholder="請輸入藥品">
                        </div>
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
    </div>


    <div class="container-fluid">
        <div class="card">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>藥物名稱</th>
                    <th>備註</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <form action="/medicine/{{$medicine->id}}/update" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                             <td> <input type="text" name="medicine" id="medicine-name" class="form-control" placeholder="{{$medicine->medicine}}" value=""></td>
                            <td>
                                <button type="submit" class="btn btn-default">更新藥品</button>
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>