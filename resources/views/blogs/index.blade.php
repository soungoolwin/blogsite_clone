<x-layout>
    @if (session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    @endif
    <x-hero></x-hero>
    <x-blog-card :blogs=$blogs>
    </x-blog-card>
    <x-subscribe></x-subscribe>
</x-layout>