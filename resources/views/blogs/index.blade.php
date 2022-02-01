<x-layout>
    <x-hero></x-hero>
    <x-blog-card :blogs=$blogs :categories=$categories :currentCategory=$currentCategory??null>
    </x-blog-card>
    <x-subscribe></x-subscribe>
</x-layout>