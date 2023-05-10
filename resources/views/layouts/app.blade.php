<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title', 'Home Page')</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
@include('crud.css')

</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">			
			@yield('crud_content')
		</div>
	</div>        
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>    
    @if(Session::has('message'))  
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch( type ){
        case 'info':
          toastr.info("{{ Session::get('message') }}");  
          break;
        case 'success':
          toastr.success("{{ Session::get('message') }}");   
          break;
        case 'warning':
          toastr.warning("{{ Session::get('message') }}");  
          break;
        case 'error':
          toastr.error("{{ Session::get('message') }}");  
          break;
      }  
    @endif  
  </script> 
  @include('crud.js')
</body>
</html>