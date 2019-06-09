@extends('layouts.clinic')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h4><font face="微軟正黑體"><strong>公告管理</strong></font></h4>
            <small class="text-muted">Clinic posts</small><br>
            <a href="{{ route('clinic.posts.create') }}"><button class="btn-success">新增公告</button></a>
        </div>

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th width="80" style="text-align: center" >日期</th>
                    <th width="100">標題</th>
                    <th style="text-align: center">功能</th>
                </tr>
                </thead>
                <tbody>
                @foreach($announcements as $announcement)
                    <tr>
                        <td style="text-align: center">{{ $announcement->datetime }}</td>
                        <td style="text-align: center">{{ $announcement->title }}</td>
                        <td style="text-align: center">
                            <a href="{{ route('clinic.posts.show', $announcement) }}">詳細內容</a>
                            /
                            <a href="{{ route('clinic.posts.edit', $announcement->id) }}">編輯</a>
                            /
                            <form action="{{ route('clinic.posts.destroy', $announcement->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn-success">刪除</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</section>