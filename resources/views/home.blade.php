@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                        @can('admin_permission')
                            admin_permission を持っています <br>
                        @endcan

                        @can('manager_permission')
                            manager_permission を持っています <br>
                        @endcan

                        @can('player_permission')
                         player_permission を持っています <br>
                        @endcan
                    </p>
                    <p>
                        @role('admin')
                            あなたのロールは admin です<br>
                        @endrole                    

                        @role('manager')
                            あなたのロールは manager です<br>
                        @endrole                    

                        @role('player')
                            あなたのロールは player です<br>
                        @endrole                    
                    </p>
                    <a href="{{ route('schedules.index') }}">スケジュール一覧へ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection