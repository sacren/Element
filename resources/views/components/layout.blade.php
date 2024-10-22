<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Page' }}</title>
  </head>
  <body>
    <nav>
      <a href='/home'>Home</a>
      <a href='/about'>About</a>
      <a href='/contact'>Contact</a>
    </nav>

    {{ $slot }}
  </body>
</html>
