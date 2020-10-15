<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body class="p-8">
    <div class="w-full w-full" id="app">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('form.store') }}"
            @submit.prevent="onSubmit()" @keydown="form.errors.clear($event.target.name)"
            {{-- $event javascriptte event ne ise o eventı veriyor --}}>
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    name
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    v-bind:class="{ 'border-red-500': form.errors.has('name') }" id="name" type="text" placeholder="name"
                    name="name" v-model="form.name">
                <p class="text-red-500 text-xs italic" v-text="form.errors.get('name')" v-if="form.errors.has('name')"></p>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    Body
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    v-bind:class="{ 'border-red-500': form.errors.has('body') }" id="body" type="body" placeholder="body"
                    name="body" v-model="form.body">
                <p class="text-red-500 text-xs italic" v-text="form.errors.get('body')" v-if="form.errors.has('body')"></p>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" v-bind:class="{'cursor-not-allowed opacity-50' : form.errors.has()}">
                    Kaydet
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                    Forgot Password?
                </a>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2020 Acme Corp. All rights reserved.
        </p>
    </div>

    <script src="/js/app.js"></script>
</body>

</html>