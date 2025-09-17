<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <form id="form_search" method="POST">
            @csrf
            
            <div class="form__section">
                <label for="searched_word">Пошукове слово</label>
                <input name="searched_word" placeholder="albert einstein" type="text" autocomplete="off" required >
            </div>

            <div class="form__section">
                <label for="searched_site_title">Назва сайту</label>
                <input name="searched_site_title" type="text" autocomplete="off" >
            </div>

            <div class="form__section">
                <label for="searched_location">Локація</label>
                <input name="searched_location" placeholder="London,England,United Kingdom" type="text" autocomplete="off" required >
            </div>

            <div class="form__section">
                <label for="searched_language">Мова</label>
                <input name="searched_language" placeholder="en" type="text" autocomplete="off" required >
            </div>

            <div class="submit__btn__container">
                <button id="search_btn" type="submit">Пошук</button>
            </div>
        </form>

        <div class="search__result">
            @if(!empty($results))
                @foreach($results as $result)
                    <div class="search__result__section">
                        <p>Ранг видачі: {{ $result["rank"] }}</p>
                        <p>Назва: <a href="{{ $result['url'] }}">{{ $result["title"] }}</a></p>
                    </div>
                @endforeach
            @endif
        </div>
    </body>
</html>
