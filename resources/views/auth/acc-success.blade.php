<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/media.css') }}">

</head>

<body class="body-pages">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <section class="acc-success text-center">
                    <img src="{{ asset('resources/assets/images/done.png') }}" class="img-fluid" alt="done">
                    <h3>تم انشاء الحساب بنجاح</h3>
                    <p>سوف يتم تفعيل الحساب بعد مراجعته ودفع مبلغ مالى وقدره 10 ريال </p>
                    <p>لمعرفة طرق الدفع برجاء التواصل مع هذا الرقم <span>0128568249</span></p>
                </section>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <script src="{{ URL::asset('resources/assets/js/custom.js') }}"></script>
</body>

</html>
