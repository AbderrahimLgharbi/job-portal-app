@extends('frontend.layouts.master')

@section('contents')

<div class="bg-homepage1"></div>

@include('frontend.home.sections.homeSection');

<div class="mt-100"></div>

@include('frontend.home.sections.categorySection')


{{-- @include('frontend.home.sections.featuredSection')


@include('frontend.home.sections.chooseUsSection')


@include('frontend.home.sections.overFlowSection')


@include('frontend.home.sections.recruteursSection')


@include('frontend.home.sections.pricingSection')


@include('frontend.home.sections.jobsByLocationSection')

@include('frontend.home.sections.ourClientsSection')

@include('frontend.home.sections.newsBlogSection') --}}

@endsection