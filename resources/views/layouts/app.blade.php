<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Photo Show</title>
  </head>
  <body>
    @include('partials.header')
    <div class="container">
      @include('partials.messages')
      <main class="py-4">
        @yield('content')
      </main>
    </div>
  </body>
</html>
