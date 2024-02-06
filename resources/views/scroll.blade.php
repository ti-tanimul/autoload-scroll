<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>

</style>
</head>
<body>
    <x-app-layout>
        <h1 style="font-size:40px; text-align:center" ><b>Welcome To Our Student Deashboard</b></h1>
        {{-- <img id="upload" src="images/images.jpeg" alt=""> --}}
        {{-- <button id="sslczPayBtn"
            token="if you have any token validation"
            postdata=""
            order="If you already have the transaction generated for current order"
            endpoint="/pay-via-ajax"> Pay Now
        </button> --}}
        <div id="card-container">
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-9 mx-auto" >
                    <table class="table" id="loader">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                        </thead>
                        <tbody class="card-actions" id="loader">
                            @foreach ($details as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->name }}</td>
                                <td>{{ $detail->mobile }}</td>
                                <td>{{ $detail->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </x-app-layout>

    <script>
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };
    
            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
</body>
</html>
<script>

    window.addEventListener('wheel', function(event){
        if(event.deltaY < 0){
            console.log("scrolling up..");
        }else if(event.deltaY > 0){
            console.log("scrolling down");
        }
    })
