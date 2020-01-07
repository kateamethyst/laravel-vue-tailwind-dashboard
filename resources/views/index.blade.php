<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.meta')
        <title>Careers | SendItOut International Outsourcing Inc.</title>
        <!-- Fonts -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>
    <body class="bg-gray-600">
        <div id="app">
          <main-nav></main-nav>
          <div class="wrapper">
              <p class="text-gray-900 text-2xl md:text-4xl lg:text-5xl xl:text-5xl">We're Hiring!</p>
              <form>
                <div class="form-group">
                    <div class="w-10/12">
                      <input type="text" class="input" placeholder="Job Title/Keywords">
                    </div>
                    <div class="w-2/12">
                        <button class="btn btn-lg btn-primary block">Search</button>
                    </div>
                </div>
              </form>
          </div>
          <div class="wrapper">
              <nav class="w-full">
                  <ol class="list-reset flex justify-start">
                      <li><router-link to="/dashboard" class="text-blue-600 text-base">Home</router-link></li>
                      <li><span class="mx-2 text-gray-900 text-base">/</span></li>
                      <li><router-link to="/job-openings" class="text-blue-600 text-base">Careers</router-link></li>
                      <li><span class="mx-2 text-gray-900 text-base">/</span></li>
                      <li><span class="text-gray-900 text-base">Job Search</span></li>
                  </ol>
              </nav>
          </div>
          <div class="wrapper pt-5">
              <div class="flex">
                  <div class="w-3/12">
                      <p class="text-gray-900 font-semibold text-2xl">Current Search</p>
                  </div>
                  <div class="w-9/12">
                    <p class="text-gray-900 font-semibold text-2xl">Your search have found 100 jobs</p>
                  </div>
              </div>
          </div>
        </div>
        @include('partials.footer')
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
