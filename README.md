# Laravel- Heroicons

## Install

composer require crankd/laravel-heroicons

## php artisan vendor:publish

php artisan vendor:publish --tag=heroicons-config

## Example

<x-heroicon::icon type="outline" icon="check" class="w-6 h-6" />

## Setup Helper

php artisan vendor:publish --tag=heroicons-helper

##### Helper Position

top-left
top-right
bottom-left
bottom-right

<x-heroicon-helper::helper position="bottom-right" />

<script src="{{ asset('crankd/laravel-heroicons/helper.js') }}"></script>
