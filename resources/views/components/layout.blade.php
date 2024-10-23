<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Page' }}</title>
  </head>
  <body>
    <nav>
      <x-nav-link href='/home'>Home</x-nav-link>
      <x-nav-link href='/about'>About</x-nav-link>
      <x-nav-link href='/contact'>Contact</x-nav-link>
    </nav>

    {{ $slot }}
  </body>
</html>
