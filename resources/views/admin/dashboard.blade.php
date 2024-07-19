@extends('admin-layout')

@section('content')
    <div class="grid-margin stretch-card d-flex flex-column">
        <div class="card mb-4 flex-row justify-content-between align-items-center p-3">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-dot mb-0">
                        <li class="breadcrumb-item active" aria-current="page">List peserta</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end">
                <form class="search-form">
                    <div class="input-group">
                        <div class="input-group-text">
                            <i data-feather="search"></i>
                        </div>
                        <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
