<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Bootstrap Input Form</title>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('captcha') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="firstName">Name:</label>
                        <input type="text" name="name" class="form-control" id="firstName" placeholder="Enter your first name">
                        {{-- @error('captcha')
                            <label for="" class="text-danger">{{ $message }}</label>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <label for="email">Mobile:</label>
                        <input type="number" name="mobile" class="form-control" id="email" placeholder="Enter your Mobile">
                        {{-- @error('captcha')
                            <label for="" class="text-danger">{{ $message }}</label>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                        {{-- @error('captcha')
                            <label for="" class="text-danger">{{ $message }}</label>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <div class="captcha">
                            <span>{!! captcha_img('math') !!}</span>
                            <button type="button" class="btn btn-danger reload" id="reload">
                                &#x21bb;
                            </button>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="captcha" placeholder="Enter your Captcha">
                        @error('captcha')
                            <label for="" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    console.log(data);
                    $(".captcha span").html(data.captcha);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>