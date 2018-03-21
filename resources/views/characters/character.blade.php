@extends('layouts.default')

@section('content')

    <main role="main">

        <div class="py-5 bg-light">

            <!-- card -->
            <div class="container">

                <div class="row align-items-center justify-content-center">


                    <div class="col-md-4">
                        <a href="/">Back</a>
                        <div class="card mb-4 box-shadow">

                            <img class="card-img-top"
                                 data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                 alt="Thumbnail [100%x380]" style="height: 380px; width: 100%; display: block;"
                                 src="{{ $thumbnail['path'] }}.{{ $thumbnail['extension'] }}"
                                 data-holder-rendered="true">

                            <div class="card-body">

                                <p class="card-text">{{ $name }}</p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-text">
                                        {{ $description }}
                                    </p>
                                </div>

                                <br>


                            @if(!empty($series['items']))

                                    <!-- accordion -->
                                    <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                                        <!-- accordion card -->
                                        <div class="card">

                                            <!-- card header -->
                                            <div class="card-header" role="tab" id="headingOne">
                                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                                   aria-controls="collapseOne">
                                                    <h5 class="mb-0">
                                                        Séries <i class="fa fa-angle-down"></i>
                                                    </h5>
                                                </a>
                                            </div>

                                            <!-- card body -->
                                            <div id="collapseOne" class="collapse" role="tabpanel"
                                                 aria-labelledby="headingOne" data-parent="#accordionEx">
                                                <div class="card-body">


                                                    @foreach ($series['items'] as $item)
                                                        {{$item['name']}}<br>
                                                    @endforeach


                                                </div>
                                            </div>

                                        </div>
                                        <!-- end accordion card -->

                                    </div>
                                    <!-- end accordion -->

                                @endif

                            </div>
                        </div>

                    </div>

                </div>
                <!-- end card -->

            </div>
    </main>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            $('.card-header').on('click', function () {
                $(this)
                    .find('[data-fa-i2svg]')
                    .toggleClass('fa-angle-down')
                    .toggleClass('fa-angle-up');
            });
        });

    </script>

@stop
