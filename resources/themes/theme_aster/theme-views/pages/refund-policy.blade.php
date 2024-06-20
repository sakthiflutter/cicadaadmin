@extends('theme-views.layouts.app')

@section('title', translate('Refund_Policy').' | '.$web_config['name']->value.' '.translate('ecommerce'))

@section('content')
    <main class="main-content d-flex flex-column gap-3 pb-3">
        <div class="page-title overlay py-5 __opacity-half background-custom-fit"
             @if ($pageTitleBanner)
                 @if (File::exists(base_path('storage/app/public/banner/'.json_decode($pageTitleBanner['value'])->image)))
                     data-bg-img="{{ dynamicStorage(path: 'storage/app/public/banner/'.json_decode($pageTitleBanner['value'])->image) }}"
             @else
                 data-bg-img="{{theme_asset('assets/img/media/page-title-bg.png')}}"
             @endif
             @else
                 data-bg-img="{{theme_asset('assets/img/media/page-title-bg.png')}}"
            @endif
        >
            <div class="container">
                <h1 class="absolute-white text-center text-capitalize">{{translate('refund_policy')}}</h1>
            </div>
        </div>
        <div class="container">
            <div class="card my-4">
                <div class="card-body p-lg-4 text-dark page-paragraph">
                    {!! $refundPolicy['content'] !!}
                </div>
            </div>
        </div>
    </main>
@endsection
