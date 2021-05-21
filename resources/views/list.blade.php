<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List record page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <main>
        <section class="bg-dark py-2">
            <div class="container">
                <h2 class="text-white">CRUD OPERATION IN <strong>LARAVEL</strong></h2>
            </div>
        </section>
        <section>
            <div class="container">
            
                <div class="row">
                    @if(Session::has('msg'))
                    <div class="col-md-10 mx-auto py-3">
                        <div class="alert alert-success">
                        {{Session::get('msg')}}
                        </div>
                    </div>
                    @endif

                    @if(Session::has('errorMsg'))
                    <div class="col-md-10 mx-auto py-3">
                        <div class="alert alert-danger">
                        {{Session::get('errorMsg')}}
                        </div>
                    </div>
                    @endif
                    <div class="col-md-10 text-right py-2 mx-auto">
                        <a href="{{url('/add')}}" class="btn btn-primary"><strong>&plus;</strong> Add New</a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 py-2 mx-auto">
                        <div class="card">
                            <div class="card-header"><strong>Articles/List</strong></div>
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped">
                                        <thead class="bg-dark text-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Created</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($articles)
                                            @foreach($articles as $article)
                                            <tr>
                                                <td>{{$article->id}}</td>
                                                <td>{{$article->title}}</td>
                                                <td>{{$article->author}}</td>
                                                <td>{{$article->created_at}}</td>
                                                <td width="100"><a href="{{url('/edit/'.$article->id)}}" class="btn btn-primary">Edit</a></td>
                                                <td width="100"><a href="{{url('/delete/'.$article->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure!, You want to delete this record.')">Delete</a></td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center">No Record found</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>