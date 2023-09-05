<!doctype html>
<html lang="en">
  <head>
    <title>Fruity</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d6692547f6.js" crossorigin="anonymous"></script>
  </head>
  <h1> Fruits table </h1><br>
  <body class="container mt-5">
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">

        {{ Session::get('success') }}
    </div>
@endif
    <a class="btn btn-info" style="color: white" href="{{route('fruit.create')}}">+Add new fruit</a>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Discription</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th colspan="2" scope="col" >Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($fruits as $item)
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price}}</td>
            <td>  @if ($item->image)
              <img src="{{ asset('images/fruits/' . $item->image) }}" alt="{{ $item->name }}" width="150" height="120">
          @endif
          </td>
            <td><a  href="{{ route('fruit.edit' , $item->id ) }}" ><i class="fa-regular fa-pen-to-square fa-lg" style="color: #ff841f;"></i></a></td>
            <td> 
              <form action="{{route('fruit.destroy',$item->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class=" btn fa fa-trash text-danger" onclick="return confirm('Are you sure to delete this product?')"></button>
              </form> </td> 
          </tr>
          @endforeach
        </tbody>
      </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>