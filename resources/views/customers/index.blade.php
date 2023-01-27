@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-10">
            <h1 class="text-center mb-3">Data Pelanggan</h1>

            {{-- alert --}}
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="/customers/create" class="btn mb-1 text-white" style="background-color: cadetblue;">Add</a>
            <a href="/customers/deactivate" class="btn mb-1 text-white" style="background-color: darkslategrey">Deactivated</a>
            <form action="/customers" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search ..." name="search">
                    <button type="submit" class="btn text-white" style="background-color: darkslategrey;">Search</button>
                </div>
            </form>

            <?php
                // $con = mysqli_connect('localhost', '', '', 'project_pdam_ppob');
                if(isset($_GET['search'])) {
                    $cari = $_GET['search'];
                    // $customers = mysql_query($con, "SELECT * FROM customers WHERE name LIKE '%". $cari . "'%");
                    $category = \App\Models\Category::where('name', 'like', $cari)->value('id');
                    // $customers = \App\Models\Customer::where('name', 'like', $cari)->orWhere('code', 'like', $cari)->orWhere('category_id', 'like', $category)->get();
                    $customers = \App\Models\Customer::where('name', 'like', $cari)->orWhere('code', 'like', $cari)->get();
                }
            ?>

            {{-- <form action="" class="d-inline-block" style="margin-left: 340px">
                <input type="text" placeholder="search here" size="50" style="border-top: none; border-left: none; border-right: none; border-bottom: none; border-radius: 5px; padding: 5px 10px">
                <button type="submit" class="text-white" style="border:none; border-radius: 5px; padding: 5px 7px">Search</button>
            </form> --}}
            <div class="table-responsive">
                <table class="table table-striped text-center align-middle">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">Address</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        {{-- <th scope="col">Meter</th> --}}
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                            <tr>
                                {{-- <th scope="row">{{ $customer->id }}</th> --}}
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->code }}</td>
                                <td>{{ $customer->address }}</td>
                                {{-- <td>{{ $customer->category_id }}</td> --}}
                                <td>{{ $customer->category->name }}</td>
                                @if ($customer->status)
                                    <td><span class="badge bg-success">active</span></td>
                                @else
                                    <td><span class="badge bg-danger">non active</span></td>
                                @endif
                                {{-- <td>{{ $customer->meter_air }}</td> --}}
                                {{-- <td>
                                    <form action="/customers/{{ $customer->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="btn-group" role="group">
                                            <a href="/customers/{{ $customer->id }}/edit" class="btn btn-outline-dark">edit</a>
                                            <a href="/usages/{{ $customer->id }}" class="btn btn-dark">pemakaian</a>
                                            <button type="submit" class="btn btn-outline-dark" onclick="return confirm('are you sure to delete this customer?')">delete</button>
                                        </div>
                                    </form>
                                </td> --}}
                                <td>
                                    <form action="/customers/{{ $customer->id }}/remove" method="post">
                                        @csrf
                                        <div class="btn-group">
                                            <a href="/customers/{{ $customer->id }}/edit" class="btn btn-outline-dark btn-sm">edit</a>
                                            <a href="/usages/{{ $customer->id }}" class="btn btn-dark btn-sm">pemakaian</a>
                                            @if ($customer->status)
                                                <button type="submit" class="btn btn-outline-dark btn-sm">deactivate</button>
                                            @else
                                                <button type="submit" class="btn btn-outline-dark btn-sm">activate</button>
                                            @endif
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data tidak ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection