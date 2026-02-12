@csrf
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pizzaria</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cherry+Cream+Soda&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet" />

  @vite('resources/css/app.css')
  
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    header a, button {
      font-family: Arial;
      font-weight: 900;
    }
    p {
      font-family: Arial;
      font-weight: 700;
    }
    h1 {
      font-family: "Cherry Cream Soda";
    }
  
    #hero-button {
      font-family: Arial;
    }
  </style>
</head>

<body class="bg-gray-100">
  @include('welcome.components.header')
  @include('welcome.components.main')
  @include('welcome.components.locate')
  @include('welcome.components.footer')

  @include('welcome.components.cartmodal')
</body>
</html>
@include('welcome.components.cartjs')