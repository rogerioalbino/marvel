@extends('layouts.default')

@section('content')

    <main role="main">

        <div class="py-5 bg-light ">

            <!-- form -->
            <div class="container">

                <div class="row">

                    <form class="form-inline" action="/character">

                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" required  class="form-control" name="name" placeholder="Pesquisa de Personagens">
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">Pesquisar</button>

                        @if(!empty($erroForm))
                            <div class="alert alert-warning alert-innovare" role="alert">
                                {{$erroForm}}
                            </div>
                        @endif

                    </form>

                </div>
            </div>
            <!-- end form -->

            <!-- cards -->
            <div class="container">

                <div class="row">

                    @foreach ($results as $result)
                        <div class="col-md-4">
                            <a href="/character/ {{$result['id']}} ">
                                <div class="card mb-4 box-shadow">

                                    <img class="card-img-top"
                                         data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                         alt="Thumbnail [100%x380]" style="height: 380px; width: 100%; display: block;"
                                         src="{{ $result['thumbnail']['path'] }}.{{ $result['thumbnail']['extension'] }}"
                                         data-holder-rendered="true">

                                    <div class="card-body">

                                        <p class="card-text">{{ $result['name'] }}</p>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text">
                                                {{ $result['description'] }}
                                            </p>
                                        </div>

                                        <br>

                                        <!-- if  -->
                                    @if(!empty($result['series']['items']))

                                        <!-- accordion -->
                                            <div class="accordion" id="accordionEx" role="tablist"
                                                 aria-multiselectable="true">

                                                <!-- accordion card -->
                                                <div class="card">

                                                    <!-- card header -->
                                                    <div class="card-header" role="tab">
                                                        <a data-toggle="collapse" href="#{{ $result['id'] }}"
                                                           aria-expanded="true"
                                                           aria-controls="{{ $result['id'] }}">
                                                            <h5 class="mb-0">
                                                                Séries <i class="fa fa-angle-down"></i>
                                                            </h5>
                                                        </a>
                                                    </div>

                                                    <!-- card body -->
                                                    <div id="{{ $result['id'] }}" class="collapse" role="tabpanel"
                                                         aria-labelledby="headingOne" data-parent="#accordionEx">
                                                        <div class="card-body">

                                                            @foreach ($result['series']['items'] as $item)
                                                                {{$item['name']}}<br>
                                                            @endforeach

                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end accordion card -->

                                            </div>
                                            <!-- end accordion -->

                                    @endif
                                    <!-- endif  -->

                                    </div>

                                </div>

                            </a>

                        </div>

                    @endforeach

                </div>

            </div>
            <!-- end cards -->

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
