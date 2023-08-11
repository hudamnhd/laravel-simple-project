@extends('layouts.master')
@section('title', 'Register Page')
@section('content')
    <section class="relative flex flex-wrap lg:h-screen lg:items-center">
        <div class="w-full px-4 py-12 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-20">
            <div class="mx-auto max-w-lg text-center">
                <h1 onclick="location.href='/'" type="button"
                    class="cursor-pointer text-2xl font-bold text-blue-600 sm:text-3xl">Register
                    Account</h1>

                <p class="mt-4 text-gray-500">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et libero nulla
                    eaque error neque ipsa culpa autem, at itaque nostrum!
                </p>
            </div>
            {{--  Message --}}
            @include('components.message')
            <form action="{{ route('register') }}" method="POST" class="mx-auto mb-0 mt-4 max-w-md space-y-4">
                @csrf
                <div>
                    <label for="name" class="sr-only">Name</label>
                    <div class="relative">
                        <input autocomplete="off" type="name" name="name"
                            class="w-full rounded-lg border border-gray-200 p-3 pe-12 text-sm shadow-sm outline-blue-600"
                            placeholder="Enter name" value="{{ Session::get('name') }}" required />
                    </div>
                </div>

                <div>
                    <label for="email" class="sr-only">Email</label>
                    <div class="relative">
                        <input autocomplete="off" type="email" name="email"
                            class="w-full rounded-lg border-gray-200 p-3 pe-12 text-sm shadow-sm outline-blue-600"
                            placeholder="Enter email" value="{{ Session::get('email') }}" required />
                    </div>
                </div>

                <div>
                    <label for="password" class="sr-only">Password</label>
                    <div class="relative">
                        <input type="password" name="password"
                            class="w-full rounded-lg border-gray-200 p-3 pe-12 text-sm shadow-sm outline-blue-600"
                            placeholder="Enter password" required />
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="sr-only">Password Confirmation</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation"
                            class="w-full rounded-lg border border-gray-200 p-3 pe-12 text-sm shadow-sm outline-blue-600"
                            placeholder="Enter password confirmation" required />
                    </div>
                </div>
                <div>
                    <label for="HeadlineAct" class="block text-xs font-medium text-gray-500">
                        Register As
                    </label>

                    <select name="role" id="role" required
                        class="mt-1.5 w-full rounded-lg border-gray-300 p-3 text-sm text-gray-700 outline-blue-600">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-500">
                        Have account?
                        <a class="underline" href="/login">Sign in</a>
                    </p>

                    <button type="submit"
                        class="inline-block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">
                        Sign up
                    </button>
                </div>
            </form>
        </div>

        <div class="relative h-64 w-full sm:h-96 lg:h-full lg:w-1/2">
            <img alt="Welcome"
                src="https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=464&q=80"
                class="absolute inset-0 h-full w-full object-cover" />
        </div>
    </section>
@endsection
