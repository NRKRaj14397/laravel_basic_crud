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
                    <div class="col-md-10 text-right py-2 mx-auto">
                        <a href="{{url('/')}}" class="btn btn-info" ><strong><<</strong> View List</a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 py-2 mx-auto">
                        <div class="card">
                            <div class="card-header"><strong>Articles/Add</strong></div>
                            <div class="card-body">
                                <form action="{{url('/add')}}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control {{$errors->any() && $errors->first('title') ? 'is-invalid' :''}}" name="title" value="{{old('title')}}">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('title')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" id="" cols="30" rows="5" class="form-control {{$errors->any() && $errors->first('description') ? 'is-invalid' :''}}">{{old('description')}}</textarea>
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('description')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Author</label>
                                        <input type="text" class="form-control {{$errors->any() && $errors->first('author') ? 'is-invalid' :''}}" name="author" value="{{old('author')}}">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('author')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        
                                        <button type="submit" name="submit" class="btn btn-secondary">Save Article</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>