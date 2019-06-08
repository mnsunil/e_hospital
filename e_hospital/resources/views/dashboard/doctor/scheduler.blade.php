@extends('dashboard.theme')
@push('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/slick.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/profile.min.css')}}">
@endpush
@section('content')

<div class="page-content">
    <div class="container-fluid">
        @if($calendar != '')
        <div class="box-typical">
            <div class="calendar-page">
                <div class="calendar-page-content">
                    <div class="calendar-page-title">Calendar</div>
                    <div class="calendar-page-content-in">
                       
                        <div id="calendar">

                        </div>
                        <script>
                            $(document).ready(function () {
                                var events = [];
                                @foreach($appointments as $appointment)
                                events.push({
                                    "id": 1,
                                    title: '{{ $appointment->patient->user->names }}',
                                    start: '2019-06-08', // will be parsed
                                });
                                @endforeach
                                $('#calendar').fullCalendar(
                                        {
                                            "header": {"left": "prev,next today", "center": "title", "right": "month,agendaWeek,agendaDay"},
                                            "eventLimit": true,
                                            "firstDay": 1,
                                            "events": events
                                        });
                            });
                        </script>
                    </div>
                </div><!--.calendar-page-content-->

                <div class="calendar-page-side">
                    <section class="calendar-page-side-section">
                        <div class="calendar-page-side-section-in">
                            <div id="side-datetimepicker"></div>
                        </div>
                    </section>

                </div><!--.calendar-page-side-->
            </div><!--.calendar-page-->
        </div><!--.box-typical-->
        @else
        <div class="row">
            <div class="col-md-12">
                No Schedules Found
            </div>
        </div>
        @endif
    </div><!--.container-fluid-->
</div><!--.page-content-->




@endsection
@push('scripts')
<script src="{{asset('dashboard/js/lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/tether/tether.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/moment/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{asset('dashboard/js/lib/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/fullcalendar/fullcalendar-init.js')}}"></script>
<script src="{{asset('dashboard/js/app.js')}}"></script>
<script>
                             $(function () {
                                 $(".profile-card-slider").slick({
                                     slidesToShow: 1,
                                     adaptiveHeight: true,
                                     prevArrow: '<i class="slick-arrow font-icon-arrow-left"></i>',
                                     nextArrow: '<i class="slick-arrow font-icon-arrow-right"></i>'
                                 });

                                 var postsSlider = $(".posts-slider");

                                 postsSlider.slick({
                                     slidesToShow: 4,
                                     adaptiveHeight: true,
                                     arrows: false,
                                     responsive: [
                                         {
                                             breakpoint: 1700,
                                             settings: {
                                                 slidesToShow: 3
                                             }
                                         },
                                         {
                                             breakpoint: 1350,
                                             settings: {
                                                 slidesToShow: 2
                                             }
                                         },
                                         {
                                             breakpoint: 992,
                                             settings: {
                                                 slidesToShow: 3
                                             }
                                         },
                                         {
                                             breakpoint: 768,
                                             settings: {
                                                 slidesToShow: 2
                                             }
                                         },
                                         {
                                             breakpoint: 500,
                                             settings: {
                                                 slidesToShow: 1
                                             }
                                         }
                                     ]
                                 });

                                 $('.posts-slider-prev').click(function () {
                                     postsSlider.slick('slickPrev');
                                 });

                                 $('.posts-slider-next').click(function () {
                                     postsSlider.slick('slickNext');
                                 });

                                 /* ==========================================================================
                                  Recomendations slider
                                  ========================================================================== */

                                 var recomendationsSlider = $(".recomendations-slider");

                                 recomendationsSlider.slick({
                                     slidesToShow: 4,
                                     adaptiveHeight: true,
                                     arrows: false,
                                     responsive: [
                                         {
                                             breakpoint: 1700,
                                             settings: {
                                                 slidesToShow: 3
                                             }
                                         },
                                         {
                                             breakpoint: 1350,
                                             settings: {
                                                 slidesToShow: 2
                                             }
                                         },
                                         {
                                             breakpoint: 992,
                                             settings: {
                                                 slidesToShow: 3
                                             }
                                         },
                                         {
                                             breakpoint: 768,
                                             settings: {
                                                 slidesToShow: 2
                                             }
                                         },
                                         {
                                             breakpoint: 500,
                                             settings: {
                                                 slidesToShow: 1
                                             }
                                         }
                                     ]
                                 });

                                 $('.recomendations-slider-prev').click(function () {
                                     recomendationsSlider.slick('slickPrev');
                                 });

                                 $('.recomendations-slider-next').click(function () {
                                     recomendationsSlider.slick('slickNext');
                                 });
                             });
</script>
@endpush