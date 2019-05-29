@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Search Member</h2>
        </div>
        <div class="container">
            <div class="card-top"></div>
            <div class="card">
                <div class="col-md-12">
                    <form action="{{ route('register.create') }}" class="form-horizontal" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="keyword" placeholder="搜尋">
                    </div>
                    <div class="text-center">
                        <button type="submit"  class="btn btn-raised g-bg-cyan waves-effect">
                            <i class="material-icons">create</i><font face="微軟正黑體">搜尋會員</font>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>