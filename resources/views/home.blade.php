<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <x-app-layout>
        <h1 style="font-size:40px; text-align:center" ><b>Welcome To Our Student Deashboard</b></h1>
          <div class="container py-5">
              <div class="row">
                  <div class="col-md-9 mx-auto" >
                      <table class="table" id="loader">
                              @foreach ($users as $user)
                              <div class="card post">
                                <div class="card-body">
                                  <h5>{{ $user->id }}</h5>
                                  <h5 class="card-title">{{ $user->name }}</h5>
                                  <h5 class="card-text">{{ $user->mobile }}</h5>
                                  <h5 class="card-test">{{ $user->email }}</h5>
                                </div>
                              </div>
                              @endforeach
                            <input type="hidden" id="start" value="0">
                            <input type="hidden" id="rowperpage" value="{{ $rowperpage }}">
                            <input type="hidden" id="totalrecords" value="{{ $totalrecords }}">
                      </table>
                  </div>
              </div>
          </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script type="text/javascript">
          checkWindowSize();
          function checkWindowSize(){
            if($(window).height() >= $(document).height()){
              fetchData();
            }
          }
          function fetchData(){
            var start = Number($('#start').val());
            var allcount = Number($('#totalrecords').val());
            var rowperpage = Number($('#rowperpage').val());
            start = start + rowperpage;

            if(start <= allcount){
              $('#start').val(start);

              $.ajax({
                url:"{{ route('dataShow') }}",
                data: {start:start},
                datatype: 'json',
                success: function(response){
                  $(".post:last").after(response.html).show().fadeIn("slow");
                  checkWindowSize();
                }
              });
            }
          }
          $(document).on('touchmove', onScroll);
          function onScroll(){
            if($(window).scrollTop() > $(document).height() - $(window).height()-100){

              fetchData();
            }
          }
          $(window).scroll(function(){
            var position = $(window).scrollTop();
            var bottom = $(document).height() - $(window).height();
            if(position == bottom){
              fetchData();
            }
          });
    </script>
  </x-app-layout>
</body>
</html>