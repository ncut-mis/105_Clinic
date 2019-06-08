@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
          <h3><font face="微軟正黑體">搜尋病患</font></h3>
          <small class="text-muted">Search Patient</small>
        </div>
        <div class="container">
            <div class="card-top"></div>
            <div class="card">
                <div class="col-md-12">
                    <form action="{{ route('register.create_reservation') }}" class="form-horizontal" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="keyword" placeholder="請輸入身分證字號">
                        </div>
                        <div class="text-center">
                            <button type="submit"  class="btn btn-raised g-bg-cyan waves-effect">
                                <i class="material-icons">search</i><font face="微軟正黑體">搜尋病患</font>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>